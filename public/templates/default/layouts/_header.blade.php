<nav role="navigation" class="navbar navbar-default">
    <div class="container">
        <div class="row">
            <div class="col-sm-12" >
                <div class="collapse navbar-collapse" id="example-navbar-collapse">
                    <ul class="_menu" >

                        <li class="_active"><a href="/">首页</a></li>
                        @category(['pid'=>[0]])
                        <li><a href="{{$field['url']}}">{{$field['name']}}</a></li>
                        @endcategory
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>