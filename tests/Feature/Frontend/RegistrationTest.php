<?php

namespace Tests\Feature\Frontend;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

/**
 * Class RegistrationTest.
 */
class RegistrationTest extends TestCase
{
    /** @test */
    public function the_register_route_exists()
    {
        $this->get('/register')->assertOk();
    }

    /** @test */
    public function registration_requires_validation()
    {
        $response = $this->post('/register');

        $response->assertSessionHasErrorsIn('default', ['first_name', 'email', 'password', 'terms']);
    }

    /** @test */
    public function email_must_be_unique()
    {
        User::factory()->create(['email' => 'developervijay27@example.com']);

        $response = $this->post('/register', [
            'first_name' => 'Vijay',
            'last_name' => 'Goswami',
            'email' => 'developervijay27@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function password_must_be_confirmed()
    {
        $response = $this->post('/register', [
            'first_name' => 'Vijay',
            'last_name' => 'Goswami',
            'email' => 'vijaygoswam27@example.com',
            'password' => 'password',
        ]);

        $response->assertSessionHasErrors('password');
    }

    /** @test */
    public function passwords_must_be_equivalent()
    {
        $response = $this->post('/register', [
            'first_name' => 'Vijay',
            'last_name' => 'Goswami',
            'email' => 'developervijay27@example.com',
            'password' => 'password',
            'password_confirmation' => 'not_the_same',
        ]);

        $response->assertSessionHasErrors('password');
    }

    /** @test */
//    public function user_registration_can_be_disabled()
//    {
//        config(['quickstart.access.user.registration' => false]);
//        $this->get('/register')->assertStatus(404);
//    }

    /** @test */
    public function a_user_can_register_an_account()
    {
        $this->post('/register', [
            'first_name' => 'Vijay',
            'last_name' => 'Goswami',
            'email' => 'developervijay27@example.com',
            'mobile' => '9045533427',
            'password' => 'OC4Nzu270N!QBVi%U%qX',
            'password_confirmation' => 'OC4Nzu270N!QBVi%U%qX',
            'terms' => '1',
        ])->assertRedirect(route(homeRoute()));

        $user = resolve(UserService::class)
            ->where('email', 'developervijay27@example.com')
            ->firstOrFail();

        $this->assertSame($user->first_name, 'Vijay');
        $this->assertTrue(Hash::check('OC4Nzu270N!QBVi%U%qX', $user->password));
    }

    /** @test */
    public function a_user_cant_register_an_account_if_they_dont_accept_the_terms()
    {
        $response = $this->post('/register', [
            'first_name' => 'Vijay',
            'last_name' => 'Goswami',
            'email' => 'developervijay27@example.com',
            'password' => 'OC4Nzu270N!QBVi%U%qX',
            'password_confirmation' => 'OC4Nzu270N!QBVi%U%qX',
        ]);

        $response->assertSessionHasErrors(['terms']);
    }
}
