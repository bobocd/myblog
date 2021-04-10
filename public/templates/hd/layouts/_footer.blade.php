<!-- 底部浅灰色导航区域 -->
<div id="bottom_menu_box" style="margin-top:30px;">
    <div class="bottom_menu">
        @navigation(['limit'=>6,'sort'=>'desc'])
        <dl>
            <dt><a href="{{$field['URL']}}" target="{{$field['opennew']}}?'_blank':'_self'">{{$field['title']}}</a></dt>
        </dl>
        @endnavigation
    </div>
</div>
<!-- 底部浅灰色导航区域结束 -->

<!-- 底部版权区域 -->
<div id="bottom_copyright_box">
    <div class="bottom_copyright">
        Copyright © 荟学习 中文网 | 蜀ICP备19024028号 | 蜀ICP备19024028号-1
    </div>
</div>
<!-- 底部版权区域结束 -->