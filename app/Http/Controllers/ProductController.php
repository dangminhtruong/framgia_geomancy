<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Http\Requests\GetProductRequest;
use App\Framgia\Response\JsonResponse;
use App\Framgia\Helpers\Paginator;

class ProductController extends Controller
{
    protected $productRepository;
    protected $jsonResponse;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        JsonResponse $jsonResponse
    ) {
        $this->productRepository = $productRepository;
        $this->jsonResponse = $jsonResponse;
    }

    public function index()
    {
        $products = $this->productRepository->getByCategory(1, 1);
        $totalProduct = $this->productRepository->count(1);
        $paginate = Paginator::paginate($config = [
            'total_record' => $totalProduct,
            'current_page' => 1,
        ]);

        return view('admin.product.product', compact('products', 'paginate'));
    }

    public function paginateProductByCategory(GetProductRequest $request)
    {
        $products = $this->productRepository
            ->getByCategory($request->categories_id, $request->pageNo);
        $totalProduct = $this->productRepository->count($request->categories_id) ?: 0;
        $paginate = Paginator::paginate($config = [
            'total_record' => $totalProduct,
            'current_page' => $request->pageNo,
        ]);
        $view = view('admin.product.product_table')
            ->with([
                'products' => $products,
                'paginate' => $paginate,
            ])->render();

        return $this->jsonResponse->success('', ['view' => $view]);
    }
}
