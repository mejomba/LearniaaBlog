<div class="banner-bg" style="direction: rtl">
    <img style="" class="header-bg" src="{{asset('images/testimonials-background.jpg')}}" alt="">
{{--    <img src="{{asset('images/header-teamwork.svg')}}" class="learn-bg" alt="">--}}
<nav class="navbar navbar-expand-md mx-auto text-center fixed-top" style="z-index: 100000">
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
        </ul>
    </div>
    <div class="search">
        <div class="search">
{{--            <i class="fa fa-search fa-2x"></i>--}}
        </div>
    </div>
    <input type="button" class="btn-loginSign" value="ورود/ثبت نام" />
</nav>
</div>

<script>
    window.onscroll = function() {scrollFunction()};
    var navbar = document.querySelector('.navbar');
    // console.log(navbar);
    function scrollFunction() {
        if ( document.documentElement.scrollTop > 20)
            navbar.style.backgroundColor = "#20c5ba";
        else
            navbar.style.backgroundColor = "transparent";
    }

    $("button").on("click",function () {

        if($('.navbar-collapse').hasClass('show'))
        {
            $('ul').css("backgroundColor","transparent")
        }
        else
        {
            $('ul').css("backgroundColor","white")
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
    })
</script>
