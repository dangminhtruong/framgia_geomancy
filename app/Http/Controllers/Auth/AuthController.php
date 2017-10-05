<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Framgia\Response\FlashResponse;
use App\Framgia\Response\FormResponse;
use App\Repositories\Eloquents\UserRepository;

class AuthController extends Controller
{
    protected $flashResponse;
    protected $formResponse;
    protected $userRepository;

    public function __construct(
        FlashResponse $flashResponse,
        FormResponse $formResponse,
        UserRepository $userRepository
    ) {
        $this->flashResponse = $flashResponse;
        $this->formResponse = $formResponse;
        $this->userRepository = $userRepository;
    }


    public function login(LoginRequest $request)
    {
        if (Auth::check()) {

            return $this->flashResponse->fail('home', __('LoginExists'));
        }

        $user = $request->only('email', 'password');
        if (Auth::attempt($user, $request->input('remember_me_checkbox'))) {

            return $this->flashResponse->success('home', __('LoginSuccess'));
        }

        return $this->formResponse->response($request, __('LoginFail'));
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();

            return $this->flashResponse->success('home', __('LoutoutSuccess'));
        }

        return $this->flashResponse->fail('home', __('LogoutFail'));
    }
}
