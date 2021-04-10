<div class="right">
    <div class='hd_title'>
        <strong>标签云</strong>
    </div>
    <div id="tagBox" class='tags'>
        @tag
        <a href="{{$field['url']}}">{{$field['title']}}</a>
        @endtag
    </div>
    <div class='hd_title'>
        <strong>热门文章</strong>
    </div>
    <ul class='arc_list'>
        @list(['click'=>'desc','limit'=>5])
        <li>
            <div class='image'>
                <a href="{{$field['url']}}">
                    <img src="{{$field['thumb']}}"/>
                </a>
            </div>
            <h2><a href="{{$field['url']}}">{{$field['title']}}</a></h2>
            <p>
                <em>{{mb_substr($field['created_at'],0,10,'utf-8')}}</em><span>{{$field['comment']}}条评论</span>
            </p>
        </li>
        @endlist
    </ul>
    <div class='hd_title'>
        <strong>推荐文章</strong>
    </div>

    <ul class='arc_list'>
        <@list(['iscommend'=>1,'limit'=>3])
        <li>
            <div class='image'>
                <a href="{{$field['url']}}">
                    <img src="{{$field['thumb']}}"/>
                </a>
            </div>
            <h2><a href="{{$field['url']}}">{{$field['title']}}</a></h2>
            <p>
                <em>{{mb_substr($field['created_at'],0,10,'utf-8')}}</em><span>{{$field['comment']}}条评论</span>
            </p>
        </li>
        @endlist
    </ul>
</div>
