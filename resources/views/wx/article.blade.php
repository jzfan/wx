@extends('wx.main')

@section('title')
{{ $article->title }}
@endsection
@section('content')
<style>
.avatar-top {
    left: 50%;
    top: 0;
    transform: translate(-50%, -50%);
}
</style>
<div class="card pb-5">
    <div class="card-body">
        <h3 class="card-title text-center">
            <p class='text-left inline-block'>
            {{ $article->title }}
            </p>
        </h3>
        <h6 class="card-subtitle my-2 text-muted text-right">{{ $article->created_at->diffForHumans() }}</h6>
        <div class="alert alert-secondary">
            <div class="container d-flex align-items-center">
                <img src="{{ $user->avatar }}" class="w-25 p-2 rounded-circle">
                <span class='flex-grow-1'>{{ $user->name }}</span>
                <a href='#card' class='btn btn-danger btn-sm'>联系Ta</a>
            </div>
        </div>
        <div class='text-center'>
            <img src="{{ $article->cover }}" class="img-fluid">
        </div>
        <div class="card-text mt-4">
            <?php
    $Parsedown = new Parsedown();
    echo $Parsedown->text($article->content); 
    ?>
    </div>
    <div id='card' class="mt-5 pt-5 pb-2 alert alert-danger position-relative">
        <img src="{{ $user->avatar }}" class="position-absolute avatar-top w-20 rounded-circle">
        <p class='text-center'>{{ $user->name }}</p>
        <div class='text-center  d-flex justify-content-between'>
            <a href="tel:{{ $user->mobile }}" class='btn btn-light btn-sm  rounded-pill'>
                <i class='mr-1 text-danger iconfont icon-mobilephone'></i>打电话
            </a>
            <a href="/wx/card/edit" class='btn btn-light btn-sm  rounded-pill'>
                <i class='mr-1 text-danger iconfont icon-wx'></i>加微信
            </a>
        </div>
    </div>
    </div>
</div>

<!-- Button trigger modal -->
<button type="button" data-toggle="modal" data-target="#exampleModalCenter" class="position-fixed inset-x-0 bottom-0 btn btn-danger btn-lg btn-block">免费换成我的名片</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">更换成功</h5>
        <p class='text-center'>扫码领取您的名片文章</p>
      </div>
      <div class="modal-body">
        <img src="{{ $article->qrcode }}" alt="">
      </div>
      <div class="modal-footer">
        <p class='text-center'>精准锁定客户，月签百单!</p>
      </div>
    </div>
  </div>
</div>

@endsection