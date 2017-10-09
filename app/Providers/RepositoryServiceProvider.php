<?php

namespace App\Providers;

use App;
use App\Repositories\Contracts\BlueprintRepositoryInterface;
use App\Repositories\Eloquents\BlueprintRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        'user' => [
            \App\Repositories\Contracts\UserRepositoryInterface::class,
            \App\Repositories\Eloquents\UserRepository::class,
        ],
        'blueprint' => [
            \App\Repositories\Contracts\BlueprintRepositoryInterface::class,
            \App\Repositories\Eloquents\BlueprintRepository::class,
        ],
        'topic' => [
            \App\Repositories\Contracts\TopicRepositoryInterface::class,
            \App\Repositories\Eloquents\TopicRepository::class,
        ],
        'gallery' => [
            \App\Repositories\Contracts\GalleryRepositoryInterface::class,
            \App\Repositories\Eloquents\GalleryRepository::class
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
