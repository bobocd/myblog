<div class="left-sidebar-scroll">
    <div class="left-sidebar-content">
        <ul class="sidebar-elements">
            @foreach(\HDModule::getMenus() as $moduleName => $groups)
                <li class="divider">{{ $moduleName }}</li>
                @foreach($groups as $group)
                    {{--//判断当前用户是否拥有权限，第一个值是权限，第二个值是守卫--}}
                    {{--@if(\HDModule::hadPermission($group['permission'], 'admin'))--}}
                        <li class="parent">
                            <a href="javascript:void(0)"><i class="{{ $group['icon'] }}"></i>&nbsp;<span>{{ $group['title'] }}</span></a>
                            <ul class="sub-menu">
                                @foreach($group['menus'] as $menu)
                                    {{--@if(\HDModule::hadPermission($menu['permission'], 'admin'))--}}
                                        <li>
                                            <a href="{{$menu['url']}}" pjax>{{$menu['title']}}</a>
                                        </li>
                                    {{--@endif--}}
                                @endforeach
                            </ul>
                        </li>
                    {{--@endif--}}
                @endforeach
            @endforeach

            <li class="divider">技术支持</li>
            <li class="parent"><a href="#"><i class="icon mdi mdi-view-web"></i><span>支持</span></a>
                <ul class="sub-menu">
                    <li>
                        <a href="layouts-primary-header.html">视频教程</a>
                    </li>
                    <li>
                        <a href="layouts-success-header.html">访问官网</a>
                    </li>
                </ul>
            </li>
        </ul>

    </div>
</div>
