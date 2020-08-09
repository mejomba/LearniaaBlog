<div class="banner-bg" style="direction: rtl">
    <img style="width: 100%" class="header-bg" src="{{asset('images/testimonials-background.jpg')}}" alt="">
    <div class="fixed-top" id="nav">
        <nav id="nav" class="black navbar navbar-horizontal navbar-expand-lg fixed-top navbar-custom">
            <div class="container-fluid">
                <div class="navbar-brand" style="">
                    <button class="navbar-toggler" style="margin-right:10px" type="button" data-toggle="collapse"
                            data-target="#navbar-default"
                            aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                        <img src="{{ asset('images/Template/menu.svg') }}" alt="Thumbnail Image" height="20px"
                             width="20px" style="margin-top: -40px!important">
                    </button>
                    <a href="{{route('index')}}" style="margin-right:20px">
                        <img class="d-flex pt-2" src="{{ asset('images/Template/Circlelogo.svg') }}" alt="Thumbnail Image"
                             style="height:60px !important"
                             height="100px !important" width="100px">
                    </a>
                </div>
                <div class="collapse navbar-collapse nav-navbar-style"  id="navbar-default">
                    <div class="navbar-collapse-header">
                        <div class="row">
                            <div class="col-6 collapse-brand">
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
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text" style="color: black" href="{{route('index')}}" rel="tooltip"
                               title=""
                               data-placement="bottom">صفحه اصلی</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text" style="color: black" href="{{route('academy.detail')}}" rel="tooltip"
                               title="" data-placement="bottom"
                               data-original-title="به زودی">آکادمی آموزش </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text" style="color: black"
                             href="{{route('Contactus')}}">تماس با ما</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text" style="color: black" href="{{route('Aboutus')}}" rel="tooltip" title=""
                               data-placement="bottom"> درباره ما</a>


                        </li>
                        <li class="nav-item">
                            <a class="nav-link text" style="color: black" href="{{route('blog.index')}}" rel="tooltip" title=""
                               data-placement="bottom">بلاگ</a>


                        </li>
                    </ul>
        <!-- Search Box -->
            <ul class="navbar-nav col-md-2 col-10 " dir="ltr" style="margin-top:15px">
          
            </ul>
            <!-- Search Box -->

               <!-- ---- User Menu ---- -->
               <ul class="navbar-nav col-md-3 col-12 offset-lg-2" dir="ltr">
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
                                        <a class="dropdown-item" href="{{route('admin.blog.index')}}"> پست</a>
                                        <a class="dropdown-item" href="{{route('admin.category.index')}}"> دسته بندی</a>
                                        <a class="dropdown-item" href="{{route('admin.package.index')}}"> محصول</a>
                                        <a class="dropdown-item" href="{{route('admin.tree.index')}}"> درخت</a>
                                        <a class="dropdown-item" href="{{route('admin.transaction.packagelist')}}">خریداری شده</a>
                                    @endif

                                    @if(Auth::user()->type == "کاربر")
                                    {{-- <a class="dropdown-item" href="{{ route('user.home') }}">سامانه کاربری</a> --}}
                                    {{--  <a class="dropdown-item" href="{{route('user.profile.edit')}}"> پروفایل</a> --}}
                                    {{-- <a class="dropdown-item" href="{{route('user.transaction.packagelist')}}">خریداری شده</a> --}}
                                    {{-- <a class="dropdown-item" href="{{route('user.transaction.create')}}"> کیف پول</a> --}}
                                    {{--  <a class="dropdown-item" href="{{route('user.transaction.index')}}"> تراکنش</a> --}}
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">خروج </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
        <!-- ---- User Menu ---- -->

                </div>
            </div>
        </nav>

    </div>
</div>
<script>
    $(document).ready(function(){
        $(window).scroll(function(){
            var scroll = $(window).scrollTop();
            if (scroll > 50) { $(".black").css("background" , "#20c5ba"); }else{ $(".black").css("background" , "transparent");}})})
    //text color
    $(document).ready(function(){
        $(window).scroll(function(){
            var scroll = $(window).scrollTop();
            if (scroll > 50){}else{ $(".text").css("color" , "black");}})})
    $(document).ready(function(){
        if($(".alert").css("display","block") === true)
        {
            $('.nav').css('margin-top',"30px");
        }
    })
</script>
