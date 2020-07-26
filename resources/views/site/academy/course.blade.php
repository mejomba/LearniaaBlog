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
                <a href="{{route('academy.mylearn',['pk_tree'=>$selected_road])}}">
                  <button class="btn btn-secondary mt-4 d-inline" style="font-size:15px;margin-bottom:10px">بازگشت</button>
                </a>
                </div>
          </div>

            <div class="card shadow border-0"  >
                <div class="card-header" style="background-color:#20C5BA ">
                    <div class="text-center">
                        <h2 style="font-size:30px">دوره {{$package['fa_name']}}</h2>
                    </div>
                </div> 
                <img class="card-img-top img-border"
                     src="{{ Storage::url('package/'.$package->pic)  }}"
                     width="900px" height="250px" alt="Card image cap">
                <div class="card-body text-center ">
                    <h5 class="card-title "></h5>
                    <p class="card-text">
                    </p>
                    <!-- Full Pack Sale -->
                </div>
                <div class=" p-3  ml-2 mr-2 mb-3" style="border-radius: 20px;text-align: center;border:3px solid  #20c5ba;color: white;">

                 <form action="{{route('package.pay', $package['pk_package'] )}}" method="POST">
                                @csrf
                                <input type="hidden" name="LocationUser" value="Academy_package">
                                <input type="hidden" name="NamePackage" value="{{$package['name']}}">
                                <span>قیمت :</span>
                                <button class="btn btnGreen"  type="submit">خرید دوره {{$package['fa_name']}} </button>
                                   
                            </form> 
               
                </div>
               
            </div>
        </div>
    </div>



{{--================================TimeLine starts===========================--}}

                <div class="row " style="margin-top:60px">
                    <div class="col-lg-8 col-md-10 col-sm-11 col-11 border rounded-lg m-4 p-2 mx-auto"  >
                    <ul class="timeline">
                    @php $row_counter = 1 ; @endphp
                    @foreach($courses as $course)   
                        <li>
                         <!-- Data -->
                            <div class="row" id="row">
                            <div class="col-lg-11 col-md-10 col-sm-11 col-11 pt-3 ml-3 hover-style k-cursor-pointer"
                             style="border: solid 1px #20C5BA ; border-radius: 5px">

                                <div class="card-title">
                                        <div class="row">
                                         
                                            <div class="col-md-4 col-12 text-center" style="margin-top:15px">
                                            <a class="mb-0">
                                                قسمت {{$row_counter}} :
                                                {{$course['name']}}
                                               
                                            </a>
                                                </div>

                                            <div class="col-md-4 col-12 text-center" style="margin-top:13px">
                                            @if($payment_status == 'No')
                                            <img class=" img-border"
                                            src="{{ asset('images/Academy/NoPay.svg') }}"
                                            width="30px" height="30px" alt="Card image cap">
                                            <span style="color:gray">  خریداری نشده </span>
                                            @else
                                            <img class=" img-border"
                                            src="{{ asset('images/Academy/YesPay.svg') }}"
                                            width="30px" height="30px" alt="Card image cap">
                                            <span style="color:#20c5ba">  فعال </span>
                                            @endif
                                            </div>

                                         
                                          <div class="col-md-2 col-12 text-center mt-lg-0 mt-md-0 mt-sm-3 mt-3">
                                            <a href="{{ route('academy.show', ['pk_course' => $course['pk_course'] ,
                                                 'desc' => $course['name'] , 'sort' => $course['sort'] ,
                                                 'pk_package' => $course['pk_package']  ]) }}"
                                               class="btn fourth btn-round">مشاهده</a>
                                            
                                            </div>

                                      </div>

                                </div>

                               
                            </div>
                        <!-- Data -->
                            </div>
                            
                       </li>
               @php $row_counter =  $row_counter + 1 ; @endphp     
               @endforeach
                </ul>
               </div>
               
             </div>
             
{{--======================timeLine ends===================--}}


 <!-- container -->
</section>
<!-- End BLog Posts -->


@endsection
