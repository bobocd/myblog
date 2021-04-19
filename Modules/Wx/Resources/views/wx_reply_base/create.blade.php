@extends('admin::layouts.master')
@section('content')
    <ul role="tablist" class="nav nav-tabs">
        <li class="nav-item"><a href="/wx/wx_reply_base" class="nav-link">基本回复列表</a></li>
        <li class="nav-item"><a href="#" class="nav-link active">添加基本回复</a></li>
    </ul>
    <form action="/wx/wx_reply_base" method="post">
        @csrf
        {!! $ruleView !!}
        <wx-basereply :wxreply="{{$_reply}}"></wx-basereply>

        <button class="btn btn-primary">保存提交</button>
    </form>
@endsection
