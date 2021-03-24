@extends('admin::layouts.master')
@section('title','myblog - 文章管理')
@section('content')
    <div class="card">
        <div class="card-header">文章管理</div>
        <div class="tab-container">
            <ul role="tablist" class="nav nav-tabs">
                <li class="nav-item"><a href="/article/article" class="nav-link active">文章列表</a></li>
                <li class="nav-item"><a href="/article/article/create" class="nav-link">添加文章</a></li>
            </ul>
            <div class="card card-contrast card-border-color-success">
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>编号</th>
                            <th>缩略图</th>
                            <th width="20%">标题</th>
                            <th>栏目</th>
                            <th>作者</th>
                            <th>查看次数</th>
                            <th>推荐</th>
                            <th>创建时间</th>
                            <th>修改时间</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $d)
                            <tr>
                                <td>{!! $d['id'] !!}</td>
                                <td><img src='{!! $d['thumb'] !!}' style='width:45px;height:45px;'/></td>
                                <td>{!! $d['title'] !!}</td>
                                <td>{!! $d->category->name !!}</td>
                                <td>{!! $d['author'] !!}</td>
                                <td>{!! $d['click'] !!}</td>
                                <td>{!! $d['iscommend'] !!}</td>
                                <td>{!! $d['created_at'] !!}</td>
                                <td>{!! $d['updated_at'] !!}</td>
                                <td class="text-right">
                                    <a href="/article/article/{{$d['id']}}/edit" class="btn btn-secondary">编辑</a>
                                    <button type="button" class="btn btn-secondary btn-danger" onclick="del({{$d['id']}},this)">删除</button>
                                    <form action="/article/article/{{$d['id']}}" hidden method="post">
                                        @csrf @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="float-right">
        {!!  $data->links() !!}
    </div>
@endsection
@section('scripts')
    <script>
        function del(id, el) {
            if (confirm('确定删除吗？')) {
                $(el).next('form').trigger('submit')
            }
        }
    </script>
@endsection
