@extends('admin::layouts.master')
@section('content')
    <div role="alert" class="alert alert-primary alert-simple alert-dismissible">
        <button type="button" data-dismiss="alert" aria-label="Close" class="close">
            <span aria-hidden="true" class="mdi mdi-close"></span>
        </button>
        <div class="icon"><span class="mdi mdi-info-outline"></span></div>
        <div class="message">
            1. 请将你公众号中appID|appsecret|EncodingAESKey|Token添加到对应列中<br>
        </div>
    </div>
    <div class="card" id="app">
        <div class="card-header">配置管理</div>
        <ul role="tablist" class="nav nav-tabs">
            <li class="nav-item"><a href="#" class="nav-link active">添加配置</a></li>
        </ul>
        <form action="/wx/wx_config" method="post">
            <div class="card-body card-body-contrast">
                @csrf
                <div class="form-group row">
                    <label class="col-12 col-sm-2 col-form-label text-md-right">开发者ID</label>
                    <div class="col-12 col-md-8">
                        <input name="appid" type="text"
                               value="{{ $wx_config['appid']??old('appid') }}"
                               class="form-control form-control-sm form-control">
                    </div>

                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-2 col-form-label text-md-right">开发者密钥</label>
                    <div class="col-12 col-md-8">
                        <input name="appsecret" type="text"
                               value="{{ $wx_config['appsecret']??old('appsecret') }}"
                               class="form-control form-control-sm form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-2 col-form-label text-md-right">令牌</label>
                    <div class="col-12 col-md-8">
                        <input name="token" type="text"
                               value="{{ $wx_config['token']??old('token') }}"
                               class="form-control form-control-sm form-control">
                    </div>

                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-2 col-form-label text-md-right">消息加解密密钥</label>
                    <div class="col-12 col-md-8">
                        <input name="encodingaeskey" type="text"
                               value="{{ $wx_config['encodingaeskey']??old('encodingaeskey') }}"
                               class="form-control form-control-sm form-control">
                    </div>
                </div>


            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary offset-sm-2">保存提交</button>
            </div>
        </form>
    </div>
@endsection
