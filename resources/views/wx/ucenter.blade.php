@extends('wx.main')
@section('title')
个人中心
@endsection
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <img src="{{ $user->avatar }}" class="w-25 rounded-circle">
    <span class='ml-2'>{{ $user->name }}</span>
  </div>
</div>
  <div class="container">
  <ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    名片
    <a href='/users/{{ $user->id }}/edit'  class="btn btn-primary btn-sm rounded" type="submit">编辑</a>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Dapibus ac facilisis in
    <span class="badge badge-primary badge-pill">2</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Morbi leo risus
    <span class="badge badge-primary badge-pill">1</span>
  </li>
</ul>
</div>
@endsection

