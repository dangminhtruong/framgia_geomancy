<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Framgia\Response\FlashResponse;
use App\Framgia\Response\FormResponse;
use App\Repositories\Eloquents\ResetPasswordRepository;
use App\Events\ResetPasswordEvent;
use App\Repositories\Eloquents\UserRepository;
use Illuminate\Support\Facades\DB;

class ForgetPasswordController extends Controller
{
    protected $flashResponse;
    protected $formResponse;
    protected $resetPasswordRepository;

    public function __construct(
        FlashResponse $flashResponse,
        FormResponse $formResponse,
        ResetPasswordRepository $resetPasswordRepository,
        UserRepository $userRepository
    ) {
        $this->flashResponse = $flashResponse;
        $this->formResponse = $formResponse;
        $this->resetPasswordRepository = $resetPasswordRepository;
        $this->userRepository = $userRepository;
    }

    public function requestToken(ResetPasswordRequest $request)
    {
        $token = md5($request->input('f_email') . date('YmdHis'));
        $result = $this->resetPasswordRepository->create([
            'email' => $request->input('f_email'),
            'token' => $token,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        if ($result) {
            event(new ResetPasswordEvent($result));

            return $this->flashResponse->success(
                'home',
                __('Mail reset mật khẩu đã được gửi cho quý khách')
            );
        }

        return $flashResponse->fail('home', __('Có lỗi xảy ra, vui lòng thử lại sau'));
    }

    public function resetPassword($token = null)
    {
        if ($token) {
            $result = $this->resetPasswordRepository->find($token);
            if ($result) {

                return view('forget_password.reset_password', compact('token'));
            }

            return $this->flashResponse->fail('home', __('Yêu cầu reset mật khẩu đã hết hạn'));
        }

        return redirect('/');
    }

    public function updatePassword(ChangePasswordRequest $request)
    {
        $resetPassword = $this->resetPasswordRepository->find($request->input('token'));
        if (!$resetPassword) {

            return $this->flashResponse->fail('home', __('Có lỗi xảy ra, vui lòng thử lại sau'));
        }

        DB::beginTransaction();
        $user = $this->userRepository->findByEmail($resetPassword->email);
        $user->password = $request->input('f_password');
        $updateResult = $user->save();
        if (!$updateResult) {
            DB::rollback();

            return $this->formResponse->response($request, __('Có lỗi xảy ra, vui lòng thử lại sau'));
        }
        $removeResult = $resetPassword->forceDelete();
        if (!$removeResult) {
            DB::rollback();

            return $this->formResponse->response($request, __('Có lỗi xảy ra, vui lòng thử lại sau'));
        }
        DB::commit();

        return $this->flashResponse->success('home', __('Cập nhật mật khẩu thành công'));
    }
}
