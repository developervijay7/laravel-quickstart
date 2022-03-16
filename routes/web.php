<?php

use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;


////Redirect route to .well-known forgot password link https://web.dev/change-password-url/
//Route::get('.well-known/change-password', function() {
//    return redirect(route('frontend.auth.user.change_password'));
//});


/*
 * Global Routes
 *
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('/lang/{lang}', [LocaleController::class, 'change'])->name('locale.change');


/*
 * Frontend Routes
 */
Route::group(['as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__ . '/frontend/');
});

/*
 * Backend Routes
 *
 * These routes can only be accessed by users with type `admin`
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['admin']], function () {
    includeRouteFiles(__DIR__ . '/backend/');
});
