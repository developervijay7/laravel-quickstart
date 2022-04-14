<?php

namespace Tests\Feature\Frontend;

use App\Models\User;
use Tests\TestCase;

/**
 * Class DashboardTest.
 */
class DashboardTest extends TestCase
{
    /** @test */
    public function only_authenticated_users_can_access_their_account()
    {
        $this->get('/user/dashboard')->assertRedirect('/login');

        $this->actingAs(User::factory()->user()->create());

        $this->get('/user/dashboard')->assertOk();
    }
}
