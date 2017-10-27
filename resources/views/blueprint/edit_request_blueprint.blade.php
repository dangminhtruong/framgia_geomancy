@extends('layouts.app')
@section('content')
   <div class="hero img-bg-01"></div>
   <div class="container request-blueprint">
      <div class="col-md-8 form_request_bblueprint">
         <form method="post" action="{!! route('postEditRequest', [$requestBlueprint->id]) !!}">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group">
               <label for="example-date-input" class="col-2 col-form-label">{{ __('Title') }}</label>
               <div class="col-10">
               <textarea class="form-control" id="" name="request_blueprint_title" rows="2"
                         required>{!! $requestBlueprint->title !!}</textarea>
                  <p class="text-danger help-block error-text">
                     {{ $errors->first('request_blueprint_title') }}
                  </p>
               </div>
            </div>
            <div class="form-group">
               <label for="example-date-input" class="col-2 col-form-label">{{ __('Form.Descriptions') }}</label>
               <div class="col-10">
               <textarea class="form-control" id="edit_description" name="edit_description" rows="15"
                         required>{!! $requestBlueprint->description !!}</textarea>
               </div>
            </div>
            <div class="form-group">
               <div class="col-md-2 row">
                  <button type="submit" class="btn btn-warning">Submit</button>
               </div>
            </div>
      </div>
      </form>
      <div class="col-md-4 left-intro-request">
         <div class="col-md-12 intro_service">
            <div class="col-md-12 col-md-push-4">
               <i class="fa fa-trophy fa-3x" aria-hidden="true"></i>
            </div>
            <div class="col-md-12 intro_service_detail">
               <i class="fa fa-check" aria-hidden="true"> </i>
               {{ __('Something about ours service') }}.
            </div>
            <div class="col-md-12 intro_service_detail">
               <i class="fa fa-check " aria-hidden="true"></i>
               {{ __('Something about ours service') }}.
            </div>
            <div class="col-md-12 intro_service_detail">
               <i class="fa fa-check" aria-hidden="true"></i>
               {{ __('Something about ours service') }}.
            </div>
            <div class="col-md-12 intro_service_detail">
               <i class="fa fa-check" aria-hidden="true"></i>
               {{ __('Something about ours service') }}.
            </div>
            <div class="col-md-12 intro_service_detail">
               <i class="fa fa-check" aria-hidden="true"></i>
               {{ __('Something about ours service') }}.
            </div>
         </div>
         <div class="col-md-12">
            <div class="col-md-12 intro_service_detail">
               <b> {{ __('Request.Blueprint') }} </b>
            </div>
            <div class="col-md-12">
               <img class="img-responsive" src="{!! url('images/ico/ico01.png') !!}">
            </div>
            <div class="col-md-12">
               {{ __('Require fish tank blueprint') }}
            </div>
            <div class="col-md-12">
               <img class="img-responsive" src="{!! url('images/ico/ico03.png') !!}">
            </div>
            <div class="col-md-12">
               {{ __('Choice the suggest') }}
            </div>
            <div class="col-md-12">
               <img class="img-responsive" src="{!! url('images/ico/ico02.png') !!}">
            </div>
            <div class="col-md-12">
               {{ __('Payments') }}
            </div>
         </div>
      </div>
   </div>
@stop
