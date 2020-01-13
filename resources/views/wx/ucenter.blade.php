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
  <li class="list-group-item d-flex justify-content-between align-items-center">
  <form action="/user-qrcode-upload"
      class="dropzone form-group border p-4"
      id="my-awesome-dropzone">
       <i class="iconfont icon-image"></i> 
       <span class='dz-message'>
       上传个人二维码(最大2MB)
       </span>
  </form>
        
  </li>
</ul>
</div>
@endsection

@push('js')
<!-- <script src="https://cdn.bootcss.com/dropzone/5.5.1/min/dropzone.min.js"></script> -->
<script>
Dropzone.options.myAwesomeDropzone = {
    maxFilesize: 2, // MB
    maxFiles: 1,
    acceptedFiles: 'image/*',
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    success: (file, res) => {
        // console.log(res);
        }
    };
</script>
@endpush

