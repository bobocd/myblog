@extends('admin::layouts.master')
@section('content')
    @component('admin::components.tabs', ['title' => '模板设置'])
        @slot('nav')

        @endslot
        @slot('body')
            <div class="row">
                @foreach($templates as $template)
                    <div class="card col-sm-3">
                        <div class="card-block">
                            <img src="{{$template['preview']}}" alt="" style="width: 100%;height: 160px;">
                        </div>
                        @if(\HDModule::config('admin.config.template')==$template['name'])
                            <a href="/admin/template/set/{{$template['name']}}" class="btn btn-block">默认模板</a>
                            @else
                        <a href="/admin/template/set/{{$template['name']}}" class="btn btn-success btn-block">设为默认模板</a>
                            @endif
                    </div>
                @endforeach
            </div>
        @endslot
        @slot('footer')

        @endslot
    @endcomponent
@endsection
