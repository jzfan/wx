@extends('wx.main')

@section('content')
<div class="container">
<h4 class='m-4'>历史文章</h4>
<div class="list-group">
@foreach ($articles as $a)
    <a href="/wx/articles/{{ $a->id }}" class="list-group-item list-group-item-action">
        {{ $a->title}}
    </a>
@endforeach
</div>
  </div>
{{ $articles->links() }}
@endsection

