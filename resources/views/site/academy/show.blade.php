@extends('site.Layouts.layout_main')
@section('Head')
    <title>لرنیا | {{$package['title']}} </title>
    <meta name="description" content="{{$package['desc']}}">
    <meta name="keywords" content="@php echo implode(',',$meta_keywords); @endphp">
@endsection
@section('content')

        <!---- RoadMap Help Section --->
<div class="row" style="padding-left: 10px!important">
     <div class="col-md-2 col-12" style="padding-top:15px; margin-top: 145px!important;
    border-bottom-right-radius: 50px!important;
    border-bottom-left-radius: 50px!important;">
            @if(isset($previous_course['pk_course']))
                <a href="{{ route('academy.show',
                    ['pk_course' => $previous_course['pk_course'] ,
                    'desc' => $previous_course['name'] , 'sort' => $previous_course['sort'] ,
                    'pk_package' => $package->pk_package  ]) }}"
                   class="btn fourth mt-4 d-inline" style="font-size:19px" >قسمت قبلی </a>      
            @endif
        </div>

        <div class="col-md-2 col-12" style="padding-top:15px ; margin-top:145px!important">
            <a href="{{ route('academy.course',
             ['pk_tree' => $tree->pk_tree ,
             'pk_package' => $package->pk_package ]) }}" class="btn btnLearniaa mt-4 d-inline"
             style="font-size:19px; "> لیست پخش  </a>     
        </div>

        <div class="col-md-2 col-12" style="padding-top:15px ; margin-top:145px!important">
            @if(isset($next_course['pk_course']))
                <a href="{{ route('academy.show',
                    ['pk_course' => $next_course['pk_course'] ,
                    'desc' => $next_course['name'] , 'sort' => $next_course['sort'] ,
                    'pk_package' => $package->pk_package  ]) }}"
                   class="btn fourth mt-4 d-inline"  style="font-size:19px"> قسمت بعدی </a>
            @endif
        </div>
</div>
 <!---- RoadMap Help Section --->

  <!-- Title --->
<div class="row" style="padding-top:30px;">
        <div class="col-md-7 text-center" style="padding-top: 5px;">
                <button class="btn mt-4 d-inline BtnLearniaaColor" >
                    <h2 style="color:#FFFFFF" class="text-center">{{$current_course['name']}}</h2>
                </button>

      </div>
      </div>
 <!-- Title --->

  <!-- Information -->
  <div class="row">
        <div class="col-md-7 text-center">
            <div class="container-fluid" style="margin-top:30px">
                <div style="border-bottom:2px solid #20c3b8;margin-bottom:5px">
                    <h3> اطلاعات دوره <h3>
                </div>
                <!-- Information package -->
                <div class="container-fluid">
                    <div class="row text-center" style="padding-top:25px;padding-bottom:15px;">

             <div class="col-md-9">
                 <div class="row">
                        <div class="col-4 col-md-4" style="font-size:13px">
                                        @if($payment_status == 'No')
                                            <img class=" img-border"
                                            src="{{ asset('images/Academy/NoPay.svg') }}"
                                            width="62px" height="42px" alt="Card image cap">
                                           @else
                                            <img class=" img-border"
                                            src="{{ asset('images/Academy/YesPay.svg') }}"
                                            width="30px" height="30px" alt="Card image cap">
                                          @endif
                            </div>
                            <div class="col-4 col-md-4" style="font-size:13px">
                                <img src="{{ asset('images/Template/stopwatch.svg') }}"
                                    alt="Learniaa" height="42px" width="62px">
                            </div>
                            <div class="col-4 col-md-4" style="font-size:13px">
                                <img src="{{ asset('images/Template/video-camera.svg') }}"
                                    alt="Learniaa" height="42px" width="62px">
                            </div>

                        <!--Row 2 -->
                        <div class="col-4 col-md-4" style="font-size:15px">
                            <div class="row text-center">
                                <div class="col-12 col-md-12">
                                          @if($payment_status == 'No')
                                            <span style="color:gray"> خریداری نشده </span>
                                           @else
                                            <span style="color:#20c5ba">  فعال </span>
                                          @endif
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-4 col-md-4" style="font-size:13px">
                            <div class="row text-center">
                                <div class="col-12 col-md-12">
                                    {{ $package->time }}
                                </div>
                                <div class="col-12 col-md-12">
                                    ساعت
                                </div>
                            </div>
                        </div>
                        <div class="col-4 col-md-4" style="font-size:13px">
                            <div class="row text-center">
                                <div class="col-12 col-md-12">
                                    {{ $package->count }}
                                </div>
                                <div class="col-12 col-md-12">
                                    درس
                                </div>
                            </div>
                        </div>
                        <!-- Row 2 -->

                      </div>
                 </div>

                 <div class="col-md-3 col-12" style="font-size:13px">
                   <!-- Payment -->
                   @if($payment_status == 'Yes' || $current_course->isFree == 'Yes' )
                        <div class="col-md-12 text-center" >
                            <a style="padding-bottom : 5px" _target="blank"
                               href="{{ Storage::disk('learniaa')->temporaryUrl( $current_course['download_link'], now()->addMinutes(120))}}"
                               class="btn fourth btn-video btnblogPost">دانلود آموزش</a>
                        </div>
                        </div>
                    @else
                        <div class="col-md-12 text-center" >
                        <a href="{{ route('academy.course', ['pk_tree' => $tree->pk_tree ,
                                'pk_package' =>  $package->pk_package ]) }}"
                                 class="btn fourth btn-round">خرید دوره {{$package['fa_name']}} </a>
                        </div>
                         <!-- All Cource -->
                        </div>
                    @endif
            <!-- Payment -->
            </div>

                </div>
            </div>
        </div>
  <!-- Information -->



   <!-- VideoPlayer  -->
                <div class="row">
                    <div class="col-12 col-md-7">
                    <div class="container-fluid"
                        style="padding-top: 5px;margin-left: 0px;margin-right: 0px;padding-left: 0px;padding-right: 0px">
                        <div class="container-fluid" style="margin-left: 0px;margin-right: 0px;padding-left: 0px;padding-right: 0px">

                            <video class="afterglow" id="my-video" width="1920" height="1080"
                                    poster="{{Storage::url('course/'. $package['folder'] .'/' .$current_course['pic_cover'])}}"
                                    src="{{ Storage::disk('learniaa')->temporaryUrl( $current_course['download_link'], now()->addMinutes(120))}}">
                             </video>

                        </div>
                    </div>
                    </div>
   <!-- VideoPlayer  -->


     <!-- Section Learner -->
          <div class="col-12 col-md-5">
            <div class="container-fluid" style="padding-bottom:15px;;font-size:15px;">
                <h3> اطلاعات مدرس <h3>
            </div>
            <div class="container-fluid" style="padding-bottom:15px;;font-size:15px">
                <div class="row" >
                    <div class="col-md-3 col-3">
                        <img src="{{  Storage::url('learner/'.$current_course->learner['pic'])  }}"
                             alt="{{$current_course->learner->user['name']}}" class="img-fluid rounded-circle shadow-lg"
                             style="width: 90px;height:90px">
                    </div>
                    <div class="col-md-9 col-9" style="padding-top: 3px;">
                        <div class="row">
                            {{$current_course->learner->user['name']}}
                        </div>
                        <div class="row" style="padding-top: 9px;">
                            {{$current_course->learner['job']}}
                        </div>
                    </div>
                    <div class="col-md-12 text-center" style="font-size:15px">
                        <div class="bordercardinfoLearner aboutAuthor  wi-100 flex-row jus-between al-start">
                            <div class="cardinfoLearner">درباره مدرس</div></div>
                           <div class="p-3 hover-style  container"
                            style="margin-top:10px;border :2px solid #20c5ba"> <p style="text-align:justify">
                                {{$current_course->learner['desc']}}
                            </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
      </div>
   <!-- Section Learner -->



    <!-- Samte Chap -->
    <!-- post meta section -->
    <div class="row">
        <div class="col-md-7 col-12">
            <div class=" p-3 hover-style  container-fluid"
             style="margin-top:10px;text-align:justify;border :2px solid #20c5ba">
                <h3>درباره دوره</h3>
                @php echo htmlspecialchars_decode($package['desc']) ; @endphp
            </div>
            <p></p>
            <p></p>
            <p></p>
        </div>
    </div>
    </div>
    </div>
    <!-- Samte Rast --->

    </div>
    </div>
    </div>
@endsection






