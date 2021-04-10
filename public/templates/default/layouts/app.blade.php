<!doctype html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>@yield('title','荟学习')</title>
        <!--描述和摘要-->
        <meta name="Description" content=""/>
        <meta name="Keywords" content=""/>
        <!--载入公共模板-->
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
        <link rel="stylesheet" type="text/css"  href="{{asset('templates/default/org/bootstrap-3.3.5-dist/css/bootstrap.min.css')}}"/>
        <script src="{{asset('templates/default/js/jquery-1.11.3.min.js')}}" type="text/javascript" charset="utf-8"></script>
        <script src="{{asset('templates/default/org/bootstrap-3.3.5-dist/js/bootstrap.min.js')}}" type="text/javascript" charset="utf-8"></script>
        <link rel="stylesheet" type="text/css" href="{{asset('templates/default/css/index.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('templates/default/css/backTop.css')}}"/>
        @yield('heads')
        @yield('styles')
        {{--幻灯片--}}
        <link href="https://cdn.bootcss.com/Swiper/4.5.0/css/swiper.css" rel="stylesheet">
        <script src="https://cdn.bootcss.com/Swiper/4.5.0/js/swiper.js"></script>
    </head>
</head>
<body>
    <div>
        @include('layouts._top')
        @include('layouts._header')
        @yield('content')
        @include('layouts._footer')
        @include('layouts._bottom')
    </div>
@yield('scripts')
</body>
</html>