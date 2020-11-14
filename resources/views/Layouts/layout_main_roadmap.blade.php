<!DOCTYPE html>
<html lang="fa">
<head>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/Template/logo.png') }}">
    <link rel="icon" href="{{ asset('images/Template/logo.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    @yield('Head')
    <link href="{{ asset('css/site/bootstrap/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/site/myStyle.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" href="{{asset('css/site/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/site/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('css/site/animate.css')}}">
     <!--Scripts-->
     <script src="{{ asset('js/core/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/core/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{asset('js/core/slick.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('js/videoplayer/afterglow.min.js') }}" type="text/javascript"></script>
        <script>window.dataLayer = window.dataLayer || [];function gtag() {dataLayer.push(arguments);} gtag('js', new Date());gtag('config', 'UA-155041698-1');</script>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-155041698-1"></script>   
        <!-- WEB & Mobile Conferance -->
       <script> !function (e, t, a) { "use strict"; var s = t.head || t.getElementsByTagName("head")[0], p = t.createElement("script"); e.iwmfBadge = a, p.async = true, p.src = "{{ asset('js/WebMobile.js') }}", s.appendChild(p) }(window, document, "b-bottom-left"); </script> 
       <!-- WEB & Mobile Conferance -->
</head>
<body>
<div style="direction: rtl">
@include('Layouts.nav')
</div>
<div class="container-fluid">
@include('Layouts.error')
</div>
<div>
@yield('content')
</div>
</body>
</html>
