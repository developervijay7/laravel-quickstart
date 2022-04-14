<?php

namespace Tests\Feature\Frontend;

use App\Models\User;
use Tests\TestCase;

/**
 * Class UserAccountTest.
 */
class UserAccountTest extends TestCase
{
    /** @test */
    public function only_authenticated_users_can_access_their_account()
    {
        $this->get('/user/profile')->assertRedirect('/login');

        $this->actingAs(User::factory()->create());

        $this->get('/user/profile')->assertOk();
    }
//
//    /** @test */
//    public function profile_update_requires_validation()
//    {
//        $this->actingAs(User::factory()->create());
//
//        config(['quickstart.access.user.change_email' => true]);
//
//        $response = $this->patch('/profile/update');
//
//        $response->assertSessionHasErrors(['name', 'email']);
//
//        config(['quickstart.access.user.change_email' => false]);
//
//        $response = $this->patch('/profile/update');
//
//        $response->assertSessionHasErrors('name');
//    }
//
//    /** @test */
//    public function a_user_can_update_their_profile()
//    {
//        config(['quickstart.access.user.change_email' => false]);
//
//        $user = User::factory()->create([
//            'name' => 'Jane Doe',
//        ]);
//
//        $this->assertDatabaseHas('users', [
//            'id' => $user->id,
//            'name' => 'Jane Doe',
//        ]);
//
//        $response = $this->actingAs($user)
//            ->patch('/profile/update', [
//                'name' => 'John Doe',
//            ])->assertRedirect('/account?#information');
//
//        $response->assertSessionHas('flash_success', __('Profile successfully updated.'));
//
//        $this->assertDatabaseHas('users', [
//            'id' => $user->id,
//            'name' => 'John Doe',
//        ]);
//    }
//
//    /** @test */
//    public function a_user_can_update_their_email_address()
//    {
//        config(['quickstart.access.user.change_email' => true]);
//
//        $user = User::factory()->create([
//            'email' => 'jane@doe.com',
//        ]);
//
//        $this->assertDatabaseHas('users', [
//            'id' => $user->id,
//            'email' => 'jane@doe.com',
//        ]);
//
//        $response = $this->actingAs($user)
//            ->patch('/profile/update', [
//                'name' => 'John Doe',
//                'email' => 'john@doe.com',
//            ])->assertRedirect('/email/verify');
//
//        $response->assertSessionHas('resent');
//        $response->assertSessionHas('flash_info', __('You must confirm your new e-mail address before you can go any further.'));
//
//        $this->assertDatabaseHas('users', [
//            'id' => $user->id,
//            'name' => 'John Doe',
//            'email' => 'john@doe.com',
//            'email_verified_at' => null,
//        ]);
//
//        // Double check
//        $this->get('/account')->assertRedirect('/email/verify');
//    }
}
