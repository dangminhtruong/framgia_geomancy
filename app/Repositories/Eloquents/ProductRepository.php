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
            ->orderBy('updated_at', 'desc')
            ->orderBy('created_at', 'desc')
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

    public function deleteById($id)
    {
        return $this->model()
            ->where('id', $id)
            ->delete();
    }

    public function findById($productId)
    {
        return $this->model()
            ->where('id', $productId)
            ->first();
    }

    public function updateById($productId, $data)
    {
        return $this->model()
            ->where('id', $productId)
            ->update($data);
    }

    public function getTopNewestProduct()
    {
        return $this->model()->orderBy('id', 'desc')->skip(0)->take(6)->get();
    }

    public function countSummary()
    {
        return $this->model()->count();
    }

    public function categoryProduct($cateId)
    {
        return $this->model()->select('id', 'name', 'price', 'image', 'description')
            ->where('categories_id', $cateId)->paginate(16);
    }
}
