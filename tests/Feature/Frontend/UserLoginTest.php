<?php

namespace Tests\Feature\Frontend;

use Tests\TestCase;
use App\Models\Auth\User;
use App\Events\User\UserLoggedIn;
use App\Events\User\UserLoggedOut;
use Illuminate\Support\Facades\Event;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserLoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_login_route_exists()
    {
        $this->get('/login')->assertStatus(200);
    }

    /** @test */
    public function a_user_can_login_with_email_and_password()
    {
        $user = factory(User::class)->create([
            'email' => 'john@example.com',
            'password' => 'secret',
        ]);
        Event::fake();

        $this->post('/login', [
            'data' => 'john@example.com',
            'password' => 'secret',
        ]);

        Event::assertDispatched(UserLoggedIn::class);
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function a_user_can_login_with_username_and_password()
    {
        $user = factory(User::class)->create([
            'username' => 'jdoe',
            'password' => 'secret',
        ]);
        Event::fake();

        $this->post('/login', [
            'data' => 'jdoe',
            'password' => 'secret',
        ]);

        Event::assertDispatched(UserLoggedIn::class);
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function inactive_users_cant_login()
    {
        factory(User::class)->states('inactive')->create([
            'email' => 'john@example.com',
            'password' => 'secret',
        ]);

        $response = $this->post('/login', [
            'data' => 'john@example.com',
            'password' => 'secret',
        ]);

        $response->assertSessionHas('flash_danger');
        $this->assertFalse($this->isAuthenticated());
    }

    /** @test */
    public function unconfirmed_user_cant_login()
    {
        factory(User::class)->states('unconfirmed')->create([
            'email' => 'john@example.com',
            'password' => 'secret',
        ]);

        $response = $this->post('/login', [
            'data' => 'john@example.com',
            'password' => 'secret',
        ]);

        $response->assertSessionHas('flash_danger');
        $this->assertFalse($this->isAuthenticated());
    }

    /** @test */
    public function email_is_required()
    {
        $response = $this->post('/login', [
            'email' => '',
            'password' => '12345',
        ]);

        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function password_is_required()
    {
        $response = $this->post('/login', [
            'data' => 'john@example.com',
            'password' => '',
        ]);

        $response->assertSessionHasErrors('password');
    }

    /** @test */
    public function cant_login_with_invalid_credentials()
    {
        $this->withoutExceptionHandling();

        $this->expectException(ValidationException::class);

        $this->post('/login', [
            'data' => 'not-existend@user.com',
            'password' => '9s8gy8s9diguh4iev',
        ]);
    }

    /** @test */
    public function a_user_can_log_out()
    {
        $user = factory(User::class)->create();
        Event::fake();

        $response = $this->actingAs($user)
            ->get('/logout')
            ->assertRedirect('/login');

        $this->assertFalse($this->isAuthenticated());
        $response->assertSessionHas('flash_success');
        Event::assertDispatched(UserLoggedOut::class);
    }
}
