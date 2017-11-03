@extends('layouts.app')
@section('content')
   <div class="main-wrapper scrollspy-container">
      <!-- start breadcrumb -->
      <div class="breadcrumb-image-bg">
         <div class="container">
            <div class="page-title">
               <div class="row">
                  <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                     <h2>{{ __('Nav.AllBlueprint') }}</h2>
                     <p>{{ __('Let\'s discover') }}.</p>
                  </div>
               </div>
            </div>
            <div class="breadcrumb-wrapper">
               <ol class="breadcrumb">
                  <li><a href="#">{{ __('Home') }}</a></li>
                  <li><a href="#">{{ __('Nav.Blueprints') }}</a></li>
                  <li class="active">{{ __('Nav.AllBlueprint') }}</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- end breadcrumb -->
      <div class="pt-30 pb-50">
         <div class="container">
            <div class="trip-guide-wrapper">
               <div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">
                  <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-center">
                     @foreach($cateProduct as $product)
                        <div class="GridLex-col-4_mdd-4_sm-6_xs-6_xss-12">
                           <div class="trip-guide-item">
                              <div class="trip-guide-image">
                                 <img src="{!! url('images/products', [$product->image]) !!}" alt="images" class="index_product_new" />
                              </div>
                              <div class="trip-guide-content">
                                 <h3>{!! $product->name !!}</h3>
                                 <p>{!! $product->description !!}</p>
                              </div>
                              <div class="trip-guide-bottom">
                                 <div class="col-xs-12 col-sm-6">
                                    <div class="trip-guide-price">
                                       <span class="block inline-block-xs">USD {!! $product->price !!}</span>
                                    </div>
                                 </div>
                                 <div class="col-xs-12 col-sm-6 text-right text-left-xs">
                                    <button class="btn btn-warning" class="btn btn-primary">{{ __('Add cart') }}</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     @endforeach
                  </div>
               </div>
            </div>
            <div class="pager-wrappper clearfix">
               <div class="pager-innner">
                  <div class="clearfix">
                     <p>{{ __('Showing blueprint ') }}
                        <b> {{ $cateProduct->firstItem() }} </b>
                        {{ __('to blueprint') }}
                        <b> {{ $cateProduct->lastItem() }} </b>
                        {{ __('of') }}
                        <b> {{ $cateProduct->total() }} </b>
                     </p>
                  </div>
                  <div class="clearfix">
                     {!! $cateProduct->links() !!}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@stop
