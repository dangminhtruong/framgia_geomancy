<div class="row">
    <div class="col-lg-6">
        @include('admin.product.product_category', ['categories' => $categories])
    </div>
    <div class="col-lg-6">
        @include('admin.product.product_search')
    </div>
</div>
