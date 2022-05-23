<?php

    namespace App\Providers;

    use App\Models\Category;
    use App\Observers\CategoryObserver;
    use Illuminate\Support\Facades\Gate;
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
        public function boot(): void
        {
            Category::observe(CategoryObserver::class);

            Gate::define('super_admin', function ($user) {
                if ($user->user_role()->slug == 'super_admin') {
                    return true;
                }

                return false;
            });
        }
    }
