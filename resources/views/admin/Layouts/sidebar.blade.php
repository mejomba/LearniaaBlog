<!--div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('images/Template/sidebar-1.jpg')}}"-->
<div class="sidebar" data-color="purple">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
      <a href="{{route('index')}}" class="simple-text logo-normal">
       <img src="{{ asset('images/Template/logo.svg') }}" alt="Thumbnail Image" 
      height="100px" width="100px"> لرنیا </a>
      
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="{{route('admin.home')}}">
            <img src="{{ asset('images/Template/dashboard.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
              داشبورد
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('admin.user.index')}}">
            <img src="{{ asset('images/Template/user.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
             کاربر
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('admin.post.index')}}">
            <img src="{{ asset('images/Template/post.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
              پست
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('admin.category.index')}}">
            <img src="{{ asset('images/Template/category.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
              دسته بندی
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('admin.tag.index')}}">
            <img src="{{ asset('images/Template/tag.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
             تگ ها
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="{{route('admin.behavior.index')}}">
            <img src="{{ asset('images/Template/behavior.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
             رفتار ها
            </a>
          </li>

       </ul>
      </div>
    <div class="sidebar-background"></div></div>