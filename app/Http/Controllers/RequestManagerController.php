<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\RequestBlueprintRepositoryInterface;
use App\Repositories\Contracts\RequestNotifyInterface;
use App\Framgia\Response\FlashResponse;
use App\Framgia\Response\FormResponse;
use App\Framgia\Response\JsonResponse;
use App\Http\Requests\PaginateBlueprintRequest;
use App\Framgia\Helpers\Paginator;

class RequestManagerController extends Controller
{
    protected $requestRepository;
    protected $requestNotifyRepository;
    protected $flashResponse;
    protected $formResponse;
    protected $jsonResponse;

    public function __construct(
        RequestBlueprintRepositoryInterface $requestRepository,
        RequestNotifyInterface $requestNotifyRepository,
        JsonResponse $jsonResponse,
        FlashResponse $flashResponse,
        FormResponse $formResponse
    ) {
        $this->requestRepository = $requestRepository;
        $this->requestNotifyRepository = $requestNotifyRepository;
        $this->jsonResponse = $jsonResponse;
        $this->flashResponse = $flashResponse;
        $this->formResponse = $formResponse;
    }

    public function index($type)
    {
        $requestBlueprints = [];
        $paginate = '';
        $type = (in_array($type, ['2', '3'])) ? $type : 1;
        $title = __('Yêu cầu mới');

        if ($type == config('app.pending_request')) {
            $collection = $this->requestRepository->getPendingRequest();
            $title = __('Yêu cầu đang chờ');
        } elseif ($type == config('app.approved_request')) {
            $collection = $this->requestRepository->getApprovedRequest();
            $title = __('Yêu cầu đã duyệt');
        } else {
            $collection = $this->requestRepository->getNewRequest();
        }

        if (count($collection)) {
            $totalResult = $collection->count();
            $requestBlueprints = $collection->chunk(30)[0];
            $paginate = Paginator::paginate($config = [
                'total_record' => $totalResult,
                'current_page' => 1,
            ]);
        }

        return view('admin.request_manager.index', compact('requestBlueprints', 'paginate', 'title'));
    }

    public function viewRequestBlueprint(PaginateBlueprintRequest $request)
    {
        $requestBlueprints = [];
        $paginate = '';

        if ($request->type == config('app.pending_request')) {
            $collection = $this->requestRepository->getPendingRequest();
        } elseif ($request->type == config('app.approved_request')) {
            $collection = $this->requestRepository->getApprovedRequest();
        } else {
            $collection = $this->requestRepository->getNewRequest();
        }

        if (count($collection)) {
            $totalResult = $collection->count();
            $requestBlueprints = $collection->chunk(30);
            if (count($requestBlueprints) >= (int)$request->pageNo) {
                $requestBlueprints = $requestBlueprints[$request->pageNo - 1];
                $pageNo = $request->pageNo;
            } else {
                $requestBlueprints = $requestBlueprints[0];
                $pageNo = 1;
            }
            $paginate = Paginator::paginate($config = [
                'total_record' => $totalResult,
                'current_page' => $pageNo,
            ]);
        }

        $view = view('admin.request_manager.request_table')
        ->with([
            'requestBlueprints' => $requestBlueprints,
            'paginate' => $paginate,
        ])->render();

        return $this->jsonResponse->success('', ['view' => $view]);
    }
}
