<?php

namespace Tests\Feature\Frontend;

use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

/**
 * Class VerificationTest.
 */
class VerificationTest extends TestCase
{
    /** @test */
    public function an_unverified_user_cannot_access_dashboard()
    {
        $user = User::factory()->unconfirmed()->create();

        $this->actingAs($user);

        $this->get('/user/dashboard')->assertRedirect('/email/verify');
    }

    /** @test */
    public function an_unverified_user_cannot_access_account()
    {
        $user = User::factory()->unconfirmed()->create();

        $this->actingAs($user);

        $this->get('/user/profile')->assertRedirect('/email/verify');
    }

    /** @test */
//    public function a_user_can_resend_the_verification_email()
//    {
//        Notification::fake();
//
//        $user = User::factory()->unconfirmed()->create();
//
//        $this->actingAs($user);
//
//        $this->get('/user/profile')->assertRedirect('/email/verify');
//
//        $this->post('/email/resend');
//
//        Notification::assertSentTo($user, VerifyEmail::class);
//    }
}
