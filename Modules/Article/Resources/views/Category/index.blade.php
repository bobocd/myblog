@extends('admin::layouts.master')
@section('title','myblog - 栏目')
@section('content')
    @component('admin::components.tabs', ['title' => '栏目列表'])
        @slot('nav')
            <li class="nav-item"><a class="nav-link active" href="#home">栏目列表</a></li>
            <li class="nav-item"><a class="nav-link" href="#profile"  data-toggle="modal" data-target="#addCategory">添加栏目</a></li>
            @component('admin::components.modal', ['id' => 'addCategory', 'title' => '添加栏目', 'url' => '/article/category'])
                <div class="form-group">
                    <label>父级栏目</label>
                    <select class="form-control form-control-xs" name="pid">
                        @foreach($categories as $category)
                            <option value="{{ $category['id'] }}">{!! $category['_name'] !!}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>栏目名称</label>
                    <input class="form-control form-control-sm" type="text" placeholder="标识必须为英文字母" name="name" value="{{ old('name') }}">
                </div>
            @endcomponent
        @endslot
        @slot('body')
            <table class="table">
                <thead>
                <tr>
                    <th style="width:10%;">编号</th>
                    <th style="width:20%;">栏目名称</th>
                    <th style="width:20%;">父级栏目</th>
                    <th>创建时间</th>
                    <th class="actions">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    @if($category['pid']!='0')
                    <tr>
                        <td>{{ $category['id'] }}</td>
                        <td>{!! $category['_name'] !!}  </td>
                        <td>{{ $category['pidName'] }}</td>
                        <td>{{ $category['created_at'] }}</td>
                        <td class="actions">
                            <div class="btn-group btn-space">
                                <button class="btn btn-secondary" type="button" onclick="delCategory({{ $category['id'] }}, this)">删除</button>
                                <form action="/article/category/{{ $category['id'] }}" hidden method="post">
                                    @csrf @method('DELETE')
                                </form>
                                <button class="btn btn-secondary" data-toggle="modal" data-target="#editCategory{{ $category['id'] }}" type="button">编辑</button>
                            </div>
                            @component('admin::components.modal', ['id' => "editCategory{$category['id']}", 'method' => 'PUT', 'title' => "编辑角色", 'url' => "/article/category/{$category['id']}"])
                                <div class="form-group text-left">
                                    <label>父级栏目</label>
                                    <select class="form-control form-control-xs" name="pid">
                                        <option value="1">顶级栏目</option>
                                        @foreach($categories as $cate)
                                            @if($cate['id']==$category['pid']||$category['id'] == $cate['id'] || (new Houdunwang\Arr\Arr())->isChild($categories, $cate['id'], $category['id'], 'id'))
                                                <option value="{{ $cate['id'] }}" disabled="disabled">{!! $cate['_name'] !!}</option>
                                            @else
                                                <option value="{{ $cate['id'] }}">{!! $cate['_name'] !!}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group text-left">
                                    <label>栏目名称</label>
                                    <input class="form-control form-control-sm" type="text" placeholder="标识必须为英文字母" name="name" value="{{ $category['name'] }}">
                                </div>
                            @endcomponent
                        </td>
                    </tr>
                    @endif
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
        function delCategory(id, bt) {
            if (confirm('确定删除栏目吗?')) {
                $(bt).next('form').trigger('submit');
            }
        }
    </script>
@endsection
