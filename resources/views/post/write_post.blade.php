@extends('layouts.app')
@section('content')
   <div class="hero img-bg-01"></div>
   <div class="container request-blueprint">
      <div class="col-md-2"></div>
      <div class="col-md-8 form_request_bblueprint">
         <form method="post" action="{{ route('postWritePost') }}">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group">
               <label for="sel1">{{ __('Chủ đề bài viết') }}:</label>
               <select class="form-control" id="sel1" name="post_type">
                  @foreach($allType as $type)
                     <option>{{ $type->name }}</option>
                  @endforeach
               </select>
            </div>
            <div class="form-group">
               <label for="example-date-input" class="col-2 col-form-label">{{ __('Title') }}</label>
               <div class="col-10">
               <textarea class="form-control" id="" name="post_title" rows="2" required>
               		{{ (old('post_title')) ? old('post_title') : null }}
               </textarea>
                  <p class="text-danger help-block error-text">
                     {{ $errors->first('post_title') }}
                  </p>
               </div>
            </div>
            <div class="form-group">
               <label for="example-date-input" class="col-2 col-form-label">{{ __('Form.Descriptions') }}</label>
               <div class="col-10">
               <textarea class="form-control" id="post_content" name="post_content" rows="15" required>
               {{ (old('post_content')) ? old('post_content') : null }}
               </textarea>
               </div>
            </div>
            <div class="form-group">
               <div class="col-md-2 row">
                  <button type="submit" class="btn btn-warning">{{ __('Submit') }}</button>
               </div>
            </div>
      </div>
      <div class="col-md-2"></div>
      </form>
   </div>
@stop
