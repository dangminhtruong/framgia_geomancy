<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface as ProductRepository;
use App\Entities\Category;

class CategoryRepository extends AbstractRepository implements CategoryRepositoryInterface
{
    protected $model;
    protected $productRepository;

    function __construct(ProductRepository $productRepository)
    {
        $this->model = $this->model();
        $this->productRepository = $productRepository;
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
        return $this->model::orderBy('updated_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->skip(($pageNo - 1) * $rowPerPage)
            ->take($rowPerPage)
            ->get();
    }

    public function count()
    {
        return $this->model::count();
    }

    public function categoryProducts($cateId)
    {
        return $this->productRepository->categoryProduct($cateId);
    }

    public function deleteById($categoryId)
    {
        return $this->model::where('id', $categoryId)
            ->delete($categoryId);
    }

    public function getJsonFormat($categoryId)
    {
        return $this->model::where('id', $categoryId)
            ->first()
            ->toJson();
    }

    public function updateById($categoryId, $data)
    {
        return $this->model::where('id', $categoryId)
            ->update($data);
    }
}
