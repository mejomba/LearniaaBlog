<!DOCTYPE html>
<html lang="fa">
<head>
    @include('site.Layouts.head')

</head>
<body>
@include('site.Layouts.nav')
<div id="header" class="page-header container-fluid mt-4" data-parallax="true">
    <section id="features" class="services-area pt-120">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center pb-40">
                        <div class="line m-auto"></div>

                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center" style="margin-top: 150px">
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s"
                         data-wow-delay="0.2s" style="height: 450px">
                        <div class="services-icon">
                            <img class="shape" src="{{asset('images/services-shape.svg')}}" alt="shape">
                            <img class="shape-1" src="{{asset('images/services-shape-1.svg')}}" alt="shape-1">
                            <i class="lni-baloon"></i>
                        </div>
                        <div class="position-relative">
                            <img style="width: 80px; height: 80px; margin-top: -350px" src="{{asset('images/soon.png')}}" alt="">
                        </div>
                        <div class="services-content" disabled>
                            <h6 class=""><a href="#" style="color: gray;">طراحی وب</a></h6>
                            <span style="margin-top: 10px; color: aqua">(HTML-5 and CSS-3)</span>
                            <p class="text" style="color: darkgray">Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam nonu eirmod
                                tempor invidunt labore.</p>
                            <button class="btn-style fourth mt-5 d-inline" disabled>شروع دوره</button>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s"
                         data-wow-delay="0.5s" style="border: 2px solid #E74C3C; border-radius: 10px; height: 450px">
                        <div class="services-icon">
                            <img class="shape" src="{{asset('images/services-shape.svg')}}" alt="shape">
                            <img class="shape-1" src="{{asset('images/services-shape-1.svg')}}" alt="shape-1">
                            <i class="lni-cog"></i>
                        </div>
                        <div class="services-content">
                            <h6 class="text-black-50"><a style="color: black;" href="#">لرنیا</a></h6>
                            <p class="text">دوره آموزش کامپیوتر مبتدیان</p>
                            <p>(ICDL)</p>
                            <button class="btn-style fourth mt-5 d-inline">شروع دوره</button>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s"
                         data-wow-delay="0.8s" style="height: 450px">
                        <div class="services-icon">
                            <img class="shape" src="{{asset('images/services-shape.svg')}}" alt="shape">
                            <img class="shape-1" src="{{asset('images/services-shape-1.svg')}}" alt="shape-1">
                            <i class="lni-bolt-alt"></i>
                        </div>
                        <div class="position-relative">
                            <img style="width: 80px; height: 80px; margin-top: -350px" src="{{asset('images/soon.png')}}" alt="">
                        </div>
                        <div class="services-content mt-30">
                            <h6 class=""><a href="#" style="color: gray;">دوره اموزش اصول برنامه نویسی</a></h6>
                            <span style="margin-top: 10px; color: aqua">(یادگیری برنامه نویسی)</span>
                            <p class="text" style="color: darkgray">Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam nonu eirmod
                                tempor invidunt labore.</p>
                            <button class="btn-style fourth mt-5 d-inline disabled" disabled>شروع دوره</button>
                        </div>
                    </div> <!-- single services -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

</div>
<div class="container" style="margin-top:15px">
    @include('site.Layouts.error')
</div>
<div class="row">
    <div class="col-8 col-md-4">
        @yield('text_landing')
    </div>
    <div class="col-12 col-md-8">
        @yield('pic_landing')
    </div>
</div>
</div>
<div class="container-fluid main main-raised custom_shadow">
    <div class="">
        @yield('content')
    </div>
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

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-155041698-1');
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<!--BEGIN RAYCHAT CODE-->
<script type="text/javascript">!function () {
        function t() {
            var t = document.createElement("script");
            t.type = "text/javascript", t.async = !0, localStorage.getItem("rayToken") ? t.src = "https://app.raychat.io/scripts/js/" + o + "?rid=" + localStorage.getItem("rayToken") + "&href=" + window.location.href : t.src = "https://app.raychat.io/scripts/js/" + o;
            var e = document.getElementsByTagName("script")[0];
            e.parentNode.insertBefore(t, e)
        }

        var e = document, a = window, o = "06120c99-d579-4a39-b5c6-b0044acc0b01";
        "complete" == e.readyState ? t() : a.attachEvent ? a.attachEvent("onload", t) : a.addEventListener("load", t, !1)
    }();</script>
<!--END RAYCHAT CODE-->
<!-- Yektanet CODE-->
<script>
    !function (t, e, n) {
        t.yektanetAnalyticsObject = n, t[n] = t[n] || function () {
            t[n].q.push(arguments)
        }, t[n].q = t[n].q || [];
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
