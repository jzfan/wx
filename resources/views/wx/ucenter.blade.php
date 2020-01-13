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
    <a href='/wx/card/edit'  class="btn btn-primary btn-sm rounded" type="submit">编辑</a>
  </li>
</ul>
</div>
@endsection

