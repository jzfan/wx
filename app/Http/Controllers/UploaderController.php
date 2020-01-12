<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploaderController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $photo = $request->file('file');

            $path = $photo->store('public/uploads');
            $path = '/' . str_replace('public', 'storage', $path);
            
            return [
                'extension' => $photo->extension(),
                'path' => $path
            ];
        }
        exit('未获取到上传文件或上传过程出错');
	}
}
