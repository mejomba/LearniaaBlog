
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
  <!-- Canonical SEO -->
  <link rel="canonical" href="https://www.learniaa.ir/">
  <!--     Fonts and icons     -->

  <!-- CSS Files -->
  <link href="{{ asset('css/site/argon.css') }}" rel="stylesheet">

  <link href="{{ asset('css/site/nucleo.css') }}" rel="stylesheet">
  <!-- link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"-->
  
  <link href="{{ asset('css/site/bootstrap/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('css/site/bootstrap/bootstrap-reboot.css') }}" rel="stylesheet">

  <link href="{{ asset('css/site/myStyle.css') }}" rel="stylesheet">


   <!--link href="{{ asset('css/site/bootstrap/bootstrap-grid.css') }}" rel="stylesheet"-->


  
