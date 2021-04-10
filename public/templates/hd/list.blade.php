@extends('layouts.app')
@section('content')
    <!-- 顶部最新消息区域 -->
    <div id="latest_news_box">
        <div id="latest_news">
            <p><span class="title">最新消息：</span>大前端是一个关注web前端开发、用户体验设计、wordpress主题、前端招聘信息的站点</p>
        </div>
    </div>
    <!-- 顶部最新消息区域结束 -->

    <!-- 主体区域 -->
    <div id="main">
        <!-- main最上面的说明文字 -->
        {{--<div class="top">以下是分类   下的文章</div>--}}
        <!-- main最上面的说明文字结束 -->
        <!-- 左侧区域 -->
        <div class="left">
            <!-- 列表页介绍 -->
            {{--<div class="list_description">category.description</div>--}}
            <!-- 列表页介绍结束 -->
            <ul class="arc_list">
                @foreach($data as $v)
                    <li>
                        <div class="pic">
                            <img width="150" src="{{$v['thumb']}}" alt="" />
                        </div>
                        <h3><a href="/article/content/{{$v['id']}}.html">{{$v['title']}}</a></h3>
                        <div>
                        <span class="date">{{mb_substr($v['created_at'],0,10,'utf-8')}}</span>
                        <a href="" class="comment">{{$v['comment']}}人评论</a>
                        <span class="browse_number">{{$v['click']}}次浏览</span>
                        </div>
                        <p class="description">摘要|{{$v['digest']}}
                        </p>
                    </li>
                @endforeach
            </ul>
            <!-- 分页 -->

            <ul class="pagelist">

            </ul>
            <!-- 分页结束 -->

        </div>
        <!-- 左侧区域结束 -->
        <!-- 右侧区域 -->
         @include('layouts._right')
        <!-- 右侧区域结束 -->
    </div>
    <!-- 主体区域结束 -->
@endsection