<?php
namespace App\Handlers;

class Mas{
    /**
     * 发送模板短信
     * 用户名、工单名、手机号码、模板
     */
    final public function send($username,$jobId,$mobiles,$templateId){
        $url=env('MAS_URL');

        $EC_NAME = env('MAS_EC_NAME');
        $AP_ID = env('MAS_AP_ID');
        $SECRET_KEY = env('MAS_SECRET_KEY');
        $SIGN = env('MAS_SIGN');
        $params = "[\"$username\",\"$jobId\"]";
        $ADD_SERIAL = '';
        $data = [
            'ecName' => $EC_NAME,
            'apId' => $AP_ID,
            'templateId'=>$templateId,
            'mobiles' => $mobiles,
            'params'=>$params,
            'sign' => $SIGN,
            'addSerial' => $ADD_SERIAL,
            'mac' => md5($EC_NAME . $AP_ID . $SECRET_KEY . $templateId . $mobiles  . $params . $SIGN . $ADD_SERIAL)
        ];

        $data=base64_encode(json_encode($data));

        $curl=curl_init();
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_TIMEOUT,500);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_POST,true);
        curl_setopt($curl,CURLOPT_POSTFIELDS,$data);

        $res=curl_exec($curl);
        curl_close($curl);
    }
}
