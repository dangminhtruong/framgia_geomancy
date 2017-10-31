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
        @foreach($blueprints as $blueprint)
            <tr id="blueprint{{ $blueprint->id }}">
                <td class="pd-top-15" title="{{ $blueprint->title }}">{{ str_limit($blueprint->title, 30, '...') }}</td>
                <td class="pd-top-15">{{ $blueprint->user->name }}</td>
                <td class="text-center pd-top-15">{{ $blueprint->created_at }}</td>
                <td class="text-center pd-top-15">{{ $blueprint->updated_at }}</td>
                <td class="text-center">
                    <a href="{{ route('blueprint-detail', ['blueprintId' => $blueprint->id]) }}" type="button" class="btn btn-info btn-sm">
                        {{ __('Chi tiết') }}
                    </a>
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
