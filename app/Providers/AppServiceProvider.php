<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Entities\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.header', function ($views) {
            $categories = Category::select('id', 'name')->get();
            $views->with('productTypes', $categories);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
