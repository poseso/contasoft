<?php

namespace Tests\Feature\Backend\User;

use Tests\TestCase;
use App\Models\Auth\User;
use App\Events\User\UserUpdated;
use Illuminate\Support\Facades\Event;
use App\Notifications\UserNeedsConfirmation;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_the_edit_user_page()
    {
        $this->loginAsAdmin();
        $user = factory(User::class)->create();

        $response = $this->get('/user/'.$user->id.'/edit');

        $response->assertStatus(200);
    }

    /** @test  */
    public function an_admin_can_resend_users_confirmation_email()
    {
        $this->loginAsAdmin();
        $user = factory(User::class)->states('unconfirmed')->create();
        Notification::fake();

        $this->get("/user/{$user->id}/account/confirm/resend");

        Notification::assertSentTo($user, UserNeedsConfirmation::class);
    }

    /** @test */
    public function a_user_can_be_updated()
    {
        $this->loginAsAdmin();
        $user = factory(User::class)->create();
        Event::fake();

        $this->assertNotSame('John', $user->first_name);
        $this->assertNotSame('Doe', $user->last_name);
        $this->assertNotSame('jdoe', $user->username);
        $this->assertNotSame('john@example.com', $user->email);

        $this->patch("/user/{$user->id}", [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'username' => 'jdoe',
            'email' => 'john@example.com',
            'timezone' => 'UTC',
            'roles' => ['Super Administrador'],
        ]);

        $this->assertSame('John', $user->fresh()->first_name);
        $this->assertSame('Doe', $user->fresh()->last_name);
        $this->assertSame('jdoe', $user->fresh()->username);
        $this->assertSame('john@example.com', $user->fresh()->email);

        Event::assertDispatched(UserUpdated::class);
    }
}
