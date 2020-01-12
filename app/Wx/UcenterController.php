<?php

namespace App\Wx;

use App\User;
use Illuminate\Http\Request;

class UcenterController extends BaseController
{
    public function index(Request $request)
    {
       $user = $this->mapUser();
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
