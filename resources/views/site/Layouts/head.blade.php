
<style>
@font-face
 {
    font-family:'Shabnam';/*تعریف یک نام برای فونت*/
    src: url({{ asset("/font/Shabnam.ttf") }}) }
 </style>

 
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/Template/logo.png') }}">
<link rel="icon"  href="{{ asset('images/Template/logo.png') }}">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  @yield('Head')
  
  <!-- Extra details for Live View on GitHub Pages -->

  <!--     Fonts and icons     -->

  <!-- CSS Files -->
  <link href="{{ asset('css/site/argon.css') }}" rel="stylesheet">

  <link href="{{ asset('css/site/nucleo.css') }}" rel="stylesheet">
  <!-- link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"-->
  
  <link href="{{ asset('css/site/bootstrap/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('css/site/bootstrap/bootstrap-reboot.css') }}" rel="stylesheet">

  <link href="{{ asset('css/site/myStyle.css') }}" rel="stylesheet">

   <!--link href="{{ asset('css/site/bootstrap/bootstrap-grid.css') }}" rel="stylesheet"-->
   <script type="text/javascript" src="//cdn.jsdelivr.net/npm/afterglowplayer@1.x"></script>

   <!-- Global site tag (gtag.js) - Google Analytics -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=UA-155041698-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-155041698-1');
</script>
 <!-- Global site tag (gtag.js) - Google Analytics -->


 <!-- Hotjar Tracking Code for https://learniaa.com -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1691159,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
<!-- Hotjar Tracking Code for https://learniaa.com -->


<!--BEGIN RAYCHAT CODE-->
<script type="text/javascript">!function(){function t(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,localStorage.getItem("rayToken")?t.src="https://app.raychat.io/scripts/js/"+o+"?rid="+localStorage.getItem("rayToken")+"&href="+window.location.href:t.src="https://app.raychat.io/scripts/js/"+o;var e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(t,e)}var e=document,a=window,o="06120c99-d579-4a39-b5c6-b0044acc0b01";"complete"==e.readyState?t():a.attachEvent?a.attachEvent("onload",t):a.addEventListener("load",t,!1)}();</script>
<!--END RAYCHAT CODE-->

  
