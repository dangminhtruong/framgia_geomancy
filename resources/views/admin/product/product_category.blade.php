<div class="panel panel-filled col-md-12">
    <div class="panel-heading">
        {{ __('Chọn danh mục')}}
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-10">
                <select name="categories_id" id="_category" class="select2_demo_1 form-control full-width">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" title="{{ $category->description }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
