@extends('admin.layouts.app')
@section('style')
    {{ HTML::style('bowerrc/datatables/media/css/dataTables.bootstrap.min.css') }}
@endsection
@section('content')
 <div class="container-fluid">
    <div class="row m-t-sm">
        <div class="col-md-12">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="media">
                                <i class="pe pe-7s-user c-accent fa-3x"></i>
                                <h2 class="m-t-xs m-b-none">
                                    {{ $user->email }}
                                </h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <table class="table small m-t-sm">
                                <tbody>
                                    <tr>
                                        <td>
                                            <strong class="c-white">
                                                {{ __('Ngày tạo') }}:
                                            </strong>
                                            {{ $user->created_at }}
                                        </td>
                                        <td>
                                            <strong class="c-white">
                                                {{ __('Ngày cập nhật') }}:
                                            </strong>
                                            {{ $user->updated_at }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <h4>{{ __('Thông tin cá nhân') }}</h4>
                    <div class="vertical-container custom-v-margin">
                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-content">
                                <div class="p-sm">
                                    <h2>{{ __('Tên hiển thị') }}</h2>
                                    <p>{{ $user->name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vertical-container custom-v-margin">
                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-content">
                                <div class="p-sm">
                                    <h2>{{ __('Địa chỉ') }}</h2>
                                    <p>{{ $user->address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vertical-container custom-v-margin">
                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-content">
                                <div class="p-sm">
                                    <h2>{{ __('Số điện thoại') }}</h2>
                                    <p>{{ $user->phone }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-xs-6 text-center">
                            <h2 class="no-margins">
                                {{ $user->requests()->count() }}
                            </h2>
                            <span class="c-white">{{ __('Yêu cầu thiết kế') }}</span>
                        </div>
                        <div class="col-md-3 col-xs-6 text-center">
                            <h2 class="no-margins">
                                {{ $user->blueprints()->count() }}
                            </h2>
                            <span class="c-white">{{ __('Bản thiết kế') }}</span>
                        </div>
                        <div class="col-md-3 col-xs-6 text-center">
                            <h2 class="no-margins">
                                {{ $user->posts()->count() }}
                            </h2>
                            <span class="c-white">{{ __('Bài viết') }}</span>
                        </div>
                        <div class="col-md-3 col-xs-6 text-center">
                            <h2 class="no-margins">
                                {{ $user->reviews()->count() }}
                            </h2>
                            <span class="c-white">{{ __('Số lượt bình chọn') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    {{ HTML::script('bowerrc/datatables/media/js/jquery.dataTables.min.js') }}
    {{ HTML::script('bowerrc/datatables/media/js/dataTables.bootstrap.min.js') }}
    {{ HTML::script('js/common.js') }}
    {{ HTML::script('js/admin.js') }}
@endsection
