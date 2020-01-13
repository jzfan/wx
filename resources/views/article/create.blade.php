@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header"><i class="iconfont icon-plus"></i>新建文章</div>
    <div class="card-body">
    <form action="/cover-upload"
      class="dropzone form-group border p-4"
      id="my-awesome-dropzone">
       <i class="iconfont icon-image"></i> 上传封面
      </form>
        <form action='/admin/articles' method="POST" class="show-errors">
            @csrf
            <input type="hidden" name='cover' value='' id='cover'>
            <div class="form-group">
                <label><i class="iconfont icon-user"></i>标题</label>
                <input type="text" class="form-control" name='title' value="{{ old('title')}}" required>
            </div>
            <div class="form-group">
                <label>内容</label>
                <textarea class="form-control" id="mark" name='content'></textarea>
            </div>
            @include('layouts.submit-button')
        </form>
    </div>
</div>
<input type="hidden" id='errors' value='{{ $errors->toJson() }}'>
@endsection

@push('js')
<!-- <script src="https://cdn.bootcss.com/dropzone/5.5.1/min/dropzone.min.js"></script> -->
<script>
    var simplemde = new Simplemde({
        element: document.getElementById("mark")
    });

    Dropzone.options.myAwesomeDropzone = {
        maxFilesize: 2, // MB
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: (file, res) => {
            console.log(res);
            $('#cover').val(res.path)
            }
        };
</script>
@endpush