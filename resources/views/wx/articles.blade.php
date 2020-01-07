@extends('wx.main')

@section('content')
<div class="swiper-container" style="height: 100vh">
    <div class="swiper-wrapper">
    @foreach ($articles as $a)
        <div class="swiper-slide">
            {{-- <a href="/articles/{{ $a->id }}" class="list-group-item list-group-item-action"> --}}
                {{ $a->title}}
            {{-- </a> --}}
        </div>
@endforeach

    </div>
    
    <!-- 如果需要滚动条 -->
    <div class="swiper-scrollbar"></div>
</div>

@endsection

@push('js')
<script>
    var swiper = new Swiper('.swiper-container', {
        direction : 'vertical',
        // clickable: true,
        slidesPerView: 3,
        mousewheelControl: true,

        on: {
    init: function () {
      console.log('swiper initialized');
    },
    reachEnd: function() {
            console.log(111)
            alert(1)
        },
  },
    });
  </script>
@endpush