<?php

namespace Tests\Feature\Backend\Role;

use Tests\TestCase;
use App\Models\Auth\Role;
use App\Events\Role\RoleCreated;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateRoleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_the_create_role_page()
    {
        $this->loginAsAdmin();

        $this->get('/role/create')->assertStatus(200);
    }

    /** @test */
    public function the_name_is_required()
    {
        $this->loginAsAdmin();

        $response = $this->post('/role', ['name' => '']);

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function the_description_is_required()
    {
        $this->loginAsAdmin();

        $response = $this->post('/role', ['description' => '']);

        $response->assertSessionHasErrors('description');
    }

    /** @test */
    public function the_name_must_be_unique()
    {
        $this->loginAsAdmin();

        $response = $this->post('/role', [
            'name' => config('access.users.admin_role'),
            'description' => 'this is a test role',
        ]);

        $response->assertSessionHas(['flash_danger' => __('El Nombre del Perfil suministrado ya existe')]);
    }

    /** @test */
    public function at_least_one_permission_is_required()
    {
        $this->loginAsAdmin();

        $response = $this->post('/role', [
            'name' => 'new role',
            'description' => 'this is a test role'
        ]);

        $response->assertSessionHas(['flash_danger' => __('Debe seleccionar al menos un permiso para cada Perfil.')]);
    }

    /** @test */
    public function a_role_can_be_created()
    {
        $this->loginAsAdmin();

        $this->post('/role', [
            'name' => 'new role',
            'description' => 'this is a test role',
            'permissions' => [
                'dashboard.read',
            ],
        ]);

        $role = Role::where([
            'name' => 'new role',
        ])->first();

        $this->assertTrue($role->hasPermissionTo('dashboard.read'));
    }

    /** @test */
    public function an_event_gets_dispatched()
    {
        $this->loginAsAdmin();
        Event::fake();

        $this->post('/role', [
            'name' => 'new role',
            'description' => 'this is a test role',
            'permissions' => [
                'dashboard.read',
            ],
        ]);

        Event::assertDispatched(RoleCreated::class);
    }
}
