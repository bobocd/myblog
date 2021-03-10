@extends('admin::layouts.master')
@section('content')
    @component('admin::components.tabs', ['title' => $user->nickname.'角色设置'])
        @slot('nav')
            <li class="nav-item"><a class="nav-link" href="/admin/admin">用户列表</a></li>
            <li class="nav-item"><a class="nav-link active" href="#">角色设置</a></li>
        @endslot
        @slot('body')
            <form action="/admin/user/role/{{$user['id']}}" method="post">
                @csrf
                        <div class="card card-flat">
                            <div class="card-header">用户角色管理</div>
                            <div class="col-12 col-sm-8 col-lg-6 form-check mt-1">
                                @foreach($roles as $role)
                                    <label class="custom-control custom-checkbox custom-control-inline">
                                        <input class="custom-control-input" name="name[]"
                                               {{ $user->hasRole($role['name']) ? 'checked' : '' }}
                                               value="{{ $role['name'] }}" type="checkbox">
                                        <span class="custom-control-label">{{ $role['title'] }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                <button class="btn btn-primary">保存</button>
            </form>
        @endslot
        @slot('footer')

        @endslot
    @endcomponent
@endsection
