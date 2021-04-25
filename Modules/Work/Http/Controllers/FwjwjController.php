<?php

namespace Modules\Work\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\User;
use Modules\Work\Entities\Fwjwj;
use Illuminate\Support\Facades\Auth;
use App\Handlers\Mas;
use Modules\Work\Http\Requests\FwjwjRequest;

class FwjwjController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Fwjwj $fwjwj,User $user)
    {
        $users=$user->get();
        $fwjwjs=$fwjwj->paginate(10);
        return view('work::fwjwj.index',compact('fwjwjs','users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(User $user)
    {
        $users=$user->get();
        return view('work::fwjwj.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(FwjwjRequest $request,Fwjwj $fwjwj,Mas $mas,User $user)
    {

        $data['title']=$request['title'];
        $data['phone']=$request['phone'];
        $data['belong_name']=$request['belong_name'];
        $data['area_name']=$request['area_name'];
        $data['group_name']=$request['group_name'];
        $data['largeclass']=$request['largeclass'];
        $data['subclass']=$request['subclass'];
        $data['description']=$request['description'];
        $data['emphasis']=$request['emphasis'];
        $data['kd_address']=$request['kd_address'];
        $data['cust_address']=$request['cust_address'];
        $data['cust_portrayal']=$request['cust_portrayal'];
        $data['deal_user_id']=$request['deal_user_id'];
        $data['status']="第一责任人处理";
        $data['grade']=$request['grade'];
        $data['user_id']=Auth::id();
        $fwjwj->fill($data);
        $deal_user=$user->where('id',$data['deal_user_id'])->first();

        //保存成功后发送短信
        if($fwjwj->save()){
            $mas->send($deal_user['name'],$data['title'],$deal_user['phone'],'4e6d21ac6ff041fcb9956a8d7c7f3ff7');
        };
        return redirect('/work/fwjwj')->with('success', '保存成功');
    }


    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Fwjwj $fwjwj)
    {
        return view('work::fwjwj.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /*
     * 接单人处理工单
     */
    public function deal(Fwjwj $fwjwj)
    {
        $fwjwjs=$fwjwj->where('deal_user_id',Auth::id())->paginate(10);
        return view('work::fwjwj.deal',compact('fwjwjs'));

    }

    /**
     * 工单后台处理
     * @param 工单
     * @param User $users
     * @return \Illuminate\Http\RedirectResponse
     */
    public function dealStore(Request $request,Fwjwj $fwjwjs,User $user,Mas $mas){
        $fw=$fwjwjs->where('id',$request['gongdanID'])->first();
        $fw->deal_user_id=$request['users'];
        $fw->status="第二责任人处理";
        //获取转单处理人
        $deal_user=$user->where('id',$request['users'])->first();
        //保存成功后发送短信
        if($fw->save()){
            $mas->send($deal_user['name'],$fw['title'],$deal_user['phone'],'0d2dedd8e2394558b1c33d63bf2347e3');
        }
        return back()->with('success', '转派成功');
    }
}
