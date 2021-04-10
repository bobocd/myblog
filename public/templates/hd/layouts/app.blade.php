<!doctype html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','荟学习')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{$webTitle}</title>
    <link rel="stylesheet" href="{{asset('templates/hd/css/style.css')}}" />
    {{--<script type="text/javascript" src="{{asset('templates/hd/js/jquery-1.7.2.min.js')}}"></script>--}}
    <script src="https://cdn.bootcss.com/jquery/3.4.0/jquery.js"></script>
    <script type="text/javascript" src="{{asset('templates/hd/js/js.js')}}"></script>
    <link href="https://cdn.bootcss.com/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    @yield('header')
    @yield('style')
</head>
<body>
<div>
    @include('layouts._header')
    @yield('content')
    @include('layouts._footer')
</div>
@yield('scripts')
</body>
</html>