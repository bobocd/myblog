@extends('admin::layouts.master')
@section('content')
    <ul role="tablist" class="nav nav-tabs">
        <li class="nav-item"><a href="/wx/wx_news" class="nav-link active">图文消息列表</a></li>
        <li class="nav-item"><a href="/wx/wx_news/create" class="nav-link">添加图文消息</a></li>
    </ul>
    <form action="/wx/wx_news/{{$wx_news['id']}}" method="post">
        @csrf @method('put')
        {!! $ruleView !!}
        <wx-news :wxnew="{{$wx_news['data']}}"></wx-news>

        <button class="btn btn-primary">保存提交</button>
    </form>
@endsection
