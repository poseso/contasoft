<?php

namespace Tests\Feature\Frontend;

use Illuminate\Foundation\Testing\TestResponse;
use Tests\TestCase;
use App\Models\Auth\Role;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use App\Events\User\UserConfirmed;
use App\Events\User\UserRegistered;
use Illuminate\Support\Facades\Notification;
use App\Repositories\Auth\UserRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Notifications\UserNeedsConfirmation;

class UserRegistrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Helper function for registering a user.
     * @param array $userData
     * @return TestResponse
     */
    protected function registerUser($userData = [])
    {
        factory(Role::class)->create(['name' => config('access.users.default_role')]);

        return $this->post('/register', array_merge([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'username' => 'jdoe',
            'email' => 'john@example.com',
            'password' => 'OC4Nzu270N!QBVi%U%qX',
            'password_confirmation' => 'OC4Nzu270N!QBVi%U%qX',
        ], $userData));
    }

    /** @test */
    public function the_register_route_exists()
    {
        $this->get('/register')->assertStatus(200);
    }

    /** @test */
    public function user_registration_can_be_disabled()
    {
        config(['access.registration' => false]);
        $this->get('/register')->assertStatus(404);
    }

    /** @test */
    public function a_user_can_register_an_account()
    {
        $this->registerUser([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'username' => 'jdoe',
            'email' => 'john@example.com',
            'password' => 'OC4Nzu270N!QBVi%U%qX',
            'password_confirmation' => 'OC4Nzu270N!QBVi%U%qX',
        ]);

        $newUser = resolve(UserRepository::class)->where('email', 'john@example.com')->first();
        $this->assertSame($newUser->first_name, 'John');
        $this->assertSame($newUser->last_name, 'Doe');
        $this->assertSame($newUser->username, 'jdoe');
        $this->assertTrue(Hash::check('OC4Nzu270N!QBVi%U%qX', $newUser->password));
    }

    /** @test */
    public function if_email_confirmation_is_active_an_notification_gets_sent()
    {
        config(['access.users.confirm_email' => true]);
        Notification::fake();

        $this->registerUser(['email' => 'john@example.com']);
        $user = resolve(UserRepository::class)->where('email', 'john@example.com')->first();

        Notification::assertSentTo($user, UserNeedsConfirmation::class);
    }

    /** @test */
    public function a_user_account_can_confirm_his_email()
    {
        $user = factory(User::class)->states('unconfirmed')->create();
        Event::fake();

        $response = $this->get('/account/confirm/'.$user->confirmation_code);

        $response->assertSessionHas(['flash_success' => __('¡Su cuenta ha sido verificada satisfactoriamente!')]);
        $this->assertSame(true, $user->fresh()->confirmed);
        Event::assertDispatched(UserConfirmed::class);
    }

    /** @test */
    public function confirmation_can_be_resent()
    {
        Notification::fake();

        $user = factory(User::class)->states('unconfirmed')->create();

        $response = $this->get('/account/confirm/resend/'.$user->uuid);

        $response->assertSessionHas(['flash_success' => __('Un nuevo correo de verificación le ha sido enviado.')]);

        Notification::assertSentTo($user, UserNeedsConfirmation::class);
    }

    /** @test */
    public function if_requires_approval_is_active_the_user_cant_login()
    {
        config(['access.users.requires_approval' => true]);

        $response = $this->registerUser();
        $response->assertSessionHas(['flash_success' => __('Su cuenta fue creada con éxito y está pendiente de aprobación. Se enviará un correo electrónico cuando su cuenta sea aprobada.')]);

        $response = $this->post('/login', ['email' => 'john@example.com', 'password' => 'OC4Nzu270N!QBVi%U%qX']);

        $response->assertSessionHas(['flash_danger' => __('Su cuenta esta actualmente pendiente de aprobación.')]);
    }

    /** @test */
    public function an_event_get_fired_on_registration()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $this->registerUser();

        Event::assertDispatched(UserRegistered::class);
    }

    /** @test */
    public function first_name_is_required()
    {
        $response = $this->post('/register', [
            'last_name' => 'Doe',
            'username' => 'jdoe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors('first_name');
    }

    /** @test */
    public function last_name_is_required()
    {
        $response = $this->post('/register', [
            'first_name' => 'John',
            'username' => 'jdoe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors('last_name');
    }

    /** @test */
    public function username_is_required()
    {
        $response = $this->post('/register', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors('username');
    }

    /** @test */
    public function email_is_required()
    {
        $response = $this->post('/register', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'username' => 'jdoe',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function username_must_be_unique()
    {
        factory(User::class)->create(['username' => 'jdoe']);

        $response = $this->post('/register', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'username' => 'jdoe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors('username');
    }

    /** @test */
    public function email_must_be_unique()
    {
        factory(User::class)->create(['email' => 'john@example.com']);

        $response = $this->post('/register', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'username' => 'jdoe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function password_must_be_confirmed()
    {
        $response = $this->post('/register', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'username' => 'jdoe',
            'email' => 'john@example.com',
            'password' => 'password',
        ]);

        $response->assertSessionHasErrors('password');
    }

    /** @test */
    public function passwords_must_be_equivalent()
    {
        $response = $this->post('/register', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'username' => 'jdoe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'not_the_same',
        ]);

        $response->assertSessionHasErrors('password');
    }

    /** @test */
    public function it_redirects_to_dashboard_after_successful_registration()
    {
        config(['access.users.confirm_email' => false]);

        $response = $this->registerUser();

        $response->assertRedirect('/dashboard');
    }
}
