
  <nav id="sectionsNav" style="background-color:#F9F838 !important" class="navbar fixed-top navbar-expand-lg">
    <div class="container-fluid">
      <div class="navbar-translate">
      <a href="{{route('index')}}">  <img src="{{ asset('images/Template/logo.png') }}" alt="Thumbnail Image" height="80px" width="80px"> </a> <div class="ripple-container"></div><div class="ripple-container"></div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav col-md-9" style="padding-right:35px">

          <li class="dropdown nav-item">
         
       
                    
          <li class="nav-item">
            <a class="nav-link" href="#"  style="color:gray" rel="tooltip" title="" data-placement="bottom"
            data-original-title="به زودی">
            <img src="{{ asset('images/Template/nav/clock.svg') }}" alt="Thumbnail Image" height="30px" width="30px">
            آموزش سریع   (به زودی)
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link"  href="{{route('post.index')}}" rel="tooltip" title="" data-placement="bottom"
            >
            <img src="{{ asset('images/Template/nav/blog.svg') }}" alt="Thumbnail Image" height="25px" width="25px">
             بلاگ
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('Contactus')}}">
            <img src="{{ asset('images/Template/nav/call.svg') }}" alt="Thumbnail Image" height="25px" width="25px">  
            تماس با ما 
              <div class="ripple-container">

            </div>
          </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('Aboutus')}}" rel="tooltip" title="" data-placement="bottom"
           >
           <img src="{{ asset('images/Template/nav/team.svg') }}" alt="Thumbnail Image" height="25px" width="25px">
             درباره ما
            <div class="ripple-container">

            </div>
          </a>
          </li>
          
          
        </ul>
          

 <ul class="navbar-nav col-md-3 "  >
<!-- serach box site -->

<form class="navbar-form" dir="rtl" action="{{route('search.index')}}" style="padding-top:10px">
              
        <div class="row">

             <div class="col-md-9" style="padding-left:0px;padding-right:0px">
                <div class="form-group">

                      <input type="hidden"  name="type_search" value="{{Request::segment(1)}}" 
                      class="form-control" placeholder="جستجو...">

                      <input type="text"  name="content_search" 
                      class="form-control form-control-alternative" placeholder="جستجو...">
                      </div>
                </div>        

               <div class="col-md-3"> 
               <div class="form-group">

                      <button type="submit"  class="btn btn-white btn-round btn-just-icon">
                      <img src="{{ asset('images/Template/search.svg') }}" alt="Thumbnail Image" height="20px" width="20px">
                      </button>
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
                    <li class="nav-item dropdown">

                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" 
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            @if(Auth::user()->type == "مدیر")
                                <a class="dropdown-item" href="{{ route('admin.home') }}">سامانه مدیریت</a>
                            @endif

                            @if(Auth::user()->type == "نویسنده")
                                <a class="dropdown-item" href="{{ route('writer.home') }}">سامانه نویسندگان</a>
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