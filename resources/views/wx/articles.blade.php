@extends('wx.main')

@section('content')
<div class="swiper-container" style="height: 100vh">
    <div class="swiper-wrapper">
    @foreach ($articles as $a)

        <div class="swiper-slide">
            <a href="/wx/articles/{{ $a->id }}" class="list-group-item list-group-item-action truncate">
                {{ $a->title}}
            </a> 
        </div>
    @endforeach
    <div class="swiper-slide">
    @if ($articles->nextPageUrl() == null)
        <div class="swiper-slide text-center bg-gray">没有更多了</div>
    @else
        <div class="swiper-slide text-center bg-gray">加载中...</div>
    @endif
    </div>
</div>

@endsection

@push('js')
<script>
    var swiper = new Swiper('.swiper-container', {
        direction : 'vertical',
        slidesPerView: 10,
        mousewheelControl: true,

        on: {
        reachEnd: function() {
            let next = @json($articles->nextPageUrl());
            if (next) {
                window.location.href = next
            }
       },
       reachBeginning: function() {
           alert(111)
            let prev = @json($articles->previousPageUrl());
            if (prev) {
                window.location.href = prev
            }
       },
  },
    });
  </script>
@endpush