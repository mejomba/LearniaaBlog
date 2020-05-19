<div class="banner-bg" style="direction: rtl">
    <img style="width: 100%" class="header-bg" src="{{asset('images/testimonials-background.jpg')}}" alt="">
    <div class="fixed-top" id="nav">
        <nav id="nav" class="black navbar navbar-horizontal navbar-expand-lg fixed-top navbar-custom">
            <div class="container-fluid">
                <div class="navbar-brand">
                    <button class="navbar-toggler" style="margin-right:10px" type="button" data-toggle="collapse"
                            data-target="#navbar-default"
                            aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                        <img src="{{ asset('images/Template/menu.svg') }}" alt="Thumbnail Image" height="20px"
                             width="20px">
                        منو
                    </button>
                    <a href="{{route('index')}}" style="margin-right:20px">
                        <img class="d-flex" src="{{ asset('images/Template/logo.svg') }}" alt="Thumbnail Image"
                             style="height:60px !important"
                             height="100px !important" width="100px">
                    </a>
                </div>
                <div class="collapse navbar-collapse nav-navbar-style" id="navbar-default">
                    <div class="navbar-collapse-header">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                            <!--<a href="{{route('index')}}">
                                 <img src="{{ asset('images/Template/logo.svg') }}" alt="Thumbnail Image" height="75px" width="100px">
                                 </a>
                            -->
                            </div>
                            <div class="col-6 collapse-close">
                                <button type="button" class="navbar-toggler" data-toggle="collapse"
                                        data-target="#navbar-default" aria-controls="navbar-default"
                                        aria-expanded="false"
                                        aria-label="Toggle navigation">
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <ul class="navbar-nav col-md-7 d-inline-flex">
                        <li class="nav-item">
                            <a class="nav-link text" style="color: black" href="{{route('academy.index')}}" rel="tooltip"
                               title=""
                               data-placement="bottom">
                                {{--                                          <img src="{{ asset('images/Template/blog.svg') }}" alt="Thumbnail Image" height="50px"--}}
                                {{--                                              width="50px">--}}
                                صفحه اصلی
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text" style="color: black" href="{{route('academy.detail')}}" rel="tooltip"
                               title="" data-placement="bottom"
                               data-original-title="به زودی">
                                {{--                                               <img src="{{ asset('images/Template/learn.svg') }}" alt="Thumbnail Image" height="50px"--}}
                                {{--                                              width="50px">--}}
                                آکادمی آموزش
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text" style="color: black" href="{{route('Contactus')}}">
                                {{--                                          <img src="{{ asset('images/Template/nav/nav_contactUs.svg') }}" alt="Thumbnail Image"--}}
                                {{--                                                 height="50px" width="50px">--}}
                                تماس با ما
                                <div class="ripple-container">
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text" style="color: black" href="{{route('Aboutus')}}" rel="tooltip" title=""
                               data-placement="bottom">
                                {{--                                           <img src="{{ asset('images/Template/nav/nav_aboutUs.svg') }}" alt="Thumbnail Image"--}}
                                {{--                                              height="50px" width="50px">--}}
                                درباره ما
                                <div class="ripple-container">
                                </div>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav col-md-3 col-10 " dir="ltr" style="margin-top:15px">
                        <!-- serach box site -->
                        <form class="navbar-form" style="margin-bottom:0px" dir="rtl"
                              action="{{route('search.index')}}">
                            <div class="row">
                                <div class="col-md-12 col-11" style="padding-left:0px;padding-right:0px">
                                    <div class="form-group">
                                        <input type="hidden" name="type_search" value="{{Request::segment(1)}}"
                                               class="form-control search-box" placeholder="جستجو...">
                                        <div class="input-group">
                                            <input type="text" name="content_search" style="border-radius:0"
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
                    <!-- USER PANEL -->

                    <ul class="navbar-nav col-md-2 col-2" dir="ltr">
                    @guest
                        <!-- <li class="nav-item">
                    <a class="nav-link" target="_parent" style="color:white"  rel="tooltip" title=""
                    data-placement="bottom" href="{{route('reset.showcallbackloginform')}}"
                    > ورود/ثبت نام
                  </a>
                  </li>   -->

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link bg-white btn fourth mt-4 d-inline" target="_parent"
                                       style="color:black;padding-left:5px;padding-right:5px" rel="tooltip" title=""
                                       data-placement="bottom" href="{{route('reset.showcallbackloginform')}}"
                                    >ثبت نام / ورود
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown" style="border-radius:1.2rem;">
                                <!--   <a id="navbarDropdown" class="nav-link dropdown-toggle profileMenu" -->
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
                    <!-- USER PANEL -->

                </div>
            </div>
        </nav>

    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

    $(document).ready(function(){
        $(window).scroll(function(){
            var scroll = $(window).scrollTop();
            if (scroll > 50) {
                $(".black").css("background" , "#20c5ba");
            }

            else{
                $(".black").css("background" , "transparent");
            }
        })
    })
    //text color
    $(document).ready(function(){
        $(window).scroll(function(){
            var scroll = $(window).scrollTop();
            if (scroll > 50) {
                $(".text").css("color" , "white");
            }

            else{
                $(".text").css("color" , "black");
            }
        })
    })
</script>
