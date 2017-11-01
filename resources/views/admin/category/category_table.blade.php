<table id="tableExample3" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>{{ __('Tên danh mục') }}</th>
            <th class="text-center">{{ __('Ngày thêm') }}</th>
            <th class="text-center">{{ __('Ngày cập nhật') }}</th>
            <th class="text-center no-sort zero-right-padding">{{ __('Mô tả') }}</th>
            <th class="text-center no-sort zero-right-padding">{{ __('Thao tác') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <tr id="cate{{ $category->id }}">
                <td class="pd-top-15">{{ $category->name }}</td>
                <td class="text-center pd-top-15">{{ $category->created_at }}</td>
                <td class="text-center pd-top-15">{{ $category->updated_at }}</td>
                <td class="text-center">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#category{{ $category->id }}">
                        {{ __('Chi tiết') }}
                    </button>
                    <div class="modal fade" id="category{{ $category->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title">{{ $category->name }}</h4>
                                </div>
                                <div class="modal-body">
                                    <h4 class="m-t-none">{{ __('Mô tả') }}</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if ($category->description != null)
                                                {{ $category->description }}
                                            @else
                                                {{ __('Không có mô tả nào') }}
                                            @endif
                                        </div>
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
                            <li><a class="_remove_cate" data-cateName="{{ $category->name }}" data-cateId="{{ $category->id }}" href="javascript:void(0)">{{ __('Xóa') }}</a></li>
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
