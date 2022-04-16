<?php

use App\Http\Controllers\Frontend\UserController;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'user.'.
Route::group([
    'prefix' => 'user',
    'as' => 'user.',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])
        ->name('dashboard')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('User Dashboard'), route('frontend.user.dashboard'));
        });
    Route::get('/profile', [UserController::class, 'profile'])
        ->name('profile')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('User Profile'), route('frontend.user.profile'));
        });
//    Route::patch('/profile/update', [UserController::class, 'update'])
//        ->name('profile.update');
//
//    Route::get('/change-password', [UserController::class, 'change_password'])
//        ->name('change_password');
//
//    Route::get('/profile/2fa', [UserController::class, 'two_factor_show'])
//        ->name('two_factor.index')
//        ->breadcrumbs(function (Trail $trail) {
//            $trail->parent('frontend.user.profile')
//                ->push(__('Two Factor Authentication'), route('frontend.user.two_factor.index'));
//        });
});
