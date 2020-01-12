@extends('wx.main')

@section('title')
修改名片
@endsection
@section('content')

<form class='container mt-4' method="POST" action="/wx/card">
    @method('PUT')
    @csrf
<div class="form-group row align-items-center justify-content-between">
    <label class="col-3 col-form-label">头像</label>
    <img src="{{ $user->avatar }}"  class="w-15 mr-4 rounded-circle">
</div>
  <div class="form-group row">
    <label class="col-3 col-form-label">昵称</label>
    <div class="col-9">
      <input type="text" placeholder='请输入昵称' name='name'  class="form-control" value="{{ $user->name }}">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-3 col-form-label">手机号码</label>
    <div class="col-9">
      <input type="number" placeholder='请输入手机号码' name='mobile'  class="form-control" value="{{ $user->mobile }}">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-3 col-form-label">微信号</label>
    <div class="col-9">
      <input type="text" placeholder='请输入微信号' name='wx'  class="form-control" value="{{ $user->wx }}">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-3 col-form-label">个人简介</label>
    <div class="col-9">
    <textarea class="form-control" placeholder='请输入个人简介' name='bio'  rows="3">{{ $user->bio }}</textarea>
    </div>
  </div>
  <button type="submit" class="btn btn-primary float-right">提 交</button>
</form>

@endsection