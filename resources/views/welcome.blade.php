@extends('layouts.app')
@section('pageTitle', 'Home')
@section('content')
   <div class="hero img-bg-01">
      <div class="container">
         <h1>Framgia Geomancy</h1>
      </div>
   </div>
   <div class="post-hero clearfix">
      <div class="container">
         <div class="row">
            <div class="col-xs-12 col-sm-4 mb-20-xs">
               <div class="horizontal-featured-icon-sm clearfix">
                  <div class="icon"><i class="ri ri-location"></i></div>
                  <div class="content">
                     <h6>{{ __('Looking for a blueprint ') }} ?</h6>
                     <span>{{ __('Ours wokers will help you design somethings cold') }}...</span>
                  </div>
               </div>
            </div>
            <div class="col-xs-12 col-sm-4 mb-20-xs">
               <div class="horizontal-featured-icon-sm clearfix">
                  <div class="icon"> <i class="ri ri-user"></i></div>
                  <div class="content">
                     <h6>{{ __('Need someone have experience') }}?</h6>
                     <span>{{  __('Yeah, Each ours workers have least 5 years working on this job') }}...</span>
                  </div>
               </div>
            </div>
            <div class="col-xs-12 col-sm-4 mb-20-xs">
               <div class="horizontal-featured-icon-sm clearfix">
                  <div class="icon"> <i class="ri ri-equal-circle"></i></div>
                  <div class="content">
                     <h6>{{ __('Want to share your idea') }}?</h6>
                     <span>{{ __('Let\'s do it. Just make create blueprint then share it') }}... </span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container pt-70 pb-60 clearfix">
      <div class="row">
         <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <div class="section-title">
               <h2>{{ __('Top newest blueprint') }}</h2>
            </div>
         </div>
      </div>
      <div class="mb-30">
         <div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">
            <div class="GridLex-grid-noGutter-equalHeight">
               @foreach($sixNewestBlueprint as $blueprint)
                  <div class="GridLex-col-4_sm-4_xs-6_xss-12">
                     <div class="top-destination-item">
                        <a href="{!! route('getViewBlueprint', [$blueprint->id])  !!}">
                           <div class="image">
                              @if(isset($blueprint->gallery->first()->image_name))
                                 <img src="{!! url('images/gallery', [$blueprint->gallery()->first()->image_name]) !!}" alt="images" class="index_blueprint_new" />
                              @else 
                                 <img src="{!! url('images/gallery/heroes.jpg') !!}" alt="images" class="index_blueprint_new"/>
                              @endif
                           </div>
                           <h4 class="uppercase"><span>{{ __('News') }}</span></h4>
                           <p>{!! $blueprint->title !!}</p>
                        </a>
                     </div>
                  </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>
   <div class="bg-white pt-70 pb-60 clearfix">
      <div class="container">
         <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
               <div class="section-title">
                  <h2>{{ __('Newest products') }}</h2>
                  <p class="lead">{{  __('The products that we just update') }}...</p>
               </div>
            </div>
         </div>
         <div class="trip-guide-wrapper mb-30">
            <div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">
               <div class="GridLex-grid-noGutter-equalHeight">
                  @foreach($sixNewestProduct as $product)
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
      </div>
   </div>
   <div class="clearfix">
      <div class="container pt-70 pb-80">
         <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
               <div class="section-title">
                  <h2>{{ __('How It Works') }}</h2>
                  <p class="lead">{{  __('The blueprint requests that you are looking for wokers or experts for them') }}...</p>
               </div>
            </div>
         </div>
         <div class="GridLex-gap-30 GridLex-gap-20-mdd GridLex-gap-10-xs alt-number-color ">
            <div class="GridLex-grid-noGutter-equalHeight">
               <div class="GridLex-col-4_sm-4_xs-12">
                  <div class="how-it-work-item clearfix">
                     <div class="icon">
                        <i class="icon-note"></i>
                     </div>
                     <div class="content">
                        <span class="number">01.</span>
                        <h3>{{ __('Request a blueprint') }}</h3>
                        <p class="line-1-45">{{ __('If you want a blueprint for you house or etc, just request a blueprint') }}.</p>
                     </div>
                  </div>
               </div>
               <div class="GridLex-col-4_sm-4_xs-12">
                  <div class="how-it-work-item clearfix">
                     <div class="icon">
                        <i class="icon-cloud-upload"></i>
                     </div>
                     <div class="content">
                        <span class="number">02.</span>
                        <h3>{{ __('Publish your request blueprint') }}</h3>
                        <p class="line-1-45">{{ __('With ours worker, we will recomende for your best blueprint follow what you requested') }}.</p>
                     </div>
                  </div>
               </div>
               <div class="GridLex-col-4_sm-4_xs-12">
                  <div class="how-it-work-item clearfix">
                     <div class="icon">
                        <i class="icon-speech"></i>
                     </div>
                     <div class="content">
                        <span class="number">03.</span>
                        <h3>{{ __('Payments') }}</h3>
                        <p class="line-1-45">{{ __('Yeah, now you have your blueprint, left things you need just acept paymanet then you got it') }}.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="featured-bg pt-80 pb-60 img-bg-02">
      <div class="container">
         <div class="row">
            <div class="col-md-10 col-md-offset-1">
               <div class="row gap-0">
                  <div class="col-xss-6 col-xs-6 col-sm-3">
                     <div class="counting-item">
                        <div class="icon">
                           <i class="fa fa-product-hunt" aria-hidden="true"></i>
                        </div>
                        <p class="number">{!!$productSummary !!}</p>
                        <p>{{ __('Products') }}</p>
                     </div>
                  </div>
                  <div class="col-xss-6 col-xs-6 col-sm-3">
                     <div class="counting-item">
                        <div class="icon">
                           <i class="fa fa-check-square-o" aria-hidden="true"></i>
                        </div>
                        <p class="number">{!! $blueprintSummary !!}</p>
                        <p>{{ __('Nav.Blueprints') }}</p>
                     </div>
                  </div>
                  <div class="col-xss-6 col-xs-6 col-sm-3">
                     <div class="counting-item">
                        <div class="icon">
                           <i class="fa fa-diamond" aria-hidden="true"></i>
                        </div>
                        <p class="number">{!! $topicSummary !!}</p>
                        <p>{{ __('CreateBlueprint.Topic') }}</p>
                     </div>
                  </div>
                  <div class="col-xss-6 col-xs-6 col-sm-3">
                     <div class="counting-item">
                        <div class="icon">
                           <i class="icon-envelope-letter"></i>
                        </div>
                        <p class="number">{!! $requestSummary !!}</p>
                        <p>{{ __('Requests') }}</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row mt-70">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
               <div class="fearured-join-item mb-0">
                  <h2 class="alt-font-size">{{ __('You have a idea') }} ?</h2>
                  <p class="mb-25 font20">{{ __('Create a blueprint about what you care then publish you idea for everyone enjoy') }}....</p>
                  <a href="{!! route('getCreateBlueprint') !!}" class="btn btn-primary btn-lg">{{ __('Create blueprint') }}</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="bg-white">
      <div class="pt-70 pb-60 max-width-wrapper">
         <div class="container">
            <div class="row">
               <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                  <div class="section-title">
                     <h2>{{ __('Top post') }}</h2>
                  </div>
               </div>
            </div>
         </div>
         <div class="community-wrapper mb-30">
            <div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">
               <div class="GridLex-grid-noGutter-equalHeight">
                  @foreach($newestPost as $post)
                     <div class="GridLex-col-3_mdd-6_sm-6_xs-6_xss-12">
                        <a href="#" class="community-item">
                           <div class="image-object-fit image-object-fit-cover image">
                              <img src="{!! url('images/blog/01.jpg') !!}" alt="images" />
                           </div>
                           <div class="community-item-category"><span class="bg-danger"><i class="fa fa-pencil" aria-hidden="true"></i></span></div>
                           <div class="community-item-caption">
                              <h3>{!! $post->title !!}</h3>
                              <div class="community-item-meta">
                                 <div class="row gap-10">
                                    <div class="col-xs-8 col-sm-8">
                                       {{ __('By') }} {!! $post->user->name !!} <br/>on {{ $post->created_at }}
                                    </div>
                                    <div class="col-xs-4 col-sm-4 text-right">
                                       {{ __('created_at') }} <i class="icon-arrow-right-circle font12"></i>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </a>
                     </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
