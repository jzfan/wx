<?php

namespace App\Wx\Controllers;

use App\User;
use Illuminate\Http\Request;

class UcenterController extends BaseController
{
    public function index(Request $request)
    {
        $user = $this->mapUser();
        return view('wx.ucenter', compact('user'));
    }

    //  public function ()
    //  {

    //  }
}
