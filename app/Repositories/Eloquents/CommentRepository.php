<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\CommentRepositoryInterface;
use App\Entities\Comment;

class CommentRepository extends AbstractRepository implements CommentRepositoryInterface
{
    protected $model;

    function __construct()
    {
        $this->model = $this->model();
    }

    public function model()
    {
        return Comment::class;
    }

    public function create($data)
    {
        return $this->model::create($data);
    }

}
