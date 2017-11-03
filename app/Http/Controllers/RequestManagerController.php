<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\RequestBlueprintRepositoryInterface;
use App\Repositories\Contracts\RequestNotifyRepositoryInterface;
use App\Framgia\Response\FlashResponse;
use App\Framgia\Response\FormResponse;
use App\Framgia\Response\JsonResponse;
use App\Http\Requests\PaginateBlueprintRequest;
use App\Framgia\Helpers\Paginator;
use App\Http\Requests\ApproveRequest;
use App\Http\Requests\UnapproveRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RequestManagerController extends Controller
{
    protected $requestRepository;
    protected $requestNotifyRepository;
    protected $flashResponse;
    protected $formResponse;
    protected $jsonResponse;

    public function __construct(
        RequestBlueprintRepositoryInterface $requestRepository,
        RequestNotifyRepositoryInterface $requestNotifyRepository,
        JsonResponse $jsonResponse,
        FlashResponse $flashResponse,
        FormResponse $formResponse
    )
    {
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
        $nav['request']['list' . $type] = 1;

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

        return view('admin.request_manager.index', compact(
                'requestBlueprints', 'paginate', 'title', 'nav')
        );
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

    public function viewRequestDetail($requestId)
    {
        if ((int)$requestId < 1) {
            $this->flashResponse->failAndBack(__('Không tìm thấy yêu cầu'));
        }

        $requestBlueprint = $this->requestRepository->findById($requestId);
        if (!$requestBlueprint) {
            $this->flashResponse->failAndBack(__('Không tìm thấy yêu cầu'));
        }

        return view('admin.request_manager.detail', compact('requestBlueprint'));
    }

    public function approve(ApproveRequest $request)
    {
        $requestStatus = $this->requestRepository->getStatus($request->requestId);
        if ($requestStatus != 1) {
            DB::beginTransaction();
            try {
                $this->requestRepository->approve($request->requestId);
            } catch (Exception $e) {
                DB::rollback();

                return $this->flashResponse->failAndBack(__('Có lỗi xảy ra, yêu cầu chưa được duyệt'));
            }

            try {
                $this->requestNotifyRepository->sendSuccessNotify($request->requestId, Auth::user()->id);
            } catch (Exception $e) {
                DB::rollback();

                return $this->flashResponse->failAndBack(__('Có lỗi xảy ra, yêu cầu chưa được duyệt'));
            }
            DB::commit();

            return $this->flashResponse->successAndBack(__('Phê duyệt thành công'));
        }
        return $this->flashResponse->failAndBack(__('Yêu cầu đã được duyệt trước đó'));
    }

    public function unapprove(UnapproveRequest $request)
    {
        $requestBlueprint = $this->requestRepository->findById($request->request_Id);
        if ($requestBlueprint->status != config('app.pending_request')) {
            DB::beginTransaction();
            try {
                $requestBlueprint->status = config('app.pending_request');
                $requestBlueprint->save();
            } catch (Exception $e) {
                DB::rollback();

                return $this->flashResponse->failAndBack(__('Có lỗi xảy ra, vui lòng thử lại'));
            }
            try {
                $this->requestNotifyRepository->sendUnapproveNotify(
                    $request->request_Id,
                    Auth::user()->id,
                    $request->message
                );
            } catch (Exception $e) {
                DB::rollback();

                return $this->flashResponse->failAndBack(__('Có lỗi xảy ra, vui lòng thử lại'));
            }
            DB::commit();
        } else {
            try {
                $this->requestNotifyRepository->sendUnapproveNotify(
                    $request->request_Id,
                    Auth::user()->id,
                    $request->message
                );
            } catch (Exception $e) {
                return $this->flashResponse->failAndBack(__('Có lỗi xảy ra, vui lòng thử lại'));
            }
        }
        return $this->flashResponse->successAndBack(__('Yêu cầu cập nhật thành công'));
    }

    public function updateMessageStatus($messageId)
    {
        return $this->requestNotifyRepository->updateMessageStatus($messageId);
    }
}
