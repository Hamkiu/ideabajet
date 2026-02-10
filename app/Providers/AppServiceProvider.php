<?php

namespace App\Providers;

use App\Models\Models;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if(Schema::hasTable('models')) {
            $componentsKey = Models::all()->groupBy('components')->keys();
            $components = Models::all()->groupBy('components');

            View::share('componentsKey', $componentsKey);
            View::share('components', $components);
        }

        Schema::defaultStringLength(191);
    }
}
