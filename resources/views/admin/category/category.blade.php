@extends('admin.layouts.app')
@section('style')
    {{ HTML::style('bowerrc/datatables/media/css/dataTables.bootstrap.min.css') }}
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="header-icon">
                    <i class="pe page-header-icon pe-7s-albums"></i>
                </div>
                <div class="header-title">
                    <h3>{{ __('Danh sách danh mục sản phẩm') }}</h3>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-filled col-md-12">
            <div class="panel-body text-right">
                <a href="javascript:void(0)" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                    {{ __('Thêm danh mục') }}
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-filled">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                    <div id="_category-table" class="table-responsive overflow-hidden">
                        @include('admin.category.category_table', [
                            'categories' => $categories,
                            'paginate' => $paginate
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none; padding-right: 17px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title">{{ __('Thêm danh mục') }}</h4>
            </div>
            <form method="POST" action="{{ route('category-create') }}">
                {{ csrf_field() }}
                <div class="modal-body">
                    <label class="m-t-none">{{ __('Tên danh mục') }}</label>
                    <input name="name" class="form-control" placeholder="Tên danh mục..." value="{{ old('name') }}">
                    <p class="help-block">{{ $errors->first('name') }}</p>
                    <label class="m-t-none">{{ __('Mô tả') }}</label>
                    <textarea name="description" class="form-control" rows="5" placeholder="{{ __('Mô tả...') }}...">{{ old('message') }}</textarea>
                    <p class="help-block">{{ $errors->first('message') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-accent">{{ __('Lưu') }}</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __("Đóng") }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none; padding-right: 17px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title">{{ __('Cập nhật danh mục') }}</h4>
            </div>
            <form method="POST" action="{{ route('category-update') }}">
                {{ csrf_field() }}
                <input id="categoryId" type="hidden" name="categoryId" value="">
                <div class="modal-body">
                    <label class="m-t-none">{{ __('Tên danh mục') }}</label>
                    <input id="categoryName" name="name" class="form-control" placeholder="Tên danh mục..." value="{{ old('name') }}">
                    <p class="help-block">{{ $errors->first('name') }}</p>
                    <label class="m-t-none">{{ __('Mô tả') }}</label>
                    <textarea id="description" name="description" class="form-control" rows="5" placeholder="{{ __('Mô tả...') }}...">{{ old('message') }}</textarea>
                    <p class="help-block">{{ $errors->first('message') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-accent">{{ __('Lưu') }}</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __("Đóng") }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@if ($errors->first('name') != null || old('name') != null)
    <script>
        $(document).ready(function() {
            $('#myModal').modal('show');
        });
    </script>
@endif
@endsection
@section('script')
    {{ HTML::script('bowerrc/datatables/media/js/jquery.dataTables.min.js') }}
    {{ HTML::script('bowerrc/datatables/media/js/dataTables.bootstrap.min.js') }}
    {{ HTML::script('js/common.js') }}
    {{ HTML::script('js/admin.js') }}
@endsection
