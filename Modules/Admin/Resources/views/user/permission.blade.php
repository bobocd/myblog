@extends('admin::layouts.master')
@section('content')
    @component('admin::components.tabs', ['title' => $user->nickname.'权限设置'])
        @slot('nav')
            <li class="nav-item"><a class="nav-link" href="/admin/user">用户列表</a></li>
            <li class="nav-item"><a class="nav-link active" href="#">权限设置</a></li>
        @endslot
        @slot('body')
            <form action="/admin/user/permission/{{$user['id']}}" method="post">
                @csrf
                @foreach($modules as $module)
                    @foreach($module['rules']  as $rule)
                        <div class="card card-flat">
                            <div class="card-header">{{ $rule['group'] }}</div>
                            <div class="col-12 col-sm-8 col-lg-6 form-check mt-1">
                                @foreach($rule['permissions']  as $permission)
                                    <label class="custom-control custom-checkbox custom-control-inline">
                                        <input class="custom-control-input" name="name[]"
                                               {{ $user->hasPermissionTo($permission['name']) ? 'checked' : '' }}
                                               value="{{ $permission['name'] }}" type="checkbox">
                                        <span class="custom-control-label">{{ $permission['title'] }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                @endforeach
                <button class="btn btn-primary">保存</button>
            </form>
        @endslot
        @slot('footer')

        @endslot
    @endcomponent
@endsection
