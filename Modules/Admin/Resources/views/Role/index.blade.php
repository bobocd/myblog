@extends('admin::layouts.master')
@section('content')
    @component('admin::components.tabs', ['title' => '角色列表'])
        @slot('nav')
            <li class="nav-item"><a class="nav-link active" href="#home">角色列表</a></li>
            <li class="nav-item"><a class="nav-link" href="#profile"  data-toggle="modal" data-target="#addRole">添加角色</a></li>
            @component('admin::components.modal', ['id' => 'addRole', 'title' => '添加角色', 'url' => '/admin/role'])
                <div class="form-group">
                    <label>角色名称</label>
                    <input class="form-control" type="text" placeholder="请输入中文名称" name="title" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label>角色标识</label>
                    <input class="form-control" type="text" placeholder="标识必须为英文字母" name="name" value="{{ old('name') }}">
                </div>
            @endcomponent
        @endslot
        @slot('body')
            <table class="table">
                <thead>
                <tr>
                    <th style="width:10%;">编号</th>
                    <th style="width:15%;">角色名称</th>
                    <th style="width:25%;">角色标识</th>
                    <th >创建时间</th>
                    <th class="actions">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role['id'] }}</td>
                        <td>{{ $role['title'] }}</td>
                        <td >{{ $role['name'] }}</td>
                        <td >{{ $role['created_at'] }}</td>
                        <td class="actions">
                            <div class="btn-group btn-space">
                                <button class="btn btn-secondary" type="button" onclick="delRole({{ $role['id'] }}, this)">删除</button>
                                <form action="/admin/role/{{ $role['id'] }}" hidden method="post">
                                    @csrf @method('DELETE')
                                </form>
                                <button class="btn btn-secondary" data-toggle="modal" data-target="#editRole{{ $role['id'] }}" type="button">编辑</button>
                                <a href="/admin/role/permission/{{ $role['id'] }}" class="btn btn-secondary">权限</a>
                                <a href ="javascript:return false;"  class="btn btn-secondary" style="opacity: 0.2" >用户</a>

                            </div>
                            @component('admin::components.modal', ['id' => "editRole{$role['id']}", 'method' => 'PUT', 'title' => "编辑角色{$role['title']}", 'url' => "/admin/role/{$role['id']}"])
                                <div class="form-group text-left">
                                    <label>角色名称</label>
                                    <input class="form-control" type="text" placeholder="请输入中文名称" name="title" value="{{ $role['title'] }}">
                                </div>
                                <div class="form-group text-left">
                                    <label>角色标识</label>
                                    <input class="form-control" type="text" placeholder="标识必须为英文字母" name="name" value="{{ $role['name'] }}">
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
@section('scripts')
    <script>
        function delRole(id, bt) {
            if (confirm('确定删除角色吗?')) {
                $(bt).next('form').trigger('submit');
            }
        }
        function delUser(id, bt) {
            if (confirm('确定删除角色吗?')) {
                $(bt).next('form').trigger('submit');
            }
        }
    </script>
@endsection
