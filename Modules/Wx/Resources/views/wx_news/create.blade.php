@extends('admin::layouts.master')
@section('content')
    <ul role="tablist" class="nav nav-tabs">
        <li class="nav-item"><a href="/wx/wx_news" class="nav-link active">图文消息列表</a></li>
        <li class="nav-item"><a href="/wx/wx_news/create" class="nav-link">添加图文消息</a></li>
    </ul>
    <form action="/wx/wx_news" method="post">
        @csrf
        {!! $ruleView !!}
        <wx-news></wx-news>
        <button class="btn btn-primary">保存提交</button>
    </form>
@endsection
@section('scripts')
    {{--<script>--}}
        {{--require(['{{asset('plugin/wx/wxnews/js/news.js')}}'],function(news){--}}
            {{--news([{title:'荟天下','discription':'test','picurl':'/plugin/hdjs/image/nopic.jpg','url':'#'}]);--}}
        {{--})--}}
    {{--</script>--}}
@endsection
