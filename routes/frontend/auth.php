<?php

use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Route;

/*
 * Frontend Access Controllers
 * All route names are prefixed with 'frontend.auth'.
 */

Route::group([
    'prefix' => 'auth',
    'as' => 'auth.',
], function () {
    Route::group(['middleware' => 'guest'], function () {
        // Socialite Routes
        Route::get('login/{provider}', [SocialController::class, 'redirect'])->name('social.login');
        Route::get('login/{provider}/callback', [SocialController::class, 'callback']);
    });

    Route::group([
        'prefix' => 'user',
        'as' => 'user.',
        'middleware' => ['auth', 'verified'],
    ], function () {
        //Change Password by Auth Route
        Route::get('change-password', function () {
            return view('auth.change-password');
        })->name('change_password');

        //Session Locked
        Route::get('session-locked', [UserController::class, 'session_locked'])
            ->name('session_locked');

        //Verify Mobile Number
        Route::get('verify-mobile', [UserController::class, 'verify_mobile'])
            ->middleware('have_mobile')
            ->name('verify_mobile');

        Route::get('send-otp', [UserController::class, 'send_otp'])
            ->middleware('have_mobile')
            ->name('send_otp');

        Route::patch('verify-otp', [UserController::class, 'verify_otp'])
            ->middleware('have_mobile')
            ->name('verify_otp');
    });
});
