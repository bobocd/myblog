@extends('admin::layouts.master')
@section('title','荟学习 - 首页')
@section('content')
    @component('admin::components.tabs', ['title' => '用户列表'])
        @slot('nav')
            <li class="nav-item"><a class="nav-link active" href="#home">用户列表</a></li>
            <li class="nav-item"><a class="nav-link" href="#profile"  data-toggle="modal" data-target="#addUser">添加用户</a></li>
            @component('admin::components.modal', ['id' => 'addUser', 'title' => '添加角色', 'url' => '/admin/admin'])
                <div class="form-group">
                    <label>系统账号</label>
                    <input class="form-control" type="text" placeholder="标识必须为英文字母" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label>昵称</label>
                    <input class="form-control" type="text" placeholder="请输入中文名称" name="nickname" value="{{ old('nickname') }}">
                </div>
                <div class="form-group">
                    <label>密码</label>
                    <input class="form-control" type="text" placeholder="标识必须包含8个字符以上" name="password" value="{{ old('password') }}">
                </div>
            @endcomponent
        @endslot
        @slot('body')
            <table class="table">
                <thead>
                <tr>
                    <th style="width:10%;">编号</th>
                    <th style="width:20%;">系统账号</th>
                    <th>昵称</th>
                    <th>创建时间</th>
                    <th class="actions">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user['id'] }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['nickname'] }}</td>
                        <td>{{ $user['created_at'] }}</td>
                        <td class="actions">
                            <div class="btn-group btn-space">
                                <button class="btn btn-secondary" type="button" onclick="delUser({{ $user['id'] }}, this)">删除</button>
                                <form action="/admin/admin/{{ $user['id'] }}" hidden method="post">
                                    @csrf @method('DELETE')
                                </form>
                                <a href="/admin/admin/permission/{{ $user['id'] }}" class="btn btn-secondary" >权限</a>
                                <a href="/admin/admin/role/{{ $user['id'] }}" class="btn btn-secondary">角色</a>
                                <button class="btn btn-secondary" data-toggle="modal" data-target="#editUser{{ $user['id'] }}" type="button">编辑</button>
                            </div>
                            @component('admin::components.modal', ['id' => "editUser{$user['id']}", 'method' => 'PUT', 'title' => "编辑角色", 'url' => "/admin/admin/{$user['id']}"])
                                <div class="form-group text-left">
                                    <label>昵称</label>
                                    <input class="form-control" type="text" placeholder="请输入中文名称" name="nickname" value="{{ old('nickname') }}">
                                </div>
                                <div class="form-group text-left">
                                    <label>密码</label>
                                    <input class="form-control" type="text" placeholder="标识必须包含8个字符以上" name="password" value="{{ old('password') }}">
                                </div>
                            @endcomponent
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endslot
        @slot('footer')

        @endslot
    @endcomponent
@endsection
