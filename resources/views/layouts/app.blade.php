<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="_token" content="{{csrf_token()}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MYCMS') }}</title>


    <!-- Fonts -->
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/panel.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        
        @include('fragments.nav')

        <main class="py-4">
            <div class="container">
                @include('fragments.message')
                @include('fragments.errors')
                @include('fragments.are_you_sure')
            </div>
            <div class="bg-white py-4 container">
                @yield('content')
            </div>
        </main>
    </div>

        <!-- Scripts -->
        <script> documentRoot =  "{{url("/")}}" </script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/panel.js') }}"></script>
</body>
</html>
