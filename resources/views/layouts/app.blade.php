<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Life p!ckup 拾見好物</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Custom font-->
    <link rel="stylesheet" href="fonts/stylesheet.css">
    <!-- Swiper-->
    <link rel="stylesheet" href="vendor/swiper/css/swiper.min.css">
    <!-- AOS - AnimationOnScroll-->
    <link rel="stylesheet" href="vendor/aos/aos.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- Theme stylesheet-->
    <link rel="stylesheet" href="/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png">
    <!-- FontAwesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.0/css/all.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
<body >
    @include('layouts.navbar')
    @yield('content')
    @include('layouts.footer')
</body>
</html>
