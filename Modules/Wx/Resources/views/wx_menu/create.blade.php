@extends('admin::layouts.master')
@section('head')
    <script src="https://cdn.bootcdn.net/ajax/libs/vue/2.6.1/vue.js"></script>
@endsection
@section('content')
    <div class="card" id="wxmenu">
        <div class="card-header">微信菜单管理</div>
        <ul role="tablist" class="nav nav-tabs">
            <li class="nav-item"><a href="/wx/wx_menu" class="nav-link">微信菜单列表</a></li>
            <li class="nav-item"><a href="/wx/wx_menu/create" class="nav-link  active">添加微信菜单</a></li>
        </ul>
        <form action="/wx/wx_menu" method="post">
            @csrf
            <wx-menu :menudata="[]" menuname=""></wx-menu>
        </form>
    </div>
@endsection
@section('scripts')

@endsection
