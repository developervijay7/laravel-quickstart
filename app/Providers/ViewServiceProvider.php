<?php

namespace App\Providers;

use App\View\Composers\CollegeComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        View::composer('*', CollegeComposer::class);

//        // Using closure based composers...
//        View::composer('dashboard', function ($view) {
//            //
//        });
    }
}
