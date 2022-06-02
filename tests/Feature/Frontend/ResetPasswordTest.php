<?php

namespace Tests\Feature\Frontend;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

/**
 * Class ResetPasswordTest.
 */
class ResetPasswordTest extends TestCase
{
    /** @test */
    public function the_password_reset_route_exists()
    {
        $this->get('/forgot-password')->assertOk();
    }

    /** @test */
    public function password_reset_requires_validation()
    {
        $response = $this->post('/forgot-password');

        $response->assertSessionHasErrors('email');
    }

//    /** @test */
//    public function a_notification_gets_sent_if_password_reset_is_requested()
//    {
//        Notification::fake();
//
//        $user = User::factory()->create(['email' => 'developervijay27@example.com']);
//
//        $this->post('/forgot-password', ['email' => 'developervijay27@example.com']);
//
//        Notification::assertSentTo($user, ResetPasswordNotification::class);
//    }

    /** @test */
    public function the_reset_password_form_has_required_fields()
    {
        $response = $this->post('/reset-password', [
            'token' => '',
            'email' => '',
            'password' => '',
            'password_confirmation' => '',
        ]);

        $response->assertSessionHasErrors(['token', 'email', 'password']);
    }

    /** @test */
    public function a_password_can_be_reset()
    {
        $user = User::factory()->create(['email' => 'developervijay27@example.com']);

        $token = $this->app->make('auth.password.broker')->createToken($user);

        $this->post('/reset-password', [
            'token' => $token,
            'email' => 'developervijay27@example.com',
            'password' => ']EqZL4}zBT',
            'password_confirmation' => ']EqZL4}zBT',
        ]);

        $this->assertTrue(Hash::check(']EqZL4}zBT', $user->fresh()->password));
    }

//    /** @test */
//    public function the_password_can_be_validated()
//    {
//        $user = User::factory()->create(['email' => 'developervijay27@example.com']);
//
//        $token = $this->app->make('auth.password.broker')->createToken($user);
//
//        $response = $this->followingRedirects()
//            ->post('/reset-password', [
//                'token' => $token,
//                'email' => 'developervijay27@example.com',
//                'password' => 'password',
//                'password_confirmation' => 'password',
//            ]);
//
//        $response->dumpSession();
//
//        $this->assertStringContainsString(__('validation.min.string', [
//            'attribute' => __('password'),
//            'min' => 8,
//        ]), $response->content());
//    }
}
