<?php

namespace Modules\Work\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\User;
use Modules\Work\Entities\Fwjwj;
use Illuminate\Support\Facades\Auth;
use App\Handlers\Mas;

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
    public function store(Request $request,Fwjwj $fwjwj,Mas $mas,User $user)
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

        if($fwjwj->save()){

            $mas->send($deal_user['name'],$data['title'],$deal_user['phone'],'0aeac61ac8a141dfb0274542cb0544f2');
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

    public function dealStore(Request $request,Fwjwj $fwjwjs,User $users){
        $fw=$fwjwjs->where('id',$request['gongdanID'])->first();
        $fw->deal_user_id=$request['users'];
        $fw->status="第二责任人处理";
        $fw->save();
        return back()->with('success', '转派成功');
    }
}
