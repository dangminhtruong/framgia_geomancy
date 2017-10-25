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
                            @if ($requestBlueprint->status == 0)
                                <p class="label label-new">
                                    {{ __('Mới') }}
                                </p>
                            @elseif ($requestBlueprint->status == 1)
                                <p class="label label-default">
                                    {{ __('Đã duyệt') }}
                                </p>
                            @else
                                <p class="label label-accent">
                                    {{ __('Đang đợi') }}
                                </p>
                            @endif
                            <h2 class="m-t-xs m-b-none">
                                {{ __('Tiêu đề: ') }}
                                <span class="mx-width">{{ $requestBlueprint->title }}</span>
                            </h2>
                        </div>
                        <div class="col-md-3">
                            <table class="table small m-t-sm">
                                <tbody>
                                    <tr>
                                        <td>
                                            {{ __('Ngày tạo: ') }}
                                            <strong class="c-white">{{ $requestBlueprint->created_at }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            {{ __('Ngày cập nhật: ') }}
                                            <strong class="c-white">{{ $requestBlueprint->updated_at }}</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3 m-t-sm">
                            {{ __('Người tạo: ') }}
                            <span class="c-white">
                                {{ $requestBlueprint->user->name }}
                            </span>
                            <br>
                            <small>
                            {{ __('Tổng số yêu cầu đã tạo: ') . $requestBlueprint->user->requests()->count() }}
                            </small>
                            {{--  <div class="btn-group m-t-sm">
                                <a href="#" class="btn btn-default btn-sm"><i class="fa fa-envelope"></i> Contact</a>
                            </div>  --}}
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
                    <div class="pull-right">
                        <button id="_approve_request" type="submit" class="btn btn-w-md btn-danger" data-toggle="modal" data-target="#myModal">
                            {{ __("Yêu cầu sửa đổi") }}
                        </button>
                    </div>
                    <form class="pull-right margin-right-20 _approve_form" method="POST" action="{{ route('request-approve') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="requestId" value="{{ $requestBlueprint->id }}">
                        <button type="submit" class="btn btn-w-md btn-success _approve_request">
                            {{ __("Phê duyệt yêu cầu") }}
                        </button>
                        <p class="help-block">{{ $errors->first('requestId') }}</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-body">
                    <h4>{{ __("Tin nhắn") }}</h4>
                    <div class="v-timeline vertical-container">
                        @foreach ($requestBlueprint->requestNotifies as $notify)
                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon">
                                    <i class="fa fa-commenting-o" aria-hidden="true"></i>
                                </div>
                                <div class="vertical-timeline-content">
                                    <div class="p-sm">
                                        <span class="vertical-date pull-right">
                                            <small>{{ $notify->created_at }}</small>
                                        </span>
                                        <h2>{{ $notify->user->name }}</h2>
                                        <p class="break-word">{{ $notify->message }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
</div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-filled panel-c-accent">
                <div class="panel-heading">
                    <h4>{{ __('Chi tiết') }}</h4>
                </div>
                <div class="panel-body">
                    {!! $requestBlueprint->description !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <div class="pull-right">
                        <button id="_approve_request" type="submit" class="btn btn-w-md btn-danger" data-toggle="modal" data-target="#myModal">
                            {{ __("Yêu cầu sửa đổi") }}
                        </button>
                    </div>
                    <form class="pull-right margin-right-20 _approve_form" method="POST" action="{{ route('request-approve') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="requestId" value="{{ $requestBlueprint->id }}">
                        <button type="submit" class="btn btn-w-md btn-success _approve_request">
                            {{ __("Phê duyệt yêu cầu") }}
                        </button>
                        <p class="help-block">{{ $errors->first('requestId') }}</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none; padding-right: 17px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title">{{ __('Yêu cầu cập nhật') }}</h4>
            </div>
            <form method="POST" action="{{ route('request-unapprove') }}">
                {{ csrf_field() }}
                <input type="hidden" name="request_Id" value="{{ $requestBlueprint->id }}">
                <div class="modal-body">
                    <h4 class="m-t-none">{{ __('Lý do') }}</h4>
                    <div class="row">
                        <textarea name="message" class="form-control" rows="5" placeholder="{{ __('Lý dó') }}..."></textarea>
                        <p class="help-block">{{ $errors->first('message') }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-accent">{{ __('Gửi') }}</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __("Đóng") }}</button>
                    <p class="help-block">{{ $errors->first('request_Id') }}</p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
    @if ($errors->first('message') != null || old('message') != null)
        <script>
            $(document).ready(function() {
                $('#myModal').modal('show');
            });
        </script>
    @endif
    {{ HTML::script('bowerrc/datatables/media/js/jquery.dataTables.min.js') }}
    {{ HTML::script('bowerrc/datatables/media/js/dataTables.bootstrap.min.js') }}
    {{ HTML::script('js/common.js') }}
    {{ HTML::script('js/admin.js') }}
@endsection
