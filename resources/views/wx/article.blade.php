@extends('wx.main')

@section('title')
{{ $article->title }}
@endsection
@section('content')
<div class="card pb-5">
    <div class="card-body">
        <h3 class="card-title text-center">
            <p class='text-left inline-block'>
            {{ $article->title }}
            </p>
        </h3>
        <h6 class="card-subtitle my-2 text-muted text-right">
            {{ $article->view }}次阅读 &nbsp;&nbsp;&nbsp;&nbsp;
            发表于{{ $article->created_at->diffForHumans() }}
        </h6>
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
        <div data-toggle="modal" data-target="#profile" class="position-absolute avatar-top w-20">
            <img src="{{ $user->avatar }}" class="w-full rounded-circle">
        </div>
        <p class='text-center'>{{ $user->name }}</p>
        <div class='text-center px-4 d-flex justify-content-between'>
            <a href="tel:{{ $user->mobile }}" class='btn btn-light btn-sm  rounded-pill'>
                <i class='mr-1 text-danger iconfont icon-mobilephone'></i>打电话
            </a>
            @if ($user->qrcode)
            <button type="button" data-toggle="modal" data-target="#addWx" class="btn btn-light btn-sm  rounded-pill">
              <i class='mr-1 text-danger iconfont icon-wx'></i>加微信
            </button>
            @else
            <a href="/wx/card/edit" class='btn btn-light btn-sm  rounded-pill'>
                <i class='mr-1 text-danger iconfont icon-wx'></i>加微信
            </a>
            @endif
        </div>
    </div>
    </div>
</div>

<!-- Button trigger modal -->
<button type="button" data-toggle="modal" data-target="#freeCard" class="position-fixed inset-x-0 bottom-0 btn btn-danger btn-lg btn-block">免费换成我的名片</button>

<!-- Modal -->
<div class="modal fade" id="freeCard" tabindex="-1" role="dialog" aria-labelledby="freeCardTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="freeCardTitle">更换成功</h5>
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

<!-- Modal -->
<div class="modal fade" id="addWx" tabindex="-1" role="dialog" aria-labelledby="addWxTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addWxTitle">{{ $user->name }}</h5>
      </div>
      <div class="modal-body">
        <img src="{{ $user->qrcode }}" alt="">
      </div>
      <div class="modal-footer">
        <p class='text-center'>长按扫二维码，加微信好友</p>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="profileTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="profileTitle">
            <div  class="position-absolute avatar-top w-20">
                <img src="{{ $user->avatar }}" class="w-full rounded-circle">
            </div>
            <span>
                {{ $user->name }}
            </span>
        </h5>
      </div>
      <div class="modal-body">
          <dl class="row">
             <dt class="col-3">微信</dt>
             <dd class="col-9">{{ $user->wx }}</dd>

             <dt class="col-3">手机</dt>
             <dd class="col-9">{{ $user->mobile }}</dd>

             <dt class="col-3">邮箱</dt>
             <dd class="col-9">{{ $user->email }}</dd>

             <dt class="col-3">简介</dt>
             <dd class="col-9">{{ $user->bio }}</dd>

             <dt class="col-3">注册于</dt>
             <dd class="col-9">{{ $user->created_at->diffForHumans() }}</dd>
          </dl>
      </div>
    </div>
  </div>
</div>
@endsection