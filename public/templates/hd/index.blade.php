@extends('layouts.app')
@section('content')
<!-- 主体区域 -->
<div id="main">
    <!-- 左侧区域 -->
    <div class="left">
        <div class='hd_title'>
            <strong>置顶推荐</strong>
        </div>
        <ul class='zhiding' style="height: 100%;">
             @list(['iscommend'=>0,'time'=>'desc','limit'=>'5'])
                <li>
                    <div class='image'>
                        <a href="">
                            <img src="{{$field['thumb']}}"/>
                        </a>
                    </div>
                    <h2><a href="{{$field['url']}}">{{$field['title']}}</a></h2>
                    <p>摘要|{{$field['digest']}}</p>
                </li>
            @endlist
        </ul>
        <div class='hd_title'>
            <strong>最近文章</strong>
        </div>

        <ul class="arc_list">
            @list(['time'=>'desc','limit'=>'5'])
                <li>
                    <div class="pic"><img width="150" height="100" src="{{$field['thumb']}}" alt=""/></div>
                    <h3><a href="{{$field['url']}}">{{$field['title']}}</a></h3>
                    <span class="date">{{mb_substr($field['created_at'],5,5,'utf-8')}}</span>
                    <a href="" class="comment">{{$field['comment']}}人评论</a>
                    <span class="browse_number">{{$field['click']}}次浏览</span>
                    <p class="description">摘要|{{$field['digest']}}
                    @foreach($field['tag'] as $label)
                        @tag
                        @if($label==$field['id'])
                            {{$field['title']}}
                        @endif
                        @endtag
                    @endforeach
                    </p>
                </li>
            @endlist
        </ul>
    </div>
    <!-- 左侧区域结束 -->
    <!-- 右侧区域 -->
    @include('layouts._right')
    <!-- 右侧区域结束 -->
</div>
<!-- 主体区域结束 -->
@endsection