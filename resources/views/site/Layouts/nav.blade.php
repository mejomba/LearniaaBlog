 
<div class="banner-bg" style="direction: rtl">
    <img style="" class="header-bg" src="{{asset('images/testimonials-background.jpg')}}" alt="">
{{--    <img src="{{asset('images/header-teamwork.svg')}}" class="learn-bg" alt="">--}}
<nav class="navbar navbar-expand-md mx-auto text-center fixed-top" id="navbar" style="z-index: 100000">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars"></i>
    </button>
    <a class="navbar-brand d-lg-block d-md-block d-sm-block d-block mr-sm-auto mr-auto" href="#">
        <img class="d-flex" src="{{ asset('images/Template/Circlelogo.svg') }}" alt="Thumbnail Image" width="60px">
    </a>
    <div class="collapse navbar-collapse" id="nav">
        <ul class="navbar-nav d-flex justify-content-center" style="font-size:15px; font-weight:500;">
            <li class="nav-item mr-lg-5 ml-lg-5"> <a class="nav-link" href="{{route('academy.index')}}">خانه</a></li>
            <li class="nav-item mr-lg-5 ml-lg-5 "> <a class="nav-link" href="{{route('academy.start')}}">آکادمی آموزش</a></li>
            <li class="nav-item mr-lg-5 ml-lg-5 "> <a class="nav-link" href="{{route('Aboutus')}}">درباره ی ما</a> </li>
            <li class="nav-item mr-lg-5 ml-lg-5 "> <a class="nav-link" href="{{route('Contactus')}}" >تماس با ما</a></li>
<<<<<<< HEAD
=======
         <!--   <li class="nav-item mr-lg-5 ml-lg-5 "> <a class="nav-link" href="{{route('post.index')}}" >بلاگ</a></li> -->
>>>>>>> 30f4994b56fb535dc6883102bbabc8b330891212

        </ul>
    </div>
    <div class="search">
        <div class="search">

        </div>
    </div>

    <ul class="">
        @guest
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link btn fourth" target="_parent" rel="tooltip" title=""
                       data-placement="bottom" href="{{route('reset.showcallbackloginform')}}">
                        <span>شروع کن</span>
                    </a>
                </div>
                <div class="collapse navbar-collapse nav-navbar-style"  id="navbar-default">

                    <ul class="navbar-nav col-lg-8">
                        <li class="nav-item">
                            <a class="nav-link" style="color: black" href="{{route('academy.index')}}" rel="tooltip"
                               title=""
                               data-placement="bottom">صفحه اصلی</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " style="color: black" href="{{route('academy.start')}}" rel="tooltip"
                               title="" data-placement="bottom"
                               data-original-title="به زودی">آکادمی آموزش </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " style="color: black"
                             href="{{route('Contactus')}}">تماس با ما</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " style="color: black" href="{{route('Aboutus')}}" rel="tooltip" title=""
                               data-placement="bottom"> درباره ما</a>
                        </li>
                     
                    </ul>

                    <!-- USER PANEL -->
                    <ul class="navbar-nav col-md-2 col-8 offset-lg-2" dir="ltr">
                    @guest
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link bg-white btn fourth mt-4 d-inline" target="_parent"
                                       style="color:black;padding-left:5px;padding-right:5px" rel="tooltip" title=""
                                       data-placement="bottom" href="{{route('reset.showcallbackloginform')}}">
                                    <span>ثبت نام / ورود</span>
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown" style="border-radius:1.2rem;">
                                <a id="navbarDropdown" class="nav-link  profileMenu bg-white" href="#" role="button"
                                   style=" border-radius: 50%; width: 50px; height: 50px;"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="{{ asset('images/Template/user.svg') }}" alt="Thumbnail Image"
                                         height="35px" width="35px">
                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    @if(Auth::user()->type == "مدیر")
                                        <a class="dropdown-item" href="{{ route('admin.home') }}">سامانه مدیریت</a>
                                        <a class="dropdown-item" href="{{route('admin.post.index')}}"> پست</a>
                                        <a class="dropdown-item" href="{{route('admin.category.index')}}"> دسته بندی</a>
                                        <a class="dropdown-item" href="{{route('admin.product.index')}}"> محصول</a>
                                        <a class="dropdown-item" href="{{route('admin.product.index')}}"> درخت</a>
                                        <a class="dropdown-item" href="{{route('admin.transaction.productlist')}}">
                                            خریداری شده</a>
                                    @endif

                                    @if(Auth::user()->type == "نویسنده")
                                        <a class="dropdown-item" href="{{ route('writer.home') }}">سامانه نویسندگان</a>
                                    @endif

                                    @if(Auth::user()->type == "کاربر")
                                   
                                    @endif

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">خروج </a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown" style="border-radius:1.2rem; position:absolute;top: 5px ; left: 6px">
                <a id="navbarDropdown" class="nav-link d-flex justify-content-center profileMenu bg-white"
                 href="#" role="button"
                   style=" border-radius: 50%; width: 50px; height: 50px;"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="fa fa-user fa-2x text-info"></i>
                    <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                    @if(Auth::user()->type == "مدیر")
                        <a class="dropdown-item" href="{{ route('admin.home') }}">سامانه مدیریت</a>
                        <a class="dropdown-item" href="{{route('admin.post.index')}}"> پست</a>
                        <a class="dropdown-item" href="{{route('admin.category.index')}}"> دسته بندی</a>
                        <a class="dropdown-item" href="{{route('admin.product.index')}}"> محصول</a>
                        <a class="dropdown-item" href="{{route('admin.product.index')}}"> درخت</a>
                        <a class="dropdown-item" href="{{route('admin.transaction.productlist')}}">
                            خریداری شده</a>
                    @endif

                  
                    @if(Auth::user()->type == "کاربر")
                        <a class="dropdown-item" href="{{ route('user.home') }}">سامانه کاربری</a>
                        <a class="dropdown-item" href="{{route('user.profile.edit')}}"> پروفایل</a>
                        <a class="dropdown-item" href="{{route('user.transaction.productlist')}}">
                            خریداری شده</a>
                        <a class="dropdown-item" href="{{route('user.transaction.create')}}"> کیف
                            پول</a>
                        <a class="dropdown-item" href="{{route('user.transaction.index')}}"> تراکنش</a>

                    @endif

                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">خروج </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>

                </div>

            </li>
        @endguest
    </ul>
    @endif
</nav>
</div>

<script>
    $(document).ready(function(){
        $(window).scroll(function() { 
            if ($(document).scrollTop() > 50) { 
                $(".navbar").css("background-color", "#20c5ba"); 
            } else {
                $(".navbar").css("background-color", "transparent"); 
            }
        });
    });

    $(".navbar-toggler").on("click",function () {

        if($('.navbar-collapse').hasClass('show'))
        {
            $('.navbar-nav').css("backgroundColor","transparent")
        }
        else
        {
            $('.navbar-nav').css("backgroundColor","white")
        }
    });

    let status = 0 ;

    $('.navbar-toggler').on('click',function () {
        var icon = $('.navbar-toggler i') ;
        if(status===0)
        {
            icon.removeClass('fa-bars');
            icon.addClass('fa-times');
            status = 1 ;
        }
        else if(status===1)
        {
            icon.removeClass('fa-times');
            icon.addClass('fa-bars');
            status = 0 ;
        }
    });
</script>
