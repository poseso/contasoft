<?php

namespace App\Http\Controllers\User;

use App\Exceptions\GeneralException;
use DataTables;
use App\Models\Auth\User;
use App\Models\Auth\Permission;
use App\Events\User\UserDeleted;
use App\Http\Controllers\Controller;
use App\Repositories\Auth\RoleRepository;
use App\Repositories\Auth\UserRepository;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\ManageUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Repositories\Auth\PermissionRepository;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Throwable;

/**
 * Class UserController.
 */
class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * UserController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Show the DataTables resource.
     *
     * @param ManageUserRequest $request
     *
     * @throws Exception
     * @return mixed
     */
    public function getDataTables(ManageUserRequest $request)
    {
        return Datatables::of($this->userRepository->getForDataTable($request->get('status'), $request->get('trashed')))
            ->escapeColumns(['first_name', 'last_name', 'email'])
            ->editColumn('confirmed', function ($user) {
                return view('user.includes.confirm', ['user' => $user]);
            })
            ->filterColumn('confirmed', function ($query, $keyword) {
                $param = (strtolower($keyword) === __('si')) ? 1 : 0;
                $query->where('confirmed', '=', $param);
            })
            ->editColumn('updated_at', function ($user) {
                return $user->updated_at->tz(get_timezone())->format(get_full_date());
            })
            ->filterColumn('updated_at', function ($query, $keyword) {
                if (strpos($keyword, '-') !== false) {
                    $value = collect(explode('-', $keyword))
                        ->reverse()
                        ->implode('-');
                    $query->where('updated_at', 'like', "%$value%");
                }
            })
            ->addColumn('social', function ($user) {
                return view('user.includes.social-buttons', ['user' => $user]);
            })
            ->addColumn('roles', function ($user) {
                return "<span class='badge badge-success bg-light-blue-a300'>$user->roles_label</span>";
            })
            ->addColumn('permissions', function ($user) {
                return "<span class='badge badge-success bg-yellow-900'>$user->permissions_label</span>";
            })
            ->addColumn('actions', function ($user) {
                return view('user.includes.actions', ['user' => $user]);
            })
            ->make(true);
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return Factory|View
     */
    public function index(ManageUserRequest $request)
    {
        return view('user.index')
            ->withUsers($this->userRepository->getActivePaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageUserRequest    $request
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     *
     * @return mixed
     */
    public function create(ManageUserRequest $request, RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        $permissions = Permission::with('module')->orderBy('permissions.id', 'ASC')->get();
        $permissions = $permissions->groupBy('module.name');

        return view('user.create')
            ->withRoles($roleRepository->with('permissions')->get(['id', 'name']))
            ->withPermissions($permissions);
    }

    /**
     * @param StoreUserRequest $request
     *
     * @throws Throwable
     * @return mixed
     */
    public function store(StoreUserRequest $request)
    {
        $this->userRepository->create($request->only(
            'first_name',
            'last_name',
            'username',
            'email',
            'password',
            'active',
            'confirmed',
            'confirmation_email',
            'roles',
            'permissions'
        ));

        return redirect()->route('user.index')->withFlashSuccess(__('El usuario fue creado correctamente.'));
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @return mixed
     */
    public function show(ManageUserRequest $request, User $user)
    {
        return view('user.show')
            ->withUser($user);
    }

    /**
     * @param ManageUserRequest    $request
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     * @param User                 $user
     *
     * @return mixed
     */
    public function edit(ManageUserRequest $request, RoleRepository $roleRepository, PermissionRepository $permissionRepository, User $user)
    {
        return view('user.edit')
            ->withUser($user)
            ->withRoles($roleRepository->get())
            ->withUserRoles($user->roles->pluck('name')->all())
            ->withPermissions($permissionRepository->get(['id', 'name']))
            ->withUserPermissions($user->permissions->pluck('name')->all());
    }

    /**
     * @param UpdateUserRequest $request
     * @param User              $user
     *
     * @throws GeneralException
     * @throws Throwable
     * @return mixed
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->userRepository->update($user, $request->only(
            'first_name',
            'last_name',
            'username',
            'email',
            'roles',
            'permissions'
        ));

        return redirect()->route('user.index')->withFlashSuccess(__("El Usuario $user->full_name fue actualizado correctamente."));
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @throws Exception
     * @return mixed
     */
    public function destroy(ManageUserRequest $request, User $user)
    {
        $this->userRepository->deleteById($user->id);

        event(new UserDeleted($user));

        return redirect()->route('user.deleted')->withFlashSuccess(__("El usuario $user->full_name fue eliminado correctamente."));
    }
}
