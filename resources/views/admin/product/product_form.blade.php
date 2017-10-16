@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="header-icon">
                    <i class="pe page-header-icon pe-7s-albums"></i>
                </div>
                <div class="header-title">
                    <h3>{{ __('Thêm sản phẩm') }}</h3>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <form method="POST" action="{{ route('product-store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('admin.product.product_category')
        <p class="help-block">{{ $errors->first('categories_id') }}</p>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-filled">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="exampleInputName">{{ __('Tên sản phẩm') }}</label>
                            <input value="{{ old('name') }}" name="name" type="text" class="form-control" id="exampleInputName" placeholder="{{ __('Tên sản phẩm') }}...">
                            <p class="help-block">{{ $errors->first('name') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ __('Giá tiền') }}</label>
                            <input value="{{ old('price') }}" name="price" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{ __('Giá tiền') }}...">
                            <p class="help-block">{{ $errors->first('price') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">{{ __('Số lượng') }}</label>
                            <input value="{{ old('stock') }}" name="stock" type="text" class="form-control" id="exampleInputPassword1" placeholder="{{ __('Giá tiền') }}...">
                            <p class="help-block">{{ $errors->first('stock') }}</p>
                        </div>
                        <div class="form-group">
                            <p class="label-highlight">{{ __('Chọn ảnh') }}</p>
                            <label class="btn btn-default" for="file-selector1">
                                <input name="image" id="file-selector1" type="file" style="display:none;"
                                    onchange="$('#upload-file-info').html($(this).val());">
                                    {{ __('Thêm ảnh') }}
                                <p class="help-block">{{ $errors->first('image') }}</p>
                            </label>
                            <span class='label label-default' id="upload-file-info"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-filled">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class=form-group>
                                <label>{{ __('Mô tả') }}</label>
                                <textarea name="description" class="form-control" rows="12" placeholder="{{ __('Mô tả sản phẩm...') }}"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-filled">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                        <div class="attribute-content form-group">
                            <label>{{ __('Thông tin thêm') }}</label>
                            <div class="box-attr">
                                <div class="form-group">
                                    <input class="form-control input-sm m-t-sm width-30 _attr_name" type="text" placeholder="{{ __('Tên thuộc tính') }}">
                                </div>
                                <div class="form-inline">
                                    <div class="form-inline zero-left-padding">
                                        <div class="form-group col-md-8 zero-left-padding">
                                            <input type="text" class="form-control full-width" placeholder="{{ __('Giá trị') }}">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-danger _remove_attr" type="button">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="add-button form-group pull-right margin-top-20">
                            <button id="_add_prd_attr" type="button" class="btn btn-w-md btn-success">{{ __('Thêm thuộc tính') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-filled">
                    <div class="panel-body text-center">
                        <input type="submit" class="btn btn-w-md btn-default" value="{{ __('Lưu sản phẩm') }}">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('script')
    {{ HTML::script('js/form.js') }}
@endsection
