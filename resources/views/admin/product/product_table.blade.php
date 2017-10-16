<table id="tableExample3" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>{{ __('Tên sản phẩm') }}</th>
            <th class="text-center">{{ __('Giá bán') }}</th>
            <th class="text-center">{{ __('Còn lại') }}</th>
            <th class="text-center">{{ __('Ngày thêm') }}</th>
            <th class="text-center">{{ __('Ngày cập nhật') }}</th>
            <th class="text-center no-sort zero-right-padding">{{ __('Thông tin') }}</th>
            <th class="text-center no-sort zero-right-padding">{{ __('Thao tác') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr id="productNo{{ $product->id }}">
                <td class="pd-top-15">{{ $product->name }}</td>
                <td class="text-center pd-top-15">{{ $product->price }} đ</td>
                <td class="text-center pd-top-15">{{ $product->stock }}</td>
                <td class="text-center pd-top-15">{{ $product->created_at }}</td>
                <td class="text-center pd-top-15">{{ $product->updated_at }}</td>
                <td class="text-center">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#{{ $product->id }}">
                        {{ __('Chi tiết') }}
                    </button>
                    <div class="modal fade" id="{{ $product->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title">{{ $product->name }}</h4>
                                    <small>Slug: {{ $product->slug }}</small>
                                </div>
                                <div class="modal-body">
                                    <h4 class="m-t-none">{{ __('Thông tin sản phẩm') }}</h4>
                                    <div class="row pd-top-15">
                                        <div class="col-md-6 col-md-offset-3">
                                            @if (isset($product->attribute->Image))
                                                <img class="img-responsive auto-center" src="{{ asset('images/products/' . $product->attribute->Image) }}"/>
                                            @else
                                                <img class="img-responsive custom-width" src="{{ asset('images/default-image.png') }}"/>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row pd-top-15">
                                        @foreach ($product->attribute as $key => $value)
                                            @if ($key != 'Image' && $key != 'Description')
                                                <p class="col-md-5 pd-top-15 text-left">
                                                    {{ str_replace('_', ' ', $key) }}
                                                </p>
                                                <p class="col-md-1 pd-top-15 text-left">
                                                    :
                                                </p>
                                                <p class="col-md-6 pd-top-15 text-left">
                                                    {{ $value }}
                                                </p>
                                            @endif
                                        @endforeach
                                        <p class="col-md-5 pd-top-15 text-left">
                                            {{ __('Mô tả') }}
                                        </p>
                                        <p class="col-md-1 pd-top-15 text-left">
                                            :
                                        </p>
                                        <p class="txt-indent">
                                        <p class="col-md-6 pd-top-15 text-left">
                                            @if (isset($product->attribute->Description))
                                                {{ __($product->attribute->Description) }}
                                            @else
                                                {{ __('Không có mô tả') }}
                                            @endif
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
                            <li><a href="{{ route('product-update', ['productId' => $product->id]) }}">{{ __('Cập nhật') }}</a></li>
                            <li><a class="_delete_product" data-product="{{ $product->id }}" href="javascript:void(0)">{{ __('Xóa') }}</a></li>
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
