<div class="banner-bg" style="direction: rtl">
    <img style="width: 100%" class="header-bg" src="{{asset('images/testimonials-background.jpg')}}" alt="">
    <nav id="sectionsNav"
         class="navbar navbar-horizontal navbar-expand-lg container-fluid">
        <div class="container-fluid">
            <div class="navbar-brand">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbar-default"
                        aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                    <img src="{{ asset('images/Template/menu.svg') }}" alt="Thumbnail Image" height="20px" width="20px">
                </button>
                <a href="{{route('index')}}">
                    <img class="d-flex" src="{{ asset('images/Template/logo.svg') }}" alt="Thumbnail Image"
                         style="height:60px !important"
                         height="100px !important" width="100px">
                </a>
            </div>
            <div class="collapse navbar-collapse nav-navbar-style" id="navbar-default">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            {{--                        <a href="{{route('index')}}">--}}
                            {{--                            <img src="{{ asset('images/Template/logo.svg') }}" alt="Thumbnail Image" height="75px"--}}
                            {{--                                 width="100px">--}}
                            {{--                        </a>--}}
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                    data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav col-md-7 d-inline-flex">
                    <li class="nav-item">
                        <a class="nav-link" style="color: black" href="{{route('academy.index')}}" rel="tooltip"
                           title="" data-placement="bottom"
                           data-original-title="به زودی">
                            <img src="{{ asset('images/Template/learn.svg') }}" alt="Thumbnail Image" height="50px"
                                 width="50px">
                            آکادمی آموزش
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: black" href="{{route('post.index')}}" rel="tooltip" title=""
                           data-placement="bottom">
                            <img src="{{ asset('images/Template/blog.svg') }}" alt="Thumbnail Image" height="50px"
                                 width="50px">
                            وبلاگ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: black" href="{{route('Contactus')}}">
                            <img src="{{ asset('images/Template/nav/nav_contactUs.svg') }}" alt="Thumbnail Image"
                                 height="50px" width="50px">
                            تماس با ما
                            <div class="ripple-container">
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: black" href="{{route('Aboutus')}}" rel="tooltip" title=""
                           data-placement="bottom">
                            <img src="{{ asset('images/Template/nav/nav_aboutUs.svg') }}" alt="Thumbnail Image"
                                 height="50px" width="50px">
                            درباره ما
                            <div class="ripple-container">
                            </div>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav col-md-3 col-10 " dir="ltr" style="margin-top:15px">
                    <!-- serach box site -->
                    <form class="navbar-form" style="margin-bottom:0px" dir="rtl" action="{{route('search.index')}}">
                        <div class="row">
                            <div class="col-md-12 col-11" style="padding-left:0px;padding-right:0px">
                                <div class="form-group">
                                    <input type="hidden" name="type_search" value="{{Request::segment(1)}}"
                                           class="form-control search-box" placeholder="جستجو...">
                                    <div class="input-group">
                                        <input type="text" name="content_search"
                                               class="form-control form-control-alternative" placeholder="جستجو...">
                                        <button class="input-group-text" type="submit"
                                                style="font-size:0.8rem !important">
                                            بگرد
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </ul>
            </div>
        </div>
    </nav>
    <div style="direction: rtl" class="d-flex justify-content-around">

        <div class="learn-style mt-5">
            <h1 class="mt-5"></h1>
            <img style="width: 380px; height: 250px" src="{{asset('images/Header_Academy.png')}}" alt="">
        </div>
        <div class="learn-style">
            <img class="learn-bg mt-5" src="{{asset('images/header-teamwork.svg')}}" alt="">
        </div>
    </div>
</div>
