@extends('wx.main')

@section('content')
<div class="swiper-container">
    <div class="swiper-wrapper">
    @foreach ($articles as $a)
        <div class="swiper-slide"><a href="/articles/{{ $a->id }}" class="list-group-item list-group-item-action">{{ $a->title}}</a></div>
@endforeach

    </div>
    
    <!-- 如果需要导航按钮 -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    
    <!-- 如果需要滚动条 -->
    <div class="swiper-scrollbar"></div>
</div>

@endsection

@push('js')
<script>
    var swiper = new Swiper('.swiper-container', {
      direction: 'vertical',
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
        slidersPerview: 3,
        mousewheelControl: true
      },
    });
  </script>
@endpush