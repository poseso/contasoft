<?php

namespace Tests\Feature\Backend\User;

use Tests\TestCase;
use App\Models\Auth\User;
use App\Events\User\UserRestored;
use Illuminate\Support\Facades\Event;
use App\Events\User\UserPermanentlyDeleted;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_deleted_users_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/user/deleted');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_user_must_be_soft_deleted_before_permanently_deleted()
    {
        $this->loginAsAdmin();
        $user = factory(User::class)->create();

        $response = $this->get("/user/{$user->id}/delete");

        $response->assertSessionHas(['flash_danger' => __('Este Usuario debe ser eliminado primero antes de que pueda ser destruido permanentemente.')]);
    }

    /** @test */
    public function an_admin_can_restore_users()
    {
        $this->loginAsAdmin();
        $user = factory(User::class)->states('softDeleted')->create();
        Event::fake();

        $response = $this->get("/user/{$user->id}/restore");
        $response->assertSessionHas(['flash_success' => __("El usuario $user->name fue restaurado correctamente.")]);

        $this->assertNull($user->fresh()->deleted_at);
        Event::assertDispatched(UserRestored::class);
    }

    /** @test */
    public function a_user_can_be_permanently_deleted()
    {
        $this->loginAsAdmin();
        $user = factory(User::class)->states('softDeleted')->create();
        Event::fake();

        $response = $this->get("/user/{$user->id}/delete");

        $this->assertNull($user->fresh());
        $response->assertSessionHas(['flash_success' => __("El usuario $user->name fue eliminado de forma permanente.")]);
        Event::assertDispatched(UserPermanentlyDeleted::class);
    }

    /** @test */
    public function a_not_deleted_user_cant_be_restored()
    {
        $this->loginAsAdmin();
        $user = factory(User::class)->create();

        $response = $this->get("/user/{$user->id}/restore");

        $response->assertSessionHas(['flash_danger' => __('Este Usuario no fue eliminado, por lo que no se puede restaurar.')]);
    }

    /** @test */
    public function a_user_can_be_deleted()
    {
        $this->loginAsAdmin();
        $user = factory(User::class)->create();

        $response = $this->delete("/user/{$user->id}");

        $response->assertSessionHas(['flash_success' => __("El usuario $user->name fue eliminado correctamente.")]);

        $this->assertDatabaseMissing('users', ['id' => $user->id, 'deleted_at' => null]);
    }
}
