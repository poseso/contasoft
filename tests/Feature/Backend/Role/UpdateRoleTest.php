<?php

namespace Tests\Feature\Backend\Role;

use Tests\TestCase;
use App\Models\Auth\Role;
use App\Events\Role\RoleUpdated;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateRoleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_the_edit_role_page()
    {
        $role = factory(Role::class)->create();
        $this->loginAsAdmin();

        $this->get("/role/{$role->id}/edit")->assertStatus(200);
    }

    /** @test */
    public function name_is_required()
    {
        $role = factory(Role::class)->create();
        $this->loginAsAdmin();

        $response = $this->patch("/role/{$role->id}/update", ['name' => '']);

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function description_is_required()
    {
        $role = factory(Role::class)->create();
        $this->loginAsAdmin();

        $response = $this->patch("/role/{$role->id}/update", ['description' => '']);

        $response->assertSessionHasErrors('description');
    }

    /** @test */
    public function at_least_one_permission_is_required()
    {
        $role = factory(Role::class)->create();
        $this->loginAsAdmin();

        $response = $this->patch("/role/{$role->id}/update", ['name' => 'new role']);

        $response->assertSessionHas(['flash_danger' => __('Debe seleccionar al menos un permiso para cada Perfil.')]);
    }

    /** @test */
    public function a_role_name_can_be_updated()
    {
        $role = factory(Role::class)->create();
        $this->loginAsAdmin();

        $this->patch("/role/{$role->id}/update", [
            'name' => 'new name',
            'description' => 'this is a role test',
            'permissions' => [
                'dashboard.read',
            ],
        ]);

        $this->assertSame('new name', $role->fresh()->name);
        $this->assertSame('this is a role test', $role->fresh()->description);
    }

    /** @test */
    public function an_event_gets_dispatched()
    {
        $role = factory(Role::class)->create();
        Event::fake();
        $this->loginAsAdmin();

        $this->patch("/role/{$role->id}/update", [
            'name' => 'new name',
            'description' => 'this is a role test',
            'permissions' => [
                'dashboard.read',
            ],
        ]);

        Event::assertDispatched(RoleUpdated::class);
    }
}
