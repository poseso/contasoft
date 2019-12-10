<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;

/**
 * Class AuthTableSeeder.
 */
class AuthTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Reset cached roles and permissions
        resolve(PermissionRegistrar::class)->forgetCachedPermissions();

        $this->truncateMultiple([
            config('permission.table_names.model_has_permissions'),
            config('permission.table_names.model_has_roles'),
            config('permission.table_names.role_has_permissions'),
            config('permission.table_names.permissions'),
            config('permission.table_names.roles'),
            config('permission.table_names.modules'),
            'users',
            'password_histories',
            'password_resets',
            'social_accounts',
        ]);

        $this->call([
            ModulesTableSeeder::class,
            PermissionRoleTableSeeder::class,
        ]);

        $this->enableForeignKeys();
    }
}
