<?php

namespace Tests;

use App\Http\Middleware\TwoFactorAuthentication;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('db:seed');

        $this->withoutMiddleware(RequirePassword::class);
        $this->withoutMiddleware(TwoFactorAuthentication::class);
    }

    protected function getAdminRole()
    {
        return Role::find(1);
    }

    protected function getMasterAdmin()
    {
        return User::find(1);
    }

    protected function loginAsAdmin($admin = false)
    {
        if (! $admin) {
            $admin = $this->getMasterAdmin();
        }

        $this->actingAs($admin);

        return $admin;
    }

    protected function logout()
    {
        return auth()->logout();
    }
}
