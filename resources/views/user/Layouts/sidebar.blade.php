<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('images/Template/sidebar-1.jpg')}}">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
      <a href="{{route('index')}}" class="simple-text logo-normal">
       <img src="{{ asset('images/Template/logo.svg') }}" alt="Thumbnail Image" 
      height="100px" width="100px"> </a>
      
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="{{route('user.home')}}">
            <img src="{{ asset('images/Template/dashboard.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
              داشبورد
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('user.profile.edit')}}">
            <img src="{{ asset('images/Template/user.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
              پروفایل
            </a>
          </li>
  
       </ul>
      </div>
    <div class="sidebar-background"></div></div>