<?php

namespace App\Wx\Controllers;

use App\User;

class CardController extends BaseController
{
    public function edit()
    {
       $user = $this->mapUser();
       return view('wx.card', \compact('user'));
    }

    public function update()
    {
        $arr = request()->only(['name', 'mobile', 'bio', 'wx']);
        $user = $this->mapUser();
        $user->update($arr);
        session(['user' => null]);
        return \redirect('/wx/ucenter');
    }
}
