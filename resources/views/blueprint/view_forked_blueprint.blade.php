@extends('layouts.app')
@section('content')
   <div class="main-wrapper scrollspy-container">
      <!-- start breadcrumb -->
      <div class="breadcrumb-image-bg detail-breadcrumb">
         <div class="container">
            <div class="page-title detail-header-02">
               <div class="row">
                  <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                     <h2>{!! $forkBlueprintInfo->blueprint->title !!}</h2>
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
                  <li><a href="#">{{ __('Nav.Blueprints') }}</a></li>
                  <li><a href="#">{{ __('View') }}</a></li>
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
                        <a href="#detail-content-sticky-nav-01">Overview</a>
                     </li>
                     <li>
                        <a href="#detail-content-sticky-nav-03">Detail</a>
                     </li>
                     <li>
                        <a href="#detail-content-sticky-nav-02">Gallery</a>
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
                        <h2 class="font-lg">Over view</h2>
                        <p class="lead">{!! $forkBlueprintInfo->description !!}.</p>
                        <div class="bt mt-30 mb-30"></div>
                        <div class="row">
                           <div class="col-xs-12 col-sm-12 col-md-12" id="detail-content-sticky-nav-03">
                              <div class="featured-list-in-box">
                                 <h4 class="uppercase spacing-1">{{ __('CreateBlueprint.Detail') }}</h4>
                                 @foreach($forkBlueprintInfo->details as $improveDetail)
                                    <div class="col-xss-12 col-xs-12 col-sm-12 col-md-12">
                                       <div class="col-xs-4 col-sm-4">
                                          <div class="form-group">
                                             <label>{{ __('CreateBlueprint.Suggest.Name') }}
                                                : </label><br/>{!! $improveDetail->product->name !!}
                                          </div>
                                       </div>
                                       <div class="col-xs- col-sm-4">
                                          <div class="form-group form-spin-group">
                                             <label>{{ __('CreateBlueprint.Suggest.Quantity') }}</label>
                                             <input type="text" class="form-control form-spin"
                                                    value="{!! $improveDetail->quantity !!}"/>
                                          </div>
                                       </div>
                                       <div class="col-xs-4 col-sm-4">
                                          <div class="form-group form-spin-group">
                                             <label>{{ __('CreateBlueprint.Suggest.Type') }}</label>
                                             <select class="form-control" id="sel1">
                                                <option>{!! $improveDetail->product->category->name !!}</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 @endforeach
                              </div>
                           </div>
                        </div>
                        <div class="mb-25"></div>
                        <div class="bb"></div>
                        <div class="mb-25"></div>
                     </div>
                     <div id="detail-content-sticky-nav-02">
                        <h2 class="font-lg">{{ __('Gallery') }}</h2>
                        <div class="gallery-grid-3-2-wrapper mb-30">
                           <div class="gallery1">
                              @foreach($forkBlueprintInfo->blueprint->gallery as $image)
                                 <div class="">
                                    <img src="{!! url('images/gallery', [$image->image_name]) !!}" alt="">
                                 </div>
                              @endforeach
                           </div>
                        </div>
                        <div class="mb-25"></div>
                        <div class="bb"></div>
                        <div class="mb-25"></div>
                     </div>
                  </div>
               </div>
               <div id="sidebar-sticky" class="col-xs-12 col-sm-12 col-md-4">
                  <aside class="sidebar-wrapper with-box-shadow">
                     <div class="sidebar-booking-box mmt mt-30-sm">
                        <div class="sidebar-booking-header bg-primary clearfix">
                           <div class="price">
                              {{ __('Bild.Clone') }}
                           </div>
                        </div>
                        <div class="sidebar-booking-inner">
                           <div class="row gap-10" id="rangeDatePicker">
                              <div class="col-xss-12 col-xs-12 col-sm-12 btn-group">
                                 <button type="button"
                                         class="btn btn-info btn-block" value="{{ $forkBlueprintInfo->id }}" disabled>{{ __('Clone') }}</button>
                              </div>
                           </div>
                           <div class="row gap-20">
                              <div class="col-xss-12 col-xs-12 col-sm-12">
                                 <div class="mt-5">
                                    <button type="button"
                                            class="btn btn-danger btn-block">{{ __('Bild') }}</button>
                                 </div>
                              </div>
                           </div>
                           <div class="mt-10 text-center">
                              <p class="font-md text-muted font500 spacing-2">{{ __('Not.Chager') }}</p>
                           </div>
                        </div>
                     </div>
                     <div class="list-yes-no-box">
                        <ul>
                           <li>{{ __('ViewBlueprint.Assure1') }}</li>
                           <li>{{ __('ViewBlueprint.Assure2') }}</li>
                           <li>{{ __('ViewBlueprint.Assure3') }}</li>
                           <li>{{ __('ViewBlueprint.Assure4') }}</li>
                        </ul>
                     </div>
                  </aside>
               </div>
            </div>
         </div>
      </div>
      <div class="multiple-sticky no-border hidden-sm hidden-xs">&#032;</div>
      <!-- is used to stop the above stick menu -->
      <div class="bg-light pt-50 pb-70">
         <div class="container">
            <h2 class="font-lg">{{ __('ViewBlueprint.Relatded') }}</h2>
            <div class="trip-guide-wrapper">
               <div class="GridLex-gap-20 GridLex-gap-10-mdd GridLex-gap-5-xs">
                  <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-center">
                     <div class="GridLex-col-3_mdd-4_sm-6_xs-6_xss-12">
                        <div class="trip-guide-item">
                           <div class="trip-guide-image">
                              <!--img src="" alt="images" /-->
                           </div>
                           <div class="trip-guide-content">
                              <h3>Bangkok-Pattaya Safari Adventure</h3>
                              <p>Game of as rest time eyes with of this it. Add was music merry any truth
                                 since going...
                              </p>
                           </div>
                           <div class="trip-guide-bottom">
                              <div class="trip-guide-person clearfix">
                                 <div class="image">
                                    <img src="{!! url('images/testimonial/01.jpg') !!}" class="img-circle"
                                         alt="images"/>
                                 </div>
                                 <p class="name">By: <a href="#">Robert Kalvin</a></p>
                                 <p>Local expert from Thailand</p>
                              </div>
                              <div class="trip-guide-meta row gap-10">
                                 <div class="col-xs-6 col-sm-6">
                                    <div class="rating-item">
                                       <input type="hidden" class="rating"
                                              data-filled="fa fa-star rating-rated"
                                              data-empty="fa fa-star-o" data-fractions="2" data-readonly
                                              value="4.5"/>
                                    </div>
                                 </div>
                                 <div class="col-xs-6 col-sm-6 text-right">
                                    5 days 4 nights
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="GridLex-col-3_mdd-4_sm-6_xs-6_xss-12">
                        <div class="trip-guide-item">
                           <div class="trip-guide-image">
                              <img src="{!! url('images/trip/01.jpg') !!}" alt="images"/>
                           </div>
                           <div class="trip-guide-content">
                              <h3>Chiang Mai Sustainable Trails</h3>
                              <p>Resolution devonshire pianoforte assistance an he particular
                                 middletons...
                              </p>
                           </div>
                           <div class="trip-guide-bottom">
                              <div class="trip-guide-person clearfix">
                                 <div class="image">
                                    <img src="{!! url('images/testimonial/01.jpg') !!}" class="img-circle"
                                         alt="images"/>
                                 </div>
                                 <p class="name">By: <a href="#">Robert Kalvin</a></p>
                                 <p>Local expert from Thailand</p>
                              </div>
                              <div class="trip-guide-meta row gap-10">
                                 <div class="col-xs-6 col-sm-6">
                                    <div class="rating-item">
                                       <input type="hidden" class="rating"
                                              data-filled="fa fa-star rating-rated"
                                              data-empty="fa fa-star-o" data-fractions="2" data-readonly
                                              value="4.5"/>
                                    </div>
                                 </div>
                                 <div class="col-xs-6 col-sm-6 text-right">
                                    5 days 4 nights
                                 </div>
                              </div>
                              <div class="row gap-10">
                                 <div class="col-xs-12 col-sm-6">
                                    <div class="trip-guide-price">
                                       Starting at
                                       <span class="number">USD687.00</span>
                                    </div>
                                 </div>
                                 <div class="col-xs-12 col-sm-6 text-right">
                                    <a href="#" class="btn btn-primary">Details</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="GridLex-col-3_mdd-4_sm-6_xs-6_xss-12">
                        <div class="trip-guide-item">
                           <div class="trip-guide-image">
                              <img src="{!! url('images/trip/01.jpg') !!}" alt="images"/>
                           </div>
                           <div class="trip-guide-content">
                              <!----DOAN NAY TRO DI EM TAM THOI CHUA I18N------>
                              <h3>Hong Kong Best Highlight Explore</h3>
                              <p>Betrayed cheerful declared end and. Questions we additions is extremely
                                 incommode...
                              </p>
                           </div>
                           <div class="trip-guide-bottom">
                              <div class="trip-guide-person clearfix">
                                 <div class="image">
                                    <img src="{!! url('images/testimonial/01.jpg') !!}" class="img-circle"
                                         alt="images"/>
                                 </div>
                                 <p class="name">By: <a href="#">Robert Kalvin</a></p>
                                 <p>Local expert from Thailand</p>
                              </div>
                              <div class="trip-guide-meta row gap-10">
                                 <div class="col-xs-6 col-sm-6">
                                    <div class="rating-item">
                                       <input type="hidden" class="rating"
                                              data-filled="fa fa-star rating-rated"
                                              data-empty="fa fa-star-o" data-fractions="2" data-readonly
                                              value="4.5"/>
                                    </div>
                                 </div>
                                 <div class="col-xs-6 col-sm-6 text-right">
                                    5 days 4 nights
                                 </div>
                              </div>
                              <div class="row gap-10">
                                 <div class="col-xs-12 col-sm-6">
                                    <div class="trip-guide-price">
                                       Starting at
                                       <span class="number">USD687.00</span>
                                    </div>
                                 </div>
                                 <div class="col-xs-12 col-sm-6 text-right">
                                    <a href="#" class="btn btn-primary">Details</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="GridLex-col-3_mdd-4_sm-6_xs-6_xss-12">
                        <div class="trip-guide-item">
                           <div class="trip-guide-image">
                              <img src="{!! url('images/trip/01.jpg') !!}" alt="images"/>
                           </div>
                           <div class="trip-guide-content">
                              <h3>Bangkok-Pattaya Safari Adventure</h3>
                              <p>Savings her pleased are several started females met. Short her not among
                                 being any...
                              </p>
                           </div>
                           <div class="trip-guide-bottom">
                              <div class="trip-guide-person clearfix">
                                 <div class="image">
                                    <img src="{!! url('images/testimonial/01.jpg') !!}" class="img-circle"
                                         alt="images"/>
                                 </div>
                                 <p class="name">By: <a href="#">Robert Kalvin</a></p>
                                 <p>Local expert from Thailand</p>
                              </div>
                              <div class="trip-guide-meta row gap-10">
                                 <div class="col-xs-6 col-sm-6">
                                    <div class="rating-item">
                                       <input type="hidden" class="rating"
                                              data-filled="fa fa-star rating-rated"
                                              data-empty="fa fa-star-o" data-fractions="2" data-readonly
                                              value="4.5"/>
                                    </div>
                                 </div>
                                 <div class="col-xs-6 col-sm-6 text-right">
                                    5 days 4 nights
                                 </div>
                              </div>
                              <div class="row gap-10">
                                 <div class="col-xs-12 col-sm-6">
                                    <div class="trip-guide-price">
                                       Starting at
                                       <span class="number">USD687.00</span>
                                    </div>
                                 </div>
                                 <div class="col-xs-12 col-sm-6 text-right">
                                    <a href="#" class="btn btn-primary">Details</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@stop
