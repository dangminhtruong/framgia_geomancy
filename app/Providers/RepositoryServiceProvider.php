<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        'user' => [
            \App\Repositories\Contracts\UserRepositoryInterface::class,
            \App\Repositories\Eloquents\UserRepository::class,
        ],
        'product' => [
            \App\Repositories\Contracts\ProductRepositoryInterface::class,
            \App\Repositories\Eloquents\ProductRepository::class,
        ]
    ];


    public function boot()
    {
        //
    }

    public function register()
    {
        foreach ($this->repositories as $repository) {
            $this->app->singleton(
                $repository[0],
                $repository[1]
            );
        }
    }
}
