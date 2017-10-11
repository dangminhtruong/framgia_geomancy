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
                    <h3>{{ __('Danh sách sản phẩm') }}</h3>
                </div>
            </div>
            <hr>
        </div>
    </div>
    @include('admin.product.product_category')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-filled">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                    <div id="_product-table" class="table-responsive overflow-hidden">
                        @include('admin.product.product_table', [
                            'products' => $products,
                            'paginate' => $paginate
                        ])
                    </div>
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
