<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">داشبورد</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <span class="bmd-form-group"><div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="جستجو...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                
                <img src="{{ asset('images/Template/search.svg') }}" alt="Thumbnail Image" height="30px" width="30px">
               
                  <div class="ripple-container"></div>
                </button>
              </div></span>
            </form>
            <ul class="navbar-nav">
             
              <!--notifications-->
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span>
              <img src="{{ asset('images/Template/notification.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
                </span>
                <!--    <span class="notification">۵</span> -->
                  <p class="d-lg-none d-md-block">
                    اعلان&zwnj;ها
                  </p>
                <div class="ripple-container"></div></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <!--  <a class="dropdown-item" href="#">محمدرضا به ایمیل شما پاسخ داد </a> -->
                </div>
              </li>
              <!-- End_notifications-->

             <!--profile-->
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span>
                <img src="{{ asset('images/Template/user.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
                </span>
                <!--  <span class="notification">۵</span>  -->
                  <p class="d-lg-none d-md-block">
                    اعلان&zwnj;ها
                  </p>
                <div class="ripple-container"></div></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{route('user.profile.edit')}}">مشاهده پروفایل</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">خروج </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                 
                </div>
              </li>
              <!--End_profile-->
            </ul>
          </div>
        </div>
      </nav>