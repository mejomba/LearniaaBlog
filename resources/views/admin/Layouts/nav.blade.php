
  <nav id="sectionsNav" style="background-color:#F9F860 !important" class="navbar navbar-horizontal fixed-top navbar-expand-lg">
    <div class="container-fluid">
      <div class="navbar-brand">
    

      <button style="float-left" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-default"
       aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
       <img src="{{ asset('images/Template/menu.svg') }}" alt="Thumbnail Image"  height="20px" width="20px">
       <!--span class="navbar-toggler-icon"></span-->
        </button>
        <a href="{{route('index')}}">
          <img src="{{ asset('images/Template/logo.svg') }}" alt="Thumbnail Image" style="height:60px !important" height="100px !important" width="80px"> 
       </a> 
      </div>
      <div class="collapse navbar-collapse" id="navbar-default">

      <div class="navbar-collapse-header">
                <div class="row">
                    <div class="col-6 collapse-brand">
                    <a href="{{route('index')}}">
                    <img src="{{ asset('images/Template/logo.svg') }}" alt="Thumbnail Image" height="75px" width="100px">                     </a> 
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>

            <ul class="navbar-nav col-md-7">

<li class="nav-item">
  <a class="nav-link" href="{{route('product.index')}}"   rel="tooltip" title="" data-placement="bottom"
  data-original-title="به زودی">
  <img src="{{ asset('images/Template/learn.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
  لرنیا کوئیک  
  </a>
</li>

<li class="nav-item">
  <a class="nav-link"  href="{{route('post.index')}}" rel="tooltip" title="" data-placement="bottom"
  >
  <img src="{{ asset('images/Template/blog.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
   بلاگ
  </a>
</li>

<li class="nav-item">
  <a class="nav-link" href="{{route('Contactus')}}">
  <img src="{{ asset('images/Template/nav/nav_contactUs.svg') }}" alt="Thumbnail Image" height="40px" width="40px">  
  تماس با ما 
    <div class="ripple-container">

  </div>
</a>
</li>

<li class="nav-item">
  <a class="nav-link" href="{{route('Aboutus')}}" rel="tooltip" title="" data-placement="bottom">
 <img src="{{ asset('images/Template/nav/nav_aboutUs.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
   درباره ما
  <div class="ripple-container">

  </div>
</a>
</li>



</ul>
          

        <ul class="navbar-nav col-md-3 col-10 "  dir="ltr" style="margin-top:15px" >
<!-- serach box site -->

<form class="navbar-form" style="margin-bottom:0px" dir="rtl" action="{{route('search.index')}}" >
              
        <div class="row">

             <div class="col-md-12 col-11" style="padding-left:0px;padding-right:0px">
                <div class="form-group">

                      <input type="hidden"  name="type_search" value="{{Request::segment(1)}}" 
                      class="form-control" placeholder="جستجو...">

                      <div class="input-group">
                          <input type="text"  name="content_search" 
                          class="form-control form-control-alternative" placeholder="جستجو...">
                          <button class="input-group-text" type="submit" style="font-size:0.8rem !important">بگرد</button>
                      </div>
                </div>
             </div>         
         </div>

        
        </form>

 
<!-- serach box site -->
</ul>  


<ul class="navbar-nav col-md-2" dir="ltr">
  @guest
  <li class="nav-item">
    <a class="nav-link" target="_parent" href="{{ route('register') }}">ثبت نام</a>
     </li>
   
          @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link" target="_parent"  rel="tooltip" title="" 
            data-placement="bottom" href="{{route('login')}}"
            > ورود
            <div class="ripple-container"></div>
          </a>
          </li>  
                    @endif
                @else
                    <li class="nav-item dropdown" style="border-radius:1.2rem;">

                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" 
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="{{ asset('images/Template/user.svg') }}" alt="Thumbnail Image" height="25px" width="25px">
                         <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            @if(Auth::user()->type == "مدیر")
                                <a class="dropdown-item" href="{{ route('admin.home') }}">سامانه مدیریت</a>
                            @endif

                            @if(Auth::user()->type == "نویسنده")
                                <a class="dropdown-item" href="{{ route('admin.home') }}">سامانه نویسندگان</a>
                            @endif

                            @if(Auth::user()->type == "کاربر")
                                <a class="dropdown-item" href="{{ route('user.home') }}">سامانه کاربری</a>
                            @endif

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">خروج </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>

                    </li>
                @endguest




</ul>  

      </div>
    </div>
  </nav>