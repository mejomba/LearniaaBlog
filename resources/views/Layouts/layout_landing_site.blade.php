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
<body>
@include('Layouts.nav')
<div class="container-fluid" style="z-index:10001">
@include('Layouts.error')
</div>
<div style="direction: rtl" class="d-flex justify-content-around">
<div class="learn-style mt-5">
    <h1 class="mt-5"></h1>
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