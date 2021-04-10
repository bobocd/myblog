<aside class="col-md-4 hidden-sm hidden-xs">
    <div class="_widget">
        <h4>关于自己</h4>
        <div class="_info">
            <p>个人网站开发学习经验记录</p>
            <p>
                <i class="glyphicon glyphicon-volume-down"></i>
                <a href="http://www.houdunwang.com" target="_blank">大声吼</a>
            </p>
        </div>
    </div>
    <div class="_widget">
        <h4>分类列表</h4>
        <div>
            @category
            <a href="{{$field['url']}}">{{$field['name']}}</a>
            @endcategory
        </div>
    </div>
    <div class="_widget">
        <h4>标签云</h4>
        <div class="_tag">
            @tag
            <a href="{{$field['url']}}">{{$field['title']}}</a>
            @endtag
        </div>
    </div>
</aside>