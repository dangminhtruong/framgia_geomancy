<?php
namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\BlueprintRepositoryInterface;
use App\Entities\Topic;

class TopicRepository extends AbstractRepository implements BlueprintRepositoryInterface
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

    public function getAllTopics(){
    	$result = $this->model::all();
    	return $result;
    }
}