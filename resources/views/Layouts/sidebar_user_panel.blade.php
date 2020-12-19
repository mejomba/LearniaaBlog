<style> .nav-fill .nav-item {text-align : center !important ;flex :  none !important ;}</style>


  

<li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('user.profile.edit')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/icon_profile.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    پروفایل</a>
  </li>

  <li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('user.transaction.create')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/icon_wallet.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    کیف پول</a>
  </li>

  <li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('user.transaction.index')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/icon_transaction.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    تراکنش </a>
  </li>



  <li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('user.transaction.packagelist')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/icon_productlist.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    خریداری شده</a>
  </li>

  <li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('user.vote.index')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/icon_politics.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
     نظرسنجی</a>
  </li>
  @if(auth::user()->type=='مدرس') 

  <li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('user.package')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/icon_politics.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
     گزارش دروس</a>
  </li>
@endif
</ul>

