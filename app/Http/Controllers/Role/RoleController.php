<?php

namespace App\Http\Controllers\Role;

use Exception;
use Illuminate\Support\Facades\Auth;
use Throwable;
use App\Models\Auth\Role;
use App\Models\Auth\Permission;
use App\Events\Role\RoleDeleted;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Repositories\Auth\RoleRepository;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\ManageRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Repositories\Auth\PermissionRepository;

/**
 * Class RoleController.
 */
class RoleController extends Controller
{
    /**
     * @var RoleRepository
     */
    protected $roleRepository;

    /**
     * @var PermissionRepository
     */
    protected $permissionRepository;

    /**
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * @param ManageRoleRequest $request
     *
     * @return mixed
     */
    public function index(ManageRoleRequest $request)
    {
        $roles = $this->roleRepository->with('users', 'permissions')->orderBy('id')->get();

        foreach ($roles as $role) {
            $perm = [];

            foreach ($role->permissions as $permission) {
                if (! isset($perm[optional($permission->module)->name])) {
                    $perm[optional($permission->module)->name] = [];
                }

                $perm[optional($permission->module)->name][] = $permission->display_name;
            }
        }

        $userRoles = [];
        foreach(Auth::user()->roles as $r){
            $userRoles[] = $r->id;
        }

        return view('role.index')
            ->withRoles($roles)
            ->withUserRoles($userRoles)
            ->withPerm($perm);
    }

    /**
     * @param ManageRoleRequest $request
     *
     * @return mixed
     */
    public function create(ManageRoleRequest $request)
    {
        $permissions = Permission::with('module')->orderBy('permissions.id', 'ASC')->get();
        $permissions = $permissions->groupBy('module.name');

        return view('role.create')
            ->withPermissions($permissions);
    }

    /**
     * @param  StoreRoleRequest  $request
     *
     * @throws GeneralException
     * @throws Throwable
     * @return mixed
     */
    public function store(StoreRoleRequest $request)
    {
        $this->roleRepository->create($request->only('name', 'description', 'permissions'));

        return redirect()->route('admin.user.role.index')->withFlashSuccess(__('Perfil creado correctamente.'));
    }

    /**
     * @param ManageRoleRequest $request
     * @param Role              $role
     *
     * @return mixed
     */
    public function edit(ManageRoleRequest $request, Role $role)
    {
        if ($role->isSuperAdmin()) {
            return redirect()->route('admin.user.role.index')->withFlashDanger(__('No puedes modificar el Perfil de Super Administrador.'));
        }

        $permissions = Permission::with('module')->orderBy('permissions.id', 'ASC')->get();
        $permissions = $permissions->groupBy('module.name');

        return view('role.edit')
            ->withRole($role)
            ->withRolePermissions($role->permissions->pluck('name')->all())
            ->withPermissions($permissions);
    }

    /**
     * @param  UpdateRoleRequest  $request
     * @param  Role  $role
     *
     * @throws GeneralException
     * @throws Throwable
     * @return mixed
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $this->roleRepository->update($role, $request->only('name', 'description', 'permissions'));

        return redirect()->route('admin.user.role.index')->withFlashSuccess(__('Perfil actualizado correctamente.'));
    }

    /**
     * @param ManageRoleRequest $request
     * @param Role              $role
     *
     * @throws Exception
     * @return mixed
     */
    public function destroy(ManageRoleRequest $request, Role $role)
    {
        if ($role->isSuperAdmin()) {
            return redirect()->route('admin.user.role.index')->withFlashDanger(__('No puede eliminar el Perfil de Super Administrador.'));
        }

        $this->roleRepository->deleteById($role->id);

        event(new RoleDeleted($role));

        return redirect()->route('admin.user.role.index')->withFlashSuccess(__('Perfil eliminado correctamente.'));
    }
}
