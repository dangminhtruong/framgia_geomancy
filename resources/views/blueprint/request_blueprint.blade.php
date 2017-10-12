@extends('layouts.app')
@section('content')
<div class="hero img-bg-01">
</div>
<div class="container">
   <div class="col-md-8 form_request_bblueprint">
      @if(count($errors) > 0)
      <div class="col-md-12">
         @foreach($errors->all() as $error)
         <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{!! $error !!}</strong>
         </div>
         @endforeach
      </div>
      @endif
      <form method="post" action="#">
         <input type="hidden" name="_token" value="{!! csrf_token() !!}">
         <div class="form-group">
            <label for="example-date-input" class="col-2 col-form-label">{{ __('Form.Descriptions') }}</label>
            <div class="col-10">
               <textarea class="form-control" id="DescriptionsTextArea" name="customer_description" rows="15"
                  required></textarea>
            </div>
         </div>

         <div class="form-group">
            <div class="col-md-2 row">
               <button type="submit" class="btn btn-success">Submit</button>
            </div>
         </div>
   </div>
   </form>
   <div class="col-md-4">
      <div class="col-md-12 intro_service">
         <div class="col-md-12 col-md-push-4">
            <i class="fa fa-trophy fa-3x" aria-hidden="true"></i>
         </div>
         <div class="col-md-12 intro_service_detail">
            <i class="fa fa-check" aria-hidden="true"> </i>
            Something about ours service.
         </div>
         <div class="col-md-12 intro_service_detail">
            <i class="fa fa-check " aria-hidden="true"></i>
            Something about ours service.
         </div>
         <div class="col-md-12 intro_service_detail">
            <i class="fa fa-check" aria-hidden="true"></i>
            Something about ours service.
         </div>
         <div class="col-md-12 intro_service_detail">
            <i class="fa fa-check" aria-hidden="true"></i>
            Something about ours service.
         </div>
         <div class="col-md-12 intro_service_detail">
            <i class="fa fa-check" aria-hidden="true"></i>
            Something about ours service.
         </div>
      </div>
      <div class="col-md-12">
         <div class="col-md-12 intro_service_detail">
            <b> {{ __('Request.Blueprint') }} </b>
         </div>
         <div class="col-md-12">
            <img class="img-responsive" src="images/ico/ico01.png">
         </div>
         <div class="col-md-12">
            Require fish tank blueprint
         </div>
         <div class="col-md-12">
            <img class="img-responsive" src="images/ico/ico03.png">
         </div>
         <div class="col-md-12">
            Choice the worker
         </div>
         <div class="col-md-12">
            <img class="img-responsive" src="images/ico/ico02.png">
         </div>
         <div class="col-md-12">
            Payments
         </div>
      </div>
   </div>
</div>
@stop
