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
<h1 class="font-weight-bolder text-center font-weight-bolder text-landing" >
 <span class="text-info main-color-blue">دوره های</span>
 <span class="text-warning mr-3 main-color-yellow">لـرنیا</span>
</h1>

<h2 class="text-justify p-lg-1 p-md-4 p-sm-4 p-4 m-lg-4 text-center text-landing-quick">
جامع ترین آموزش ها با لرنیا
</h2>
@endsection

@section('pic_landing')
 <img  class="learn-bg d-lg-block d-md-block d-sm-none d-none" src="{{asset('images/Academy/quicklearn.svg')}}">
@endsection

@section('content')

<!-- Terms -->
<div class="row">
    <div class="col-lg-9 col-md-10 col-sm-11 col-12 mx-auto mt-5" >
        <div class="card-body">
             <div class="row">
                <div class="col-md-7 col-12 col-lg-7 col-sm-12 mx-auto  text-center Terms ">
                ما در دوره های آموزشی لرنیا تمام سعی مان را کردیم تا جامع ترین 
                سرفصل آموزشی را به کمک چندین تن از اساتید خوب کشور عزیزمان
                برای شما آماده کنیم تا برای ورود به بازار کار دیگر نگران نباشید
                </div>
            </div>
          </div>
      </div>
 </div>
<!-- Terms -->

<!-- pakages  -->
<div class="container-fluid">
    <div class="row p-2" id="ListOfData" >
        @foreach($packages as $package)
            <div class="col-lg-3 col-md-6 col-sm-11 col-12 mx-auto mt-3">
                <div class="card border-none mt-4 pakage-content" >
                    <div class="card-header p-0 overflow-hidden pakage-header" >
                        <a href="{{route('academy.course', ['pk_tree' =>  $package['pk_tree'],'pk_package' =>$package['pk_package'] ]  )}}">
                            <img src="{{  Storage::url('package/'.$package['pic']) }}" alt="{{ $package['fa_name'] }}" class="w-100 imageBlog pakage-image">
                        </a>
                    </div>
                    <div class="card-body px-4 pt-2 text-center">
                        <a href="{{route('academy.course', ['pk_tree' =>  $package['pk_tree'],'pk_package' =>$package['pk_package'] ]  )}}" class="">
                            <h2 class="mt-2 pakage-title" >{{ $package['fa_name'] }}</h2>
                        </a>
                    </div>
                    <div class="card-end px-4 py-3">
                        <div class="row">
                            @if($package['status'] == "انتشار")
                                <div class="col-md-6 col-6 text-center pakage-footer">
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
                                <div class="col-md-6 col-6 text-center pakage-footer" >
                                    <img class="card-img-top img-border" src="{{ asset('images/icons/Time.svg') }}" width="30px" height="30px" alt="Card image cap">
                                        {{ $package['time'] }} 
                                </div>
                                @endif
                                @else
                                <div class="col-md-2 col-12 text-center mt-lg-0 mt-md-0 mt-sm-3 mt-3">
                                        <button type="button" disabled class="btn  btn-round pakage-soon" >به زودی</button>
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
                <div class="pagination px-1 py-1 text-secondary" >
                    {{$packages->links()}}
                </div>
            </div>
        </div>
    </section>
</div>

@endsection


