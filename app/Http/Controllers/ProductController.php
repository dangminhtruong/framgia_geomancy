<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Http\Requests\GetProductRequest;
use App\Framgia\Response\JsonResponse;
use App\Framgia\Helpers\Paginator;
use App\Http\Requests\AddProductRequest;
use App\Framgia\Response\FlashResponse;
use App\Framgia\Response\FormResponse;
use App\Framgia\Helpers\FramgiaHelper;
use App\Http\Requests\DeleteProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    protected $productRepository;
    protected $jsonResponse;
    protected $flashResponse;
    protected $formResponse;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        JsonResponse $jsonResponse,
        FlashResponse $flashResponse,
        FormResponse $formResponse
    ) {
        $this->productRepository = $productRepository;
        $this->jsonResponse = $jsonResponse;
        $this->flashResponse = $flashResponse;
        $this->formResponse = $formResponse;
    }

    public function searchProductById($id)
    {
        $product = $this->productRepository->findById($id);
        return view('blueprint.sub_pages.blueprint_product_respon', compact('product'))->render();
    }
}
