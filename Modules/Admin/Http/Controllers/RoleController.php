<?php

namespace Modules\Admin\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $roles=Role::where('name','<>','webmaster')->get();
        return view('admin::role.index',compact('roles'));
    }


    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(RoleRequest $request)
    {
        Role::create(['title' => $request->title, 'name' => $request->name]);
        session()->flash('success', '角色添加成功');

        return back();

    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        $role->update(['title' => $request->title, 'name' => $request->name]);
        session()->flash('success', '角色编辑成功');

        return back();
    }
    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        DB::table('model_has_roles')->where('role_id','=',$role['id'])->delete();
        return redirect('/admin/role')->with('success','删除成功');
    }

    //权限添加入库
    public function permissionStore(Request $request, Role $role)
    {
        $role->syncPermissions($request->name); //同步角色权限
        session()->flash('success', '权限设置成功');
        return back();
    }
    //为角色添加权限
    public function permission(Role $role)
    {
        $modules = \HDModule::getPermissionByGuard('web');
//         dd($modules);
        return view('admin::role.permission', compact('role', 'modules'));
    }
}
