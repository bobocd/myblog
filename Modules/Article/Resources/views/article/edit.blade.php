@extends('admin::layouts.master')
@section('title','myblog - 编辑文章')
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
        <div class="card-header">文章管理</div>
        <ul role="tablist" class="nav nav-tabs">
            <li class="nav-item"><a href="/article/article" class="nav-link">文章列表</a></li>
            <li class="nav-item"><a href="#" class="nav-link active">添加文章</a></li>
        </ul>
        <form action="/article/article/ {{$article['id']}}" method="post">
            <div class="card-body card-body-contrast">
                @csrf @method('PUT')
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group row">
                            <label for="title" class="col-12 col-sm-2 col-form-label text-md-right">标题</label>
                            <div class="col-12 col-md-9">
                                <input id="title" name="title" type="text"
                                       value="{{ $article['title']??old('title') }}"
                                       class="form-control form-control-sm form-control{{ $errors->has('title') ? ' is-invalid' : '' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="author" class="col-12 col-sm-2 col-form-label text-md-right">栏目</label>
                            <div class="col-12 col-md-8">
                                <select class="form-control form-control-xs" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category['id'] }}"{{($article['category_id']==$category['id'])?'selected':''}}>{!! $category['_name'] !!}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="author" class="col-12 col-sm-2 col-form-label text-md-right">作者</label>
                            <div class="col-12 col-md-9">
                                <input id="author" name="author" type="text"
                                       value="{{ $article['author']??old('author') }}"
                                       class="form-control form-control-sm form-control{{ $errors->has('author') ? ' is-invalid' : '' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="digest" class="col-12 col-sm-2 col-form-label text-md-right">文章摘要</label>
                            <div class="col-12 col-md-9">
                                <textarea name="digest" id="digest" cols="39" rows="5" style="resize:none;">{{ $article['digest']??old('digest') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="thumb" class="col-12 col-sm-2 col-form-label text-md-right">缩略图</label>
                            <div class="col-12 col-lg-9">
                                <div class="layui-upload">
                                    <button type="button" class="layui-btn" id="test1"><i class="layui-icon"></i>上传文件</button>
                                    <div class="layui-upload-list">
                                        <img class="layui-upload-img" id="demo1" src="{{$article['thumb']}}" >
                                        <p id="demoText"></p>
                                        <input type="hidden" name="thumb" id="imgsrc" class="layui-input">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--<div class="form-group row">--}}
                            {{--<label for="click" class="col-12 col-sm-2 col-form-label text-md-right">标签</label>--}}
                            {{--<div class="col-12 col-sm-10 col-lg-10 form-check mt-1">--}}
                                {{--@foreach($tags as $tag)--}}
                                    {{--<label class="custom-control custom-checkbox custom-control-inline">--}}
                                        {{--<input class="custom-control-input" name="tag[]"--}}
                                               {{--value="{{$tag['id']}}" type="checkbox">--}}
                                        {{--<span class="custom-control-label">{{$tag['title']}}</span>--}}
                                    {{--</label>--}}
                                {{--@endforeach--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="form-group row">
                            <label for="click" class="col-12 col-sm-2 col-form-label text-md-right">查看次数</label>
                            <div class="col-12 col-md-9">
                                <input id="click" name="click" type="text"
                                       value="{{ $article['click']??old('click') }}"
                                       class="form-control form-control-sm form-control{{ $errors->has('click') ? ' is-invalid' : '' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="iscommend" class="col-12 col-sm-2 col-form-label text-md-right"
                                   style="padding-top:initial;">推荐</label>
                            <div class="col-12 col-md-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="iscommend" value="1" id="iscommend-1"  {{old('iscommend',$article['iscommend'])=='1'?'checked':''}}>
                                    <label class="form-check-label" for="iscommend-1">是</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="iscommend" value="0" id="iscommend-0"  {{old('iscommend',$article['iscommend'])=='0'?'checked':''}}>
                                    <label class="form-check-label" for="iscommend-0">否</label>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group row pt-0">
                            <div class="col-12">
                                <!-- 百度编辑器 -->
                                <!-- 加载编辑器的容器 -->
                                <script id="container" name="content" type="text/plain"></script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary offset-sm-1">保存提交</button>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <!-- 配置文件 -->
    <script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/ueditor/ueditor.all.js"></script>
    {{--百度编辑器语言包--}}
    <script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var html = '{!! $article["content"] !!}';
        console.log(html);
            var sss="<h1>p<h1/>";
        var ue = UE.getEditor('container',{initialFrameHeight:380,initialFrameWidth:560});
        //对编辑器的操作最好在编辑器ready之后再做
        ue.ready(function() {
            //设置编辑器的内容

            ue.setContent(html);
            // //获取html内容，返回: <p>hello</p>
            // var html = ue.getContent();
            // //获取纯文本内容，返回: hello
            // var txt = ue.getContentTxt();
        });
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
                ,url: '/article/upload' //改成您自己的上传接口
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
