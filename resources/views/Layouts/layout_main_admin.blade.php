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
     <!--   <script src="{{ asset('js/videoplayer/afterglow.min.js') }}" type="text/javascript"></script> -->

</head>
<div style="direction: rtl">
@include('Layouts.nav')
</div>
<body class="landing-page sidebar-collapse">

  <div class="container-fluid" style="direction:rtl;margin-top:110px;margin-bottom: 25px;"> 
              <div class="container-fluid" style="margin-top:15px">
                @include('Layouts.error')
              </div>
              <!-- Full Container Page Content -->
            <div class="container-fluid" style="margin-top:15px">
                  <div class="row">
                    <div class="col-md-2">
                      <div class="card shadow border-21">
                      @include('Layouts.sidebar_admin_panel')
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
