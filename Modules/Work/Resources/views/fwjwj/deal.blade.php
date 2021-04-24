@extends('admin::layouts.master')
@section('title','myblog - 文章管理')
@section('content')
    <div class="card">
        <div class="card-header">服务进万家</div>
        <div class="tab-container">
            <ul role="tablist" class="nav nav-tabs">
                <li class="nav-item"><a href="/work/fwjwj" class="nav-link active">工单列表</a></li>
                <li class="nav-item"><a href="/work/fwjwj/create" class="nav-link">创建工单</a></li>
            </ul>
            <div class="card card-contrast card-border-color-success">
                <div class="card-body">
                    <div class="table-responsive">
                        <table width="1200px">
                            <thead>
                            <tr>
                                <th><input type="checkbox"/></th>
                                <th>紧急程度</th>
                                <th>编号</th>
                                <th>工单主题</th>
                                <th>工单重点</th>
                                <th>客户号码</th>
                                <th>区县</th>
                                <th>分局</th>
                                <th>网格</th>
                                <th>客户描述</th>
                                <th>客户画像</th>
                                <th>工单状态</th>
                                <th>创建人</th>
                                <th>处理人</th>
                                <th>创建时间</th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($fwjwjs as $fwjwj)
                                <tr>
                                    <td><input type="checkbox"/></td>
                                    <td><span class="badge badge-{{$fwjwj['grade']=='紧急'?'danger':'info'}}">{{$fwjwj['grade']}}</span></td>
                                    <td>{{$fwjwj['id']}}</td>
                                    <td>{{$fwjwj['title']}}</td>
                                    <td>{{$fwjwj['emphasis']}}</td>
                                    <td>{{$fwjwj['phone']}}</td>
                                    <td>{{$fwjwj['belong_name']}}</td>
                                    <td>{{$fwjwj['area_name']}}</td>
                                    <td>{{$fwjwj['group_name']}}</td>
                                    <td>{{$fwjwj['description']}}</td>
                                    <td>{{$fwjwj['cust_portrayal']}}</td>
                                    <td>{{$fwjwj['status']}}</td>
                                    <td>{{$fwjwj->author->name}}</td>
                                    <td>{{$fwjwj->deal_user->name}}</td>
                                    <td>{{$fwjwj['created_at']}}</td>
                                    <td>
                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <button type="button" class="btn btn-success">处理</button>
                                            </div>
                                            <div class="btn-group mr-2" role="group" aria-label="Second group">
                                                <button type="button" class="btn btn-warning">查看</button>
                                            </div>
                                            <div class="btn-group" role="group" aria-label="Third group">
                                                <button type="button" class="btn btn-primary">提交</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="float-right">
        {!!  $fwjwjs->links() !!}
    </div>
@endsection
