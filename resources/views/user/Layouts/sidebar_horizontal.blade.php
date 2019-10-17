
<ul class="nav nav-pills nav-fill flex-column flex-sm-row" id="tabs-text" role="tablist">
  <li class="nav-item">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-1-tab"  href="{{route('user.home')}}"
     role="tab" aria-controls="tabs-text-1" aria-selected="true">
     <img src="{{ asset('images/Template/dashboard.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
     داشبورد</a>
  </li>
  
  <li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('user.profile.edit')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/user.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    پروفایل</a>
  </li>

  <li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('user.transaction.productlist')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/productlist.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    خریداری شده</a>
  </li>

  <li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('user.transaction.create')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/wallet.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    کیف پول</a>
  </li>

  <li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('user.transaction.index')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/transaction.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    تراکنش </a>
  </li>
 
</ul>
