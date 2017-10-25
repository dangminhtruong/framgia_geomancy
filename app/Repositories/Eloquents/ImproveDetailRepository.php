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
}