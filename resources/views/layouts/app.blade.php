<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Facebook
	================================================== -->
	<meta property="og:title" content="">
	<meta property="og:description" content="">
	<meta property="og:image" content="">
	<meta property="og:site_name" content="Daemon">
	<meta property="og:type" content="website">
	<meta property="og:locale" content="zh_TW">
	<meta property="og:url" content="http://moveon-design.com/">
	<!-- end Facebook
	================================================== -->

    <!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/img/favicon.ico" type="image/x-icon">
	<!-- end Favicons
	================================================== -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- CSS
	================================================== -->

	<!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/css/vendor/jqueryui/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="/css/vendor/fontawesome/font-awesome.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">


	<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">	 -->
	<link rel="stylesheet" type="text/css" href="/css/vendor/bootstrap/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/components/checkbox.min.css">

	<link rel="stylesheet" type="text/css" href="/css/vendor/animation/animation.css">
	<link rel="stylesheet" type="text/css" href="/css/vendor/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="/css/vendor/slick/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/global.css">
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- CSS
	================================================== -->

    <style>
        .dropdown-menu .dropdown-submenu ul li a{
            display: block!important;
        }
        .navbar-light .navbar-nav .nav-link {
            color: #272727;
        }

        .navbar-light .navbar-nav .nav-link:hover{
            color: #000;
        }

        .custom-badges {
            background-color: #4b4b4b;
            border-radius: 50%;
            position: absolute;
            bottom: 85%;
            right: 24px;
            color: #fff;
        }
        ul.navbar-user li {
            padding: 20px;


        }
        @media (max-width: 1440px){
            ul.navbar-user li {
            padding: 0px;

            }
        }
        .navbar .navbar-user li svg path, .navbar .navbar-user li p {
            fill: #4b4b4b;
            color: #4b4b4b;
        }
        .navbar .navbar-user li:hover path, .navbar .navbar-user li:hover p {
            fill: #000;
            color: #000;
        }
        .header-input button {
            padding: 5px 15px;
        }
        .index-bn2 {
            cursor: pointer;
        }
        @media only screen and (max-width: 767px) {
            .index-article-box .index-article .intro {
                padding: 30px;
            }
        }
        @media only screen and (min-width: 768px) {
            .index-article-box .index-article .intro {
                padding: 50px;
            }
        }
        footer a .svg-farrow {
            width: 10px;
            margin-right: 5px;
        }
        .index-adslide-ul .parent:hover .child {
            transform: scale(1.2);
            transition: all .5s;
        }
        .child {
            height: 100%;
            width: 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            -webkit-transition: all .5s;
            transition: all .5s;
        }
        .parent {
            overflow: hidden;
        }
        .navbar .dropdown-menu .dropdown-submenu li ul li:hover {
            opacity: .7;
            color: white;
        }

        .lds-dual-ring {
            margin: 0px auto;
            width: 64px;
            height: 64px;
        }

        .lds-dual-ring:after {
            content: " ";
            display: block;
            width: 46px;
            height: 46px;
            margin: 1px;
            border-radius: 50%;
            border: 5px solid #536f4f;
            border-color: #536f4f transparent #536f4f transparent;
            animation: lds-dual-ring 1.2s linear infinite;
        }

        @keyframes lds-dual-ring {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        .dropdown-toggle::after{
            display: inline-block;
            width: 0;
            height: auto;
            margin-left: .255em;
            margin-bottom: 5px;
            vertical-align: .255em;
            content: "▾";
            border-top: 0 solid;
            border-right: 0 solid transparent;
            border-bottom: 0;
            border-left: 0 solid transparent;
            position: absolute;
            bottom: 0;
            transform: translateX(-5px);

        }

        @media only screen and (min-width: 1200px){

            .nav-item.header-input{
                display: none
            }
            .dropdown-submenu .dropdown-item{
                display: block;
                width: 100%;
                padding: 0;
                clear: both;
                font-weight: inherit;
                color: inherit;
                text-align: inherit;
                white-space: inherit;
                background-color: transparent;
                border: 0;
            }
            .dropdown-submenu .dropdown-menu{
                position: relative!important;
                top: 0;
                z-index: 5;
                width: inherit;
                padding: 0;
                border-top: 0;
            }

        }
        @media only screen and (max-width: 1199px){

            .dropdown-toggle::after{
                position: relative;
                transform: translateX(0px);
            }
            .navbar{
                height: auto;
                max-height: 100vh;
                /*overflow: scroll;*/
            }
            .navbar .navbar-collapse .dropdown-submenu *{
                color: #272727!important;
            }
            .dropdown-submenu .dropdown-menu  li{
                margin-left: 0px!important;
                margin-bottom: 0px!important;
            }
            .dropdown-submenu .dropdown-menu  li a{
                padding: 17px 0 17px 30px;
                border: 0;
            }
            .dropdown-submenu .dropdown-menu  li a:hover{
                background: rgba(255,255,255,.2)!important;
            }
            .nav-item.header-input{
                padding: 0 20px!important;
            }
            .navbar .form-control + button{
                right: 30px;
            }
            .navbar .navbar-collapse {
                padding: 20px 0 0 0;
                margin-top:0px;
            }
            nav.navbar.navbar-expand-lg.navbar-light li.nav-item{
                padding:  0
            }
            .navbar .nav-item a{
                justify-content: flex-start;
                padding-left: 30px;
                border-bottom: 1px solid rgba(0,0,0,.2);
            }
            .navbar .nav-item a:hover{
                background: rgba(0,0,0,.2);
            }
            .navbar .dropdown-menu{
                padding: 0;
                /* background: #CDE0CA */
                background: #ccc
            }
            .navbar .dropdown-menu li h3{
                padding-top: 17px;
                padding-bottom: 17px;
                margin-bottom: 0px;
            }
            .navbar .dropdown-menu li h3:hover{
                background: rgba(255,255,255,.2);
            }
            .navbar .dropdown-menu li{
                margin-bottom: 0;
            }
            body{
                margin-top: 70px!important

            }
            @media (max-width: 1440px){
                body{
                    margin-top: 50px!important

                }
            }
            form.header-input{
                display: none
            }
            .nav-item.header-input form{
                width: 100%;
            }
            .nav-item.header-input{
                position: relative;
                top: 0;
                background-color:transparent;
                color: #495057!important;
            }
            .dropdown-submenu .dropdown-item:active{
            background: transparent;
            }
            .dropdown-submenu .dropdown-item:hover{
            background: transparent;
            }
            .dropdown-submenu .dropdown-item{
                cursor: pointer;
                position: relative;
            }
            .dropdown-submenu .dropdown-item:after{
                display: inline-block;
                content: "▾";
                vertical-align: middle;
                margin-left: .255em;
                margin-bottom: 3px;
            }
            .dropdown-submenu li.show .dropdown-item:before{
                content: '';
                display: block;
                height: 100%;
                width: 10px;
                background: #272727;
                position: absolute;
                top: 0;
                left: 0;
            }
            .dropdown-submenu li.show .dropdown-item:after{
                display: inline-block;
                content: "▾";
                transform: rotate(180deg);
                vertical-align: middle;
                margin-left: .255em;
                margin-bottom: 3px;
            }
        }
    </style>
    <!-- jQuery
	================================================== -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src='/js/jquery-1.12.3.min.js'></script>
	<script src="/js/vendor/slick/slick.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

	<!-- jQuery
	================================================== -->
</head>
<body>
    @include('layouts.navbar')
    @yield('content')
    @include('layouts.footer')
</body>
</html>
