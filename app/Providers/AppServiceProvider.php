<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        \Gate::define('super_admin', function ($user) {
            if ($user->user_role()->slug == 'super_admin') {
                return true;
            }
            return false;
        });
    }
}
