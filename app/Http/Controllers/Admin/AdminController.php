<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $users = Admin::orderBy('id', 'desc')->paginate(10);
        return view('admin.index', compact('users'));
    }

    public function show(Admin $admin)
    {
        return $admin;
    }

    public function edit(Admin $admin)
    {
        return view('admin.edit', compact('admin'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store()
    {
        $data = $this->checkInput();
        Admin::create($data);
        flash()->success('操作成功');
        return back();
    }

    public function update(Admin $admin)
    {
        $data = $this->checkInput([
            'email' => [
                'required',
                'email',
                Rule::unique('admins')->ignore($admin->id),
            ],
        ]);
        $admin->update($data);
        flash()->success('操作成功');
        return back();
    }

    protected function checkInput($rule = [])
    {
        $rule = array_merge([
            'name' => 'required|alphaDash|between:2, 10',
            'email' => 'required|email|unique:admins',
            'password' => 'alphaDash|between:6, 255',
        ], $rule);

        return $this->validate(request(), $rule);
    }
}
