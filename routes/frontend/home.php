<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Tabuna\Breadcrumbs\Trail;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])
    ->name('index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('frontend.index'));
    });

Route::group([
    'prefix' => 'legal',
    'as' => 'legal.',
], function () {
    Route::get('/policy', function () {
        return view('frontend.legal.policy')->with('policy', Str::markdown(file_get_contents(resource_path('markdown/policy.md'))));
    })->name('policy')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('labels.privacy-policy'), route('frontend.legal.policy'));
    });

    Route::get('/terms', function () {
        return view('frontend.legal.terms')->with('terms', Str::markdown(file_get_contents(resource_path('markdown/terms.md'))));
    })->name('terms')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('labels.terms-of-service'), route('frontend.legal.terms'));
        });
});

Route::get('/contact', [HomeController::class, 'contact'])
    ->name('contact')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
        ->push(__('Contact'), route('frontend.contact'));
    });
