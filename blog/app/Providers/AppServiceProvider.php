<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        // Register the view that is displayed, and the
        //  function that should be performed when the view is invoked
        view()->composer('sidebar.archives', function ($view) {
            // Add to the view, variable archives, from App/Post::archives
            $view->with('archives', \App\Post::archives());
        });

    }
}
