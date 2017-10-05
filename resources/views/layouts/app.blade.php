<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" href="images/ico/favicon.png">

    {{ HTML::style('bowerrc/bootstrap/dist/css/bootstrap.min.css') }}
    {{ HTML::style('css/main.css') }}
    {{ HTML::style('css/plugin.css') }}
    {{ HTML::style('css/style.css') }}
    {{ HTML::style('css/custom.css') }}

    {{ HTML::script('bowerrc/jquery/dist/jquery.min.js') }}
    {{ HTML::script('bowerrc/jquery-migrate-3.0.1/index.js') }}

    @yield('style')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('pageTitle')</title>
</head>
<body class="home transparent-header">
    {{--  <div id="introLoader" class="introLoading"></div>  --}}

    <div class="container-wrapper">
        @include('layouts.header')

        <div class="main-wrapper scrollspy-container">
            @yield('content')
        </div>

        @include('layouts.footer')
    </div>

    @include('layouts.login')
    @include('layouts.signup')
    @include('layouts.forgot_password')

    @if (session('error_msg') || $errors->first('form_error') != null)
        @include('layouts.error')
    @endif

    @if (session('success_msg')))
        @include('layouts.success')
    @endif

    {{ HTML::script('js/core-plugins.js') }}
    {{ HTML::script('js/customs.js') }}
    {{ HTML::script('js/loading.js') }}

    @yield('script')
</body>
</html>
