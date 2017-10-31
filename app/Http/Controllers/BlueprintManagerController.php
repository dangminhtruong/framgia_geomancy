<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\BlueprintRepositoryInterface;
use App\Repositories\Contracts\BlueprintNotifyRepositoryInterface;
use App\Framgia\Response\FlashResponse;
use App\Framgia\Response\FormResponse;
use App\Framgia\Response\JsonResponse;
use App\Http\Requests\PaginateBlueprint;
use App\Http\Requests\ApproveBlueprintRequest;
use App\Http\Requests\UnapproveBlueprint;
use App\Framgia\Helpers\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BlueprintManagerController extends Controller
{
    protected $blueprintRepository;
    protected $flashResponse;
    protected $formResponse;
    protected $jsonResponse;
    protected $blueprintNotify;

    public function __construct(
        BlueprintRepositoryInterface $blueprintRepository,
        BlueprintNotifyRepositoryInterface $blueprintNotify,
        JsonResponse $jsonResponse,
        FlashResponse $flashResponse,
        FormResponse $formResponse
    ) {
        $this->blueprintRepository = $blueprintRepository;
        $this->blueprintNotify = $blueprintNotify;
        $this->jsonResponse = $jsonResponse;
        $this->flashResponse = $flashResponse;
        $this->formResponse = $formResponse;
    }

    public function index($type)
    {
        $blueprints = [];
        $paginate = '';
        $type = (in_array($type, ['2', '3'])) ? $type : 1;
        $title = __('Thiết kế mới');
        $nav['blueprint']['list' . $type] = 1;

        if ($type == config('app.pending_blueprint')) {
            $collection = $this->blueprintRepository->getPendingBlueprints();
            $title = __('Thiết kế đang chờ');
        } elseif ($type == config('app.approved_blueprint')) {
            $collection = $this->blueprintRepository->getApprovedBlueprints();
            $title = __('Thiết kế đã duyệt');
        } else {
            $collection = $this->blueprintRepository->getNewBlueprints();
        }

        if (count($collection)) {
            $totalResult = $collection->count();
            $blueprints = $collection->chunk(30)[0];
            $paginate = Paginator::paginate($config = [
                'total_record' => $totalResult,
                'current_page' => 1,
            ]);
        }

        return view('admin.blueprint_manager.index', compact(
            'blueprints', 'paginate', 'title', 'nav')
        );
    }

    public function viewBlueprint(PaginateBlueprint $request)
    {
        $blueprints = [];
        $paginate = '';

        if ($request->type == config('app.pending_blueprint')) {
            $collection = $this->blueprintRepository->getPendingBlueprints();
        } elseif ($request->type == config('app.approved_blueprint')) {
            $collection = $this->blueprintRepository->getApprovedBlueprints();
        } else {
            $collection = $this->blueprintRepository->getNewBlueprints();
        }

        if (count($collection)) {
            $totalResult = $collection->count();
            $blueprints = $collection->chunk(30);
            if (count($blueprints) >= (int)$request->pageNo) {
                $blueprints = $blueprints[$request->pageNo - 1];
                $pageNo = $request->pageNo;
            } else {
                $blueprints = $blueprints[0];
                $pageNo = 1;
            }
            $paginate = Paginator::paginate($config = [
                'total_record' => $totalResult,
                'current_page' => $pageNo,
            ]);
        }

        $view = view('admin.blueprint_manager.blueprint_table')
        ->with([
            'blueprints' => $blueprints,
            'paginate' => $paginate,
        ])->render();

        return $this->jsonResponse->success('', ['view' => $view]);
    }

    public function viewBlueprintDetail($blueprintId)
    {
        $blueprint = $this->blueprintRepository->findByIdWithRelation($blueprintId);
        if (!$blueprint) {
            return $this->flashResponse->failAndBack('Bản thiết kế không tồn tại');
        }

        return view('admin.blueprint_manager.detail', compact('blueprint'));
    }

    public function approve(ApproveBlueprintRequest $request)
    {
        $blueprintStatus = $this->blueprintRepository->getStatus($request->blueprintId);
        if ($blueprintStatus != 1) {
            DB::beginTransaction();
            try {
                $this->blueprintRepository->approve($request->blueprintId);
            } catch (Exception $e) {
                DB::rollback();

                return $this->flashResponse->failAndBack(__('Có lỗi xảy ra, thiết kế chưa được duyệt'));
            }

            try {
                $this->blueprintNotify->sendSuccessNotify($request->blueprintId, Auth::user()->id);
            } catch (Exception $e) {
                DB::rollback();

                return $this->flashResponse->failAndBack(__('Có lỗi xảy ra, thiết kế chưa được duyệt'));
            }
            DB::commit();

            return $this->flashResponse->successAndBack(__('Phê duyệt thành công'));
        }
        return $this->flashResponse->failAndBack(__('Thiết kế đã được duyệt trước đó'));
    }

    public function unapprove(UnapproveBlueprint $request)
    {
        $blueprint = $this->blueprintRepository->findById($request->blueprint_Id);
        if ($blueprint->status != config('app.pending_request')) {
            DB::beginTransaction();
            try {
                $blueprint->status = config('app.pending_request');
                $blueprint->save();
            } catch (Exception $e) {
                DB::rollback();

                return $this->flashResponse->failAndBack(__('Có lỗi xảy ra, vui lòng thử lại'));
            }
            try {
                $this->blueprintNotify->sendUnapproveNotify(
                    $request->blueprint_Id,
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
                $this->blueprintNotify->sendUnapproveNotify(
                    $request->blueprint_Id,
                    Auth::user()->id,
                    $request->message
                );
            } catch (Exception $e) {
                return $this->flashResponse->failAndBack(__('Có lỗi xảy ra, vui lòng thử lại'));
            }
        }
        return $this->flashResponse->successAndBack(__('Yêu cầu cập nhật thành công'));
    }
}
