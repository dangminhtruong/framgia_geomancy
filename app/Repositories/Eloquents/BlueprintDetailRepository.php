<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\BlueprintDetailRepositoryInterface;
use App\Entities\BlueprintDetail;

class BlueprintDetailRepository extends AbstractRepository implements BlueprintDetailRepositoryInterface
{
    protected $model;

    function __construct()
    {
        $this->model = $this->model();
    }

    public function model()
    {
        return BlueprintDetail::class;
    }

    public function create($data)
    {
        $result = $this->model::create($data);
        return $result;
    }
}
