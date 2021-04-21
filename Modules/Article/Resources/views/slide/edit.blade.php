@extends('admin::layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">幻灯片管理</div>
        <ul role="tablist" class="nav nav-tabs">
            <li class="nav-item"><a href="/article/slide" class="nav-link">幻灯片列表</a></li>
            <li class="nav-item"><a href="#" class="nav-link active">修改幻灯片</a></li>
        </ul>
        <form action="/article/slide/{{$slide['id']}}" method="post">
            <div class="card-body card-body-contrast">
                @csrf @method('PUT')
                <div class="form-group row">
                    <label for="title" class="col-12 col-sm-3 col-form-label text-md-right">标题</label>
                    <div class="col-12 col-md-9">
                        <input id="title" name="title" type="text"
                               value="{{ $slide['title']??old('title') }}"
                               class="form-control form-control-sm form-control{{ $errors->has('title') ? ' is-invalid' : '' }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="url" class="col-12 col-sm-3 col-form-label text-md-right">链接</label>
                    <div class="col-12 col-md-9">
                        <input id="url" name="url" type="text"
                               value="{{ $slide['url']??old('url') }}"
                               class="form-control form-control-sm form-control{{ $errors->has('url') ? ' is-invalid' : '' }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pic" class="col-12 col-sm-3 col-form-label text-md-right">图片</label>
                    <div class="col-12 col-lg-9">
                        <label for="pic" class="col-12 col-sm-3 col-form-label text-md-right">缩略图</label>
                        <div class="col-12 col-lg-9">
                            <div class="layui-upload">
                                <button type="button" class="layui-btn" id="test1"><i class="layui-icon"></i>上传文件</button>
                                <div class="layui-upload-list">
                                    <img class="layui-upload-img" id="demo1" src="{{$article['thumb']??old('thumb')}}" >
                                    <p id="demoText"></p>
                                    <input type="hidden" name="thumb" id="imgsrc" class="layui-input" value="{{$article['thumb']??old('thumb')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="click" class="col-12 col-sm-3 col-form-label text-md-right">查看次数</label>
                    <div class="col-12 col-md-9">
                        <input id="click" name="click" type="text"
                               value="{{ $slide['click']??old('click') }}"
                               class="form-control form-control-sm form-control{{ $errors->has('click') ? ' is-invalid' : '' }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="enable" class="col-12 col-sm-3 col-form-label text-md-right"
                           style="padding-top:initial;">状态</label>
                    <div class="col-12 col-md-9">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"
                                   {{old('enable',$slide['enable'])=='1'?'checked':''}}
                                   name="enable" value="1"
                                   id="enable-1">
                            <label class="form-check-label" for="enable-1">开启</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"
                                   {{old('enable',$slide['enable'])=='0'?'checked':''}}
                                   name="enable" value="0"
                                   id="enable-0">
                            <label class="form-check-label" for="enable-0">关闭</label>
                        </div>
                        <br>
                    </div>
                </div>

            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary offset-sm-2">保存更新</button>
            </div>
        </form>
    </div>
@endsection
