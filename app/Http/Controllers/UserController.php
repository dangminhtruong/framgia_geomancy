<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Framgia\Response\FlashResponse;
use App\Framgia\Response\FormResponse;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Http\Requests\UpdateProfileRequest;
use Auth;

class UserController extends Controller
{
    protected $userRepository;
    protected $flashResponse;
    protected $formResponse;

    public function __construct(
        UserRepositoryInterface $userRepository,
        FlashResponse $flashResponse,
        FormResponse $formResponse
    ) {
        $this->userRepository = $userRepository;
        $this->flashResponse = $flashResponse;
        $this->formResponse = $formResponse;
    }

    public function index()
    {
        return view('user.profile');
    }

    public function save(UpdateProfileRequest $request)
    {
        try {
            $this->userRepository->updateById(
                Auth::id(),
                $request->only(['name', 'phone', 'address'])
            );
        } catch(Exception $e) {
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
