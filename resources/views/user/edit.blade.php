@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header"><i class="iconfont icon-edit"></i>编辑用户</div>
    <div class="card-body">
        <form action='/admin/users/{{ $user->id }}' method="POST" class="show-errors">
            @csrf
            @method('put')
            <div class="form-group">
                <label><i class="iconfont icon-user"></i>用户名</label>
                <input type="text" class="form-control" name='name' value="{{ old('name', $user->name )}}">
            </div>
            <div class="form-group">
                <label><i class="iconfont icon-mobilephone"></i>手机号</label>
                <input type="text" class="form-control" name='mobile' value="{{ old('mobile', $user->mobile )}}">
            </div>
            <div class="form-group">
                <label><i class="iconfont icon-wx"></i>微信号</label>
                <input type="text" class="form-control" name='wx' value="{{ old('wx', $user->wx )}}">
            </div>
            <div class="form-group">
                <label><i class="iconfont icon-email"></i>Email</label>
                <input type="text" class="form-control" name='email' value="{{ old('email', $user->email )}}">
            </div>

            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="role" name="role" value='user'
                @if ($user->role === 'user')
                    checked='true'
                @endif
                 class="custom-control-input">
                <label class="custom-control-label" for="role">普通用户</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="kefu" name="role" value='kefu' 
                @if ($user->role === 'kefu')
                    checked='true'
                @endif
                class="custom-control-input">
                <label class="custom-control-label" for="kefu">客服人员</label>
            </div>

            @include('layouts.submit-button')
        </form>
        <input type="hidden" id='errors' value='{{ $errors->toJson() }}'>
    </div>
</div>
@endsection
