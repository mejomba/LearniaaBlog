
<!-- Row 1 -->

<ul class="nav nav-pills nav-fill flex-column flex-sm-row" id="tabs-text" role="tablist">
  <li class="nav-item">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-1-tab"  href="{{route('admin.home')}}" 
     role="tab" aria-controls="tabs-text-1" aria-selected="true">
     <img src="{{ asset('images/Template/dashboard.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
     داشبورد</a>
  </li>
  

  <li class="nav-item">
    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-3-tab"  href="{{route('admin.post.index')}}" 
     role="tab" aria-controls="tabs-text-3" aria-selected="false">
    <img src="{{ asset('images/Template/post.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    پست</a>
  </li>


 

  
  <li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('admin.profile.edit')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/user.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    پروفایل</a>
  </li>

  <li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('admin.transaction.create')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/wallet.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    کیف پول</a>
  </li>

  <li class="nav-item">
    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-2-tab"  href="{{route('admin.tag.index')}}" 
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/tag.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    تگ</a>
  </li>

@if( $user =  Auth::user()->type == 'مدیر')

<li class="nav-item">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-1-tab"  href="{{route('admin.category.index')}}"
     role="tab" aria-controls="tabs-text-1" aria-selected="true">
     <img src="{{ asset('images/Template/category.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
     دسته بندی</a>
  </li>

  <li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-2-tab"   href="{{route('admin.user.index')}}" 
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/user.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    کاربر</a>
  </li>
 
  <li class="nav-item">
    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-3-tab"  href="{{route('admin.behavior.index')}}"
     role="tab" aria-controls="tabs-text-3" aria-selected="false">
    <img src="{{ asset('images/Template/behavior.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    رفتار</a>
  </li>

  <li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('admin.discount.index')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/discount.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    بن تخفیف</a>
  </li>

  <li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('admin.product.index')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/product.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    محصول</a>
  </li>

  <li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('admin.learner.index')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/user.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    مدرس</a>
  </li>

@endif



  

</ul>

<!-- Row 2 -->

<ul class="nav nav-pills nav-fill flex-column flex-sm-row" id="tabs-text" role="tablist" style="margin-top:5px">
<li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('admin.transaction.index')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/transaction.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    تراکنش </a>
  </li>

  <li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('admin.transaction.productlist')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/productlist.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    خریداری شده</a>
  </li>

  </ul>
