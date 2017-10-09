<?php
namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\BlueprintRepositoryInterface;
use App\Entities\Blueprint;

class BlueprintRepository extends AbstractRepository implements BlueprintRepositoryInterface
{
	protected $model;
	function __construct()
	{
		$this->model = $this->model();
	} 

    public function model()
    {
        return Blueprint::class;
    }

    public function getAllTopics(){
    	$result = $this->model::all();
    	return $result;
    }
}