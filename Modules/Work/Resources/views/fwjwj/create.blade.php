@extends('admin::layouts.master')
@section('title','myblog - 添加文章')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--layui--}}
    <link rel="stylesheet" href="{{asset('layui/css/layui.css')}}" type="text/css"/>
    <style>
        .layui-upload-img{width: 92px; height: 92px; margin: 0 10px 10px 0;}
    </style>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">创建工单</div>
        <ul role="tablist" class="nav nav-tabs">
            <li class="nav-item"><a href="/work/fwjwj" class="nav-link">工单管理</a></li>
            <li class="nav-item"><a href="#" class="nav-link">批量创建</a></li>
        </ul>
        <form action="/work/fwjwj" method="post">
            <div class="card-body card-body-contrast">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="iscommend" class="col-12 col-sm-2 col-form-label text-md-right"
                                   style="padding-top:initial;">紧急程度</label>
                            <div class="col-12 col-md-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" checked name="grade" value="一般" id="grade-1">
                                    <label class="form-check-label" for="iscommend-1">一般</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="grade" value="紧急" id="grade-0">
                                    <label class="form-check-label" for="iscommend-0">紧急</label>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-12 col-sm-2 col-form-label text-md-right">工单主题</label>
                            <div class="col-12 col-md-9">
                                <input id="title" name="title" type="text" value=""    class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-12 col-sm-2 col-form-label text-md-right">客户号码</label>
                            <div class="col-12 col-md-9">
                                <input id="phone" name="phone" type="text" value="" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="belong_name" class="col-12 col-sm-2 col-form-label text-md-right">区县</label>
                            <div class="col-12 col-md-8">
                                <select class="form-control form-control-xs" name="belong_name">
                                    <option value="东坡分公司">东坡分公司</option>
                                    <option value="仁寿分公司">仁寿分公司</option>
                                    <option value="彭山分公司">彭山分公司</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="area_name" class="col-12 col-sm-2 col-form-label text-md-right">片区</label>
                            <div class="col-12 col-md-9">
                                <input id="area_name" name="area_name" type="text" value="" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-12 col-sm-2 col-form-label text-md-right">网格</label>
                            <div class="col-12 col-md-9">
                                <input id="" name="group_name" type="text" value="" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="belong_name" class="col-12 col-sm-2 col-form-label text-md-right">大类目录</label>
                            <div class="col-12 col-md-8">
                                <select class="form-control form-control-xs" name="largeclass">
                                    <option value="市场">市场</option>
                                    <option value="政企">政企</option>
                                    <option value="网格">网格</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="belong_name" class="col-12 col-sm-2 col-form-label text-md-right">小类目录</label>
                            <div class="col-12 col-md-8">
                                <select class="form-control form-control-xs" name="subclass">
                                    <option value="不知情开通">不知情开通</option>
                                    <option value="资费">资费</option>
                                    <option value="其他">其他</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row pt-0">
                            <label for="digest" class="col-12 col-sm-2 col-form-label text-md-right">摘要</label>
                            <div class="col-12 col-md-10">
                                <textarea name="description" id="digest" cols="50" rows="7" style="resize:none; width: 100%"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-12 col-sm-2 col-form-label text-md-right">工单重点</label>
                            <div class="col-12 col-md-10">
                                <input  name="emphasis" type="text" value="" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-12 col-sm-2 col-form-label text-md-right">宽带地址</label>
                            <div class="col-12 col-md-10">
                                <input name="kd_address" type="text" value="" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-12 col-sm-2 col-form-label text-md-right">常客地址</label>
                            <div class="col-12 col-md-10">
                                <input name="cust_address" type="text" value="" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-12 col-sm-2 col-form-label text-md-right">宽带画像</label>
                            <div class="col-12 col-md-10">
                                <input name="cust_portrayal" type="text" value="" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-12 col-sm-2 col-form-label text-md-right">选择处理人</label>
                            <div class="col-12 col-md-10">
                                <input id="deal_user_id" name="deal_user_id"   readonly type="text" value="" class="form-control form-control-sm" data-toggle="modal" data-target="#exampleModal">
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            <input type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" id="loginno" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <div class="input-group mb-1">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">电话</span>
                                                            </div>
                                                            <input type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" value="" id="phoneNo">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <button type="button" class="btn btn-dark" style="display:inline-block;position:absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);" onclick="finduser()">查询</button>
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
                                                    <tbody  id="modaltable">
                                                    @foreach($users as $user)
                                                    <tr>
                                                        <td scope="row">
                                                            <input type="checkbox" id="user_id_{{$user['id']}} "name="users" value="{{$user['id']}}" onclick="checkboxselect(this)">
                                                        </td>
                                                        <td>{{$user['name']}}</td>
                                                        <td>{{$user['email']}}</td>
                                                        <td>{{ $user['phone'] }}</td>
                                                    </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" onclick="subm()">选择</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary offset-sm-5">保存提交</button>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script>
        //加载时执行
        // $(function(){
        //     $.ajax({
        //         url: "/admin/user/shaixuan",
        //         type: 'POST',
        //         dataType: 'json',
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         success: function (result) {
        //             var thtml="";
        //             for (element of result) {
        //                 thtml +='<tr>'+'<td>'+'<input type="checkbox" name="users" onclick="checkboxselect(this)" value="'+element.name+'">'+'</td>'+'<td>'+element.name+'</td>'+'<td>'+element.email+'</td>'+'<td>'+element.phone+'</td>'+'</tr>';
        //             }
        //             // $('#modaltable').hide();
        //             $('#modaltable').html(thtml);
        //             // console.log(thtml);
        //         }
        //     });
        // })
        function subm() {
            var chk_value =[];
            $('input[name="users"]:checked').each(function(){
                chk_value.push($(this).val());
            });
            $('#deal_user_id').prop('value',chk_value[0]);
            $('#exampleModal').modal('hide');
            console.log(chk_value[0]);
            //阻止表单默认提交
            return false;
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
    {{--layui缩率图上传--}}
    <script src="{{ asset('/layui/layui.js') }}"></script>
    <script>
        layui.use('upload', function(){
            var $ = layui.jquery
                ,upload = layui.upload;

            //普通图片上传
            var uploadInst = upload.render({
                elem: '#test1'
                ,url: '/article/article/upload' //改成您自己的上传接口
                ,headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                ,before: function(obj){
                    //预读本地文件示例，不支持ie8
                    obj.preview(function(index, file, result){
                        $('#demo1').attr('src', result); //图片链接（base64）
                    });
                }
                ,done: function(res){
                    //上传成功
                    if(res.code==0){
                        var imgsrc=res.file_path;
                        // var thumbsrc=res.thumbsrc;
                        document.getElementById("imgsrc").value = imgsrc;
                        // document.getElementById("imgpreview").src = thumbsrc;
                        return layer.msg('上传成功');
                    }

                    //如果上传失败
                    if(res.code > 0){
                        return layer.msg('上传失败');
                    }
                    //上传成功
                }
                ,error: function(){
                    //演示失败状态，并实现重传
                    var demoText = $('#demoText');
                    demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
                    demoText.find('.demo-reload').on('click', function(){
                        uploadInst.upload();
                    });
                }
            });

        });
    </script>
@endsection
