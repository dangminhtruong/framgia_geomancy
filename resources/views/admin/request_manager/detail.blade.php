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
                    <form id="_approve_form" class="pull-right" method="POST" action="{{ route('request-approve') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="requestId" value="{{ $requestBlueprint->id }}">
                        <button id="_approve_request" type="submit" class="btn btn-w-md btn-success">Phê duyệt yêu cầu</button>
                        <p class="help-block">{{ $errors->first('requestId') }}</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
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
                    <form id="_approve_form" class="pull-right" method="POST" action="{{ route('request-approve') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="requestId" value="{{ $requestBlueprint->id }}">
                        <button id="_approve_request" type="submit" class="btn btn-w-md btn-success">Phê duyệt yêu cầu</button>
                        <p class="help-block">{{ $errors->first('requestId') }}</p>
                    </form>
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
