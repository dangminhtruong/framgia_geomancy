@extends('layouts.app')
@section('pageTitle', 'Home')
@section('content')
    <div class="breadcrumb-image-bg pb-100 no-bg f-bg-image">
        <div class="container">
        </div>
    </div>

    <div class="bg-light">
        <div class="confirmation-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                        <form method="POST" action="{{ route('update-password') }}">
                            {{ csrf_field() }}
                            <div class="confirmation-inner">
                                <div class="promo-box-02 bg-success mb-40">
                                    <h4 class="reset-ttl">{{ __('Cập nhật mật khẩu') }}</h4>
                                </div>

                                <div class="row gap-20">
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>{{ __('Form.Password')}}</label>
                                            <input name="f_password" class="form-control" placeholder="{{ __('Password')}}..." type="password">
                                            <p class="text-danger help-block error-text">{{ $errors->first('f_password') }}</p>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>{{ __('Form.RePassword') }}</label>
                                            <input name="f_password_confirmation" class="form-control" placeholder="{{ __('Form.RePassword') }}..." type="password">
                                            <p class="text-danger help-block error-text">{{ $errors->first('f_password_confirmation') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-50 text-center">
                                <div class="mb-15"></div>
                                <button type="submit" href="#" class="btn btn-primary btn-wide"><i class="ion-android-print"></i>{{ __('Cập nhật') }}</button>
                                <a href="#" class="btn btn-primary btn-wide btn-border"><i class="ion-android-share"></i>{{ __('Nhập lại') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
