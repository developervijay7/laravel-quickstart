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
//    /** @test */
//    public function the_password_reset_route_exists()
//    {
//        $this->get('password/reset')->assertOk();
//    }
//
//    /** @test */
//    public function password_reset_requires_validation()
//    {
//        $response = $this->post('/password/email');
//
//        $response->assertSessionHasErrors('email');
//    }
//
//    /** @test */
//    public function a_notification_gets_sent_if_password_reset_is_requested()
//    {
//        Notification::fake();
//
//        $user = User::factory()->create(['email' => 'john@example.com']);
//
//        $this->post('password/email', ['email' => 'john@example.com']);
//
//        Notification::assertSentTo($user, ResetPasswordNotification::class);
//    }
//
//    /** @test */
//    public function the_reset_password_form_has_required_fields()
//    {
//        $response = $this->post('password/reset', [
//            'token' => '',
//            'email' => '',
//            'password' => '',
//            'password_confirmation' => '',
//        ]);
//
//        $response->assertSessionHasErrors(['token', 'email', 'password']);
//    }
//
//    /** @test */
//    public function a_password_can_be_reset()
//    {
//        $user = User::factory()->create(['email' => 'john@example.com']);
//
//        $token = $this->app->make('auth.password.broker')->createToken($user);
//
//        $this->post('password/reset', [
//            'token' => $token,
//            'email' => 'john@example.com',
//            'password' => ']EqZL4}zBT',
//            'password_confirmation' => ']EqZL4}zBT',
//        ]);
//
//        $this->assertTrue(Hash::check(']EqZL4}zBT', $user->fresh()->password));
//    }
//
//    /** @test */
//    public function the_password_can_be_validated()
//    {
//        $user = User::factory()->create(['email' => 'john@example.com']);
//
//        $token = $this->app->make('auth.password.broker')->createToken($user);
//
//        $response = $this->followingRedirects()
//            ->post('password/reset', [
//                'token' => $token,
//                'email' => 'john@example.com',
//                'password' => 'secret',
//                'password_confirmation' => 'secret',
//            ]);
//
//        $this->assertStringContainsString(__('validation.min.string', [
//            'attribute' => __('password'),
//            'min' => 8,
//        ]), $response->content());
//    }
//
}
