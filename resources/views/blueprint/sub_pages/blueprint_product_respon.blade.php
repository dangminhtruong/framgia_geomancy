<div class="col-xss-12 col-xs-12 col-sm-12 col-md-12">
   <div class="col-xs-5 col-sm-5">
      <div class="form-group">
         <label>Product's name: </label>{!! $product->name !!} 
      </div>
   </div>
   <div class="col-xs-2 col-sm-2">
      <div class="form-group form-spin-group"><label>Quantity</label>
         <input type="number" class="form-control form-spin" name="blueprint_product[{!! $product->id !!}]" value="1" />
      </div>
   </div>
   <div class="col-xs-5 col-sm-5">
      <div class="form-group">
        <label for="sel1">Product's type:</label>
        <select class="form-control" id="sel1">
          <option selected>{!! $product->category->name !!}</option>
        </select>
      </div>
   </div>
</div>
