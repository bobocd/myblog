<footer class="hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h4 class="_title">最新文章</h4>
                @list(['limit'=>4,'time'=>'desc'])
                <div id="" class="_single">
                    <p><a href="">{{$field['title']}}</a></p>
                    <time>{{$field['created_at']}}</time>
                </div>
                @endlist
            </div>
            <div class="col-sm-4 footer_tag">
                <div id="">
                    <h4 class="_title">标签云</h4>
                    @tag
                    <a href="{{$field['url']}}">{{$field['title']}}</a>
                    @endtag
                </div>
            </div>
            <div class="col-sm-4">
                <h4 class="_title">友情链接</h4>
                <div id="" class="_single">
                    <p><a href="" target="_blank">百度</a></p>
                    <p><a href="" target="_blank">百度</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>