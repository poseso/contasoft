<?php

namespace Tests\Feature\Backend\Role;

use Tests\TestCase;
use App\Models\Auth\Role;
use App\Events\Role\RoleDeleted;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteRoleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_role_can_be_deleted()
    {
        $role = factory(Role::class)->create();
        $this->loginAsAdmin();

        $this->assertDatabaseHas(config('permission.table_names.roles'), ['id' => $role->id]);

        $this->delete("/role/{$role->id}/destroy");

        $this->assertDatabaseMissing(config('permission.table_names.roles'), ['id' => $role->id]);
    }

    /** @test */
    public function a_role_with_assigned_users_cant_be_deleted()
    {
        $this->loginAsAdmin();

        $role = Role::whereName(config('access.users.super_admin_role'))->first();

        $response = $this->delete("/role/{$role->id}/destroy");

        $response->assertSessionHas(['flash_danger' => __('No puede eliminar el Perfil de Super Administrador.')]);
    }

    /** @test */
    public function an_event_gets_dispatched()
    {
        $role = factory(Role::class)->create();
        Event::fake();
        $this->loginAsAdmin();

        $this->delete("/role/{$role->id}/destroy");

        Event::assertDispatched(RoleDeleted::class);
    }
}
