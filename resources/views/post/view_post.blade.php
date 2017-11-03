@extends('layouts.app')
@section('content')
   <div class="main-wrapper scrollspy-container">
      <!-- start breadcrumb -->
      <div class="breadcrumb-image-bg detail-breadcrumb">
         <div class="container">
            <div class="page-title detail-header-02">
               <div class="row">
                  <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                     <h2>{{ __('Bài viết') }}</h2>
                     <ul class="list-with-icon list-inline-block">
                        <li><i class="ion-android-done text-primary"></i>{{ __('ViewBlueprint.ListWith1') }}
                        </li>
                        <li><i class="ion-android-done text-primary"></i>{{ __('ViewBlueprint.ListWith2') }}
                        </li>
                        <li><i class="ion-android-done text-primary"></i>{{ __('ViewBlueprint.ListWith3') }}
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="breadcrumb-wrapper text-left">
               <ol class="breadcrumb">
                  <li><a href="#">{{ __('Home') }}</a></li>
                  <li><a href="#">{{ __('Bài viết') }}</a></li>
                  <li><a href="#">{{ __('Xem') }}</a></li>
               </ol>
            </div>
         </div>
      </div>
      <div class="multiple-sticky hidden-sm hidden-xs">
         <div class="multiple-sticky-inner">
            <div class="multiple-sticky-container container">
               <div class="multiple-sticky-item clearfix">
                  <ul id="multiple-sticky-menu" class="multiple-sticky-menu clearfix">
                     <li>
                        <a href="#detail-content-sticky-nav-01"></a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <div class="pt-30 pb-50">
         <div class="container">
            <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-8">
                  <div class="content-wrapper">
                     <div id="detail-content-sticky-nav-01">
                        <h2 class="font-lg">{!! $postInfor->title !!}</h2>
                        <p class="lead">{!! $postInfor->body !!}.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="multiple-sticky no-border hidden-sm hidden-xs">&#032;</div>
      <!-- is used to stop the above stick menu -->
      <div class="bg-light pt-50 pb-70">
         <div class="container">
            <h2 class="font-lg">{{ __('Có thể bạn cũng muốn xem') }}</h2>
            <div class="trip-guide-wrapper">
               <div class="GridLex-gap-20 GridLex-gap-10-mdd GridLex-gap-5-xs">
                  <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-center">
                     @foreach($relativePost as $rela)
                        <div class="GridLex-col-3_mdd-4_sm-6_xs-6_xss-12">
                           <div class="trip-guide-item">
                              <div class="trip-guide-image">
                                 <!--img src="" alt="images" /-->
                              </div>
                              <div class="trip-guide-content relative_blueprint_content">
                                 <h3>{{ $rela->title }}</h3>
                                 <p>
                                    {{ $rela->body }}
                                 </p>
                              </div>
                              <div class="trip-guide-bottom">
                                 <div class="trip-guide-person clearfix">
                                    <div class="image">
                                       <img src="{!! url('images/testimonial/01.jpg') !!}" class="img-circle"
                                            alt="images"/>
                                    </div>
                                    <p class="name">
                                       {{ __('By') }}
                                       <br.>
                                          : <a href="#">{{ $rela->user->name }}</a>
                                    </p>
                                    <p></p>
                                 </div>
                                 <div class="trip-guide-meta row gap-10">
                                    <div class="col-xs-6 col-sm-6">
                                    </div>
                                    <div class="col-xs-6 col-sm-6 text-right">
                                    </div>
                                 </div>
                                 <div class="row gap-10">
                                    <div class="col-xs-12 col-sm-6">
                                       <div class="trip-guide-price">
                                       </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 text-right">
                                       <a href="{!! route('viewpost',[$rela->id]) !!}" class="btn btn-primary">Details</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     @endforeach
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@stop
