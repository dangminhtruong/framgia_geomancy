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

    public function findById($id)
    {
        $result = $this->model::find($id);
        return $result;
    }

    public function findIdWhereIn($condition)
    {
        $result = $this->model::whereIn('id', $condition)->get();
        return $result;
    }

    public function getTopicImages($topicId)
    {
        $result = $this->model::find($topicId)->images;
        return $result;
    }

    public function countSummary()
    {
        return $this->model::count();
    }

}
