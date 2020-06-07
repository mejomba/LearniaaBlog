
<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

@include('admin.Layouts.head')

</head>


<body class="landing-page sidebar-collapse">

@include('admin.Layouts.nav')


  <div class="card shadow border-21" 
  style="margin-left:15px;margin-right: 15px;margin-top:110px;padding-bottom: 60px;margin-bottom: 15px;">
  
              
              <div class="container-fluid" style="margin-top:15px">

                @include('admin.Layouts.error')
                
              </div>

              <!-- Full Container Page Content -->

            <div class="container-fluid" style="margin-top:15px">

                  <div class="row">
                  <div class="col-md-12">
                  @include('admin.Layouts.sidebar_horizontal')
                  </div>
                  </div>

                  <div class="row" style="padding-top:15px">
                  <div class="col-md-12" style="min-height:285px">  

                      @yield('content')

                  </div>
                  </div>
            </div>

            <!-- Full Container Page Content -->


  </div>


@include('admin.Layouts.footer')
 

<script src="{{ asset('js/core/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/core/tooltip.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/core/bootstrap.min.js') }}" type="text/javascript"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-155041698-1"></script>
<script>window.dataLayer = window.dataLayer || [];function gtag() {dataLayer.push(arguments);}
gtag('js', new Date());gtag('config', 'UA-155041698-1');
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<!--BEGIN RAYCHAT CODE-->

<script type="text/javascript">!function () {function t() {
var t = document.createElement("script");
t.type = "text/javascript", t.async = !0, localStorage.getItem("rayToken") ? t.src = "https://app.raychat.io/scripts/js/" + o + "?rid=" + localStorage.getItem("rayToken") + "&href=" + window.location.href : t.src = "https://app.raychat.io/scripts/js/" + o;
var e = document.getElementsByTagName("script")[0];
e.parentNode.insertBefore(t, e)}
var e = document, a = window, o = "06120c99-d579-4a39-b5c6-b0044acc0b01";
"complete" == e.readyState ? t() : a.attachEvent ? a.attachEvent("onload", t) : a.addEventListener("load", t, !1)
}();</script>

<!--END RAYCHAT CODE-->
<!-- Yektanet CODE-->
<script>!function (t, e, n) {t.yektanetAnalyticsObject = n, t[n] = t[n] || function () {
t[n].q.push(arguments)}, t[n].q = t[n].q || [];
var a = new Date,
r = a.getFullYear().toString() + "0" + a.getMonth() + "0" + a.getDate() + "0" + a.getHours(),
c = e.getElementsByTagName("script")[0], s = e.createElement("script");
s.id = "ua-script-yn-33531-adv";
s.dataset.analyticsobject = n;
s.async = 1;
s.type = "text/javascript";
s.src = "https://cdn.yektanet.com/rg_woebegone/scripts_v2/yn-33531-adv/rg.complete.js?v=" + r, c.parentNode.insertBefore(s, c)
}(window, document, "yektanet");
</script>
<!-- Yektanet CODE-->

</body>
</html>