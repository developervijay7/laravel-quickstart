<?php
//
//use Illuminate\Support\Facades\Route;
//
//
///*
// * Frontend Access Controllers
// * All route names are prefixed with 'frontend.auth'.
// */
//
//Route::group([
//    'prefix' => 'auth',
//    'as' => 'auth.',
//], function () {
//
//    Route::group([
//        'prefix' => 'user',
//        'as' => 'user.',
//        'middleware' => ['auth', 'verified'],
//    ], function () {
//        //Change Password by Auth Route
//        Route::get('change-password', [UserController::class, 'auth_change_password'])
//            ->name('change_password');
//
//        //Session Locked
//        Route::get('session-locked', [UserController::class, 'session_locked'])
//            ->name('session_locked');
//
//        //Verify Mobile Number
//        Route::get('verify-mobile', [UserController::class, 'verify_mobile'])
//            ->middleware('have_mobile')
//            ->name('verify_mobile');
//
//        Route::get('send-otp', [UserController::class, 'send_otp'])
//            ->middleware('have_mobile')
//            ->name('send_otp');
//
//        Route::patch('verify-otp', [UserController::class, 'verify_otp'])
//            ->middleware('have_mobile')
//            ->name('verify_otp');
//    });
//
//});
