<?php

namespace Tests\Feature\Backend;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class DashboardTest.
 */
class DashboardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function unauthenticated_users_cant_access_admin_dashboard()
    {
        $this->get('/admin/dashboard')->assertRedirect('/login');
    }

    /** @test */
    public function not_authorized_users_cant_access_admin_dashboard()
    {
        $this->actingAs(User::factory()->user()->create());

        $response = $this->get('/admin/dashboard');

        $response->assertRedirect('/');

        $response->assertSessionHas('flash_danger', __('Sorry! You dont have access to perform this operation. Only an administrator can perform this operation.'));
    }

    /** @test */
    public function admin_can_access_admin_dashboard()
    {
        $this->loginAsAdmin();

        $this->get('/admin/dashboard')->assertOk();
    }
}
