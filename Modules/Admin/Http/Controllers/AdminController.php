<?php

namespace Modules\Admin\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\UserRequest;
use Modules\Admin\Http\Requests\UpuserRequest;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Redis;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(User $user)
    {
//        Redis::set('name', 'Taylor');
//        sleep(10);
//        dd($_SERVER['REMOTE_ADDR']);
        $users=$user->paginate(10);
        return view('admin::user.index',compact('users'));
    }


    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(UserRequest $request)
    {
        User::create(['name' => $request['name'], 'email' => $request['email'], 'password' => bcrypt($request['password'])]);
        session()->flash('success', '用户添加成功');
        return back();
    }


    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpuserRequest $request,User $user)
    {
        if($request['name']){
            $user['name']=$request['name'];
        }
        if($request['password']){
            $user['password']=bcrypt($request['password']);
        }
        $user->save();
        session()->flash('success', '用户修改成功');
        return back();
    }


    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(User $user)
    {
        $user->delete();
//        DB::table('model_has_roles')->where('model_id','=',$admin['id'])->delete();
//        DB::table('model_has_permissions')->where('model_id','=',$admin['id'])->delete();
        return redirect('/admin/user')->with('success', '用户删除成功');
    }
    //添加用户权限
    public function permission(User $user)
    {
        $modules = \HDModule::getPermissionByGuard('web');
        return view('admin::user.permission', compact('user', 'modules'));
    }

    /**
     * 同步用户权限
     * 此段代码先在本地执行下，直接执行远程会报错
     */
    public function permissionStore(Request $request, User $user)
    {
        $user->syncPermissions($request['name']);
        session()->flash('success', '权限设置成功');
        return back();
    }

    //添加用户角色
    public function addRole(User $user){
        $roles=Role::where('name','<>','webmaster')->get();
        return view('admin::user.role',compact('user','roles'));
    }
    //用户角色入库
    public function rolestore(Request $request, User $user){

        $user->syncRoles($request['name']);
        session()->flash('success', '角色添加成功');
        return back();
    }
}
