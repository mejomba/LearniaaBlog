@extends('Layouts.layout_main_site')
@section('Head')
    <title>{{$current_course['name']}}|لرنیا</title>
    <meta name="description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد ">
    <meta name="keywords" content="نقشه راه لرنیا,لرنیا Course,learniaa course">
    <meta property="og:title" content="{{$current_course['name']}}|لرنیا"/>
    <meta property="og:url" content="{{Request::url()}}"/>
    <meta property="og:image" content="{{ asset('images/Template/Circlelogo.svg') }}">
    <meta property="og:type" content="website"/>
    <meta name="description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد">
    <meta property="og:locale" content="fa_IR"/>
    <meta name="twitter:card" content="summary" /> 
    <meta name="twitter:site" content="{{Request::url()}}" /> 
    <meta name="twitter:title" content="{{$current_course['name']}}|لرنیا" /> 
    <meta name="twitter:description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد" /> 
    <meta name="twitter:image" content="{{ asset('images/Template/Circlelogo.svg') }}">
@endsection

@section('content')
<section class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-10 col-12 course mx-auto" >
            <div class="row">
                <div class="col-12 col-md-12 text-center">
                  @if($tree != null)
                        <a href="{{route('academy.course',['pk_tree' => $tree->pk_tree ,'pk_package' => $package->pk_package ])}}">
                            <button class="btn btn-secondary mt-4 d-inline mb-4" >بازگشت</button>
                        </a>
                    @else
                        <a href="{{ route('academy.course',['pk_tree' => 0 ,'pk_package' => $package->pk_package ])}}">
                            <button class="btn btn-secondary mt-4 d-inline mb-4">بازگشت</button>
                        </a>
                    @endif
                </div>
            </div>

          <!-- Payment Section -->
            <div class="">
                <div class="" >
                    <div class="text-center">
                        <h2>{{$current_course['name']}}</h2>
                    </div>
                </div> 

                <div class="row mt-3">
                <div class="col-lg-8 col-md-10 col-sm-11 col-11  rounded-lg m-4 p-2 mx-auto">
                <video  class="afterglow" id="my-video" width="1920" height="1080" data-skin="dark" poster="{{Storage::url('course/'. $package['folder'] .'/' .$current_course['pic_cover'])}}" src="{{ Storage::disk('learniaa')->temporaryUrl( $current_course['download_link'], now()->addMinutes(120))}}">
                </video>
                </div>
                </div>



                <div class="card-body text-center ">
                    <h5 class="card-title "></h5>
                    <p class="card-text"></p>
                </div>
                <div class=" p-3  ml-2 mr-2 mb-3  course-form">
                            <div class="row"> 
                                <div class="col-md-5 mt-2" >
                                    @if($current_course->learner['pic'])
                                        <img  src="{{  Storage::url('learner/'.$current_course->learner['pic'])  }}" alt="Profile" class="img-raised rounded-circle img-fluid" style="width: 120px;height: 120px;" >
                                        <span style="font-weight:bold;font-size:22px;font-family:shabnam;color:#20c5ba"> {{$current_course->learner->user['name']}} </span>  
                                    @else         
                                        <img  src="{{ asset('images/Template/user.svg') }}" alt="Learniaa" height="40px" width="40px">
                                        <span style="font-weight:bold;font-size:22px;font-family:shabnam;color:#20c5ba"> {{$current_course->learner->user['name']}} </span>  
                                    @endif
                                </div>
                                
                                <div class="col-md-7 mt-1">
                                <p style="font-weight:bold;font-size:15px;font-family:shabnam" style="font-size:15px;color:#20c5ba;line-height:25px !important">{{$current_course->learner['desc']}}</p>
                                </div>
                               
                         </div>
                </div>
            </div>
       <!-- Payment Section -->

        <!-- Information Section -->
        <div class="">
                <div class="card-body text-center ">
                    <h5 class="card-title "></h5>
                    <p class="card-text"></p>
                </div>
                <div class=" p-3  ml-2 mr-2 mb-3  course-form">
                            <div class="row"> 
                                <div class="col-md-6 mt-1 mx-auto" >
                                <a  class="btn btnGreen" style="padding-bottom : 5px" _target="blank" href="{{ route('api.downloadcount',$current_course['pk_course'])}}" class="btn btnGreen btn-video btnblogPost">دانلود ویدیو</a>                            
                                </div>
                            </div>
                </div>
            </div>
          <!-- Information Section -->

       </div>
    </div>
</section>



<!-- Modal Confirm Login -->                      
<div class="modal fade" dir="rtl" id="ModalConfirmLogin" tabindex="-1" role="dialog"  aria-labelledby="ModalLabelConfirmLogin" aria-hidden="true">  
    <div class="modal-dialog modal-dialog-centered" role="document" > 
        <div class="modal-content">
            <div class="modal-header"> 
                <img src="{{ asset('images/Template/close.svg') }}" onclick="ModalConfirmLogin_close()" style="width:30px"  >    
            </div>                              
            <div class="modal-body">                      
                <div class="card-body px-lg-1 py-lg-1">
                    <div class="row">   
                        <b class="text-danger">برای انجام فرایند خرید لازم است ابتدا ثبت نام کنید </b>
                    </div>
                </div>
            </div>
            <div class="modal-footer  mx-auto">
                <button type="button" onclick="RedirectToLogin()" class="btn btnGreen">ثبت نام و خرید دوره</button> 
                <button type="button" onclick="ModalConfirmLogin_close()" class="btn btnClose" data-dismiss="modal">بستن</button> 
            </div>
        </div>
    </div>
</div>                           
<!-- Modal Confirm Login -->


<!-- New TimeLine -->
<div class="row mt-4 ">
   <div class="col-lg-6 mx-auto text-center">
      <h3 class="main-color-blue">لیست پخش</h3>
   </div>
</div>

<div class="row mt-3">
        <div class="col-lg-8 col-md-10 col-sm-11 col-11  rounded-lg m-4 p-2 mx-auto"  >

@php $section_counter = 1 ; @endphp
     @php $row_counter = 1 ; @endphp
     @foreach($DataSection as $section) 
</div>
<div class="subscribe-area wow fadeIn container mx-auto p-3 roadMap " >
    <div class="row">

         <div class="col-lg-3 text-center mt-2 " >
           <h2 class="roadMap-text-right main-color-blue">بخش {{$section_counter}}</h2>
        </div>

        <div class="col-lg-7 mt-2">
            <div class="subscribe-content">
              <h4 class="roadMap-text-small main-color-black mt-2">
             
             </h4> 
            </div>
        </div>

        <div class="col-lg-2">
        <button class="btn btnGreen btn-round btn-collapse" data-toggle="collapse" aria-expanded=""
         data-target="#{{'collapse'.$section['Section']['pk_section']}}"
         aria-controls="{{'collapse'.$section['Section']['pk_section']}}">
          <img src="{{ asset('images/icons/DownFlash.svg')}}" alt="Thumbnail Image" height="30px" width="30px">
        </button>
      </div>

      <!-- Row 2 -->
     
        <div class="col-12 col-md-12 col-lg-12 col-sm-12 mt-2">  <!-- Courses -->
         <div id="{{'collapse'.$section['Section']['pk_section']}}" class="collapse" 
         aria-labelledby="{{'id'.$section['Section']['pk_section']}}" data-parent="#{{'collapse'.$section['Section']['pk_section']}}">
        
         @foreach($section['Courses'] as $course)   

                <div class="subscribe-area wow fadeIn container mx-auto p-3 roadMap "
                @if($course->pk_course == $section['Current_Course']->pk_course )
                style="background-color: #20c5ba3b;"
                @endif >
            <div class="row">

                <div class="col-lg-3 text-center mt-2 " >
                <h2 class="roadMap-text-right main-color-blue">قسمت {{$row_counter}}</h2>
                </div> 

                <div class="col-lg-7 mt-2">
                    <div class="subscribe-content">
                    <h4 class="roadMap-text-small main-color-black mt-2">
                    {{$course['name']}}
                    </h4> 
                    </div>
                </div>

                <div class="col-lg-2">
                @if($payment_status == 'Yes' || $course['isFree'] == 'Yes' )
                <button class="btn btnGreen btn-round btn-collapse">
                <a href="{{ route('academy.show', ['pk_course' => $course['pk_course'] ,'desc' => $course['name'] , 'sort' => $course['sort'] ,'pk_package' => $course['pk_package'] , 'pk_section' => $section['Section']['pk_section']  ]) }}">
                <img src="{{ asset('images/icons/Play.svg')}}" alt="Thumbnail Image" height="30px" width="30px">
                 </a>
                </button>
                @else
                <button class="btn  btn-round btn-collapse">
                <img src="{{ asset('images/icons/Lock.svg')}}" alt="Thumbnail Image" height="30px" width="30px">
                </button>
                @endif
            </div>
 
         </div>
      </div>

      @php $row_counter =  $row_counter + 1 ; @endphp     
       @endforeach
         <!-- Row 2-->
         </div>     
</div>
</div>
 @php $row_counter =  $row_counter + 1 ; @endphp       
 @php $section_counter =  $section_counter + 1 ; @endphp
 @endforeach
 </div>
   
  </div>
 </div>
</div>
<!-- New TimeLine -->



<!-- ModalDiscount Box --> 
<div class="modal fade" dir="rtl" id="ModalDiscount" tabindex="-1" role="dialog"  aria-labelledby="ModalLabelModalDiscount" aria-hidden="true">  
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:400px"> 
        <div class="modal-content" style="width:90%">
            <div class="modal-header"> 
                <img src="{{ asset('images/Template/close.svg') }}" onclick="ClosePopUpDiscount()" style="width:35px"> 
            </div>                            
            <div class="modal-body" id="ModalDiscountBody">                
                 <div class="card-body px-lg-1 py-lg-1">
                    <div class="row">
                        <div class="col-md-12 card p-3  ml-auto mr-auto"  >
                            <div class="subscribe-form mt-50" style="">
                                <button class="main-btn" onclick="DiscountSub()" style="">ثبت کد </button>
                                <input type="text" id ="discountcode"name="discountcode" placeholder="کد تخفیف" style="text-align: center;">
                            </div>   
                        </div>
                    </div>
                </div>
                <div class="modal-footer mx-auto">
                    <button type="button" onclick="ClosePopUpDiscount()" class="btn btnClose" data-dismiss="modal">بستن</button>
                </div>
            </div>
        </div>
    </div> 
</div>

<!-- JS Function -->
<script>
    function CheckUserLogin()
        {
            $pk_user = document.getElementById("UserLogin").value ;
            if($pk_user == 'Null')
            {
                document.getElementById("ModalConfirmLogin").setAttribute("style","display:block;opacity:100;"); 
            }
            else
            {
                document.getElementById("PackagePay").submit();
            } 
        }

    function ModalConfirmLogin_close()
    {
        document.getElementById("ModalConfirmLogin").setAttribute("style","");
    }

    function RedirectToLogin()
    {
        location.replace("{{ route('reset.showcallbackloginform',['pk_package' => $package->pk_package , 'redirectFromURL' => url()->current() ] ) }}");
    }

    function OpenPopupIntro() 
    {
        document.getElementById("timeline").setAttribute("style","z-index:-1 !important");
        document.getElementById("ModalIntro").setAttribute("style","display:block;opacity:100;");
        $('#ModalIntro').animate({ scrollTop: 0 }, 'fast');
    }

    function ClosePopupIntro()
    {
        document.getElementById("timeline").setAttribute("style","");
        document.getElementById("ModalIntro").setAttribute("style","");
    }

    function GetVideoIntro(pk_section,pk_package)
    {  
        $.ajax({
            url: '/api/GetTextIntro',
            data:
            { pk_package : pk_package},
            error: function(err){},
            dataType: 'json',
            success: function(data)
            {
                console.log(data) ;
                $("#TextIntro").html(' <p style="font-size: 25px;color: #20c5ba;text-align: center;font-weight: bold;">میخوایم راجب این دوره بهتون بگیم که :</p>' + data);               
            }, 
            type: 'POST'
        });
        $.ajax({
            url: '/api/GetVideoIntro',
            data:
            { pk_section : pk_section},
            error: function(err){},
            dataType: 'json',
            success: function(data)
            {
                document.getElementById("VideoIntro").setAttribute("src",data);
                OpenPopupIntro();     
            },
            type: 'POST'
        });
    }

    function OpenPopUpDiscount()
    { 
        document.getElementById("ModalDiscount").setAttribute("style","display:block;opacity:100;");
        $('#ModalDiscount').animate({ scrollTop: 0 }, 'fast');
    }

    function ClosePopUpDiscount()
    {
        document.getElementById("ModalDiscount").setAttribute("style","");
    }

    function DiscountSub()
    {
        var code = $('#discountcode').val();
        var user = $('#UserLogin').val();
        $.ajax({
            url: '/api/calculator',
            data:
            {
                discount_code : code ,
                pk_user:user
            },
            error: function(err)
            {
            },
            dataType: 'json',
            success: function(data)
            {
                if(data == 'login required')
                {  
                    ClosePopUpDiscount();
                }
                if(data=='not vaild')
                {
                    ClosePopUpDiscount();
                }
                else
                {
                    document.getElementById("packageprice").innerHTML=data.price;
                    document.getElementById("price").setAttribute("value",data.price);
                    ClosePopUpDiscount();
                }
            },    
            type: 'POST'
        });
    }
 </script>

@endsection
