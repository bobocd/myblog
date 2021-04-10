<!-- 顶部100%灰色区域 -->
<div id="top_dark_box">
    <!-- 中间1200px宽度区域 -->
    <div id="top_dark">
        <img src="{{asset('templates/hd/images/others/logo.png')}}" id="logo"/>
        <!-- 导航菜单 -->
        <ul id="menu">
            <li>
                <a href="/">首页</a>
            </li>
            @category(['pid'=>[0]])
                <li><a href="{{$field['url']}}">{{$field['name']}}</a></li>
            @endcategory
        </ul>
        <!-- 导航菜单结束 -->
        <!-- 搜索 -->
        <form action="/article/search" class="search_box" method="post">
            @csrf
            <input type="text" class="keyword" name="keywords" placeholder="输入关键字搜索"/>
            <input type="submit" value="搜索" class="sub"/>
        </form>
        <!-- 搜索结束 -->
        <!-- 用户登录 -->
        <div id="loginInfo" class='loginInfo'>
            @if(!Auth::check())
            <a id='login_box' href="javascript:void(0)" class="top_login">用户登录</a>
            @else
                <span>{{Auth::user()->name}}</span><a href="/ajax/logout">退出</a>
            @endif
        </div>
        <!-- 用户登录结束 -->
        <!-- 用户登录对应隐藏区域 -->
        <form id="loginForm" action="/ajax/login" method="post">
            @csrf
            <div class="login_hide_box">
                <img src="{{asset('templates/hd/images/sanjiao.gif')}}" alt=""/>
                <div class="middle">
                    <p>用户名：</p>
                    <input type="text" name="email" class="text"/>
                    <p>密码：</p>
                    <input type="password" name="password" class="text"/>
                    <input type="submit" value="" class="sub"/>
                </div>
                {{--<div class="bottom">--}}
                    {{--<a href="/register" class="reg">注册</a>--}}
                {{--</div>--}}
            </div>
        </form>
    </div>
    <!-- 中间1200px宽度区域结束 -->
</div>
<!-- 顶部灰色100%区域结束 -->

<script>
    var quitUrl = '/ajax/logout';
</script>

<script type="text/javascript">
//用户登录
    $('#loginForm').submit(function () {
        var data = $(this).serialize();
        var url = $(this).attr('action');
        $.ajax({
            url: url,
            type: 'POST',
            data:data,
            dataType: 'json',
            success: function (result) {

                if(result.status == false){
                    alert(result['msg']);
                }
                if (result.status == true) {
                    $('#loginInfo').html('<span>' + result['userinfo'].name + '</span><a href="' + quitUrl + '">退出</a>');
                    $('.reg_hide_box').hide();
                    $('.login_hide_box').hide();
                    $('#login_box').hide();
                    $('#comment-form-box').show();
                }
            }
        })
        return false;
    })
</script>
<script>
    //判断用户是否已经通过其他方式登录
    var userIsLogin = false;
    var url = '/ajax/islogin';
    $.ajax({
        url: url,
        dataType: 'json',
        success: function (result) {
            if (result.status === true) {
                $('#loginInfo').html('<span>' + result['userinfo'].name + '</span><a href="' + quitUrl + '">退出</a>');
                $('.reg_hide_box').hide();
                $('.login_hide_box').hide();
                userIsLogin = true;
                $('#comment-form-box').show();
            }
        }
    })
</script>