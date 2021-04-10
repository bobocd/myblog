@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{asset('templates/hd/css/page.css')}}" />
@endsection
@section('content')
    <!-- 顶部最新消息区域 -->
    <div id="latest_news_box">
        <div id="latest_news">
            <p><span class="title">最新消息：</span>大前端是一个关注web前端开发、用户体验设计、wordpress主题、前端招聘信息的站点</p>
        </div>
    </div>
    <!-- 顶部最新消息区域结束 -->
    <!-- 主体区域 -->
    <div id="page_main">
        <!-- 右侧 -->
        @include('layouts._right')
        <!-- 右侧结束 -->
        <!-- 左侧 -->
        <div class="left">
            <h1><a href="javascript:void(0)" style="text-decoration:none;">{{$content['title']}}</a></h1>
            <div class="article_info_box">
                <p class="article_info">
                    <span class="padding_right">{{mb_substr($content['created_at'],0,9,'utf-8')}}</span>
                    分类：<a href="/article/lists/{{$content['category_id']}}.html" class="padding_right">{{$content->category->name}}</a>
                    <a href="" class="padding_right comment">{{$content['comment']}}人评论</a>
                    <span id="click">{{$content['click']}}</span>次浏览
                </p>
            </div>
            <!-- 文章信息结束 -->
            <!-- 文章内容区域 -->
            <div class="article_content">
                {!! $content['content'] !!}
            </div>
            <!-- 文章内容区域结束 -->
            <p class="position">当前位置：<a href="/article/lists/{{$content['category_id']}}.html">{{$content->category->name}}</a> » <a href="/article/content/{{$content['id']}}.html">{{$content['title']}}</a></p>
            <p class="tags">继续浏览有关
                @foreach($labels as $label)
                    <a href="/article/label/{{$label->tag_id}}.html">{{$label->title}}</a>
                @endforeach
                的文章</p>
            <!-- 相关文章 -->
            <br><br><br>
            <ul id="msg_list" class="msg_list">
                <p><h3>文章评论</h3></p>
                <p id="loading">
                    <img  src="{{asset('templates/hd//images/loading.gif')}}">
                </p>
            </ul>
            <div id="comment-form-box">
                <form id="commentForm" action="/article/ajax/comment" method="post">
                    @csrf
                    <input type="hidden" name="content_id" value="{{$content['id']}}">
                    <textarea id="comment_content" name="content"></textarea>
                    <input class='submit' type="submit" value="发表评论">
                </form>
            </div>
            <!-- 发表我的评论结束 -->
            <script>
                if(!userIsLogin){
                    $('#comment-form-box').hide();
                }else{
                    $('#comment-form-box').show();
                }
                $('#commentForm').submit(function(){
                    var data = $(this).serialize();
                    var url = $(this).attr('action');
                    $.ajax({
                        url:url,
                        type:'post',
                        data:data,
                        dataType:'json',
                        success:function(result){
                            if(result.status === true){
                                var data = result.data;
                                $('#msg_list').append('<li>\
					<p class="msg_info"><a class="name">'+data.nickname+'</a>'+data.addtime+'</p>\
					<p class="msg_content">'+data.content+'</p>\
				</li>');
                                $('#comment_content').val('');
                            }

                        }
                    })
                    return false;
                })
            </script>
            <script>
                // 读取当前文章的评论内容
                var url = '/article/comment/reads/{{$content['id']}}';
                $.ajax({
                    url:url,
                    type:'get',
                    dataType:'json',
                    success:function(result){
                        if(result.status === true){
                            var data = result.data;
                            for(var i in data){
                                $('#msg_list').append('<li>\
					<p class="msg_info"><a class="name">'+data[i].nickname+'</a>'+data[i].addtime+'</p>\
					<p class="msg_content">'+data[i].content+'</p>\
				</li>');
                            }
                        }
                    },
                    complete:function(){
                        $('#loading').hide();
                    }
                })
            </script>
        </div>
        <!-- 文章信息 -->
    </div>
    <!-- 左侧结束 -->
    <script type="text/javascript">

        /*******
         * 读取cooke
         * @param {Object} name
         */
        function getCookie(name){
            var arr = document.cookie.split('; ');
            var i = 0;
            for (i = 0; i < arr.length; i++) {
                var arr2 = arr[i].split('=');
                if (arr2[0] == name) {
                    return arr2[1];
                }
            }
            return '';
        }
        /**
         * 设置cookie
         * @param name
         * @param value
         * @returns
         */
        var iClick = {{$content['click']}};
        var url = '/article/ajax/updateClick/{{$content['id']}}';
        var updateTime = getCookie('update_time');
        if(!updateTime){
            $.ajax({
                url:url,
                type:'POST',
                data:{
                    'click':iClick*1+1,
                    '_token':'{{csrf_token()}}'
                },
                dataType:'json',
                success:function(result){
                    // if(result.status === true)
                    // {
                    //     $('#click').html(result.click)
                    // }
                }
            });
        }
    </script>
    <!-- 主体区域结束 -->
@endsection