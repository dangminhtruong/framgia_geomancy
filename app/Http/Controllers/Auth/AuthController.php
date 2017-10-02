<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Framgia\Response\FlashResponse;
use App\Framgia\Response\FormResponse;

class AuthController extends Controller
{
    protected $flashResponse;
    protected $formResponse;

    public function __construct(FlashResponse $flashResponse, FormResponse $formResponse)
    {
        $this->flashResponse = $flashResponse;
        $this->formResponse = $formResponse;
    }


    public function login(LoginRequest $request)
    {
        if (Auth::check()) {
            return $this->flashResponse->fail('home', 'Bạn đã đăng nhập');
        }

        $user = $request->only('email', 'password');
        if (Auth::attempt($user, $request->input('remember_me_checkbox'))) {
            return $this->flashResponse->success('home', 'Đăng nhập thành công');
        }

        return $this->formResponse->response($request, 'Email hoặc password không hợp lệ');
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return $this->flashResponse->success('home', 'Đăng xuất thành công');
        }
        return $this->flashResponse->fail('home', 'Bạn chưa đăng nhập');
    }
}
