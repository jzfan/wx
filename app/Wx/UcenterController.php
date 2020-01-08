<?php

namespace App\Wx;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UcenterController extends Controller
{
    public function index(Request $request)
    {
       $user = $request->session()->get('wechat.oauth_user.default');
    //    var_dump($wx);exit;
    //    $user = User::firstOrCreate([
    //         'openid' => $wx->getId()
    //    ], [
    //        'name' => $wx->getNickname(),
    //        'email' => $wx->getEmail(),
    //        'avatar' => $wx->getAvatar(),
    //        'password' => ''
    //    ]);
       return view('wx.ucenter', compact('user'));
    }
}
