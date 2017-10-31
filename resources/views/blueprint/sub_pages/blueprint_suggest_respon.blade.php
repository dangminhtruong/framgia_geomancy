<div class="col-xss-12 col-xs-12 col-sm-12 col-md-12">
   <div class="col-xs-5 col-sm-5">
      <div class="form-group">
         <label>Product's name: </label><br/> {!! $suggestProduct->name !!}
      </div>
   </div>
   <div class="col-xs-2 col-sm-2">
      <div class="form-group form-spin-group"><label>Price</label>
         <input type="number" class="form-control form-spin" value="{!! $suggestProduct->price !!}" disabled />
      </div>
   </div>
   <div class="col-xs-4 col-sm-4">
      <div class="form-group">
        <label for="sel1">Product's type:</label>
        <select class="form-control" id="sel1">
          <option selected>{!! $suggestProduct->category->name !!}</option>
        </select>
      </div>
   </div>
    <div class="col-xs-1 col-sm-1">
        <div class="form-group">
            <label>{{ __('Xóa')  }}</label>
                <button type="button" class="remove-more-attr remove-blueprint-suggest" value="{{ $suggestProduct->id }}">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </button>
        </div>
    </div>
</div>
