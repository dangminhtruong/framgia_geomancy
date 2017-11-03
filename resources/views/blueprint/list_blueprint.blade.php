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
      <div class="filter-full-width-wrapper">
         <form class="">
            <div class="filter-full-primary">
               <div class="container">
                  <div class="filter-full-primary-inner">
                     <div class="form-holder">
                        <div class="row">
                           <div class="col-xs-12 col-sm-12 col-md-6">
                              <div class="filter-item-wrapper">
                                 <div class="row">
                                    <div class="col-xss-12 col-xs-6 col-sm-5">
                                       <div class="filter-item mmr">
                                          <div class="input-group input-group-addon-icon no-border no-br-xs">
                                             <div class="input-group dropdown" id="result-dropdown">
                                                <input type="text" class="form-control dropdown-toggle" id="nav-search" data-toggle="dropdown" placeholder="{{ __('Tìm kiếm') }}">
                                                <ul class="dropdown-menu" id="nav-serch-result">
                                                </ul>
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
            </div>
         </form>
      </div>
      <div class="pt-30 pb-50">
         <div class="container">
            <div class="trip-guide-wrapper">
               <div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">
                  <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-center">
                     @foreach($listBlueprint as $blueprint)
                        <div class="GridLex-col-3_mdd-4_sm-6_xs-6_xss-12">
                           <div class="trip-guide-item">
                              <div class="trip-guide-image">
                                 @if(isset($blueprint->gallery->first()->image_name))
                                    <img src="{!! url('images/gallery', [$blueprint->gallery->first()->image_name]) !!}" alt="images" />
                                 @else
                                    <img src="{!! url('images/gallery/heroes.jpg') !!}" class="" alt="images" />
                                 @endif
                              </div>
                              <div class="trip-guide-content">
                                 <h3>{!! $blueprint->title !!}</h3>
                                 <p class="blueprint-description">{!! $blueprint->description !!}</p>
                              </div>
                              <div class="trip-guide-bottom">
                                 <div class="trip-guide-person clearfix">
                                    <div class="image">
                                       <img src="{!! url('images/user.jpg') !!}" class="img-circle" alt="images" />
                                    </div>
                                    <p class="name">By: <a href="{{ route('other-profile', [$blueprint->user->id]) }}">
                                          {!! $blueprint->user->name !!}
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
                                       <a href="{!! route('getViewBlueprint',[$blueprint->id]) !!}" class="btn btn-primary">Details</a>
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
                        <b> {{ $listBlueprint->firstItem() }} </b>
                        {{ __('to blueprint') }}
                        <b> {{ $listBlueprint->lastItem() }} </b>
                        {{ __('of') }}
                        <b> {{ $listBlueprint->total() }} </b>
                     </p>
                  </div>
                  <div class="clearfix">
                     {!! $listBlueprint->links() !!}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@stop
