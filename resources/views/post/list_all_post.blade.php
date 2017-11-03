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
                     @foreach($allPost as $post)
                        <div class="GridLex-col-3_mdd-4_sm-6_xs-6_xss-12">
                           <div class="trip-guide-item">
                              <div class="trip-guide-content list_post_content">
                                 <h3>{!! $post->title !!}</h3>
                                 <p class="blueprint-description">{!! $post->body !!}</p>
                              </div>
                              <div class="trip-guide-bottom">
                                 <div class="trip-guide-person clearfix">
                                    <div class="image">
                                       <img src="{!! url('images/user.jpg') !!}" class="img-circle" alt="images" />
                                    </div>
                                    <p class="name">{{ __('By') }}: <a href="{{ route('other-profile', [$post->user->id]) }}">
                                          {!! $post->user->name !!}
                                       </a>
                                    </p>
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
                                       <a href="{!! route('viewpost',[$post->id]) !!}" class="btn btn-primary">Details</a>
                                    </div>
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
                        <b> {{ $allPost->firstItem() }} </b>
                        {{ __('to blueprint') }}
                        <b> {{ $allPost->lastItem() }} </b>
                        {{ __('of') }}
                        <b> {{ $allPost->total() }} </b>
                     </p>
                  </div>
                  <div class="clearfix">
                     {!! $allPost->links() !!}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@stop
