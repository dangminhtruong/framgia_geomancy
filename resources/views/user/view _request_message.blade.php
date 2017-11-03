@extends('layouts.app')
@section('pageTitle', 'Thông tin cá nhân')
@section('content')
<div class="breadcrumb-image-bg pb-100 no-bg f-bg-image">
   <div class="container">
   </div>
</div>
<div>
   <div class="pt-30 pb-50">
      <div class="container" id="user_page">
         <div class="col-md-12" id="request-message-top">
            <div class="row">
               <div class="col-md-6">
                  @if ($requestBlueprint->status == 0)
                     <p class="label label-new">
                        {{ __('Mới') }}
                     </p>
                  @elseif ($requestBlueprint->status == 1)
                     <p class="label label-default">
                        {{ __('Đã duyệt') }}
                     </p>
                  @else
                     <p class="label label-accent">
                        {{ __('Đang đợi') }}
                     </p>
                  @endif
                  <h5 class="m-t-xs m-b-none">
                     {{ __('Tiêu đề: ') }}
                     <span class="mx-width">{{ $requestBlueprint->title }}</span>
                  </h5>
               </div>
               <div class="col-md-3">
                  <table class="table small m-t-sm">
                     <tbody>
                        <tr>
                           <td>
                              {{ __('Ngày tạo: ') }}
                              <strong class="c-white">{{ $requestBlueprint->created_at }}</strong>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              {{ __('Ngày cập nhật: ') }}
                              <strong class="c-white">{{ $requestBlueprint->updated_at }}</strong>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <div class="col-md-3 m-t-sm">
                  {{ __('Người tạo: ') }}
                  <span class="c-white">
                  <a href="#">{{ $requestBlueprint->user->name }}</a>
                  </span>
                  <br>
                  <small>
                  {{ __('Tổng số yêu cầu đã tạo: ') . $requestBlueprint->user->requests()->count() }}
                  </small>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-4" id="request-details-message">
               <div class="col-md-12" id="message-title">
                  <b>{{ __('Tin nhắn') }}</b>
               </div>
               <div class="col-md-12">
                  <div class="chat" id="buble-me">
                     @foreach($requestBlueprint->requestNotify as $notify)
                        @if($notify->users_id == Auth::user()->id)
                           <div class="col-md-12 col-sm-12">
                              <div class="bubble you">
                                 <h6>
                                    {{ __('Tôi') }}
                                    <p class="create_at">{{ $notify->created_at }}</p>
                                 </h6>
                                 {{ $notify->message }}
                              </div>
                           </div>
                        @else
                           <div class="col-md-12 col-sm-12">
                              <div class="bubble me">
                                 <h6>
                                    {{ $notify->user->name }}
                                    <p class="create_at">{{ $notify->created_at }}</p>
                                 </h6>
                                 {{ $notify->message }}
                              </div>
                           </div>
                        @endif
                     @endforeach
                  </div>
               </div>
               <div class="col-md-12 bubble you" id="reply-input">
                  <textarea class="form-control" rows="3" id="request-reply"></textarea><br/>
                  <button class="btn btn-info btn-sm btn-reply" value="{{ $requestBlueprint->id }}">{{ __('Trả lời') }}</button>
               </div>
            </div>
            <div class="col-md-8" id="detail-title">
               <div class="col-md-10 pull-right container" id="request-details">
                  <div class="col-md-12">
                     <b>{{ __('Chi tiết') }}</b>
                  </div>
                  <div class="col-md-12">
                     {!! $requestBlueprint->description !!}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
