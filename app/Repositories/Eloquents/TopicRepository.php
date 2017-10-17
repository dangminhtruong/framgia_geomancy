<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\TopicRepositoryInterface;
use App\Entities\Topic;

class TopicRepository extends AbstractRepository implements TopicRepositoryInterface
{
    protected $model;

    function __construct()
    {
        $this->model = $this->model();
    }

    public function model()
    {
        return Topic::class;
    }

    public function getAllTopics()
    {
        $result = $this->model::select('id', 'name', 'description')->get();
        return $result;
    }

}
