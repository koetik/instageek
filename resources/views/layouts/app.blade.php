<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/semantic.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/instageek.css') }}" rel="stylesheet">
</head>
<body>
    @if(Route::currentRouteName() != 'login' && Route::currentRouteName() != 'register')
        @include('layouts.header')
    @endif
    @yield('content')
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/semantic.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.main.menu').visibility({
                type: 'fixed'
            });

            $('.overlay').visibility({
                type: 'fixed',
                offset: 80
            });

            $('.image').visibility({
                type: 'image',
                transition: 'vertical flip in',
                duration: 500
            });

            $('.main.menu  .ui.dropdown').dropdown({
                on: 'hover'
            });
        });
    </script>
    @stack('script')
</body>
</html>
