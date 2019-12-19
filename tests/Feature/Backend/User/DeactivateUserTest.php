<?php

namespace Tests\Backend\User;

use Tests\TestCase;
use App\Models\Auth\User;
use App\Events\User\UserDeactivated;
use App\Events\User\UserReactivated;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeactivateUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_deactivated_users_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/user/deactivated');

        $response->assertStatus(200);
    }

    /** @test */
    public function an_admin_can_deactivate_users()
    {
        $user = factory(User::class)->create();
        $this->loginAsAdmin();
        Event::fake();

        $this->get("/user/{$user->id}/mark/0");

        $this->assertFalse($user->fresh()->active);
        Event::assertDispatched(UserDeactivated::class);
    }

    /** @test */
    public function an_admin_can_reactivate_users()
    {
        $user = factory(User::class)->states('inactive')->create();
        $this->loginAsAdmin();
        Event::fake();

        $this->get("/user/{$user->id}/mark/1");

        $this->assertTrue($user->fresh()->active);
        Event::assertDispatched(UserReactivated::class);
    }

    /** @test */
    public function an_admin_cant_deactivate_himself()
    {
        $admin = $this->loginAsAdmin();

        $response = $this->from('admin/auth/user')
            ->get("/user/{$admin->id}/mark/0");

        $response->assertSessionHas(['flash_danger' => __('No puede desactivarse a sí mismo.')]);
    }
}
