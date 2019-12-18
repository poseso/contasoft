<?php

namespace Tests;

use App\Models\Auth\Role;
use App\Models\Auth\User;
use App\Models\Auth\Permission;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

/**
 * Class TestCase.
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Create the admin role or return it if it already exists.
     *
     * @return mixed
     */
    protected function getAdminRole()
    {
        if ($role = Role::whereName(config('access.users.super_admin_role'))->first()) {
            return $role;
        }

        $adminRole = factory(Role::class)->create([
            'name' => config('access.users.super_admin_role'),
            'description' => 'this is a role test',
        ]);

        $adminRole->givePermissionTo(factory(Permission::class)->create([
            'module_id' => '3',
            'name' => 'dashboard.read',
            'display_name' => 'Ver Tablero Principal',
        ]));

        return $adminRole;
    }

    /**
     * Create an administrator.
     *
     * @param array $attributes
     *
     * @return mixed
     */
    protected function createAdmin(array $attributes = [])
    {
        $adminRole = $this->getAdminRole();
        $admin = factory(User::class)->create($attributes);
        $admin->assignRole($adminRole);

        return $admin;
    }

    /**
     * Login the given administrator or create the first if none supplied.
     *
     * @param bool $admin
     *
     * @return bool|mixed
     */
    protected function loginAsAdmin($admin = false)
    {
        if (! $admin) {
            $admin = $this->createAdmin();
        }

        $this->actingAs($admin);

        return $admin;
    }
}
