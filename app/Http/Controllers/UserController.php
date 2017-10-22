<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Framgia\Response\FlashResponse;
use App\Framgia\Response\FormResponse;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Http\Requests\UpdateProfileRequest;
use App\Framgia\Helpers\Paginator;
use App\Http\Requests\PaginateUserRequest;
use App\Framgia\Response\JsonResponse;
use App\Http\Requests\LockAccountRequest;
use App\Events\LockAccountEvent;
use Illuminate\Support\Facades\DB;
use Auth;

class UserController extends Controller
{
    protected $userRepository;
    protected $flashResponse;
    protected $formResponse;
    protected $jsonResponse;

    public function __construct(
        UserRepositoryInterface $userRepository,
        JsonResponse $jsonResponse,
        FlashResponse $flashResponse,
        FormResponse $formResponse
    )
    {
        $this->userRepository = $userRepository;
        $this->jsonResponse = $jsonResponse;
        $this->flashResponse = $flashResponse;
        $this->formResponse = $formResponse;
    }

    public function index()
    {
        $blueprits = $this->userRepository->getUserBlueprint(Auth::user()->id);
        $requestBlueprints = $this->userRepository->getUserRequestBlueprint(Auth::user()->id);

        return view('user.profile', compact('requestBlueprints', 'blueprits'));
    }

    public function save(UpdateProfileRequest $request)
    {
        try {
            $this->userRepository->updateById(
                Auth::id(),
                $request->only(['name', 'phone', 'address'])
            );
        } catch (Exception $e) {
            return $this->formResponse->response($request, 'Có lỗi xảy ra, vui lòng thử lại');
        }
        return $this->flashResponse->success('profile', 'Cập nhật thông tin cá nhân thành công');
    }

    public function viewProfile($userId)
    {
        $user = $this->userRepository->getProfileById($userId);
        if ($user) {
            return view('user.other_profile', compact('user'));
        }

        return $this->flashResponse->failAndBack('Không tìm thấy thông tin');
    }

    public function showUserList()
    {
        $users = $this->userRepository->getActiveAccountByPage(1);
        $totalUser = $this->userRepository->countActiveAccount() ?: 0;
        $paginate = Paginator::paginate($config = [
            'total_record' => $totalUser,
            'current_page' => 1,
        ]);

        return view('admin.user.user', compact('users', 'paginate'));
    }

    public function paginateUser(PaginateUserRequest $request)
    {
        if ($request->user_type == 2) {
            $users = $this->userRepository->getLockAccountByPage($request->pageNo);
            $totalUser = $this->userRepository->countLockAccout() ?: 0;
        } else {
            $users = $this->userRepository->getActiveAccountByPage($request->pageNo);
            $totalUser = $this->userRepository->countActiveAccount() ?: 0;
        }

        $paginate = Paginator::paginate($config = [
            'total_record' => $totalUser,
            'current_page' => $request->pageNo,
        ]);
        $view = view('admin.user.user_table')
            ->with([
                'users' => $users,
                'paginate' => $paginate,
            ])->render();

        return $this->jsonResponse->success('', ['view' => $view]);
    }

    public function lockAccount(LockAccountRequest $request)
    {
        DB::beginTransaction();
        try {
            $result = $this->userRepository->lockById($request->userId);
        } catch (Exception $e) {
            DB::rollback();

            return $this->jsonResponse->queryError(__('Có lỗi xảy ra, vui lòng thử lại'));
        }

        if ($result) {
            $user = $this->userRepository->findById($request->userId);
            event(new LockAccountEvent($user->email, $request->reason));
            DB::commit();

            return $this->jsonResponse->success(__('Khóa tài khoản thành công'));
        }
        DB::rollback();

        return $this->jsonResponse->fail(__('Có lỗi xảy ra, vui lòng thử lại'));
    }
}
