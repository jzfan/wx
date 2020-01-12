<?php

namespace App\Wx\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function index(Request $request)
    {
       $user = $this->mapUser();
    }
}
