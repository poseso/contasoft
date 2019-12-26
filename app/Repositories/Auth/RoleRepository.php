<?php

namespace App\Repositories\Auth;

use Throwable;
use App\Models\Auth\Role;
use App\Events\Role\RoleCreated;
use App\Events\Role\RoleUpdated;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;

/**
 * Class RoleRepository.
 */
class RoleRepository extends BaseRepository
{
    /**
     * RoleRepository constructor.
     *
     * @param  Role  $model
     */
    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $data
     *
     * @throws GeneralException
     * @throws Throwable
     * @return Role
     */
    public function create(array $data) : Role
    {
        // Make sure it doesn't already exist
//        if ($this->roleExists($data['name'])) {
//            throw new GeneralException('Ya existe un perfil con el nombre '.e($data['name']));
//        }

        if (! isset($data['permissions']) || ! \count($data['permissions'])) {
            $data['permissions'] = [];
        }

        //See if the role must contain a permission as per config
        if (config('access.roles.role_must_contain_permission') && \count($data['permissions']) === 0) {
            throw new GeneralException(__('Debe seleccionar al menos un permiso para cada Perfil.'));
        }

        return DB::transaction(function () use ($data) {
            $role = $this->model::create([
                'name' => strtolower($data['name']),
                'description' => strtolower($data['description']),
            ]);

            if ($role) {
                $role->givePermissionTo($data['permissions']);

                event(new RoleCreated($role));

                return $role;
            }

            throw new GeneralException(__('Hubo un problema al crear el Perfil. Inténtelo de nuevo.'));
        });
    }

    /**
     * @param Role  $role
     * @param array $data
     *
     * @throws GeneralException
     * @throws Throwable
     * @return mixed
     */
    public function update(Role $role, array $data)
    {
        if ($role->isSuperAdmin()) {
            throw new GeneralException(__('No puedes modificar el perfil de super administrador.'));
        }

        // If the name is changing make sure it doesn't already exist
        if ($role->name !== strtolower($data['name'])) {
            if ($this->roleExists($data['name'])) {
                throw new GeneralException('Ya existe un perfil con el nombre '.$data['name']);
            }
        }

        if (! isset($data['permissions']) || ! \count($data['permissions'])) {
            $data['permissions'] = [];
        }

        //See if the role must contain a permission as per config
        if (config('access.roles.role_must_contain_permission') && \count($data['permissions']) === 0) {
            throw new GeneralException(__('Debe seleccionar al menos un permiso para cada Perfil.'));
        }

        return DB::transaction(function () use ($role, $data) {
            if ($role->update([
                'name' => strtolower($data['name']),
                'description' => strtolower($data['description']),
            ])) {
                $role->syncPermissions($data['permissions']);

                event(new RoleUpdated($role));

                return $role;
            }

            throw new GeneralException(__('Hubo un problema al modificar el Perfil. Inténtelo de nuevo.'));
        });
    }

    /**
     * @param $name
     *
     * @return bool
     */
    protected function roleExists($name) : bool
    {
        return $this->model
            ->where('name', strtolower($name))
            ->count() > 0;
    }
}
