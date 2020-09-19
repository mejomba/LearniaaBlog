<!DOCTYPE html>
<html lang="fa">
<head>
@include('Layouts.head')
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
@include('Layouts.nav')
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
