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

    public function searchProduct($request)
    {
        return $this->model()->select('id', 'name')->where('name', 'like', '%' . $request->keyWord . '%')->get();
    }

    public function create($data)
    {
        return $this->model()->create($data);
    }
}
