<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

@include('site.Layouts.head')

<style>

.custom_shadow
{
  box-shadow : 0 16px 24px 2px rgba(0, 0, 0, 0.0), 0 6px 30px 5px rgba(0, 0, 0, 0), 0 8px 10px -5px rgba(0, 0, 0, 0.2) ;
}
</style>

</head>


<body  style="background-color:#FFFFFF ;">


@include('site.Layouts.nav')



  <div class="page-header" data-parallax="true"
   style="background-color:#FFFFFF;margin-left:15px;margin-right: 15px;margin-top:110px;margin-bottom:15px">
   
      <div class="container-fluid" style="margin-top:15px">

    @include('site.Layouts.error')

    </div>

  <div class="row">

            <div class="col-12 col-md-4">
                
                  @yield('text_landing')

              </div>

             

              <div class="col-12 col-md-8">
                
                  @yield('pic_landing')

            </div>



      </div>
    </div>

  </div>
  <div class="main main-raised custom_shadow" style="margin-left: 0px;margin-right: 0px;">
 <div class="container-fluid" style=" margin-left: 0px;margin-right: 0px;">
   
      @yield('content')


  </div>

  @include('site.Layouts.footer')

  <script src="{{ asset('js/core/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/core/tooltip.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/core/bootstrap.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/site/argon.js') }}" type="text/javascript"></script>





   <!-- Global site tag (gtag.js) - Google Analytics -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=UA-155041698-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-155041698-1');
</script>
 <!-- Global site tag (gtag.js) - Google Analytics -->


<!--BEGIN RAYCHAT CODE-->
<script type="text/javascript">!function(){function t(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,localStorage.getItem("rayToken")?t.src="https://app.raychat.io/scripts/js/"+o+"?rid="+localStorage.getItem("rayToken")+"&href="+window.location.href:t.src="https://app.raychat.io/scripts/js/"+o;var e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(t,e)}var e=document,a=window,o="06120c99-d579-4a39-b5c6-b0044acc0b01";"complete"==e.readyState?t():a.attachEvent?a.attachEvent("onload",t):a.addEventListener("load",t,!1)}();</script>
<!--END RAYCHAT CODE-->

  





  <!--
  <script src="{{ asset('js/core/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/site/headroom.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/site/onscreen.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/site/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
-->




</body>
</html>