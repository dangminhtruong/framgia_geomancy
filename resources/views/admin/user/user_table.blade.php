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
                    <a href="{{ route('user-profile', ['userId' => $user->id])}}" class="btn btn-success btn-sm">
                        {{ __('Chi tiết') }}
                    </a>
                </td>
                <td class="text-center">
                    <div class="btn-group">
                        <button data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle">
                            {{ __('Mở rộng') }}<span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            @if ($user->status == 1)
                                <li><a class="_lock_account" data-email="{{ $user->email }}" data-user="{{ $user->id }}" href="javascript:void(0)">{{ __('Khóa tài khoản') }}</a></li>
                            @else
                                <li><a class="_unlock_account" data-email="{{ $user->email }}" data-user="{{ $user->id }}" href="javascript:void(0)">{{ __('Mở khóa tài khoản') }}</a></li>
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
