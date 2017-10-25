<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Framgia\Response\FlashResponse;
use App\Framgia\Response\FormResponse;
use App\Framgia\Response\JsonResponse;
use App\Framgia\Helpers\Paginator;
use App\Http\Requests\PaginateCategoryRequest;

class CategoryController extends Controller
{
    protected $categoryRepository;
    protected $jsonResponse;
    protected $flashResponse;
    protected $formResponse;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        JsonResponse $jsonResponse,
        FlashResponse $flashResponse,
        FormResponse $formResponse
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->jsonResponse = $jsonResponse;
        $this->flashResponse = $flashResponse;
        $this->formResponse = $formResponse;
    }

    public function listProductByCategory($id)
    {
        $cateProduct = $this->categoryRepository->categoryProducts($id);
        return view('product.cate_list_product', compact('cateProduct'));
    }
}
