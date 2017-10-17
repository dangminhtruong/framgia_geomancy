@extends('layouts.app')
@section('content')
<!-- start breadcrumb -->
<div class="breadcrumb-image-bg pb-100 no-bg">
   <div class="container">
      <div class="page-title">
         <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
               <h2>{{ __('CreateBlueprint.MainTitle') }}</h2>
               <p>{{ __('CreateBlueprint.Title.pTag')  }}}.</p>
            </div>
         </div>
      </div>
      <div class="breadcrumb-wrapper">
         <ol class="breadcrumb">
            <li><a href="#">{{ __('Home') }}</a></li>
            <li class="active"><span>{{ __('CreateBlueprint.Home.Title') }}</span></li>
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
               <form method="post" action="{!! route('postUpdateBlueprint', [$blueprintInfo->id]) !!}" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                  <div class="form">
                     <div class="create-tour-inner">
                        <div class="promo-box-02 mb-40">
                           <div class="icon">
                              <i class="ti-plus"></i>
                           </div>
                           <h4>{{ __('CreateBlueprint.RemideSigup') }}. </h4>
                           <a href="#" class="btn">{{ __('SignUp') }}</a>
                        </div>
                        <h4 class="section-title">{{  __('CreateBlueprint.About') }}</h4>
                        <p>{{ __('CreateBlueprint.About.pTag') }}</p>
                        <div class="row">
                           <div class="col-xs-12 col-sm-12">
                              <div class="form-group form-group-lg">
                                 <label>{{ __('CreateBlueprint.Name') }}:</label>
                                 <input type="text" class="form-control" name="blueprint_name" value="{!! $blueprintInfo->title !!}" />
                              </div>
                           </div>
                           <div class="col-xs-12 col-sm-12 col-md-12">
                              <label>{{ __('CreateBlueprint.Topic') }}:</label>
                              <select class="form-control" name="topic_id">
                                 @foreach($topics as $topic)
                                 @if($blueprintInfo->topics_id == $topic->id)
                                 <option value="{!! $topic->id !!}" selected>{!! $topic->name !!}</option>
                                 @endif
                                 <option value="{!! $topic->id !!}">{!! $topic->name !!}</option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="col-xs-12 col-sm-12">
                              <div class="form-group">
                                 <label>{{ __('CreateBlueprint.Description') }}:</label>
                                 <textarea class="form-control" rows="15" name="blueprint_desc"
                                    required>{!! $blueprintInfo->description !!}</textarea>
                              </div>
                           </div>
                        </div>
                        <div class="mb-30"></div>
                        <h4 class="section-title">{{ __('CreateBlueprint.Detail') }}</h4>
                        <div class="row gap-20">
                           <div class="col-xs-12 col-sm-12">
                              <div class="form-group dropdown">
                                 <label>{{ __('CreateBlueprint.SearchTitle') }}:</label>
                                 <input type="text" class="form-control" id="search_product" data-toggle="dropdown"/>
                                 <ul class="dropdown-menu col-md-12 col-xs-12 col-sm-12" id="search-drop-result">
                                    <li><button class="btn btn-link">---</button></li>
                                 </ul>
                              </div>
                           </div>
                           <div class="checkbox-wrapper" id="blueprint-prd">
                              @foreach($blueprintProduct as $product)
                              <div class="col-xss-12 col-xs-6 col-sm-6 col-md-6">
                                 <div class="col-xs-6 col-sm-8">
                                    <div class="form-group">
                                       <label>{{ __('CreateBlueprint.Suggest.Name') }}:</label><br/>
                                       {!! $product->name !!}
                                    </div>
                                 </div>
                                 <div class="col-xs-6 col-sm-4">
                                    <div class="form-group form-spin-group">
                                       <label>{{ __('CreateBlueprint.Suggest.Quantity') }}</label>
                                       <input type="text" class="form-control form-spin" name="Product['ABC']" value="{!! $product->pivot->quantity !!}" />
                                    </div>
                                 </div>
                              </div>
                              @endforeach
                           </div>
                           <div class="clearfix"></div>
                           <div id="suggest-product"  class="collapse">
                              <div class="col-xs-12 col-sm-4">
                                 <div class="form-group">
                                    <label>{{ __('CreateBlueprint.Suggest.Name') }}</label>
                                    <input type="text" class="form-control" name="suggestName" />
                                 </div>
                              </div>
                              <div class="col-xs-12 col-sm-3">
                                 <div class="form-group form-spin-group">
                                    <label>{{ __('CreateBlueprint.Suggest.Price') }}</label>
                                    <input type="text" class="form-control form-spin" name="suggestPrice" />
                                 </div>
                              </div>
                              <div class="col-xs-12 col-sm-5">
                                 <div class="form-group">
                                    <label>{{  __('CreateBlueprint.Suggest.Type') }}</label>
                                    <select class="selectpicker show-tick form-control" name="categoryId"
                                       title="Select placeholder" data-selected-text-format="count > 6"
                                       data-done-button="true" data-done-button-text="OK">
                                       @foreach($categories as $category )
                                       @if($topicInfo->topic->name == $category->id)
                                       <option value="{!! $category->id !!}" selected> {!! $category->name !!}</option>
                                       @else
                                       <option value="{!! $category->id !!}">{!! $category->name !!}</option>
                                       @endif
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="col-xs-12 col-sm-12">
                                 <div class="form-group">
                                    <label for="comment">{{ __('CreateBlueprint.Suggest.Description') }}:</label>
                                    <textarea class="form-control" rows="5" id="comment" name="suggestDesc">{!! $blueprintInfo->description !!}</textarea>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="mb-30"></div>
                              <h4 class="section-title">{{ __('Gallery') }}</h4>
                              <div class="col-xs-12 col-sm-12 col-md-12" id="img_gallery">
                                 @foreach($gallery as $image)
                                 <div class="col-xs-12 col-sm-12 col-md-6 row galleryDetail" id= "gallery{!! $image->id !!}">
                                    <button type="button" class="btn btn-xs btn-default btn-change-img" value="{!! $image->id !!}"><i class="fa fa-2x fa-trash-o" aria-hidden="true"></i></button>
                                    <img src="{!! url('/images/gallery', [$image->image_name]) !!}" class="edit-gallery-img">
                                 </div>
                                 @endforeach
                              </div>
                              <button type="button" class="btn btn-danger" id="add_more_img">
                              {{ __('CreateBlueprint.AddImg') }}
                              </button>
                           </div>
                        </div>
                     </div>
                     <div class="mb-50">
                        <div class="mb-25"></div>
                        <button href="requested-create-done.html" class="btn btn-primary btn-wide">Submit
                        </button>
                        <a href="#" class="btn btn-primary btn-wide btn-border">{{ __('CreateBlueprint.SaveDraft') }}</a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@stop
