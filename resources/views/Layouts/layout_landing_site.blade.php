<!DOCTYPE html>
<html lang="fa">
<head>
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/Template/logo.png') }}">
        <link rel="icon" href="{{ asset('images/Template/logo.png')}}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        @yield('Head')
        <link type="text/css" href="{{ asset('css/site/bootstrap/bootstrap.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('css/site/myStyle.css') }}" rel="stylesheet"> 
        <link type="text/css" rel="stylesheet" href="{{asset('css/site/slick.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('css/site/slick-theme.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('css/site/animate.css')}}">
        <!--Scripts-->
        <script src="{{ asset('js/core/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/core/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{asset('js/core/slick.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('js/videoplayer/afterglow.min.js') }}" type="text/javascript"></script>
        <script src="https://kit.fontawesome.com/171e40aa76.js" crossorigin="anonymous"></script>
        <script>window.dataLayer = window.dataLayer || [];function gtag() {dataLayer.push(arguments);} gtag('js', new Date());gtag('config', 'UA-155041698-1');</script>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-155041698-1"></script>
        <script type="text/javascript">!function(){function t(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,localStorage.getItem("rayToken")?t.src="https://app.raychat.io/scripts/js/"+o+"?rid="+localStorage.getItem("rayToken")+"&href="+window.location.href:t.src="https://app.raychat.io/scripts/js/"+o;var e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(t,e)}var e=document,a=window,o="06120c99-d579-4a39-b5c6-b0044acc0b01";"complete"==e.readyState?t():a.attachEvent?a.attachEvent("onload",t):a.addEventListener("load",t,!1)}();</script>
        <!--BEGIN RAYCHAT CODE--> 
        <!--END RAYCHAT CODE-->

        <!-- WEB & Mobile Conferance -->
        <script> !function (e, t, a) { "use strict"; var s = t.head || t.getElementsByTagName("head")[0], p = t.createElement("script"); e.iwmfBadge = a, p.async = true, p.src = "https://cdn.iwmf.ir/js/people-votes/people-vote-4-2.js", s.appendChild(p) }(window, document, "b-bottom-left"); </script>        <!-- WEB & Mobile Conferance -->

</head>
<body>
@include('Layouts.nav')
<div class="container-fluid" style="z-index:10001">
@include('Layouts.error')
</div>
<div style="direction: rtl;" class="d-flex justify-content-around">
<div class="learn-style mt-5">
    <h1 class="mt-5" style="margin-top:5rem !important"></h1>
    @yield('text_landing')
</div>
<div class="learn-style">
    @yield('pic_landing')
</div>
</div>
@yield('content')
@include('Layouts.footer')
</body>
</html>
