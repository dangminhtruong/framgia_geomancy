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
            <li><a data-toggle="tab" href="#menu5">{{ __('Your forked bluerint') }}</a></li>
            <li><a data-toggle="tab" href="#menu2">{{ __('Your blueprint request') }}</a></li>
            <li><a data-toggle="tab" href="#menu3">{{ __('Post') }}</a></li>
            <li><a data-toggle="tab" href="#menu4">{{ __('Notifications') }}</a></li>
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
                     {{ __('Số thiết kế') }}: {{ Auth::user()->blueprints()->where('status', '<>', 2)->count() }}
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
               <div class="col-md-12 col-sm-12">
                  <div class="col-md-1">{{ __('STT') }}</div>
                  <div class="col-md-7 qoute">{{ __('Title') }}</div>
                  <div class="col-md-2">{{ __('Status') }}</div>
                  <div class="col-md-2">{{ __('Action') }}</div>
               </div>
               @foreach($blueprits as $blueprint)
                  <div class="col-md-12 col-sm-12" id="blueprint{!! $blueprint->id !!}">
                     <div class="col-md-1">{!! $blueprint->id !!}</div>
                     <div class="col-md-7 qoute">
                        <p>
                           {!! $blueprint->title !!}
                        </p>
                     </div>
                     <div class="col-md-2">@if($blueprint->publish_flg) {!! __('Pending') !!} @else {!! __('Approve') !!} @endif</div>
                     <div class="col-md-2">
                        <a class="btn btn-sm btn-warning" href="{!! route('getViewBlueprint', [$blueprint->id]) !!}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a class="btn btn-sm btn-info" href="{!! route('getUpdateBlueprint', [$blueprint->id]) !!}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <button class="btn btn-sm btn-danger delete-blueprint" value="{!! $blueprint->id !!}"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
                              {!! $requestBlueprint->title !!}
                           </p>
                        </div>
                        <div class="col-md-2">@if($requestBlueprint->id != 0) {!! __('Pending') !!} @else {!! __('Approve') !!} @endif</div>
                        <div class="col-md-2">
                           <a class="btn btn-sm btn-info" href="{!! route('getEditRequest', [$requestBlueprint->id]) !!}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                           <button class="btn btn-sm btn-danger delete-request" value="{!! $requestBlueprint->id !!}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </div>
                     </div>
                  @endforeach
               </div>
            </div>
            <div id="menu3" class="tab-pane fade">
               <div class="col-md-12 col-sm-12">
                  <div class="col-md-1">{{ __('STT') }}</div>
                  <div class="col-md-7 qoute">{{ __('Title') }}</div>
                  <div class="col-md-2">{{ __('Status') }}</div>
                  <div class="col-md-2">{{ __('Action') }}</div>
               </div>
               @foreach(Auth::user()->posts as $post)
                  <div class="col-md-12 col-sm-12">
                     <div class="col-md-1">{{ $post->id }}</div>
                     <div class="col-md-6 qoute">{{ $post->title }}</div>
                     <div class="col-md-2">
                        @if($post->publish_flg == 0)
                           <span id="publish{!! $post->id !!}">{{ __('Unpublish') }}</span><br/>
                           <label class="switch">
                              <input type="checkbox" class="pusblish_status" value="{!! $post->id !!}">
                              <span class="slider round"></span>
                           </label>
                        @else
                           <span id="publish{!! $post->id !!}">{{ __('Published') }}</span><br/>
                           <label class="switch">
                              <input type="checkbox" class="pusblish_status" checked value="{!! $post->id !!}">
                              <span class="slider round"></span>
                           </label>
                        @endif
                     </div>
                     <div class="col-md-3">
                        <button type="button" class="btn btn-info btn-xs" value="{{ $post->id }}">
                           {{ __('View') }}
                        </button>
                        <button type="button" class="btn btn-warning btn-xs" value="{{ $post->id }}">
                           {{ __('Edit') }}
                        </button>
                        <button type="button" class="btn btn-danger btn-xs" value="{{ $post->id }}">
                           {{ __('Delete') }}
                        </button>
                     </div>
                  </div>
               @endforeach
            </div>
            <div id="menu4" class="tab-pane fade">
               @foreach(Auth::user()->requestNotifies->where('view_flg', 0) as $notifi)
                  <div class="col-md-12 col-sm-12 pull-left">
                     <div class="col-md-3">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <b>{{ $notifi->user->name }}</b>
                        <p class="vertical-date pull-right">
                           <small><b>{{ $notifi->created_at }}</b></small>
                        </p>
                     </div>
                     <div class="col-md-6">
                        <b>{{ $notifi->message }}</b>
                     </div>
                     <div class="col-md-3 text_left">
                        <button class="btn btn-link btn-xs"><a href="{{ route('viewRequestMessage', [$notifi->request_id]) }}"><b>{{ __('Xem') }}</b></a></button>
                     </div>
                  </div>
               @endforeach
               @foreach(Auth::user()->requestNotifies->where('view_flg', 1)->take(10) as $notifi)
                  <div class="col-md-12 col-sm-12">
                     <div class="col-md-3">
                        <i class="fa fa-envelope-open-o" aria-hidden="true"></i>
                        {{ $notifi->user->name }}
                        <p class="vertical-date pull-right">
                           <small>{{ $notifi->created_at }}</small>
                        </p>
                     </div>
                     <div class="col-md-6">
                        {{ $notifi->message }}
                     </div>
                     <div class="col-md-3">
                        <button class="btn btn-link btn-xs"><a href="{{ route('viewRequestMessage', [$notifi->request_id]) }}"><b>{{ __('Xem') }}</b></a></button>
                     </div>
                  </div>
               @endforeach
            </div>
            <div id="menu5" class="tab-pane fade">
               <div class="col-md-12 col-sm-12">
                  <div class="col-md-1">{{ __('STT') }}</div>
                  <div class="col-md-7 qoute">{{ __('Title') }}</div>
                  <div class="col-md-2">{{ __('Status') }}</div>
                  <div class="col-md-2">{{ __('Action') }}</div>
               </div>
               @foreach(Auth::user()->improves->where('status', '!=', 2) as $forkedBlueprint)
                  <div class="col-md-12 col-sm-12" id="improveBlueprint{!! $forkedBlueprint->id !!}">
                     <div class="col-md-1">{!! $forkedBlueprint->id !!}</div>
                     <div class="col-md-7 qoute">
                        <p>
                           {!! $forkedBlueprint->blueprint->title !!}
                        </p>
                     </div>
                     <div class="col-md-2">@if($forkedBlueprint->id != 0) {!! __('Pending') !!} @else {!! __('Approve') !!} @endif</div>
                     <div class="col-md-2">
                        <a class="btn btn-sm btn-warning" href="{!! route('viewForkedBlueprint', [$forkedBlueprint->id]) !!}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a class="btn btn-sm btn-info" href="{!! route('viewEditForkedBlueprint', [$forkedBlueprint->id]) !!}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <button class="btn btn-sm btn-danger delete-improve-blueprint" value="{!! $forkedBlueprint->id !!}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                     </div>
                  </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>
@endsection
