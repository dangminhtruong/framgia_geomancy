<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-filled col-md-6">
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
        <div class="panel panel-filled col-md-6">
            <div class="panel-heading">
                {{ __('Tìm kiếm')}}
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-11">
                        <form class="form-inline">
                            <div class="form-group col-md-10 zero-left-padding">
                                <input type="email" class="form-control full-width" id="exampleInputEmail2" placeholder="{{ __('Nhập nội dung...') }}">
                             </div>
                            <button type="submit" class="btn btn-default">{{ __('Tìm') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
