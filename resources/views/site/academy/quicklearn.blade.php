@extends('Layouts.layout_landing_site')
@section('Head')
<title>لرنیا پکیج|لرنیا</title>
<meta  name="description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد">
<meta  name="keywords"    content="کوئیک لرن,پکیج لرنیا,آموزش شریع لرنیا,لرنیا کوئیک" >
<meta property="og:title" content="لرنیا پکیج|لرنیا"/>
<meta property="og:url" content="{{Request::url()}}"/>
<meta property="og:image" content="{{ asset('images/Template/Circlelogo.svg') }}">
<meta property="og:type" content="website"/>
<meta name="description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد">
<meta property="og:locale" content="fa_IR"/>
<meta name="twitter:card" content="summary" /> 
<meta name="twitter:site" content="{{Request::url()}}" /> 
<meta name="twitter:title" content="لرنیا پکیج|لرنیا" /> 
<meta name="twitter:description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد" /> 
<meta name="twitter:image" content="{{ asset('images/Template/Circlelogo.svg') }}">
@endsection
@section('text_landing')
<h1 class="font-weight-bolder text-center font-weight-bolder" style="font-size:9vw;margin-top: -30px">
<span style="color: #ffe735 !important;" class="text-info">دوره های</span>
<span style="color: #20c5ba !important;" class="text-warning mr-3">لـرنیا</span>
</h1>
<h3  style="font-size:20px;background-color:#20c5ba;color:white;border-radius:95px" class="text-justify p-lg-1 p-md-4 p-sm-4 p-5 text-center">
ما در دوره های آموزشی لرنیا تمام سعی مان را کردیم تا جامع ترین <br>سرفصل آموزشی را به کمک چندین تن از اساتید خوب کشور عزیزمان<br> برای شما آماده کنیم تا برای ورود به بازار کار دیگر نگران نباشید
</h3>
@endsection
@section('pic_landing')
<img  class="learn-bg d-lg-block d-md-block d-sm-none d-none" src="{{asset('images/Academy/quicklearn.svg')}}" alt="" style="margin-top:-65px;width:600px !important">
@endsection
@section('content')
<!-- Category Posts -->
{{-- <section class="MainTopics"> --}}
{{--<div class="d-flex justify-content-around flex-wrap mt-5" id="topics_Of_novels"> --}}
{{--<div class="m-2"><a href="{{route('category.show','توسعه مهارت های شخصی')}}" class="btn  btn-round btnblog btn-1">توسعه مهارت های شخصی </a></div> --}}
{{--<div class="m-2"><a href="{{route('category.show','دنیای دیجیتال')}}" class="btn  btn-round btnblog btn-2">دنیای دیجیتال </a></div> --}}
{{--<div class="m-2"><a href="{{route('category.show','برنامه نویسی')}}" class="btn  btn-round btnblog btn-3"> برنامه نویسی</a></div> --}}
{{--<div class="m-2"><a href="{{route('category.show','وب')}}" class="btn  btn-round btnblog btn-4">وب</a></div> --}}
{{--<div class="m-2"><a href="{{route('category.show','هک و امنیت')}}" class="btn  btn-round btnblog btn-5"> هک و امنیت </a></div> --}}
{{--</div> --}}
{{--</section> --}}

<div class="subscribe-area wow fadeIn container mx-auto" style="padding:10px 50px 20px;direction:rtl;margin-top:100px;box-shadow: 0px 0px 20px black;border-style: none;background-color:#20c5ba">
            <div class="row">
                <div class="col-lg-6">
                    <div class="subscribe-content mt-3">
                        <h6 style="font-size:24px;text-align:center;color:white" class="">اگه مسیر و گام های یادگیری یه کماندوی برنامه نویسی رو بلد نیستی بزن روی نقشه راه یادگیری</h6>
                    </div>
                </div>
            <div class="col-lg-6 text-center" style="margin-top:40px;direction:rtl">
            <a style="border-radius:10px;border-color: #ffe735;color: #000000;background-image: linear-gradient(45deg, #ffe735 50%, transparent 50%);background-position: 0;background-size: 400%;padding-right:30px;padding-top:15px;padding-bottom:15px" class="nav-link  btn  mt-4 d-inline" target="_parent" rel="tooltip" title="" data-placement="bottom"
             href="{{route('academy.detail')}}" dideo-checked="true">
                        <img src="http://127.0.0.1:8000/images/icons/Item.svg" alt="Thumbnail Image" height="30px" width="30px">
                        <span style="font-size:15px">نقشه راه یادگیری</span>
                     </a>
                </div>
            </div>
        </div>

<!-- Category Posts -->
<div class="container-fluid">
    <div class="row p-2" id="ListOfData" style="font-size:15px">
            @foreach($packages as $package)
                <div class="col-lg-3 col-md-6 col-sm-11 col-12 mx-auto mt-3">
                    <div class="card border-none mt-4" style="border-radius: 20px;box-shadow: 0px 0px 20px black;border-style: none;height:300px;max-height:300px">
                        <div class="card-header p-0 overflow-hidden" style="border-top-left-radius: 20px;border-top-right-radius: 20px;border-style: none">
                            <a href="{{route('academy.course', ['pk_tree' =>  $package['pk_tree'],'pk_package' =>$package['pk_package'] ]  )}}">
                                <img src="{{  Storage::url('package/'.$package['pic']) }}" alt="{{ $package['fa_name'] }}"
                                 class="w-100 imageBlog" style="border-top-left-radius: 20px;border-top-right-radius: 20px;height:30vh">
                            </a>
                        </div>
                        <div class="card-body px-4 pt-2 text-center">
                            <a href="{{route('academy.course', ['pk_tree' =>  $package['pk_tree'],'pk_package' =>$package['pk_package'] ]  )}}" class="">
                            <h2 class="mt-2" style="direction:rtl;font-size:16px">{{ $package['fa_name'] }}</h2>
                            </a>
                          
                        </div>
                        <div class="card-end px-4 py-3">
                         <div class="row" style="direction:rtl">
                                        @if($package['status'] == "انتشار")
                                            <div class="col-md-6 col-6 text-center" style="font-family: Dastnevis;font-size: 20px;">
                                            @if($package['price'] == 0)
                                            <img class="card-img-top img-border" src="{{ asset('images/icons/Wallet.svg')  }}" width="30px" height="30px" alt="Card image cap">
                                            <span >   رایگان </span>
                                            @else
                                            <img class="card-img-top img-border" src="{{ asset('images/icons/Wallet.svg')  }}" width="30px" height="30px" alt="Card image cap">
                                            <span > @php echo number_format($package['price'],0) @endphp </span>
                                            <span >   تومان </span>
                                        </div>
                                            @endif

                                            @if($package['status'] == "انتشار")
                                            <div class="col-md-6 col-6 text-center" style="font-family: Dastnevis;font-size: 20px;">
                                            <img class="card-img-top img-border" src="{{ asset('images/icons/Time.svg') }}" width="30px" height="30px" alt="Card image cap">
                                            {{ $package['time'] }} 
                                            </div>
                                            @endif

                                        @else
                                        <div class="col-md-3 col-12 text-center" style="margin-top:13px">
                                        </div>
                                        <div class="col-md-3 col-12 text-center" style="margin-top:13px">
                                        </div>
                                        <div class="col-md-2 col-12 text-center mt-lg-0 mt-md-0 mt-sm-3 mt-3">
                                        <button type="button" disabled class="btn  btn-round" style="background-color:beige;border-color:beige">به زودی</button>
                                        </div>
                                        @endif
                               
                               </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
<section class="Pagination">
<div class="row mx-auto">
<div class="col-lg-2 col-md-6 col-sm-11 col-6 mx-auto mt-3">
<ul class="pagination px-1 py-1 text-secondary" style="background-color: transparent">
{{$packages->links()}}
</a>
</li>
</ul>
</div>
</div>
</section>
</div>
@endsection


