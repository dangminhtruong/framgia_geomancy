<table id="tableExample3" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>{{ __('Email') }}</th>
            <th class="text-center">{{ __('Tên hiển thị') }}</th>
            <th class="text-center">{{ __('Ngày tạo') }}</th>
            <th class="text-center">{{ __('Ngày cập nhật') }}</th>
            <th class="text-center no-sort zero-right-padding">{{ __('Trạng thái') }}</th>
            <th class="text-center no-sort zero-right-padding">{{ __('Thông tin') }}</th>
            <th class="text-center no-sort zero-right-padding">{{ __('Thao tác') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr id="user{{ $user->id }}">
                <td class="pd-top-15">{{ $user->email }}</td>
                <td class="text-center pd-top-15">{{ $user->name }} </td>
                <td class="text-center pd-top-15">{{ $user->created_at }}</td>
                <td class="text-center pd-top-15">{{ $user->updated_at }}</td>
                <td class="text-center">
                    @if ($user->status == 1)
                        <button type="button" class="btn btn-info btn-sm">
                            {{ __('Hoạt động') }}
                        </button>
                    @else
                        <button type="button" class="btn btn-danger btn-sm">
                            {{ __('Khóa') }}
                        </button>
                    @endif
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#{{ $user->id }}">
                        {{ __('Chi tiết') }}
                    </button>
                    <div class="modal fade" id="{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title">{{ $user->name }}</h4>
                                </div>
                                <div class="modal-body">
                                    <h4 class="m-t-none">{{ __('Thông tin cá nhân') }}</h4>
                                    <div class="row pd-top-15">
                                        <p class="col-md-5 pd-top-15 text-left">
                                            {{ __('Địa chỉ') }}
                                        </p>
                                        <p class="col-md-1 pd-top-15 text-left">
                                            :
                                        </p>
                                        <p class="col-md-6 pd-top-15 text-left">
                                            {{ $user->address }}
                                        </p>
                                    </div>
                                    <div class="row pd-top-15">
                                        <p class="col-md-5 pd-top-15 text-left">
                                            {{ __('Điện thoại') }}
                                        </p>
                                        <p class="col-md-1 pd-top-15 text-left">
                                            :
                                        </p>
                                        <p class="col-md-6 pd-top-15 text-left">
                                            {{ $user->phone }}
                                        </p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Đóng') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="text-center">
                    <div class="btn-group">
                        <button data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle">
                            {{ __('Mở rộng') }}<span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#">{{ __('Cập nhật') }}</a></li>
                            @if ($user->status == 1)
                                <li><a class="" data-product="{{ $user->id }}" href="javascript:void(0)">{{ __('Khóa tài khoản') }}</a></li>
                            @else
                                <li><a class="" data-product="{{ $user->id }}" href="javascript:void(0)">{{ __('Mở khóa tài khoản') }}</a></li>
                            @endif
                        </ul>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="dataTables_paginate paging_simple_numbers">
    <ul id="_ajax-paginate" class="pagination pull-right">
        {!! $paginate !!}
    </ul>
</div>
