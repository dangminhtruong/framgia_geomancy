<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Entities\Product;

class ProductRepository extends AbstractRepository implements ProductRepositoryInterface
{
    public function model()
    {
        return new Product;
    }

    public function getByCategory($categoryId, $pageNo, $rowPerPage = 30)
    {
        return $this->model()
            ->where('categories_id', $categoryId)
            ->skip(($pageNo - 1) * $rowPerPage)
            ->take($rowPerPage)
            ->get();
    }

    public function count($categoryId)
    {
        return $this->model()
            ->where('categories_id', $categoryId)
            ->count();
    }
}
