<?php

namespace App\Providers;

use App;
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
        ],
        'blueprintDetal' => [
            \App\Repositories\Contracts\BlueprintDetailRepositoryInterface::class,
            \App\Repositories\Eloquents\BlueprintDetailRepository::class
        ],
        'category' => [
            \App\Repositories\Contracts\CategoryRepositoryInterface::class,
            \App\Repositories\Eloquents\CategoryRepository::class
        ],
        'suggestProduct' => [
            \App\Repositories\Contracts\SuggestProductRepositoryInterface::class,
            \App\Repositories\Eloquents\SuggestProductRepository::class
        ],
        'requestBlueprint' => [
            \App\Repositories\Contracts\RequestBlueprintRepositoryInterface::class,
            \App\Repositories\Eloquents\RequestBlueprintRepository::class
        ],
        'post' => [
            \App\Repositories\Contracts\PostRepositoryInterface::class,
            \App\Repositories\Eloquents\PostRepository::class
        ],
        'requestNotify' => [
            \App\Repositories\Contracts\RequestNotifyRepositoryInterface::class,
            \App\Repositories\Eloquents\RequestNotifyRepository::class
        ],
        'improveBlueprint' => [
            \App\Repositories\Contracts\ImproveBlueprintRepositoryInterface::class,
            \App\Repositories\Eloquents\ImproveBlueprintRepository::class
        ],
        'improveDetail' => [
            \App\Repositories\Contracts\ImproveDetailRepositoryInterface::class,
            \App\Repositories\Eloquents\ImproveDetailRepository::class
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
