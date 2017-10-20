<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Entities\Category;

class CategoryRepository extends AbstractRepository implements CategoryRepositoryInterface
{
    protected $model;

    function __construct()
    {
        $this->model = $this->model();
    }

    public function model()
    {
        return Category::class;
    }

    public function create($data)
    {
        $result = $this->model::create($data);
        return $result;
    }

    public function getAllCategory()
    {
        return $this->model::select('name', 'id')->get();
    }

    public function getPageNo($pageNo, $rowPerPage = 30)
    {
        return $this->model::orderBy('created_at', 'desc')
            ->orderBy('updated_at', 'desc')
            ->skip(($pageNo - 1) * $rowPerPage)
            ->take($rowPerPage)
            ->get();
    }

    public function count()
    {
        return $this->model::count();
    }
}
