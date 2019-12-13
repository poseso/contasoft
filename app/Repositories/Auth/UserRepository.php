<?php

namespace App\Repositories\Auth;

use Exception;
use Throwable;
use Carbon\Carbon;
use App\Models\Auth\User;
use App\Events\User\UserCreated;
use App\Events\User\UserUpdated;
use App\Events\User\UserRestored;
use Illuminate\Http\UploadedFile;
use App\Events\User\UserConfirmed;
use App\Models\Auth\SocialAccount;
use Illuminate\Support\Facades\DB;
use App\Events\User\UserDeactivated;
use App\Events\User\UserReactivated;
use App\Events\User\UserUnconfirmed;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Events\User\UserPasswordChanged;
use App\Notifications\UserAccountActive;
use App\Events\User\UserPermanentlyDeleted;
use App\Events\User\UserProviderRegistered;
use App\Notifications\UserNeedsConfirmation;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class UserRepository.
 */
class UserRepository extends BaseRepository
{
    /**
     * UserRepository constructor.
     *
     * @param  User  $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * @param int  $status
     * @param bool $trashed
     *
     * @return mixed
     */
    public function getForDataTable($status = 1, $trashed = false)
    {
        $dataTableQuery = User::with('providers', 'permissions')
            ->select([
                'users.id',
                'users.first_name',
                'users.last_name',
                'users.username',
                'users.email',
                'users.confirmed',
                'users.active',
                'users.created_at',
                'users.updated_at',
                'users.deleted_at',
            ])
            ->where('id', '!=', '1');

        if ($trashed === 'true') {
            return $dataTableQuery->onlyTrashed();
        }
        // active() is a scope on the UserScope trait
        return $dataTableQuery->active($status);
    }

    /**
     * @return mixed
     */
    public function getUnconfirmedCount() : int
    {
        return User::where('confirmed', false)
            ->count();
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getActivePaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return User::with('roles', 'permissions', 'providers')
            ->active()
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return LengthAwarePaginator
     */
    public function getInactivePaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return User::with('roles', 'permissions', 'providers')
            ->active(false)
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return LengthAwarePaginator
     */
    public function getDeletedPaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return User::with('roles', 'permissions', 'providers')
            ->onlyTrashed()
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param array $data
     *
     * @throws Exception
     * @throws Throwable
     * @return User
     */
    public function create(array $data) : User
    {
        return DB::transaction(function () use ($data) {
            $user = $this->model::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => $data['password'],
                'active' => isset($data['active']) && $data['active'] === '1',
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed' => isset($data['confirmed']) && $data['confirmed'] === '1',
            ]);

            // See if adding any additional permissions
            if (! isset($data['permissions']) || ! count($data['permissions'])) {
                $data['permissions'] = [];
            }

            if ($user) {
                // User must have at least one role
                if (! count($data['roles'])) {
                    throw new GeneralException(__('Los Usuarios deben tener al menos un Perfil.'));
                }

                // Add selected roles/permissions
                $user->syncRoles($data['roles']);
                $user->syncPermissions($data['permissions']);

                //Send confirmation email if requested and account approval is off
                if ($user->confirmed === false && isset($data['confirmation_email']) && ! config('access.users.requires_approval')) {
                    $user->notify(new UserNeedsConfirmation($user->confirmation_code));
                }

                event(new UserCreated($user));

                return $user;
            }

            throw new GeneralException(__('Hubo un problema al crear el Usuario. Inténtelo de nuevo.'));
        });
    }

    /**
     * @param User  $user
     * @param array $data
     *
     * @throws GeneralException
     * @throws Exception
     * @throws Throwable
     * @return User
     */
    public function update(User $user, array $data) : User
    {
        $this->checkUserByEmail($user, $data['email']);

        // See if adding any additional permissions
        if (! isset($data['permissions']) || ! count($data['permissions'])) {
            $data['permissions'] = [];
        }

        return DB::transaction(function () use ($user, $data) {
            if ($user->update([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'username' => $data['username'],
                'email' => $data['email'],
            ])) {
                // Add selected roles/permissions
                $user->syncRoles($data['roles']);
                $user->syncPermissions($data['permissions']);

                event(new UserUpdated($user));

                return $user;
            }

            throw new GeneralException(__('Hubo un problema al modificar el Usuario. Inténtelo de nuevo.'));
        });
    }

    /**
     * @param User $user
     * @param      $input
     *
     * @throws GeneralException
     * @return User
     */
    public function updatePassword(User $user, $input) : User
    {
        if ($user->update(['password' => $input['password']])) {
            event(new UserPasswordChanged($user));

            return $user;
        }

        throw new GeneralException(__('Hubo un problema al cambiar la contraseña. Inténtelo de nuevo.'));
    }

    /**
     * @param User $user
     * @param      $status
     *
     * @throws GeneralException
     * @return User
     */
    public function mark(User $user, $status) : User
    {
        if ($status === 0 && auth()->id() === $user->id) {
            throw new GeneralException(__('No puede desactivarse a sí mismo.'));
        }

        $user->active = $status;

        switch ($status) {
            case 0:
                event(new UserDeactivated($user));

                break;

            case 1:
                event(new UserReactivated($user));

                break;
        }

        if ($user->save()) {
            return $user;
        }

        throw new GeneralException(__('Hubo un problema al modificar el Usuario. Inténtelo de nuevo.'));
    }

    /**
     * @param User $user
     *
     * @throws GeneralException
     * @return User
     */
    public function confirm(User $user) : User
    {
        if ($user->confirmed) {
            throw new GeneralException(__('Este usuario ya está confirmado.'));
        }

        $user->confirmed = true;
        $confirmed = $user->save();

        if ($confirmed) {
            event(new UserConfirmed($user));

            // Let user know their account was approved
            if (config('access.users.requires_approval')) {
                $user->notify(new UserAccountActive);
            }

            return $user;
        }

        throw new GeneralException(__('Hubo un problema al confirmar la cuenta de Usuario.'));
    }

    /**
     * @param User $user
     *
     * @throws GeneralException
     * @return User
     */
    public function unconfirm(User $user) : User
    {
        if (! $user->confirmed) {
            throw new GeneralException(__('Este Usuario no está confirmado.'));
        }

        if ($user->id === 1) {
            // Cant un-confirm super admin
            throw new GeneralException(__('No puede anular la confirmación del super administrador.'));
        }

        if ($user->id === auth()->id()) {
            // Cant un-confirm self
            throw new GeneralException(__('No puede anular su propia confirmación.'));
        }

        if ($user->hasRole(config('access.users.admin_role'))) {
            // Cant un-confirm admin
            throw new GeneralException(__('No puede anular la confirmación del administrador.'));
        }

        if ($user->hasRole(config('access.users.super_admin_role'))) {
            // Cant un-confirm admin
            throw new GeneralException(__('No puede anular la confirmación del super administrador.'));
        }

        $user->confirmed = false;
        $unconfirmed = $user->save();

        if ($unconfirmed) {
            event(new UserUnconfirmed($user));

            return $user;
        }

        throw new GeneralException(__('Hubo un error al desconfirmar el usuario. Inténtelo de nuevo.'));
    }

    /**
     * @param User $user
     *
     * @throws GeneralException
     * @throws Exception
     * @throws Throwable
     * @return User
     */
    public function forceDelete(User $user) : User
    {
        if ($user->deleted_at === null) {
            throw new GeneralException(__('Este Usuario debe ser eliminado primero antes de que pueda ser destruido permanentemente.'));
        }

        return DB::transaction(function () use ($user) {
            // Delete associated relationships
            $user->passwordHistories()->delete();
            $user->providers()->delete();

            if ($user->forceDelete()) {
                event(new UserPermanentlyDeleted($user));

                return $user;
            }

            throw new GeneralException(__('Hubo un problema al eliminar el Usuario. Inténtelo de nuevo.'));
        });
    }

    /**
     * @param User $user
     *
     * @throws GeneralException
     * @return User
     */
    public function restore(User $user) : User
    {
        if ($user->deleted_at === null) {
            throw new GeneralException(__('Este Usuario no fue eliminado, por lo que no se puede restaurar.'));
        }

        if ($user->restore()) {
            event(new UserRestored($user));

            return $user;
        }

        throw new GeneralException(__('Hubo un problema al restaurar el Usuario. Inténtelo de nuevo.'));
    }

    /**
     * @param User $user
     * @param      $email
     *
     * @throws GeneralException
     */
    protected function checkUserByEmail(User $user, $email): void
    {
        // Figure out if email is not the same and check to see if email exists
        if ($user->email !== $email && $this->model->where('email', '=', $email)->first()) {
            throw new GeneralException(__('Ya hay un Usuario con la dirección de correo especificada.'));
        }
    }

    /**
     * @param $token
     *
     * @return bool|Model
     */
    public function findByPasswordResetToken($token)
    {
        foreach (DB::table(config('auth.passwords.users.table'))->get() as $row) {
            if (password_verify($token, $row->token)) {
                return $this->getByColumn($row->email, 'email');
            }
        }

        return false;
    }

    /**
     * @param $uuid
     *
     * @throws GeneralException
     * @return mixed
     */
    public function findByUuid($uuid)
    {
        $user = $this->model
            ->uuid($uuid)
            ->first();

        if ($user instanceof $this->model) {
            return $user;
        }

        throw new GeneralException(__('El Usuario requerido no existe.'));
    }

    /**
     * @param $code
     *
     * @throws GeneralException
     * @return mixed
     */
    public function findByConfirmationCode($code)
    {
        $user = User::where('confirmation_code', $code)
            ->first();

        if ($user instanceof $this->model) {
            return $user;
        }

        throw new GeneralException(__('El Usuario requerido no existe.'));
    }

    /**
     * @param array $data
     *
     * @throws Exception
     * @throws Throwable
     * @return Model|mixed
     */
    public function createFront(array $data)
    {
        return DB::transaction(function () use ($data) {
            $user = $this->model::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'username' => $data['username'],
                'email' => $data['email'],
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'active' => true,
                'password' => $data['password'],
                // If users require approval or needs to confirm email
                'confirmed' => ! (config('access.users.requires_approval') || config('access.users.confirm_email')),
            ]);

            if ($user) {
                // Add the default site role to the new user
                $user->assignRole(config('access.users.default_role'));
            }

            /*
             * If users have to confirm their email and this is not a social account,
             * and the account does not require admin approval
             * send the confirmation email
             *
             * If this is a social account they are confirmed through the social provider by default
             */
            if (config('access.users.confirm_email')) {
                // Pretty much only if account approval is off, confirm email is on, and this isn't a social account.
                $user->notify(new UserNeedsConfirmation($user->confirmation_code));
            }

            // Return the user object
            return $user;
        });
    }

    /**
     * @param       $id
     * @param array $input
     * @param bool|UploadedFile  $image
     *
     * @throws GeneralException
     * @return array|bool
     */
    public function updateFront($id, array $input, $image = false)
    {
        $user = $this->getById($id);
        $user->first_name = $input['first_name'];
        $user->last_name = $input['last_name'];
        $user->username = $input['username'];
        $user->avatar_type = $input['avatar_type'];

        // Upload profile image if necessary
        if ($image) {
            $user->avatar_location = $image->store('/avatars', 'public');
        } else {
            // No image being passed
            if ($input['avatar_type'] === 'storage') {
                // If there is no existing image
                if (auth()->user()->avatar_location === '') {
                    throw new GeneralException('Debe proporcionar una imagen de perfil.');
                }
            } else {
                // If there is a current image, and they are not using it anymore, get rid of it
                if (auth()->user()->avatar_location !== '') {
                    Storage::disk('public')->delete(auth()->user()->avatar_location);
                }

                $user->avatar_location = null;
            }
        }

        if ($user->canChangeEmail()) {
            //Address is not current address so they need to reconfirm
            if ($user->email !== $input['email']) {
                //Emails have to be unique
                if ($this->getByColumn($input['email'], 'email')) {
                    throw new GeneralException(__('El correo especificado ya está registrado.'));
                }

                // Force the user to re-verify his email address if config is set
                if (config('access.users.confirm_email')) {
                    $user->confirmation_code = md5(uniqid(mt_rand(), true));
                    $user->confirmed = false;
                    $user->notify(new UserNeedsConfirmation($user->confirmation_code));
                }
                $user->email = $input['email'];
                $updated = $user->save();

                // Send the new confirmation e-mail

                return [
                    'success' => $updated,
                    'email_changed' => true,
                ];
            }
        }

        return $user->save();
    }

    /**
     * @param      $input
     * @param bool $expired
     *
     * @throws GeneralException
     * @return bool
     */
    public function updatePasswordFront($input, $expired = false): bool
    {
        $user = $this->getById(auth()->id());

        if (Hash::check($input['old_password'], $user->password)) {
            if ($expired) {
                $user->password_changed_at = now()->toDateTimeString();
            }

            return $user->update(['password' => $input['password']]);
        }

        throw new GeneralException(__('La contraseña antigua no coincide.'));
    }

    /**
     * @param $code
     *
     * @throws GeneralException
     * @return bool
     */
    public function confirmFront($code): bool
    {
        $user = $this->findByConfirmationCode($code);

        if ($user->confirmed === true) {
            throw new GeneralException(__('Su cuenta ya ha sido verificada.'));
        }

        if ($user->confirmation_code === $code) {
            $user->confirmed = true;
            $user->email_verified_at = Carbon::now();

            event(new UserConfirmed($user));

            return $user->save();
        }

        throw new GeneralException(__('El código de verificación no coincide.'));
    }

    /**
     * @param $data
     * @param $provider
     *
     * @throws GeneralException
     * @return mixed
     */
    public function findOrCreateProvider($data, $provider)
    {
        // User email may not provided.
        $user_email = $data->email ?: "{$data->id}@{$provider}.com";

        // Check to see if there is a user with this email first.
        $user = $this->getByColumn($user_email, 'email');

        /*
         * If the user does not exist create them
         * The true flag indicate that it is a social account
         * Which triggers the script to use some default values in the create method
         */
        if (! $user) {
            // Registration is not enabled
            if (! config('access.registration')) {
                throw new GeneralException(__('Los registros se encuentran actualmente cerrados.'));
            }

            // Get users first name and last name from their full name
            $nameParts = $this->getNameParts($data->getName());

            $user = $this->model::create([
                'first_name' => $nameParts['first_name'],
                'last_name' => $nameParts['last_name'],
                'email' => $user_email,
                'active' => true,
                'confirmed' => true,
                'password' => null,
                'avatar_type' => $provider,
            ]);

            if ($user) {
                // Add the default site role to the new user
                $user->assignRole(config('access.users.default_role'));
            }

            event(new UserProviderRegistered($user));
        }

        // See if the user has logged in with this social account before
        if (! $user->hasProvider($provider)) {
            // Gather the provider data for saving and associate it with the user
            $user->providers()->save(new SocialAccount([
                'provider' => $provider,
                'provider_id' => $data->id,
                'token' => $data->token,
                'avatar' => $data->avatar,
            ]));
        } else {
            // Update the users information, token and avatar can be updated.
            $user->providers()->update([
                'token' => $data->token,
                'avatar' => $data->avatar,
            ]);

            $user->avatar_type = $provider;
            $user->update();
        }

        // Return the user object
        return $user;
    }

    /**
     * @param $fullName
     *
     * @return array
     */
    protected function getNameParts($fullName): array
    {
        $parts = array_values(array_filter(explode(' ', $fullName)));
        $size = count($parts);
        $result = [];

        if (empty($parts)) {
            $result['first_name'] = null;
            $result['last_name'] = null;
        }

        if (! empty($parts) && $size === 1) {
            $result['first_name'] = $parts[0];
            $result['last_name'] = null;
        }

        if (! empty($parts) && $size >= 2) {
            $result['first_name'] = $parts[0];
            $result['last_name'] = $parts[1];
        }

        return $result;
    }
}
