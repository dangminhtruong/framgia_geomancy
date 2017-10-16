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
    )
    {
        $this->productRepository = $productRepository;
        $this->jsonResponse = $jsonResponse;
        $this->flashResponse = $flashResponse;
        $this->formResponse = $formResponse;
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

    public function getSearchProduct(Request $request)
    {
        return $this->productRepository->searchProduct($request);
    }

    public function create()
    {
        return view('admin.product.product_form');
    }

    public function store(AddProductRequest $request)
    {
        if (!$request->file('image')->isValid()) {
            return $this->formResponse->response($request, __('Upload ảnh thất bại'));
        }

        $path = $request->image->move(
            'images/products',
            $request->file('image')->getClientOriginalName()
        );
        if (!$path) {
            return $this->formResponse->response($request, __('Upload ảnh thất bại'));
        }

        $data = $request->only(['name', 'price', 'stock', 'categories_id']);
        $data['slug'] = str_slug($request->name);
        $attribute = $request->except(['_token', 'name', 'price', 'stock', 'categories_id', 'image']);
        $attribute['image'] = $request->file('image')->getClientOriginalName();
        $attribute = FramgiaHelper::formateAttribute($attribute);
        $data['attribute'] = json_encode($attribute);
        try {
            $createResult = $this->productRepository->create($data);
        } catch (Exception $e) {
            return $this->formResponse->response($request, __('Tên sản phẩm đã tồn tại'));
        }

        return $this->flashResponse->success('product-create', __('Thêm sản phẩm thành công'));
    }
}
