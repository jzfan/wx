<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', '文章推荐')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">    
    <link href="//at.alicdn.com/t/font_1121909_sagqkpomk6.css" rel="stylesheet">

<style>
img {
    width: 100%;
}
.truncate {
    overflow: hidden;
text-overflow: ellipsis;
white-space: nowrap
}
.pagination {
    margin-top: 1rem;
    justify-content: center;
}
.w-15 {
    width: 15%;
}
.w-20 {
    width: 20%;
}
inset-x-0
{
    left: 0;
    right: 0;
}
.bottom-0 {
    bottom: 0;
}

</style>
</head>
<body>
    @yield('content')

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://unpkg.com/swiper/js/swiper.min.js"> </script>
    @stack('js')
</body>
</html>