<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('home', function($view) {
            $view->with([
                'areas_count' => \App\Area::count(),
                'sellers_count' => \App\Seller::count()
            ]);
        });
    }
}
