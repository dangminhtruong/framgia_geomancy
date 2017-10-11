<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>
        {{ HTML::style('bowerrc/framgia_geomancy_fonts/Roboto/Roboto.css') }}
        {{ HTML::style('bowerrc/font-awesome/css/font-awesome.min.css') }}
        {{ HTML::style('bowerrc/animate.css/animate.min.css') }}
        {{ HTML::style('bowerrc/bootstrap/dist/css/bootstrap.min.css') }}
        {{ HTML::style('bowerrc/toastr/toastr.min.css') }}
        {{ HTML::style('css/pe-icons/pe-icon-7-stroke.css') }}
        {{ HTML::style('css/pe-icons/helper.css') }}
        {{ HTML::style('css/stroke-icons/style.css') }}
        {{ HTML::style('css/admin.css') }}
        <script>
            var SITE_URL = 'http://localhost:8000/';
        </script>
        @yield('style')
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ __('Trang quản trị') }}</title>
    </head>
    <body>
        <div class="wrapper">
            @include('admin.layouts.header')
            @include('admin.layouts.nav')
            <section class="content">
                @yield('content')
            </section>
        </div>
        {{ HTML::script('bowerrc/PACE/pace.min.js') }}
        {{ HTML::script('bowerrc/jquery/dist/jquery.min.js') }}
        {{ HTML::script('bowerrc/jquery-migrate-3.0.1/index.js') }}
        {{ HTML::script('bowerrc/bootstrap/dist/js/bootstrap.min.js') }}
        {{ HTML::script('bowerrc/toastr/toastr.min.js') }}
        @yield('script')
        {{ HTML::script('js/luna.js') }}
    </body>
</html>
