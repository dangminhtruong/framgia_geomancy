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
use App\Http\Requests\UnlockAccountRequest;
use App\Http\Requests\SearchUserRequest;
use App\Events\LockAccountEvent;
use App\Events\UnlockAccountEvent;
use Illuminate\Support\Facades\DB;
use Auth;

class UserManagerController extends Controller
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
    ) {
        $this->userRepository = $userRepository;
        $this->jsonResponse = $jsonResponse;
        $this->flashResponse = $flashResponse;
        $this->formResponse = $formResponse;
    }

    public function showUserList()
    {
        $nav['user']['list'] =  1;
        $users = $this->userRepository->getActiveAccountByPage(1);
        $totalUser = $this->userRepository->countActiveAccount() ?: 0;
        $paginate = Paginator::paginate($config = [
            'total_record' => $totalUser,
            'current_page' => 1,
        ]);

        return view('admin.user.user', compact('users', 'paginate', 'nav'));
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

    public function unlockAccount(UnlockAccountRequest $request)
    {
        DB::beginTransaction();
        try {
            $result = $this->userRepository->unlockById($request->userId);
        } catch (Exception $e) {
            DB::rollback();

            return $this->jsonResponse->queryError(__('Có lỗi xảy ra, vui lòng thử lại'));
        }

        if ($result) {
            $user = $this->userRepository->findById($request->userId);
            event(new UnlockAccountEvent($user->email));
            DB::commit();

            return $this->jsonResponse->success(__('Mở khóa tài khoản thành công'));
        }
        DB::rollback();

        return $this->jsonResponse->fail(__('Có lỗi xảy ra, vui lòng thử lại'));
    }

    public function search(Request $request)
    {
        $nav['user']['list'] =  1;
        if ($request->type == config('app.lock_account')) {
            $result = $this->userRepository->searchLockAccountByEmail($request->email);
        } else {
            $result = $this->userRepository->searchActiveAccountByEmail($request->email);
        }
        $users = [];
        $paginate = '';
        if (count($result)) {
            $collection = $result->chunk(10);
            $users = $collection[$request->page - 1];
            $totalResult = $result->count();
            $paginate = Paginator::paginate($config = [
                'total_record' => $totalResult,
                'current_page' => $request->page,
                'link' => $request->url() . "?search=$request->email&type=$request->type&page={?}",
            ]);

            return view('admin.user.user', compact('users', 'paginate', 'nav'));
        }
        return view('admin.user.user', compact('users', 'paginate', 'nav'));
    }

    public function viewProfile($userId)
    {
        $user = $this->userRepository->getProfileById($userId);
        if ($user) {
            return view('admin.user.profile', compact('user'));
        }

        return $this->flashResponse->failAndBack(__('Không tìm thấy thông tin người dùng'));
    }
}
