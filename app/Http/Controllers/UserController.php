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
}
