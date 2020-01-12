<?php

namespace App\Http\Middleware;

use Closure;
use Overtrue\Socialite\User as SocialiteUser;

class MockWxauth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = new SocialiteUser([
                        'id' => '123456',
                        'name' => 'mock-name',
                        'nickname' => 'mock-nickname',
                        'avatar' => 'http://thirdwx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTKowBrATtxP8NrjQ4uLyNVHTE07AVcaias7cxowFodxS5liau6bxQUMq46kwYza31QoF2P06XVkQrPw/132',
                        'email' => null,
                        'original' => [],
                        'provider' => 'WeChat',
                    ]);
        session(['wechat.oauth_user.default' => $user]);
        return $next($request);
    }
}
