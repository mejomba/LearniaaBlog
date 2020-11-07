@extends('Layouts.layout_main_site')
@section('Head')
    <title>لرنیا|{{$package['title']}}</title>
    <meta name="description" content="{{$package['desc']}}">
    <meta name="keywords" content="@php echo implode(',',$meta_keywords); @endphp">
@endsection
@section('content')
<!---- RoadMap Help Section --->
<div class="row pl-2 mt-5" >
    <div class="col-lg-5 col-md-6 col-sm-11 col-12 mx-auto mt-5" >
        <div class="card border-none mt-4 shadow">
            <div class="card-body px-4">
                <div class="row">
                    <div class="col-md-12 col-12 col-lg-12 col-sm-12 text-center">
                        <button class="btn  BtnLearniaaColor" >
                            <h3 class="text-white text-center">{{$current_course['name']}}</h3>
                        </button>
                    </div>
                    <div class="col-md-12 col-12 col-lg-12 col-sm-12 text-center ">
                        <div class="row">
                            <div class="col-md-4 col-12 mt-5">
                                @if(isset($previous_course['pk_course']))
                                    <a href="{{ route('academy.show',['pk_course' => $previous_course['pk_course'] ,'desc' => $previous_course['name'] , 'sort' => $previous_course['sort'] ,
                                            'pk_package' => $package->pk_package  ]) }}"  ><h5 class="btn fourth mt-4 d-inline"> قسمت قبلی </h5></a>      
                                 @endif
                            </div>
                            <div class="col-md-4 col-12 mt-5">
                                @if($tree != null)
                                    <a href="{{ route('academy.course',['pk_tree' => $tree->pk_tree ,'pk_package' => $package->pk_package ]) }}" class="btn btnLearniaa mt-4 d-inline"style="font-size:19px; "> لیست پخش  </a>   
                                @else
                                    <a href="{{ route('academy.course',['pk_tree' => 0 ,'pk_package' => $package->pk_package ]) }}" ><h5 class="btn btnLearniaa mt-4 d-inline"> لیست پخش </h5> </a>   
                                @endif
                            </div>
                            <div class="col-md-4 col-12 mt-5">
                                @if(isset($next_course['pk_course']))
                                    <a href="{{ route('academy.show',['pk_course' => $next_course['pk_course'] ,'desc' => $next_course['name'] , 'sort' => $next_course['sort'] ,
                                            'pk_package' => $package->pk_package  ]) }}"   ><h5 class="btn fourth mt-4 d-inline"> قسمت بعدی </h5></a>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 col-12 col-lg-12 col-sm-12 text-center mt-5">
                            <hr class="hr"/>
                            <h3> اطلاعات دوره <h3>
                        </div>
                        <div class="col-md-12 col-12 col-lg-12 col-sm-12 text-center mt-1">
                            <div class="row">
                                <div class="col-md-4 col-4">
                                    @if($payment_status == 'Yes' || $current_course->isFree == 'Yes' )
                                        @if($payment_status == 'Yes')
                                            <img class=" img-border" src="{{ asset('images/Academy/YesPay.svg') }}" width="30px" height="30px" alt="Card image cap">                                         
                                        @else
                                            <img class=" img-border" src="{{ asset('images/Academy/FreePay.svg') }}" width="30px" height="30px" alt="Card image cap">                                         
                                        @endif
                                    @else
                                        <img class=" img-border" src="{{ asset('images/Academy/NoPay.svg') }}" width="62px" height="42px" alt="Card image cap">                                          
                                    @endif
                                </div>
                                <div class="col-md-4 col-4">
                                    <img src="{{ asset('images/Template/stopwatch.svg') }}" alt="Learniaa" height="42px" width="62px">                            
                                </div>
                                    <div class="col-md-4 col-4">
                                        <img src="{{ asset('images/Template/video-camera.svg') }}"  alt="Learniaa" height="42px" width="62px">                                
                                    </div>
                                    <div class="col-md-4 col-4">
                                        @if($payment_status == 'Yes' || $current_course->isFree == 'Yes' )
                                            @if($payment_status == 'Yes')
                                                <span style="color:#20c5ba" style="font-family:Dastnevis;font-size:25px">  فعال </span>
                                            @else
                                                <span style="color:#20c5ba" style="font-family:Dastnevis;font-size:25px">  رایگان </span>
                                            @endif
                                        @else
                                            <span style="color:gray" style="font-family:Dastnevis;font-size:25px"> خریداری نشده </span>  
                                        @endif
                                    </div>
                                        <div class="col-md-4 col-4" style="font-family:Dastnevis;font-size:25px">
                                            {{ $package->time }}
                                        </div>
                                        <div class="col-md-4 col-4" style="font-family:Dastnevis;font-size:25px">
                                            {{ $package->count }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12 col-lg-12 col-sm-12 text-center mt-3">
                                    @if($payment_status == 'Yes' || $current_course->isFree == 'Yes' )
                                        <a style="padding-bottom : 5px" _target="blank" href="{{ route('api.downloadcount',$current_course['pk_course'])}}" class="btn btnGreen btn-video btnblogPost">دانلود ویدیو</a>                            
                                    @else
                                        <a href="{{ route('academy.course', ['pk_tree' => $tree->pk_tree ,'pk_package' =>  $package->pk_package ]) }}" class="btn btnGreen btn-round">خرید دوره {{$package['fa_name']}} </a>                           
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-11 col-12 mx-auto" style="margin-top:20px !important">
                <div class="card border-none mt-4" style="border-radius: 20px;box-shadow: 0px 0px 20px black;border-style: none">  
                    <div class="card-body px-4">
                        <div class="row">
                            <div class="col-md-12 col-12 col-lg-12 col-sm-12 text-center">
                                <div class="card border-none mt-3" style="border-radius: 20px;box-shadow: 0px 0px 02px black;border-style: none">
                                <div class="card-header p-0 overflow-hidden" style="border-top-left-radius: 20px;border-top-right-radius: 20px;border-style: none"> </div>
                                <div class="card-body px-4" style="margin-bottom:10px">
                                    @if($current_course->learner['pic'])
                                        <img  src="{{  Storage::url('learner/'.$current_course->learner['pic'])  }}" alt="Profile" class="img-raised rounded-circle img-fluid" style="width: 120px;height: 120px;" >
                                        <p style="font-size:25px;font-family:dastnevis" style="font-size:15px;color:#20c5ba;line-height:25px !important">{{$current_course->learner['desc']}}</p>
                                    @else         
                                        <img  src="{{ asset('images/Template/user.svg') }}" alt="Learniaa" height="40px" width="40px">
                                        <p style="font-weight:bold;font-size:25px;font-family:dastnevis" style="font-size:15px;color:#20c5ba;line-height:25px !important">{{$current_course->learner['desc']}}</p>
                                    @endif
                                        <br>
                                            <i class="fa fa-circle mr-2" style="color:#20c5ba"></i>
                                            <span style="font-weight:bold;font-size:22px;font-family:shabnam;color:#20c5ba"> {{$current_course->learner->user['name']}} </span>  
                                            <i class="fa fa-circle mr-2" style="color:#ffe735"></i>
                                            <span style="font-weight:bold;font-size:22px;font-family:shabnam;color:#20c5ba"> {{$current_course->learner['job']}}  </span>
                                        <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>    
</div>

<div class="row">
    <div class="col-lg-9 col-md-6 col-sm-11 col-12 mx-auto" style="margin-top:20px !important">
        <div class="card border-none mt-4" style="border-radius: 20px;box-shadow: 0px 0px 20px black;border-style: none">
            <div class="card-body px-4">
                <div class="row">
                    <div class="col-md-12 col-12 col-lg-12 col-sm-12 ">
                        <div class="card border-none mt-3" style="border-radius: 20px;box-shadow: 0px 0px 02px black;border-style: none">
                            <div class="card-header p-0 overflow-hidden" style="border-top-left-radius: 20px;border-top-right-radius: 20px;border-style: none"> </div>
                            <div class="card-body px-4" style="margin-bottom:10px">
                                <video  class="afterglow" id="my-video" width="1920" height="1080" data-skin="dark" poster="{{Storage::url('course/'. $package['folder'] .'/' .$current_course['pic_cover'])}}" src="{{ Storage::disk('learniaa')->temporaryUrl( $current_course['download_link'], now()->addMinutes(120))}}"> </video>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>    

</div>

<div class="row">
<!-- Test 4 -->
<div class="col-lg-10 col-md-6 col-sm-11 col-12 mx-auto" style="margin-top:20px !important">
                    <div class="card border-none mt-4" style="border-radius: 20px;box-shadow: 0px 0px 20px black;border-style: none">
                        
                        <div class="card-body px-4">
                        <div class="row">
                                <div class="col-md-12 col-12 col-lg-12 col-sm-12 ">

                            <div class="card border-none mt-3" style="border-radius: 20px;box-shadow: 0px 0px 02px black;border-style: none">
                            <div class="card-header p-0 overflow-hidden" style="border-top-left-radius: 20px;border-top-right-radius: 20px;border-style: none"> 
                            </div>
                            <div class="card-body px-4" style="margin-bottom:10px">
                               <div class=" p-3 container-fluid"
                                    style="margin-top:10px;text-align:justify;border :2px solid #20c5ba">
                                    <h3 class="text-center">درباره دوره</h3>
                                        @php echo htmlspecialchars_decode($package['desc']) ; @endphp
                                    </div>
                                </div>
                            <!--Foreach -->
                            </div>
                            
                            </div>

                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>    
<!-- Test 4 -->

</div>


@endsection






