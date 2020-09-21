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
        <link rel="stylesheet" href="{{asset('css/site/font-awesome.min.css')}}"> 
        <link rel="stylesheet" href="{{asset('css/site/slick.css')}}">
        <link rel="stylesheet" href="{{asset('css/site/slick-theme.css')}}">
        <link rel="stylesheet" href="{{asset('css/site/animate.css')}}">
        <!-- Minify My Style -->
        <!-- <link href="{{ asset('css/site/bootstrap/bootstrap-reboot.css') }}" rel="stylesheet"> -->
        <!-- <link href="{{ asset('css/site/myStyle-minify.css') }}" rel="stylesheet">    -->
        <script>window.dataLayer = window.dataLayer || [];function gtag() {dataLayer.push(arguments);} gtag('js', new Date());gtag('config', 'UA-155041698-1');</script>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-155041698-1"></script>
        <script src="{{ asset('js/core/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{asset('js/core/slick.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/core/wow.js')}}"></script>
        <script src="{{asset('js/core/wow.animate.js')}}"></script>
        <script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/core/tooltip.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/core/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/videoplayer/afterglow.min.js') }}" type="text/javascript"></script>
        <!--BEGIN RAYCHAT CODE--> <script type="text/javascript">!function(){function t(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,localStorage.getItem("rayToken")?t.src="https://app.raychat.io/scripts/js/"+o+"?rid="+localStorage.getItem("rayToken")+"&href="+window.location.href:t.src="https://app.raychat.io/scripts/js/"+o;var e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(t,e)}var e=document,a=window,o="06120c99-d579-4a39-b5c6-b0044acc0b01";"complete"==e.readyState?t():a.attachEvent?a.attachEvent("onload",t):a.addEventListener("load",t,!1)}();</script>
        <!--END RAYCHAT CODE-->
</head>
<body>
@include('Layouts.nav')
<div class="container-fluid">
@include('Layouts.error')
</div>
<div style="direction: rtl;" >
@yield('content')
</div>
@include('Layouts.footer')
</body>
</html>
