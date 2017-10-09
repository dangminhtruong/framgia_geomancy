@extends('layouts.app')
@section('content')
<!-- start breadcrumb -->
<div class="breadcrumb-image-bg pb-100 no-bg" style="background-image:url('images/hero-header/03.jpg');">
   <div class="container">
      <div class="page-title">
         <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
               <h2>Create Your blueprint</h2>
               <p>Celebrated no he decisively thoroughly.</p>
            </div>
         </div>
      </div>
      <div class="breadcrumb-wrapper">
         <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active"><span>Blueprint Create</span></li>
         </ol>
      </div>
   </div>
</div>
<!-- end breadcrumb -->
<div class="bg-light">
   <div class="create-tour-wrapper">
      <div class="container">
         <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
               <form method="post" enctype="multipart/form-data">
                  <div class="form">
                     <div class="create-tour-inner">
                        <div class="promo-box-02 mb-40">
                           <div class="icon">
                              <i class="ti-plus"></i>
                           </div>
                           <h4>No account? Please sign-up now. It's free. </h4>
                           <a href="#" class="btn">Sign Up</a>
                        </div>
                        <h4 class="section-title">About this blueprint</h4>
                        <p>Compliment interested discretion estimating on stimulated apartments oh. Dear so sing when in find read of call. As distrusts behaviour abilities defective uncommonly.</p>
                        <div class="row">
                           <div class="col-xs-12 col-sm-12">
                              <div class="form-group form-group-lg">
                                 <label>Blueprint name:</label>
                                 <input type="text" class="form-control" name="blueprint_name" required/>
                              </div>
                           </div>
                           <!-------------------------->
                           <div class="col-xs-12 col-sm-12 col-md-12">
                              <label>Topic:</label>
                              <select class="form-control" name="Topics">
                                 @foreach($topics as $topic)
                                    <option value="{!! $topic->id !!}">{!! $topic->name !!}</option>
                                 @endforeach
                              </select>
                           </div>
                           <!-------------------------->
                           <div class="col-xs-12 col-sm-12">
                              <div class="form-group">
                                 <label>Blueprint Description:</label>
                                 <textarea class="form-control" rows="15" name="blueprint_desc" required></textarea>
                              </div>
                           </div>
                           <!-------------------------->
                        
                           <!-------------------------->
                        </div>
                        <div class="mb-30"></div>
                        <h4 class="section-title">Blueprint detail</h4>
                        <div class="row gap-20">
                           <div class="col-xs-12 col-sm-12">
                              <div class="form-group dropdown">
                                 <label>Search products for this bueprint:</label>
                                 <input type="text" class="form-control" data-toggle="dropdown"/>
                                  <ul class="dropdown-menu col-md-12 col-xs-12 col-sm-12">
                                    <li><a href="#">White stone</a></li>
                                    <li><a href="#">Green light</a></li>
                                    <li><a href="#">Does't glad ? suggest product.. </a></li>
                                  </ul>
                              </div>
                           </div>
                           <!-------------------------->
                        <div class="checkbox-wrapper">
                           <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                              <div class="checkbox-block">
                                 <input id="filter_checkbox-1" name="blueprint_product" type="checkbox" class="checkbox"/>
                                 <label class="" for="filter_checkbox-1">Checkbox One</label>
                              </div>
                           </div>
                           <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                              <div class="checkbox-block">
                                 <input id="filter_checkbox-2" name="blueprint_product" type="checkbox" class="checkbox"/>
                                 <label class="" for="filter_checkbox-2">Checkbox Two</label>
                              </div>
                           </div>
                           <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                              <div class="checkbox-block">
                                 <input id="filter_checkbox-3" name="blueprint_product" type="checkbox" class="checkbox"/>
                                 <label class="" for="filter_checkbox-3">Checkbox Three</label>
                              </div>
                           </div>
                        </div>
                        <!-------------------------------------->
                           <div class="col-xs-12 col-sm-5">
                              <div class="form-group">
                                 <label>Tên sản phẩm</label>
                                 <input type="text" class="form-control" />
                              </div>
                           </div>
                           <div class="col-xs-12 col-sm-2">
                              <div class="form-group form-spin-group">
                                 <label>Số Lượng</label>
                                 <input type="text" class="form-control form-spin" value="1" /> 
                              </div>
                           </div>
                           <div class="col-xs-12 col-sm-5">
                              <div class="form-group">
                                 <label>Loại sản phẩm</label>
                                 <select class="selectpicker show-tick form-control" title="Select placeholder" data-selected-text-format="count > 6" data-done-button="true" data-done-button-text="OK" multiple>
                                    <option value="0">Select Option 1</option>
                                    <option value="1">Select Option 2</option>
                                    <option value="2">Select Option 3</option>
                                    <option value="3">Select Option 4</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-xs-12 col-sm-12">
                              <div class="form-group">
                                <label for="comment">Description suggest product:</label>
                                <textarea class="form-control" rows="5" id="comment"></textarea>
                              </div>
                           </div>
                           <div class="col-xs-12 col-sm-12 col-md-12" id="img_gallery">
                              <div class="mb-30"></div>
                          <h4 class="section-title">Gallery</h4>
                              <div class="form-group">
                               <input type="file" name="img[]" class="file">
                               <div class="input-group col-xs-12">
                                 <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                 <input type="text" class="form-control input-lg" disabled placeholder="Upload Image">
                                 <span class="input-group-btn">
                                   <button class="browse btn btn-primary input-lg" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
                                 </span>
                               </div>
                              </div>
                             <button type="button" class="btn btn-danger" id="add_more_img">
                                 Add more images
                             </button>
                           </div>
                        </div>
                     </div>
                     <div class="mb-50">
                        <div class="mb-25"></div>
                        <a href="requested-create-done.html" class="btn btn-primary btn-wide">Submit</a>
                        <a href="#" class="btn btn-primary btn-wide btn-border">Save as draft</a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@stop