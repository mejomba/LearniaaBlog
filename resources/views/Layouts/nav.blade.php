<div class="banner-bg" style="direction: rtl">
<img style="" class="header-bg" src="{{asset('images/testimonials-background.jpg')}}" alt="">
<nav class="navbar navbar-expand-md mx-auto text-center fixed-top" id="navbar" style="z-index: 100000">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars"></i>
    </button>
    <a class="navbar-brand d-lg-block d-md-block d-sm-block d-block mr-sm-auto mr-auto" href="{{route('index')}}">
        <img class="d-flex" src="{{ asset('images/Template/Circlelogo.svg') }}" alt="Thumbnail Image" width="60px">
    </a>
    <div class="collapse navbar-collapse" id="nav">
        <ul class="navbar-nav d-flex col-md-6 col-12" style="font-size:15px; font-weight:500;">
            <li class="nav-item mr-lg-4 ml-lg-4"> <a class="nav-link" href="{{route('index')}}">خانه</a></li>
            <li class="nav-item mr-lg-4 ml-lg-4 "> <a class="nav-link" href="{{route('academy.detail')}}">لرنیا آکادمی</a></li>
            <li class="nav-item mr-lg-4 ml-lg-4 "> <a class="nav-link" href="{{route('academy.quicklearn')}}">لرنیا پکیج</a></li>
            <li class="nav-item mr-lg-4 ml-lg-4 "> <a class="nav-link" href="{{route('Aboutus')}}">درباره ی ما</a> </li>
            <li class="nav-item mr-lg-4 ml-lg-4 "> <a class="nav-link" href="{{route('Contactus')}}" >تماس با ما</a></li>
           <li class="nav-item mr-lg-4 ml-lg-4 "> <a class="nav-link" href="{{route('blog.index')}}" >بلاگ</a></li> 

        </ul>
            <ul class="navbar-nav col-md-6 col-12" dir="ltr" style="align-items: center;">
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
                                   style=" border-radius: 50%; width: 50px; height: 50px;margin-left:45px;"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="{{ asset('images/Template/user.svg') }}" alt="Thumbnail Image"
                                         height="35px" width="35px">
                                    <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->type == "مدیر")
                                    <a class="dropdown-item" href="#" style="float:left">موجودی کیف
                                     <img src="{{ asset('images/Academy/money.svg') }}"
                                     width="35px" height="35px"></a>
                                    <label class="dropdown-item" style="font-family:Dastnevis;fontsize:10px">
                                     <label  style="font-family:Dastnevis;fontsize:10px"> تومان   </label>
                                      {{ Auth::user()->profile['wallet'] }} 
                                      </label>
                                        <a class="dropdown-item" href="{{ route('admin.home') }}">سامانه مدیریت</a>
                                        <a class="dropdown-item" href="{{route('admin.blog.index')}}"> بلاگ</a>
                                        <a class="dropdown-item" href="{{route('admin.package.index')}}"> پکیج</a>
                                        <a class="dropdown-item" href="{{route('admin.course.index',['id' => 0])}}"> درس</a>
                                        <a class="dropdown-item" href="{{route('admin.routing.index')}}">مسیر</a>
                                    @endif

                                    @if(Auth::user()->type == "کاربر")
                                    <a class="dropdown-item" href="#" style="float:left">موجودی کیف
                                     <img src="{{ asset('images/Academy/money.svg') }}"
                                     width="35px" height="35px"></a>
                                    <label class="dropdown-item" style="font-family:Dastnevis;fontsize:10px">
                                     <label  style="font-family:Dastnevis;fontsize:10px"> تومان   </label>
                                      {{ Auth::user()->profile['wallet'] }} 
                                      </label>
                                    {{-- <a class="dropdown-item" href="{{ route('user.home') }}">سامانه کاربری</a> --}}  

                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">خروج </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
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
$(".navbar-toggler").on("click",function ()
 {
  $("#navbar").css("backgroundColor","#20c5ba")
  $('.navbar-nav').css("backgroundColor","#20c5ba")});
    let status = 0 ;
    $('.navbar-toggler').on('click',function ()
     {
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
