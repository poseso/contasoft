<?php

namespace Tests\Feature\Frontend;

use Tests\TestCase;
use App\Models\Auth\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Notifications\UserNeedsConfirmation;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateUserAccountTest extends TestCase
{
    use RefreshDatabase;

    /**
     * helper method for valid user data with option to override.
     * @param array $userData
     * @return array
     */
    protected function getValidUserData($userData = [])
    {
        return array_merge([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'username' => 'jdoe',
            'email' => 'john@example.com',
            'timezone' => 'UTC',
            'avatar_type' => 'gravatar',
        ], $userData);
    }

    /** @test */
    public function only_authenticated_users_can_access_their_account()
    {
        $this->get('/account')->assertRedirect('/login');
    }

    /** @test */
    public function a_user_can_update_his_profile()
    {
        $adminRole = $this->getAdminRole();
        $user = factory(User::class)->create();
        $user->assignRole($adminRole);

        config(['access.users.change_email' => true]);

        $this->actingAs($user)
            ->patch('/profile/update', $this->getValidUserData([
                'first_name' => 'John',
                'last_name' => 'Doe',
                'username' => 'jdoe',
                'email' => 'john@example.com',
                'avatar_type' => 'gravatar',
            ]));
        $user = $user->fresh();

        $this->assertSame($user->first_name, 'John');
        $this->assertSame($user->last_name, 'Doe');
        $this->assertSame($user->username, 'jdoe');
        $this->assertSame($user->email, 'john@example.com');
        $this->assertSame($user->avatar_type, 'gravatar');
    }

    /** @test */
    public function the_username_is_required()
    {
        $adminRole = $this->getAdminRole();
        $user = factory(User::class)->create();
        $user->assignRole($adminRole);

        $response = $this->actingAs($user)
            ->patch('/profile/update', $this->getValidUserData(['username' => '']));

        $response->assertSessionHasErrors(['username']);
    }

    /** @test */
    public function the_email_is_required()
    {
        $adminRole = $this->getAdminRole();
        $user = factory(User::class)->create();
        $user->assignRole($adminRole);

        $response = $this->actingAs($user)
            ->patch('/profile/update', $this->getValidUserData(['email' => '']));

        $response->assertSessionHasErrors(['email']);
    }

    /** @test */
    public function the_first_name_is_required()
    {
        $adminRole = $this->getAdminRole();
        $user = factory(User::class)->create();
        $user->assignRole($adminRole);

        $response = $this->actingAs($user)
            ->patch('/profile/update', $this->getValidUserData(['first_name' => '']));

        $response->assertSessionHasErrors(['first_name']);
    }

    /** @test */
    public function the_last_name_is_required()
    {
        $adminRole = $this->getAdminRole();
        $user = factory(User::class)->create();
        $user->assignRole($adminRole);

        $response = $this->actingAs($user)
            ->patch('/profile/update', $this->getValidUserData(['last_name' => '']));

        $response->assertSessionHasErrors(['last_name']);
    }

    /** @test */
    public function the_avatar_type_is_required()
    {
        $adminRole = $this->getAdminRole();
        $user = factory(User::class)->create();
        $user->assignRole($adminRole);

        $response = $this->actingAs($user)
            ->patch('/profile/update', $this->getValidUserData(['avatar_type' => '']));

        $response->assertSessionHasErrors(['avatar_type']);
    }

    /** @test */
    public function a_user_can_upload_his_own_avatar()
    {
        $adminRole = $this->getAdminRole();
        $user = factory(User::class)->create();
        $user->assignRole($adminRole);

        Storage::fake('public');

        $this->actingAs($user)
            ->patch('/profile/update', $this->getValidUserData([
                'avatar_type' => 'storage',
                'avatar_location' => UploadedFile::fake()->image('avatar.png'),
            ]));

        Storage::disk('public')->assertExists((string) ($user->fresh()->avatar_location));
    }

    /** @test */
    public function the_email_needs_to_be_confirmed_if_confirm_email_is_true()
    {
        $adminRole = $this->getAdminRole();
        $user = factory(User::class)->create();
        $user->assignRole($adminRole);

        config(['access.users.confirm_email' => true]);
        config(['access.users.change_email' => true]);
        Notification::fake();

        $this->assertTrue($user->confirmed);

        $this->actingAs($user)
            ->patch('/profile/update', $this->getValidUserData());

        $this->assertFalse($user->fresh()->confirmed);
        Notification::assertSentTo($user, UserNeedsConfirmation::class);
    }

    /** @test */
    public function the_email_needs_not_to_be_confirmed_if_confirm_email_is_false()
    {
        $user = factory(User::class)->create();
        config(['access.users.confirm_email' => false]);

        $this->assertTrue($user->confirmed);

        $this->actingAs($user)
            ->patch('/profile/update', $this->getValidUserData());

        $this->assertTrue($user->fresh()->confirmed);
    }
}
