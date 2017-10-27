<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\ImproveDetailRepositoryInterface;
use App\Entities\ImproveDetail;

class ImproveDetailRepository extends AbstractRepository implements ImproveDetailRepositoryInterface
{
    protected $model;

    function __construct()
    {
        $this->model = $this->model();
    }

    public function model()
    {
        return ImproveDetail::class;
    }

    public function create($data)
    {
        $result = $this->model::create($data);
        return $result;
    }

    public function finById($id)
    {
        return $this->model::find($id);
    }

    public function updateQuantity($product_id, $number, $improveId)
    {
        $tmp = $this->model::where([
            ['products_id', '=', $product_id],
            ['improve_blueprints_id', '=', $improveId]
        ])->first();
        $tmp->quantity = $number;
        $tmp->save();
    }

}
