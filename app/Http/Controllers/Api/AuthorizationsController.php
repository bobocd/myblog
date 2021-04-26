<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\AuthorizationRequest;
use App\Http\Requests\Api\SocialAuthorizationRequest;
use App\Http\Requests\Api\WeappAuthorizationRequest;
use App\Transformers\DataTransformer;
use App\User;
use Auth;
use Illuminate\Http\Request;

class AuthorizationsController extends Controller
{
    /**
     * 手机登录
     */
    public function store(AuthorizationRequest $request)
    {
        $username = $request->username;


        //FILTER_VALIDATE_EMAIL 过滤器把值作为 e-mail 地址来验证
        //根据输入的邮件或手机号做用户名
        filter_var($username, FILTER_VALIDATE_EMAIL) ?
            $credentials['email'] = $username :
            $credentials['phone'] = $username;

        $credentials['password'] = $request->password;

        //验证用户登录
        if (!$token = Auth::guard('api')->attempt($credentials)) {
            return $this->response->errorUnauthorized(trans('auth.failed'));
        }

        return $this->respondWithToken($token)->setStatusCode(201);
//        return $this->respondWithToken($token)->setStatusCode(201);
    }

    /**
     * 三方微信登录
     */
    public function socialStore($type, SocialAuthorizationRequest $request)
    {

        if (!in_array($type, ['weixin'])) {
            return $this->response->errorBadRequest();
        }

        $driver =  \Socialite::driver('weixin');


        try {
            if ($code = $request->code) {
                $response = $driver->getAccessTokenResponse($code);
                //从嵌套数组中获取值
                $token = array_get($response, 'access_token');
            } else {
                $token = $request->access_token;

                if ($type == 'weixin') {
                    $driver->setOpenId($request->openid);
                }
            }

            $oauthUser = $driver->userFromToken($token);
        } catch (\Exception $e) {
            return $this->response->errorUnauthorized('参数错误，未获取用户信息');
        }

        switch ($type) {
            case 'weixin':
                $unionid = $oauthUser->offsetExists('unionid') ? $oauthUser->offsetGet('unionid') : null;

                if ($unionid) {
                    $user = User::where('weixin_unionid', $unionid)->first();
                } else {
                    $user = User::where('weixin_openid', $oauthUser->getId())->first();
                }

                // 没有用户，默认创建一个用户
                if (!$user) {
                    $user = User::create([
                        'name' => $oauthUser->getNickname(),
                        'avatar' => $oauthUser->getAvatar(),
                        'weixin_openid' => $oauthUser->getId(),
                        'weixin_unionid' => $unionid,
                    ]);
                }

                break;
        }

        $token = Auth::guard('api')->fromUser($user);
        return $this->respondWithToken($token)->setStatusCode(201);
//        return $this->response->array(['token' => $user->id]);
//        return $this->response->array(['test_message'=>"store verification code"]);
    }

    /**
     * 更新令牌
     */
    public function update()
    {
        $token = Auth::guard('api')->refresh();
        return $this->respondWithToken($token);
    }
    /**
     * 删除登录
     */
    public function destroy()
    {
        Auth::guard('api')->logout();
        return $this->response->noContent();
    }

    protected function respondWithToken($token)
    {
        return $this->response->array([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60  //expires_in过期时间，单位分
        ]);
    }
}
