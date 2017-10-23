@extends('layouts.app')
@section('pageTitle', 'Thông tin cá nhân')
@section('content')
<div class="breadcrumb-image-bg pb-100 no-bg f-bg-image">
   <div class="container">
   </div>
</div>
<div class="pt-30 pb-50">
   <div class="container" id="user_page">
      <ul class="nav nav-tabs">
         <li class="active"><a data-toggle="tab" href="#home">{{ __('Edit profile') }}</a></li>
         <li><a data-toggle="tab" href="#menu1">{{ __('Your bluerint') }}</a></li>
         <li><a data-toggle="tab" href="#menu2">{{ __('Your blueprint request') }}</a></li>
         <li><a data-toggle="tab" href="#menu3">{{ __('Post') }}</a></li>
         <li><a data-toggle="tab" href="#menu4">{{ __('notifications') }}</a></li>
      </ul>
      <div class="tab-content">
         <h3 id="user_name">{!! Auth::user()->name !!}</h3>
         <p> <span class="label label-success">
            <i class="fa fa-check mr-3"></i>
            @if (Auth::user()->role == 1)
            {{ __('Quản trị') }}
            @else
            {{ __('Khách hàng') }}
            @endif
            </span>
         </p>
         <div id="home" class="tab-pane fade in active">
            <p>
            <ul class="user-meta">
               <li>
                  <i class="fa fa-question-circle" aria-hidden="true"></i>
                  {{ __('Số yêu cầu') }}: {{ Auth::user()->requests->count() }}
                  <span class="mh-5 text-muted">|</span>
                  <i class="fa fa-file" aria-hidden="true"></i>
                  {{ __('Số thiết kế') }}: {{ Auth::user()->blueprints->count() }}
                  <span class="mh-5 text-muted">|</span>
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  {{ __('Số bài viết') }}: {{ Auth::user()->posts->count() }}
               </li>
            </ul>
            </p>
            <form class="post-form-wrapper" method="POST" action="{{ route('profile-update') }}">
               {{ csrf_field() }}
               <div class="row gap-20">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>{{ __('Email') }}</label>
                        <input class="form-control" value="{{ Auth::user()->email }}" disabled>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>{{ __('Ngày tạo') }}</label>
                        <input class="form-control" value="{{ Auth::user()->created_at }}" disabled>
                     </div>
                  </div>
                  <div class="clear"></div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>{{ __('Tên hiển thị') }}</label>
                        <input name="name" type="text" class="form-control" placeholder="{{ __('Tên hiển thị...') }}"
                        @if (old('name')) value="{{ old('name') }}"
                        @else value="{{ Auth::user()->name }}"
                        @endif>
                        <p class="text-danger help-block error-text">{{ $errors->first('name') }}</p>
                     </div>
                  </div>
                  <div class="clear"></div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>{{ __('Địa chỉ') }}</label>
                        <input name="address" type="text" class="form-control" placeholder="{{ __('Địa chỉ...') }}"
                        @if (old('address')) value="{{ old('address') }}"
                        @else value="{{ Auth::user()->address }}"
                        @endif>
                        <p class="text-danger help-block error-text">{{ $errors->first('address') }}</p>
                     </div>
                  </div>
                  <div class="clear"></div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>{{ __('Điện thoại') }}</label>
                        <input name="phone" type="text" class="form-control" placeholder="{{ __('Điện thoại...') }}"
                        @if (old('phone')) value="{{ old('phone') }}"
                        @else value="{{ Auth::user()->phone }}"
                        @endif>
                        <p class="text-danger help-block error-text">{{ $errors->first('phone') }}</p>
                     </div>
                  </div>
                  <div class="clear mb-10"></div>
                  <div class="col-sm-12">
                     <button type="submit" class="btn btn-primary">{{ __('Cập nhật thông tin') }}</button>
                  </div>
               </div>
            </form>
         </div>
         <div id="menu1" class="tab-pane fade">
               @foreach($blueprits as $blueprint)
                  <div class="col-md-12 col-sm-12" id="{!! $blueprint->id !!}">
                  <div class="col-md-1">{!! $blueprint->id !!}</div>
                  <div class="col-md-7 qoute">
                     <p>
                        {!! $blueprint->title !!}
                     </p>
                  </div>
                  <div class="col-md-2">@if($blueprint->id != 0) {!! 'Pending' !!} @else {!! "Approve" !!} @endif</div>
                  <div class="col-md-2">
                     <a class="btn btn-sm btn-warning" href="{!! route('getViewBlueprint', [$blueprint->id]) !!}"><i class="fa fa-eye" aria-hidden="true"></i></a> 
                     <a class="btn btn-sm btn-info" href="{!! route('getUpdateBlueprint', [$blueprint->id]) !!}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
                     <button class="btn btn-sm btn-danger delete-request" value="{!! $blueprint->id !!}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                  </div>
               </div>
               @endforeach
         </div>
         <div id="menu2" class="tab-pane fade">
            <div class="container-fluid">
               <div class="col-md-12 col-sm-12">
                  <div class="col-md-1">{{ __('STT') }}</div>
                  <div class="col-md-7 qoute">{{ __('Title') }}</div>
                  <div class="col-md-2">{{ __('Status') }}</div>
                  <div class="col-md-2">{{ __('Action') }}</div>
               </div>
               @foreach($requestBlueprints as $requestBlueprint)
               <div class="col-md-12 col-sm-12" id="{!! $requestBlueprint->id !!}">
                  <div class="col-md-1">{!! $requestBlueprint->id !!}</div>
                  <div class="col-md-7 qoute">
                     <p>
                        {!! $requestBlueprint->description !!}
                     </p>
                  </div>
                  <div class="col-md-2">@if($requestBlueprint->id != 0) {!! 'Pending' !!} @else {!! "Approve" !!} @endif</div>
                  <div class="col-md-2">
                     <a class="btn btn-sm btn-info" href="{!! route('getEditRequest', [$requestBlueprint->id]) !!}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
                     <button class="btn btn-sm btn-danger delete-request" value="{!! $requestBlueprint->id !!}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
         <div id="menu3" class="tab-pane fade">
            <!-------TAM thoi chua I18n-------->
            <h3>Menu 3</h3>
            <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
         </div>
         <div id="menu4" class="tab-pane fade">
            <!-------Tam thoi chua I18n-------->
            <h3>Menu 3</h3>
            <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
         </div>
      </div>
   </div>
</div>
@endsection
