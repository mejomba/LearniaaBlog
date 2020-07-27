@extends('site.Layouts.layout_main')
@section('Head')
    <title> لرنیا آکادمی | لرنیا </title>
    <meta name="description" content="لرنیا آکادمی  | لرنیا ">
    <meta name="keywords" content="نقشه راه لرنیا,چارت آموزشی لرنیا ,لرنیا آاکادمی">
@endsection
@section('content')

<!-- Blog Posts -->
<section class="container-fluid">

    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-10 col-12 " style="margin-top:50px !important;
    border-bottom-right-radius: 50px!important;
    border-bottom-left-radius: 50px!important;">

<div class="row">
            <div class="col-12 col-md-12 text-center">
                <a href="{{route('academy.road',['pk_tree'=>$selected_road])}}">
                  <button class="btn btn-secondary mt-4 d-inline" style="font-size:15px;margin-bottom:10px">بازگشت</button>
                </a>
                </div>
          </div>


            <div class="card shadow border-0"  >
                <div class="card-header" style="background-color:#20C5BA ">
                    <div class="text-center">
                        <h2 style="font-size:30px"> مسیر یادگیری شما</h2>
                    </div>
                </div>
                <img class="card-img-top img-border"
                     src="{{ asset('images/Academy/Academy_Road.svg') }}"
                     width="900px" height="250px" alt="Card image cap">
                <div class="card-body text-center ">
                    <h5 class="card-title "></h5>
                    <p class="card-text">
                    </p>
                    <!-- Full Pack Sale -->
                </div>
                <div class="border p-3 hover-style ml-2 mr-2 mb-3" style="border-radius: 20px;text-align: center;background-color: #20c5ba;color: white;">
                 یکی یکی دوره های زیر رو شروع به آموزش دیدن کن ...  موفق باشی ! 
               
                </div>
               
            </div>
        </div>
    </div>



{{--================================TimeLine starts===========================--}}

                <div class="row " style="margin-top:60px">
                    <div class="col-lg-8 col-md-10 col-sm-11 col-11 border rounded-lg m-4 p-2 mx-auto"  >
                    <ul class="timeline">
                    @php $row_counter = 1 ; @endphp
                    @php $no = 0 ; @endphp
                    @foreach($road_nodes as $node)   
                    @for ($package = 0; $package < $road_packages[$no]['data']->count() ; $package++)  

                        <li>
                         <!-- Data -->
                            <div class="row" id="row">
                            <div class="col-lg-11 col-md-10 col-sm-11 col-11 pt-3 ml-3  k-cursor-pointer"
                             style="border: solid 1px #20C5BA ; border-radius: 5px">

                                <div class="card-title" 
                                id="{{'id'.$road_packages[$no]['data'][$package]['pk_package']}}">
                                        <div class="row">
                                         
                                            <div class="col-md-4 col-12 text-center">
                                            <a class="mb-0">
                                                <button class="btn btn-link dropdown-toggle" 
                                                style="white-space:normal; " data-toggle="collapse" 
                                                data-target="#{{'collapse'.$road_packages[$no]['data'][$package]['pk_package']}}" 
                                                aria-expanded="false" 
                                                aria-controls="{{'collapse'.$road_packages[$no]['data'][$package]['pk_package']}}">
                                                گام {{$row_counter}} :
                                                {{$road_packages[$no]['data'][$package]['fa_name']}}
                                                </button>
                                            </a>
                                                </div>

                                            <div class="col-md-3 col-12 text-center" style="margin-top:13px">
                                            @if($road_packages[$no]['data'][$package]['price'] != 0)
                                            <img class="card-img-top img-border"
                                            src="{{ asset('images/Academy/money.svg') }}"
                                            width="30px" height="30px" alt="Card image cap">
                                            <span style="color:green">  {{$road_packages[$no]['data'][$package]['price']}} </span>
                                            <span style="color:green">   تومان </span>
                                            @endif
                                            @if($road_packages[$no]['data'][$package]['price'] == 0)
                                            <span style="color:green">   رایگان </span>
                                            @endif
                                            </div>

                                            <div class="col-md-3 col-12 text-center" style="margin-top:13px">
                                            <img class="card-img-top img-border"
                                            src="{{ asset('images/Academy/clock.svg') }}"
                                            width="30px" height="30px" alt="Card image cap">
                                            {{ $road_packages[$no]['data'][$package]['time'] }} ساعت
                                            </div>

                                            <div class="col-md-2 col-12 text-center mt-lg-0 mt-md-0 mt-sm-3 mt-3">
                                            <a href="{{ route('academy.course', ['pk_tree' => $selected_road ,
                                                 'pk_package' =>  $road_packages[$no]['data'][$package]['pk_package'] ]) }}"
                                               class="btn fourth btn-round">مشاهده</a>
                                            
                                            </div>

                                      </div>

                                </div>

                                <div id="{{'collapse'.$road_packages[$no]['data'][$package]['pk_package']}}" class="collapse" 
                                aria-labelledby="{{'id'.$road_packages[$no]['data'][$package]['pk_package']}}" data-parent="#row">
                                <div class="card-text">
                                @php echo $road_packages[$no]['data'][$package]['desc'] ; @endphp
                             </div>
                                </div>
                            </div>
                        <!-- Data -->
                            </div>
                            
                       </li>
              @php $row_counter =  $row_counter + 1 ; @endphp       
               @endfor
               @php $no = $no + 1 ; @endphp 
               @endforeach
                </ul>
               </div>
               
             </div>
             
{{--======================timeLine ends===================--}}


 <!-- container -->
</section>
<!-- End BLog Posts -->


@endsection
