@extends('layouts.app')
@section('content')
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
   <form method="post" action="form_infor_request">
      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
      <div class="form-group">
         <label for="example-text-input" class="col-2 col-form-label">{{ __('Form.FullName')}}</label>
         <div class="col-10">
            <input class="form-control" type="text" name="customer_name" required>
         </div>
      </div>
      <div class="form-group">
         <label for="example-search-input" class="col-2 col-form-label">{{ __('Form.Address') }}</label>
         <div class="col-10">
            <input class="form-control" type="text" value="" name="customer_address" required>
         </div>
      </div>
      <div class="form-group">
         <label for="example-email-input" class="col-2 col-form-label">{{ __('Form.Phone') }}</label>
         <div class="col-10">
            <input class="form-control" type="tel" name="customer_phone" required>
         </div>
      </div>
      <div class="form-group">
         <label for="example-email-input" class="col-2 col-form-label">Email</label>
         <div class="col-10">
            <input class="form-control" type="email" name="customer_email">
         </div>
      </div>
      <div class="form-group">
         <label for="example-date-input" class="col-2 col-form-label">{{ __('Form.Descriptions') }}</label>
         <div class="col-10">
            <textarea class="form-control" id="DescriptionsTextArea" name="customer_description" rows="15"
               required></textarea>
         </div>
      </div>
      <div class="form-group">
         <label for="example-email-input" class="col-2 col-form-label">Password</label>
         <div class="col-10">
            <input class="form-control" type="tel" name="customer_password">
         </div>
      </div>
      <div class="form-group">
         <label for="example-email-input" class="col-2 col-form-label">{{ __('Form.RetypePass') }}</label>
         <div class="col-10">
            <input class="form-control" type="tel" name="customer_retype_password">
         </div>
      </div>
      <div class="form-group">
         <div class="col-md-2 row">
            <button type="submit" class="btn btn-success">Submit</button>
         </div>
         <div class="col-md-10">
            <button class="btn btn-link">{{ __('Form.UserExits') }}</button>
            <a data-toggle="modal" href="#loginModal"><b>Login</b></a>
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
@stop
