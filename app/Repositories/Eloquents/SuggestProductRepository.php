<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\SuggestProductRepositoryInterface;
use App\Entities\SuggestProduct;

class SuggestProductRepository extends AbstractRepository implements SuggestProductRepositoryInterface
{
    protected $model;

    function __construct()
    {
        $this->model = $this->model();
    }

    public function model()
    {
        return SuggestProduct::class;
    }

    public function create($data)
    {
        $result = $this->model::create($data);
        return $result;
    }
}
