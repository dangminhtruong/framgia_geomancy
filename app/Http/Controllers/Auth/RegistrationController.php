<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use App\Framgia\Response\FlashResponse;
use App\Framgia\Response\FormResponse;
use App\Repositories\Eloquents\UserRepository;

class RegistrationController extends Controller
{

    protected $flashResponse;
    protected $formResponse;

    public function __construct(
        FlashResponse $flashResponse,
        FormResponse $formResponse,
        UserRepository $userRepository
    ) {
        $this->flashResponse = $flashResponse;
        $this->formResponse = $formResponse;
        $this->userRepository = $userRepository;
    }

    public function store(RegistrationRequest $request)
    {
        $data = $request->except(['_token', 'r_password_confirmation']);
        foreach ($data as $key => $value)
        {
            $user[str_replace('r_', '', $key)] = $value;
        }
        $user['role'] = 0;
        $result = $this->userRepository->create($user);
        if ($result) {

            return $this->flashResponse->success('home', __('Đăng ký tài khoản thành công'));
        }

        return $this->flashResponse->fail('home', __('Có lỗi xảy ra, vui lòng tử lại sau'));
    }
}
