<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME','laravel')}} @yield('title')</title>
    <link rel="stylesheet" href="{{asset('variable.css')}}">
    <link rel="stylesheet" href="{{asset('front\css\main.css')}}">
    <link rel="stylesheet" href="{{asset('front\css\bootstrap.css')}}">
    <meta name="theme-color" content="#186099">

    @yield('style')
    <script src="https://kit.fontawesome.com/4ea06e897a.js" crossorigin="anonymous"></script>
</head>
<body>
    @include('front.layout.header')
    @yield('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @yield('include_script')

    <script src="{{asset('front/js/main.js')}}"></script>
    @yield('script')
    
</body>
</html>