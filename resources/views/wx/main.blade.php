<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<<<<<<< Updated upstream
=======
    
>>>>>>> Stashed changes
    <title>@yield('title', '文章推荐')</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">    

<style>
img {
    width: 100%;
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