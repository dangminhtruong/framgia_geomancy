<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\PostRepositoryInterface;
use App\Entities\Post;

class PostRepository extends AbstractRepository implements PostRepositoryInterface
{
    protected $model;

    function __construct()
    {
        $this->model = $this->model();
    }

    public function model()
    {
        return Post::class;
    }

    public function getNewestPost()
    {
        return $this->model::orderBy('id', 'desc')->skip(0)->take(4)->get();
    }

}
