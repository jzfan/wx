<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UploaderController extends Controller
{
    public function cover(Request $request)
    {
        return $this->store($request, 'uploads');
    }
    
    public function userQrcode(Request $request)
    {
        $store = $this->store($request, 'uploads');
        $user = User::find(\session('user.id'));
        $user->qrcode = $store['path'];
        $user->save();
        return $store;
    }

    protected function store($request, $dir)
    {
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $photo = $request->file('file');

            $path = $photo->store('public/' . $dir);
            $path = '/' . str_replace('public', 'storage', $path);
            
            return [
                'extension' => $photo->extension(),
                'path' => $path
            ];
        }
        exit('未获取到上传文件或上传过程出错');
    }
}
