@extends('wx.main')

@section('content')
<div class="container">
<h4 class='m-4'>历史文章</h4>
<ul class="list-unstyled">
@foreach ($articles as $a)
<li class="media margin-top">
  <img src="/pictures/1.jpg" class="mr-3" alt="..." style='width: 66px;'>
  <div class="media-body">
    <h5 class="mt-0 mb-1">
    <a href="/wx/articles/{{ $a->id }}">
    {{ $a->title}}
    </a></h5>
    <footer class="blockquote-footer float-right">{{ $a->created_at->diffForHumans() }}</footer>
  </div>

</li>


@endforeach
</ul>
</div>
{{ $articles->links() }}
@endsection

