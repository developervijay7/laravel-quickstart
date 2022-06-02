<?php

namespace Tests\Feature\Frontend;

use App\Models\User;
use Tests\TestCase;

/**
 * Class ConfirmationTest.
 */
class ConfirmationTest extends TestCase
{
    /** @test */
    public function a_user_can_access_the_confirm_password_page()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $this->get('/user/confirm-password')->assertOk();
    }
}
