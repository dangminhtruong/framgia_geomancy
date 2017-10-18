@extends('layouts.app')
@section('pageTitle', 'Thông tin cá nhân')
@section('content')
    <div class="breadcrumb-image-bg pb-100 no-bg f-bg-image">
        <div class="container">
        </div>
    </div>
    <div class="user-profile-wrapper">
        <div class="user-header">
            <div class="content">
                <div class="content-top">
                    <div class="container">
                        <div>
                            <div class="GridLex-gap-20">
                                <div class="GridLex-grid-noGutter-equalHeight GirdLex-grid-bottom">
                                    <div class="GridLex-col-7_sm-12_xs-12_xss-12">
                                        <div class="GridLex-inner">
                                            <div class="heading clearfix">
                                                <h3>{{ Auth::user()->name }}</h3>
                                                <span class="label label-success">
                                                    <i class="fa fa-check mr-3"></i>
                                                    @if (Auth::user()->role == 1)
                                                        {{ __('Quản trị') }}
                                                    @else
                                                        {{ __('Khách hàng') }}
                                                    @endif
                                                </span>
                                            </div>
                                            <ul class="user-meta">
                                                <li>
                                                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                                                    {{ __('Số yêu cầu') }}: {{ Auth::user()->requests->count() }}
                                                    <span class="mh-5 text-muted">|</span>
                                                    <i class="fa fa-file" aria-hidden="true"></i>
                                                    {{ __('Số thiết kế') }}: {{ Auth::user()->blueprints->count() }}
                                                    <span class="mh-5 text-muted">|</span>
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    {{ __('Số bài viết') }}: {{ Auth::user()->posts->count() }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-30 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 mt-20">
                    <div class="dashboard-wrapper">
                        <h4 class="section-title">{{ __('Cập nhật thông tin cá nhân') }}</h4>
                        <p class="mmt-15 mb-20">{{ __('Giữ thông tin cá nhân luôn được cập nhật đễ hỗ trợ tốt hơn cho việc liên lạc') }}</p>
                        <form class="post-form-wrapper" method="POST" action="{{ route('profile-update') }}">
                            {{ csrf_field() }}
                            <div class="row gap-20">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{ __('Email') }}</label>
                                        <input class="form-control" value="{{ Auth::user()->email }}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{ __('Ngày tạo') }}</label>
                                        <input class="form-control" value="{{ Auth::user()->created_at }}" disabled>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{ __('Tên hiển thị') }}</label>
                                        <input name="name" type="text" class="form-control" placeholder="{{ __('Tên hiển thị...') }}"
                                            @if (old('name')) value="{{ old('name') }}"
                                            @else value="{{ Auth::user()->name }}"
                                            @endif>
                                        <p class="text-danger help-block error-text">{{ $errors->first('name') }}</p>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{ __('Địa chỉ') }}</label>
                                        <input name="address" type="text" class="form-control" placeholder="{{ __('Địa chỉ...') }}"
                                            @if (old('address')) value="{{ old('address') }}"
                                            @else value="{{ Auth::user()->address }}"
                                            @endif>
                                        <p class="text-danger help-block error-text">{{ $errors->first('address') }}</p>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{ __('Điện thoại') }}</label>
                                        <input name="phone" type="text" class="form-control" placeholder="{{ __('Điện thoại...') }}"
                                            @if (old('phone')) value="{{ old('phone') }}"
                                            @else value="{{ Auth::user()->phone }}"
                                            @endif>
                                        <p class="text-danger help-block error-text">{{ $errors->first('phone') }}</p>
                                    </div>
                                </div>
                                <div class="clear mb-10"></div>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary">{{ __('Cập nhật thông tin') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
