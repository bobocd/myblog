<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Overtrue\EasySms\EasySms;
use Illuminate\Support\Str;
use App\Http\Requests\Api\VerificationCodeRequest;
use App\Handlers\Mas;

class VerificationCodesController extends Controller
{

    private $hcsj;
    public function store(VerificationCodeRequest $request,Mas $mas){

        //获取图片验证码
        $captchaData = \Cache::get($request->captcha_key);

        if (!$captchaData) {
            return $this->response->error('图片验证码已失效', 422);
        }
        //比对缓存和输入验证码是否一致
        if (!hash_equals(Str::lower($captchaData['code']), Str::lower($request->captcha_code))) {
            // 验证错误就清除缓存
            \Cache::forget($request->captcha_key);
            return $this->response->errorUnauthorized('验证码错误');
        }

        $phone = $captchaData['phone'];

        $this->hcsj=3;
        // 生成6位随机数，左侧补0
        $code = str_pad(random_int(1, 999999), 6, 0, STR_PAD_LEFT);
        try{
            $mas->send([$code,$this->hcsj],$phone,'aa7b60cd504a48c19540c74e63913eb3');

        }catch (\GuzzleHttp\Exception\ClientException $exception){
            $response = $exception->getResponse();
            $result = json_decode($response->getBody()->getContents(), true);
            return $this->response->errorInternal($result['msg'] ?? '短信发送异常');
        }
        //返回一个随机的 key
        $key = 'verificationCode_'.str_random(15);
        $expiredAt = now()->addMinutes($this->hcsj);
        // 缓存验证码 3分钟过期。
        \Cache::put($key, ['phone' => $phone, 'code' => $code], $expiredAt);

        return $this->response->array([
            'key' => $key,
            'expired_at' => $expiredAt->toDateTimeString(),
        ])->setStatusCode(200);
//        return $this->response->array(['test_message'=>"store verification code"]);
    }
}
