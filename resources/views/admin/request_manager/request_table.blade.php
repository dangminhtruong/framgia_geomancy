<table id="tableExample3" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>{{ __('Tiêu đề') }}</th>
            <th>{{ __('Tài khoản') }}</th>
            <th class="text-center">{{ __('Ngày tạo') }}</th>
            <th class="text-center">{{ __('Ngày cập nhật') }}</th>
            <th class="text-center no-sort zero-right-padding">{{ __('Thông tin') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($requestBlueprints as $request)
            <tr id="request{{ $request->id }}">
                <td class="pd-top-15">{{ $request->title }}</td>
                <td class="pd-top-15">{{ $request->user->name }}</td>
                <td class="text-center pd-top-15">{{ $request->created_at }}</td>
                <td class="text-center pd-top-15">{{ $request->updated_at }}</td>
                <td class="text-center">
                    <button type="button" class="btn btn-info btn-sm">
                        {{ __('Chi tiết') }}
                    </button>
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
