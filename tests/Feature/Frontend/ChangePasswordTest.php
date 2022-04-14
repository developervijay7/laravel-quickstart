<?php

namespace Tests\Feature\Frontend;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

/**
 * Class ChangePasswordTest.
 */
class ChangePasswordTest extends TestCase
{
    /** @test */
    public function change_password_requires_validation()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->put('/user/password');

        $response->assertSessionHasErrorsIn('updatePassword', ['current_password']);
    }

    /** @test */
    public function a_user_can_change_their_password()
    {
        $user = User::factory()->create(['password' => '1234']);

        $response = $this->actingAs($user)
            ->put('/user/password', [
                'current_password' => '1234',
                'password' => 'OC4Nzu270N!QBVi%U%qX',
                'password_confirmation' => 'OC4Nzu270N!QBVi%U%qX',
            ]);
        $response->assertSessionHasAll(['status' => 'password-updated']);
        $this->assertTrue(Hash::check('OC4Nzu270N!QBVi%U%qX', $user->fresh()->password));
    }

    /** @test */
    public function a_user_can_use_the_same_password_when_history_is_off_on_account_change_password()
    {
        config(['quickstart.access.user.password_history' => false]);

        $user = User::factory()->create(['password' => 'OC4Nzu270N!QBVi%U%qX']);

        $response = $this->actingAs($user)
            ->put('/user/password', [
                'current_password' => 'OC4Nzu270N!QBVi%U%qX',
                'password' => 'OC4Nzu270N!QBVi%U%qX_02',
                'password_confirmation' => 'OC4Nzu270N!QBVi%U%qX_02',
            ]);

        $response->assertSessionHasAll(['status' => 'password-updated']);
        $this->assertTrue(Hash::check('OC4Nzu270N!QBVi%U%qX_02', $user->fresh()->password));
    }
}
