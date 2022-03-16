<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])
    ->name('index')
    ->breadcrumbs(function(Trail $trail) {
        $trail->push(__('Home'), route('frontend.index'));
    });

Route::get('/contact', [HomeController::class, 'contact'])
    ->name('contact')
    ->breadcrumbs(function(Trail $trail) {
       $trail->parent('frontend.index')
        ->push(__('Contact'), route('frontend.contact'));
    });
