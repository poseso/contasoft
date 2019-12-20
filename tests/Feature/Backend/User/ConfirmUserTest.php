<?php

namespace Tests\Backend\User;

use Tests\TestCase;
use App\Models\Auth\User;
use App\Events\User\UserConfirmed;
use App\Events\User\UserUnconfirmed;
use Illuminate\Support\Facades\Event;
use App\Notifications\UserAccountActive;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConfirmUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_confirm_a_user()
    {
        $this->loginAsAdmin();
        $user = factory(User::class)->states('unconfirmed')->create();

        Event::fake();

        $response = $this->get("/user/{$user->id}/confirm");

        $this->assertSame(true, $user->fresh()->confirmed);
        Event::assertDispatched(UserConfirmed::class);

        $response->assertSessionHas(['flash_success' => __('El usuario fue confirmado exitosamente.')]);
    }

    /** @test */
    public function an_admin_cannot_confirm_a_confirmed_user()
    {
        $this->loginAsAdmin();
        $user = factory(User::class)->states('confirmed')->create();

        $response = $this->get("/user/{$user->id}/confirm");
        $response->assertSessionHas(['flash_danger' => __('Este usuario ya está confirmado.')]);
    }

    /** @test */
    public function a_newly_confirmed_user_gets_notified_when_approved()
    {
        config(['access.users.requires_approval' => true]);

        $this->loginAsAdmin();
        $user = factory(User::class)->states('unconfirmed')->create();

        Notification::fake();

        $this->get("/user/{$user->id}/confirm");

        Notification::assertSentTo($user, UserAccountActive::class);
    }

    /** @test */
    public function an_admin_can_unconfirm_a_user()
    {
        $this->loginAsAdmin();
        $user = factory(User::class)->states('confirmed')->create();

        Event::fake();

        $response = $this->get("/user/{$user->id}/unconfirm");

        $this->assertSame(false, $user->fresh()->confirmed);
        Event::assertDispatched(UserUnconfirmed::class);

        $response->assertSessionHas(['flash_success' => __('El usuario fue desconfirmado correctamente.')]);
    }

    /** @test */
    public function an_admin_cannot_unconfirm_an_unconfirmed_user()
    {
        $this->loginAsAdmin();
        $user = factory(User::class)->states('unconfirmed')->create();

        $response = $this->get("/user/{$user->id}/unconfirm");
        $response->assertSessionHas(['flash_danger' => __('Este Usuario no está confirmado.')]);
    }

    /** @test */
    public function an_admin_cannot_be_unconfirmed()
    {
        $admin = $this->loginAsAdmin();
        $second_admin = $this->createAdmin();
        $this->actingAs($second_admin);

        $response = $this->get("/user/{$admin->id}/unconfirm");
        $response->assertSessionHas(['flash_danger' => __('No puede anular la confirmación del super administrador.')]);
    }

    /** @test */
    public function a_user_cannot_unconfirm_self()
    {
        $this->loginAsAdmin();

        $second_admin = $this->createAdmin();
        $this->actingAs($second_admin);

        $response = $this->get("/user/{$second_admin->id}/unconfirm");
        $response->assertSessionHas(['flash_danger' => __('No puede anular su propia confirmación.')]);
    }

    /** @test */
    public function an_admin_can_confirm_a_deleted_user()
    {
        $this->loginAsAdmin();
        $user = factory(User::class)->states(['unconfirmed', 'softDeleted'])->create();

        $this->get("/user/{$user->id}/confirm");

        $this->assertTrue($user->fresh()->confirmed);
    }

    /** @test */
    public function an_admin_can_unconfirm_a_deleted_user()
    {
        $this->loginAsAdmin();
        $user = factory(User::class)->states(['confirmed', 'softDeleted'])->create();

        $this->get("/user/{$user->id}/unconfirm");

        $this->assertFalse($user->fresh()->confirmed);
    }
}
