<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\User\UserController;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'.

Route::redirect('/', 'admin/dashboard', 301)->name('admin');
// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301)
    ->name('admin')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('Administration'), route('admin.admin'));
    });
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('admin.admin')
            ->push(__('Dashboard'), route('admin.dashboard'));
    });

Route::get('/profile', [DashboardController::class, 'profile_show'])
    ->name('profile.show')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('admin.dashboard')
            ->push(__('Update Profile'), route('admin.profile.show'));
    });
Route::patch('/profile', [DashboardController::class, 'profile_update'])
    ->name('profile.update');

Route::get('/password/change', [DashboardController::class, 'password_show'])
    ->name('password.show')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('admin.dashboard')
            ->push(__('Update Password'), route('admin.password.show'));
    });
Route::patch('/password/change', [DashboardController::class, 'password_update'])
    ->name('password.update');
