@extends('layouts.app')
@section('content')
    <div class="pb-100"></div>
    <div class="pt-50 pb-50" id="create_done">
        <div class="container">
            <div class="create-done-wrapper">
                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                        <div class="icon">
                            <div class="icon-inner">
                                <i class="ti-check"></i>
                            </div>
                        </div>
                        <h1 class="text-lowercase">{{ __('CreateBlueprint.Done.Congrat') }}!</h1>
                        <p class="lead">{{ __('CreateBlueprint.Done.Alert') }}</p>
                        <h3>{{ __('CreateBlueprint.Done.Guid') }}</h3>
                        <a href="{!! route('getUpdateBlueprint', [$id]) !!}"
                           class="btn btn-primary btn-wide">{{ __('Edit') }}</a>
                        <a href="{!! route('getViewBlueprint', [$id]) !!}"
                           class="btn btn-primary btn-wide btn-border">{{ __('View') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
