<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Framgia\Response\FlashResponse;
use App\Framgia\Response\FormResponse;
use App\Framgia\Response\JsonResponse;
use App\Framgia\Helpers\Paginator;
use App\Http\Requests\PaginateCategoryRequest;
use App\Http\Requests\AddCategoryRequest;

class CategoryManagerController extends Controller
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
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->jsonResponse = $jsonResponse;
        $this->flashResponse = $flashResponse;
        $this->formResponse = $formResponse;
    }

    public function index()
    {
        $nav['cate']['category'] = 1;
        $categories = $this->categoryRepository->getPageNo(1);
        $totalCategory = $this->categoryRepository->count() ?: 0;
        $paginate = Paginator::paginate($config = [
            'total_record' => $totalCategory,
            'current_page' => 1,
        ]);

        return view('admin.category.category', compact('categories', 'paginate', 'nav'));
    }

    public function paginateCategory(PaginateCategoryRequest $request)
    {
        $categories = $this->categoryRepository->getPageNo($request->pageNo);
        $totalCategory = $this->categoryRepository->count($request->pageNo) ?: 0;
        $paginate = Paginator::paginate($config = [
            'total_record' => $totalCategory,
            'current_page' => $request->pageNo,
        ]);
        $view = view('admin.category.category_table')
            ->with([
                'categories' => $categories,
                'paginate' => $paginate,
            ])->render();

        return $this->jsonResponse->success('', ['view' => $view]);
    }

    public function create(AddCategoryRequest $request)
    {
        try {
            $this->categoryRepository->create($request->only(['name', 'description']));
        } catch(Exception $e) {
            return $this->formResponse->response($request, 'Có lỗi xảy ra, vui lòng thử lại');
        }

        return $this->flashResponse->successAndBack('Thêm danh mục thành công');
    }
}
