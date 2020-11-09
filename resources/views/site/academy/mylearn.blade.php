@extends('Layouts.layout_main_site')

@section('Head')
    <title>مسیر یادگیری|لرنیا</title>
    <meta name="description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد ">
    <meta name="keywords" content="نقشه راه لرنیا,چارت آموزشی لرنیا ,لرنیا مسیر گنج ,مسیر لرنیا">
    <meta property="og:title" content="مسیر یادگیری|لرنیا"/>
    <meta property="og:url" content="{{Request::url()}}"/>
    <meta property="og:image" content="{{ asset('images/Template/Circlelogo.svg') }}">
    <meta property="og:type" content="website"/>
    <meta name="description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد">
    <meta property="og:locale" content="fa_IR"/>
    <meta name="twitter:card" content="summary" /> 
    <meta name="twitter:site" content="{{Request::url()}}" /> 
    <meta name="twitter:title" content="مسیر یادگیری|لرنیا" /> 
    <meta name="twitter:description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد" /> 
    <meta name="twitter:image" content="{{ asset('images/Template/Circlelogo.svg') }}">
@endsection

@section('content')
<!-- Validation Register Before Show RoadMap MyLEarn 
if(Auth::user() == null)
<script>window.location = "/reset/showcallbackloginform";</script>
endif
-->
<section class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-10 col-12 learn-style mx-auto">
            <div class="card shadow border-0"  >
                <div class="card-header blue-background" >
                    <div class="text-center">
                        <h2> مسیر یادگیری شما</h2>
                    </div>
                </div>
                <img class="card-img-top img-border" src="{{ asset('images/Academy/Academy_Road.svg') }}" width="900px" height="250px" alt="Card image cap">
                <div class="card-body text-center ">
                    <h5 class="card-title "></h5>
                    <p class="card-text"></p>
                </div>
                <div class="border p-3 hover-style ml-2 mr-2 mb-3 blue-background text-white text-center" style="border-radius: 20px;">
                     یکی یکی دوره های زیر رو شروع به آموزش دیدن کن ...  موفق باشی ! 
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-8 col-md-10 col-sm-11 col-11  rounded-lg m-4 p-2 mx-auto"  >

      

<!--  RoadMap -->
@php $row_counter = 1 ; @endphp @php $no = 0 ; @endphp
@foreach($road_nodes as $node)   
@for ($package = 0; $package < $road_packages[$no]['data']->count() ; $package++)  

<div class="subscribe-area wow fadeIn container mx-auto p-3 roadMap " >
    <div class="row">
    <div class="col-lg-4 text-center mt-2 " >
            <a target="_parent" href="https://learniaa.com/academy/mylearn?pk_tree=31" rel="tooltip" title="" data-placement="bottom"  dideo-checked="true">
              <img src="{{ Storage::url('package/'.$road_packages[$no]['data'][$package]['pic'])  }}" alt="Thumbnail Image" width="350px"  >   
            </a>
        </div>
        <div class="col-lg-5 mt-2">
            <div class="subscribe-content">
               <h2 class="roadMap-text-right main-color-blue">گام شماره {{$row_counter}}</h2>
              <h4 class="roadMap-text-small main-color-black mt-2">
                 {{$road_packages[$no]['data'][$package]['fa_name']}}
             </h4> 
            </div>
        </div>

        <div class="col-lg-2 mt-4">
        @if($road_packages[$no]['data'][$package]['status'] == 'انتشار')
                <a class="nav-link  btn  mt-4 d-inline roadMap-link p-3"
                href="{{ route('academy.course', ['pk_tree' => $selected_road , 'pk_package' =>  $road_packages[$no]['data'][$package]['pk_package'] ]) }}" target="_parent" rel="tooltip" title="" data-placement="bottom">
                <img src="{{ asset('images/icons/Item.svg')}}" alt="Thumbnail Image" height="30px" width="30px">
                <span >مشاهده دوره </span>
                </a>
               @else
                 <button type="button" disabled class="btn  btn-round"
                  style="background-color:beige;border-color:beige">به زودی</button>                     
                 @endif
        </div>

    </div>
</div>

 @php $row_counter =  $row_counter + 1 ; @endphp       
 @endfor
 @php $no = $no + 1 ; @endphp 
 @endforeach
<!--  RoadMap -->

      </div>
    </div>
</section>
@endsection
