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
                                    <td><span
                                            class="badge badge-{{$fwjwj['grade']=='紧急'?'danger':'info'}}">{{$fwjwj['grade']}}</span>
                                    </td>
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
                                            @if($fwjwj['status']=='第一责任人处理')
                                                <div class="btn-group" role="group" aria-label="Third group">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                            data-target="#exampleModal"
                                                            onclick="zhuanpai({{$fwjwj['id']}},this)">转派
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <form action="/work/fwjwj/dealStore" method="post">
                @csrf
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">选择处理人</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-5" style="padding-right: 0px">
                                            <div class="input-group mb-1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">工号</span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="Username"
                                                       aria-describedby="basic-addon1" id="loginno" value="">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="input-group mb-1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">电话</span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="Username"
                                                       aria-describedby="basic-addon1" value="" id="phoneNo">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-dark"
                                                    style="display:inline-block;position:absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);"
                                                    onclick="finduser()">查询
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="height: 200px; overflow-y: scroll;">
                                    <table class="table">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope="col"><input type="checkbox" disabled=""></th>
                                            <th scope="col">工号</th>
                                            <th scope="col">邮箱</th>
                                            <th scope="col">联系号码</th>
                                        </tr>
                                        </thead>
                                        <tbody id="modaltable">
                                        @foreach($users as $user)
                                            <tr>
                                                <td scope="row">
                                                    <input type="checkbox" id="user_id_{{$user['id']}} " name="users"
                                                           value="{{$user['id']}}" onclick="checkboxselect(this)">
                                                </td>
                                                <td>{{$user['name']}}</td>
                                                <td>{{$user['email']}}</td>
                                                <td>{{ $user['phone'] }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <input type="text" hidden id="gongdanIDZhan" value="" name="gongdanID">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">提交</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <div class="float-right">
        {!!  $fwjwjs->links() !!}
    </div>
@endsection
@section('scripts')
    <script>
        var gongdanID = 0;

        function zhuanpai(id, bt) {
            $('#gongdanIDZhan').prop('value',id);
            // console.log(gongdanID);
        }
        function checkboxselect(obj) {
            //除当前的checkbox其他的都不选中
            $("[name=users]:checkbox").not( $(obj)).prop("checked",false);
        }
        function finduser() {
            $('#modaltable').find('tr').hide();
            var loginno=$('#loginno').val();
            var phone=$('#phoneNo').val();
            $.ajax({
                url: "/admin/user/shaixuan",
                type: 'POST',
                data:{'loginno':loginno,'phone':phone},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (result) {
                    var thtml="";
                    for (element of result) {
                        thtml +='<tr>'+'<td>'+'<input type="checkbox" name="users" onclick="checkboxselect(this)" value="'+element.id+'">'+'</td>'+'<td>'+element.name+'</td>'+'<td>'+element.email+'</td>'+'<td>'+element.phone+'</td>'+'</tr>';
                    }
                    // $('#modaltable').hide();

                    $('#modaltable').html(thtml);
                }
            });
            return false;
        }
    </script>
@endsection
