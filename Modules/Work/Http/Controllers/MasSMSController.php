<?php

namespace Modules\Work\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Mongodb;
use DB;
class MasSMSController extends Controller
{
    /**
     * 接收上行短信
     */
    public function masReply(){
        $connection = Mongodb::connectionMongodb('masReply');
//        $result= $connection ->insert('{ _id: 10, type: "misc", item: "card", qty: 15 }');
        $result= $connection ->insert([var_export(file_get_contents("php://input"),true)]);
//        $result=$connection ->get();
//            dd($result);
//        file_put_contents('a.php',var_export(file_get_contents("php://input"),true));
    }

    /**
     * mas状态
     */
    Public function masStatus(){
        $connection = Mongodb::connectionMongodb('masStatus');
        $result= $connection ->insert([var_export(file_get_contents("php://input"),true)]);
//        file_put_contents('b.php',var_export(file_get_contents("php://input"),true));
    }

}
