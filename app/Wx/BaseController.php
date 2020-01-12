<?php

namespace App\Wx;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected function mapUser()
    {
       if (\session('user')) {
          return \session('user');
       }
       $wx = request()->session()->get('wechat.oauth_user.default');
       $user = User::firstOrCreate([
            'openid' => $wx->getId()
       ], [
           'name' => $wx->getNickname(),
           'email' => $wx->getEmail(),
           'avatar' => $wx->getAvatar(),
           'password' => ''
       ]);
      session(['user' => $user]);
      return $user;
    }
}
