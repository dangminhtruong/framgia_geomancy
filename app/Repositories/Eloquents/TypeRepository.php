<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\TypeRepositoryInterface;
use App\Entities\Type;

class TypeRepository extends AbstractRepository implements TypeRepositoryInterface
{
    protected $model;

    function __construct()
    {
        $this->model = $this->model();
    }

    public function model()
    {
        return Type::class;
    }

    public function create($data)
    {
        $result = $this->model::create($data);
        return $result;
    }

    public function getAllTypes()
    {
        return $this->model::select('name', 'id', 'description')->get();
    }


}
