<!DOCTYPE html>
<html lang="fa">
<head>
       
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
        <script>window.dataLayer = window.dataLayer || [];function gtag() {dataLayer.push(arguments);} gtag('js', new Date());gtag('config', 'UA-155041698-1');</script>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-155041698-1"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-9WYFV7JQKN"></script>
        <script> window.dataLayer = window.dataLayer || [];  function gtag(){dataLayer.push(arguments);} gtag('js', new Date());  gtag('config', 'G-9WYFV7JQKN');</script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
          <!-- Google Tag Manager -->
          <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-M5WMRKL');</script>
        <!-- End Google Tag Manager -->
        <!-- WEB & Mobile Conferance -->
       <script> !function (e, t, a) { "use strict"; var s = t.head || t.getElementsByTagName("head")[0], p = t.createElement("script"); e.iwmfBadge = a, p.async = true, p.src = "{{ asset('js/WebMobile.js') }}", s.appendChild(p) }(window, document, "b-bottom-left"); </script> 
       <!-- WEB & Mobile Conferance -->
        <!--BEGIN RAYCHAT CODE--> 
        <script type="text/javascript">!function(){function t(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,localStorage.getItem("rayToken")?t.src="https://app.raychat.io/scripts/js/"+o+"?rid="+localStorage.getItem("rayToken")+"&href="+window.location.href:t.src="https://app.raychat.io/scripts/js/"+o;var e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(t,e)}var e=document,a=window,o="06120c99-d579-4a39-b5c6-b0044acc0b01";"complete"==e.readyState?t():a.attachEvent?a.attachEvent("onload",t):a.addEventListener("load",t,!1)}();</script>
        <!--END RAYCHAT CODE-->

        <!-- PWA -->
        @if(Request::url() === 'https://learniaa.com/')
          <link rel="manifest" href="https://learniaa.com/manifest.json" />
        <script>if("serviceWorker" in navigator){ navigator.serviceWorker .register("https://learniaa.com/serviceWorker.js").then(reg => {console.log("Service worker registred successfully", reg);}).catch(err => {console.log("service worker not registred !!", err);});} </script>
        <meta name="theme-color" content="#fafafa">
        <link rel="apple-touch-icon" sizes="76x76" href="https://learniaa.com/images/Template/logo.png">
        <link rel="apple-touch-icon" sizes="60x60" href="https://learniaa.com/images/Template/logo.png">
@endif
       
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M5WMRKL"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="banner-bg" style="direction: rtl">
<img style="" class="header-bg" src="{{asset('images/testimonials-background.jpg')}}" alt="">
@include('Layouts.nav')
</div>
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
