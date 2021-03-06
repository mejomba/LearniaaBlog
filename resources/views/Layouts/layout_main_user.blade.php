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
        
       <!---start GOFTINO code--->
<script type="text/javascript">
  !function(){var a=window,d=document;function g(){var g=d.createElement("script"),s="https://www.goftino.com/widget/gtxWeB",l=localStorage.getItem("goftino");g.type="text/javascript",g.async=!0,g.referrerPolicy="no-referrer-when-downgrade",g.src=l?s+"?o="+l:s;d.getElementsByTagName("head")[0].appendChild(g);}"complete"===d.readyState?g():a.attachEvent?a.attachEvent("onload",g):a.addEventListener("load",g,!1);}();
</script>
<!---end GOFTINO code--->

</head>
<div style="direction: rtl">
@include('Layouts.nav')
</div>
<body class="landing-page sidebar-collapse">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M5WMRKL"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  <div class="container-fluid" style="direction:rtl;margin-top:110px;margin-bottom: 25px;"> 
              <div class="container-fluid" style="margin-top:15px">
                @include('Layouts.error')
              </div>
              <!-- Full Container Page Content -->
            <div class="container-fluid" style="margin-top:15px">
                  <div class="row">
                    <div class="col-md-2">
                      <div class="card shadow border-21">
                      @include('Layouts.sidebar_user_panel')
                      </div>
                    </div>
                    <div class="col-md-10" style="min-height:285px;padding-left: 0px;padding-right: 0px;">  
                    @yield('content')
                   </div>
                </div>    
            </div>
    <!-- Full Container Page Content -->
  </div>
</body>
</html>
