@extends('Layouts.layout_main_site')
@section('Head')
<title>{{$package['fa_name']}}|لرنیا</title>
<meta name="description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد ">
<meta name="keywords" content="نقشه راه لرنیا,لرنیا Course,learniaa course">
<meta property="og:title" content="{{$package['fa_name']}}|لرنیا"/>
<meta property="og:url" content="{{Request::url()}}"/>
<meta property="og:image" content="{{ asset('images/Template/Circlelogo.svg') }}">
<meta property="og:type" content="website"/>
<meta name="description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد">
<meta property="og:locale" content="fa_IR"/>
<meta name="twitter:card" content="summary" /> 
<meta name="twitter:site" content="{{Request::url()}}" /> 
<meta name="twitter:title" content="{{$package['fa_name']}}|لرنیا" /> 
<meta name="twitter:description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد" /> 
<meta name="twitter:image" content="{{ asset('images/Template/Circlelogo.svg') }}">
@endsection
@section('content')

<section class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-10 col-12 " style="margin-top:50px !important;border-bottom-right-radius: 50px!important;border-bottom-left-radius: 50px!important;">
            <div class="row">
            <div class="col-12 col-md-12 text-center">
                @if($selected_road != 0)
                <a href="{{route('academy.mylearn',['pk_tree'=>$selected_road])}}">
                  <button class="btn btn-secondary mt-4 d-inline" style="font-size:15px;margin-bottom:10px">بازگشت</button>
                </a>
                @else
                <a href="{{route('academy.quicklearn')}}">
                  <button class="btn btn-secondary mt-4 d-inline" style="font-size:15px;margin-bottom:10px">بازگشت</button>
                </a>
                @endif
                </div>
          </div>
            <div class="card shadow border-0"  >
                <div class="card-header" style="background-color:#20C5BA ">
                    <div class="text-center">
                        <h2 style="font-size:30px">{{$package['fa_name']}}</h2>
                    </div>
                </div> 
                <img class="card-img-top img-border"
                     src="{{ Storage::url('package/'.$package->pic)  }}"
                     width="900px" height="250px" alt="Card image cap">
                <div class="card-body text-center ">
                    <h5 class="card-title "></h5>
                    <p class="card-text">
                    </p>
                </div>
                <div class=" p-3  ml-2 mr-2 mb-3" style="border-radius: 20px;text-align: center;border:3px solid  #20c5ba;">
                 <form id="PackagePay" action="{{route('transaction.store',['pk_package' => $package['pk_package']]  )}}" method="GET">
                   @csrf
                   <input type="hidden" name="pk_tree"    id="pk_tree"    value="{{$selected_road}}">
                   <input type="hidden" name="pk_package" id="pk_package" value="{{$package['pk_package']}}">
                   <input type="hidden" name="UserLogin"  id="UserLogin"  value="{{$pk_user}}">
                   <input type="hidden" name="price"  id="price"  value="{{$package['price']}}">
                   <input type="hidden" name="redirectFromURL"  id="redirectFromURL"  value="{{url()->current()}}">
                   <input type="hidden" name="type"  id="redirectFromURL"  value="خرید دوره آموزشی">
 
                               @if($payment_status != 'Yes')
                               <div class="row"> 
                                   <div class="col-md-3"  style="margin-top:10px;font-weight:bold;font-size:20px"> قیمت خرید دوره : </div>
                                   <div class="col-md-3" style="margin-top:10px"> 
                                    <img class=" img-border" src="{{ asset('images/Academy/money.svg') }}"  width="30px" height="30px" alt="Card image cap">
                                    <span id="packageprice" style="font-family:Dastnevis;font-size:25px">@php echo number_format($package['price'],0) @endphp</span> تومان </div>        
                                    <div class="col-md-3">
                                     <button class="btn btnGreen" type="button" style="border-color:#c0bec0;background-image:linear-gradient(45deg, #c0bec0 50%, transparent 50%)"
                                     onclick="OpenPopUpDiscount()">کد تخفیف  </button>         
                                    </div>
                                    <div class="col-md-3">
                                     <button class="btn btnGreen" type="button"
                                     onclick="CheckUserLogin()">خرید دوره  </button>         
                                    </div>
                               </div>
                               @else
                               <div class="row"> 
                                   <div class="col-md-4" style="margin-top:10px;font-weight:bold;font-size:20px"> قیمت خرید دوره : </div>
                                   <div class="col-md-4" style="margin-top:10px"> 
                                    <img class=" img-border" src="{{ asset('images/Academy/money.svg') }}"  width="30px" height="30px" alt="Card image cap">
                                    <span id="packageprice" style="font-family:Dastnevis;font-size:25px">{{$package['price']}}</span> تومان </div>        
                                    <div class="col-md-4">  <button type="button" class="btn btnGreen" disabled >خرید دوره</button>         
                                    </div>
                               </div>
                               @endif
                        </form> 
                </div>
            </div>
        </div>
    </div>
<!-- JS Function -->
<script>
function CheckUserLogin()
 {$pk_user = document.getElementById("UserLogin").value ;
 if($pk_user == 'Null'){document.getElementById("ModalConfirmLogin").setAttribute("style","display:block;opacity:100;"); }
 else{document.getElementById("PackagePay").submit();} }
 function ModalConfirmLogin_close()
 {document.getElementById("ModalConfirmLogin").setAttribute("style","");}
 function RedirectToLogin()
 { location.replace("{{ route('reset.showcallbackloginform',['pk_package' => $package->pk_package , 'redirectFromURL' => url()->current() ] ) }}");}
</script>
<!-- JS Function -->


<!-- Modal Confirm Login -->                      
<div class="modal fade" dir="rtl" id="ModalConfirmLogin" tabindex="-1" role="dialog"  aria-labelledby="ModalLabelConfirmLogin" aria-hidden="true">  
      <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:400px"> 
         <div class="modal-content">
           <div class="modal-header"> 
               <div class="row">
                    <div class="col-2 col-md-2 col-lg-2">
                      <img src="{{ asset('images/Template/close.svg') }}" onclick="ModalConfirmLogin_close()" > 
                    </div>
                    <div class="col-1 col-md-1 col-lg-1">
                    </div>
                    <div class="col-6 col-md-6 col-lg-6">
                    <h5 class="modal-title" id="ModalLabelConfirmLogin">پیغام فرایند خرید</h5> 
                    </div>
              </div>
            </div>                              
            <div class="modal-body">                      
                          <div class="card-body px-lg-1 py-lg-1">
                          <div class="row">   
                         <b style="color:red">برای انجام فرایند خرید لازم است ابتدا ثبت نام کنید </b>
                          </div>
                           </div>
                                    </div>
                                    <div class="modal-footer  mx-auto">
                                    <button type="button" onclick="RedirectToLogin()"
                                     class="btn btnGreen">ثبت نام و خرید دوره</button> 
                                     
                                     <button type="button" onclick="ModalConfirmLogin_close()"
                                     class="btn btnClose"
                                       data-dismiss="modal">بستن</button> 
                                       
                                    </div>
                                    </div>
                                </div>
                                </div>                           
<!-- Modal Confirm Login -->



<!-- ModalIntro Box -->                      
<div class="modal fade" dir="rtl" id="ModalIntro" tabindex="-1" role="dialog"  aria-labelledby="ModalLabelModalIntro" aria-hidden="true">  
      <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:none"> 
         <div class="modal-content" style="width:50%">
           <div class="modal-header"> 
             <div class="row">
                 <div class="col-2 col-md-2 col-lg-2">
                      <img src="{{ asset('images/Template/close.svg') }}" onclick="ClosePopupIntro()" > 
                    </div>
                    <div class="col-1 col-md-1 col-lg-1">
                    </div>
                    <div class="col-6 col-md-6 col-lg-6">
                    <h3 class="modal-title ml-auto mr-auto" id="ModalLabelIntro">معرفی دوره</h3> 
                    </div>
               </div>  
            </div>                         
            <div class="modal-body" id="ModalIntroBody">                      
                <!-- Form &  Body -->
                 <div class="card-body px-lg-1 py-lg-1">
                   <div class="row">  
                       <div id="content afterglow" class="col-12 col-md-12 col-lg-12 text-center">
                            <section class="row main-video d-flex justify-content-center">
                            <a href="#video3" class="afterglow text-center"> 
                            <img src="{{ asset('images/video-frame.svg') }}" alt="" class="mt-lg-5 mt-md-5 mt-sm-5 mt-5" width="1000vw">
                            <i class="fa fa-play fa-4x text-center" style="left:23vw !important"></i>
                            </a>

                            <video id="video3" controls  width="640" height="360" preload="none">
                                <source id="VideoIntro" src="" type="video/mp4" data-skin="dark" /></video>
                            </section>
                       
                      </div>
                 </div>
                 <div class="row"> 
                    <div class="col-12 col-md-12 col-lg-12 text-center" id="TextIntro"> 
                   
                    </div>
                 </div>

              </div>
                <!-- Form &  Body -->
                             </div>
                                    <div class="modal-footer mx-auto">
                                        <div class="row text-center ml-auto mr-auto">
                                        <button type="button" onclick="ClosePopupIntro()" class="btn btnClose" data-dismiss="modal">بستن</button>
                                        </div>
                                    </div>
                                   </div>
                                </div>
                              </div>
<!-- ModalIntro Box -->

{{-- TimeLine starts --}}
        <div class="row " style="margin-top:60px">
         <div class="col-lg-8 col-md-10 col-sm-11 col-11 border rounded-lg m-4 p-2 mx-auto"  >

    <ul class="timeline" id="timeline">
     @php $section_counter = 1 ; @endphp
     @php $row_counter = 1 ; @endphp
     @foreach($DataSection as $section)   
     <li>
       <div class="row" id="row">
       <div class="col-lg-11 col-md-10 col-sm-11 col-11 pt-3 ml-3"  style="border: solid 1px #20C5BA ; border-radius: 5px">  
        <div class="card-title">
         <div class="row">
          <div class="col-md-4 col-12 text-center" style="margin-top:15px">
           <a class="mb-0"> بخش {{$section_counter}} :{{$section['Section']['name']}}</a>
           </div>
           <div class="col-md-4 col-12 text-center" style="margin-top:15px">
          
           </div>

           <div class="col-md-2 col-12 text-center mt-lg-0 mt-md-0 mt-sm-3 mt-3">
           
                <button class="btn btnGreen btn-round" style="white-space:normal; " data-toggle="collapse"
                aria-expanded="false"  
                data-target="#{{'collapse'.$section['Section']['pk_section']}}" 
                aria-controls="{{'collapse'.$section['Section']['pk_section']}}">
                مشاهده
                </button>
            </div>

            <div class="col-md-2 col-12 text-center mt-lg-0 mt-md-0 mt-sm-3 mt-3">
            @if($section['Section']['intro'] != 'ندارد')
                <button type="button" class="btn fourth btn-round" onclick="GetVideoIntro({{$section['Section']['pk_section']}},{{$section['Section']['pk_package']}})" style="white-space:normal;padding:15px 10px" >
                معرفی دوره
                </button>
                @else
                <button type="button" disabled class="btn  btn-round"
                 style="background-color:beige;border-color:beige;white-space:normal;padding:15px 10px">معرفی دوره
                 </button>

                @endif
            </div>

            </div>
            <div class="row">
            <div class="col-11 col-md-11 col-lg-11 col-sm-11">
            <!-- Courses -->
            <div id="{{'collapse'.$section['Section']['pk_section']}}" class="collapse" 
                aria-labelledby="{{'id'.$section['Section']['pk_section']}}" data-parent="#row">
                <div class="card-text">
                
                    <ul class="timelineCourse">
                    @foreach($section['Courses'] as $course)   
                     <li>
                            <div class="row" id="row" style="margin-top:10px">
                            <div class="col-lg-12 col-md-12 col-sm-10 col-10 pt-3 ml-3 "  style="border: solid 1px #20C5BA ; border-radius: 5px">  
                                <div class="card-title">
                                        <div class="row">
                                            <div class="col-md-4 col-12 text-center" style="margin-top:15px">
                                            <a class="mb-0"> قسمت {{$row_counter}} :{{$course['name']}}  </a>
                                           </div>

                                            <div class="col-md-4 col-12 text-center" style="margin-top:13px">
                                            @if($payment_status == 'Yes' || $course['isFree'] == 'Yes')
                                        
                                                @if($payment_status == 'Yes')
                                                <img class=" img-border"
                                                src="{{ asset('images/Academy/YesPay.svg') }}"
                                                width="30px" height="30px" alt="Card image cap">
                                                <span style="color:#20c5ba">  فعال </span>
                                                @else
                                                <img class=" img-border"
                                                src="{{ asset('images/Academy/FreePay.svg') }}"
                                                width="30px" height="30px" alt="Card image cap">
                                                <span style="color:#20c5ba">  رایگان </span>
                                                @endif

                                            @else
                                            <img class=" img-border"
                                            src="{{ asset('images/Academy/NoPay.svg') }}"
                                            width="30px" height="30px" alt="Card image cap">
                                            <span style="color:gray">  خریداری نشده </span>
                                            @endif
                                            </div>

                                          <div class="col-md-4 col-12 text-center mt-lg-0 mt-md-0 mt-sm-3 mt-3">
                                          @if($payment_status == 'Yes' || $course['isFree'] == 'Yes' )
                                            <a href="{{ route('academy.show', ['pk_course' => $course['pk_course'] ,
                                                 'desc' => $course['name'] , 'sort' => $course['sort'] ,
                                                 'pk_package' => $course['pk_package']  ]) }}"
                                               class="btn btnLearniaa btn-round">شروع</a>
                                               @else
                                               @endif
                                           </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>  
                            </li>
                    @php $row_counter =  $row_counter + 1 ; @endphp     
                    @endforeach
                        </ul>

              </div>
             </div>
         
    <!---- Courses --------->

            </div>
        </div>
        </div>
    </div>  
    </li>
  @php $section_counter =  $section_counter + 1 ; @endphp     
  @endforeach
  </ul>


               </div> 
             </div>         
{{-- timeLine ends --}}



<!-- ModalDiscount Box --> 
<div class="modal fade" dir="rtl" id="ModalDiscount" tabindex="-1" role="dialog"  aria-labelledby="ModalLabelModalDiscount" aria-hidden="true">  
      <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:400px"> 
         <div class="modal-content" style="width:90%">
           <div class="modal-header"> 
           <div class="row">
                    <div class="col-2 col-md-2 col-lg-2">
                      <img src="{{ asset('images/Template/close.svg') }}" onclick="ClosePopUpDiscount()" > 
                    </div>
                    <div class="col-1 col-md-1 col-lg-1">
                    </div>
                    <div class="col-6 col-md-6 col-lg-6">
                    <h5 class="modal-title" id="ModalLabelDiscount">ثبت کد تخفیف</h5> 
                    </div>
              </div>
            </div>  
                                       
            <div class="modal-body" id="ModalDiscountBody">                      
                <!-- Form &  Body -->
                 <div class="card-body px-lg-1 py-lg-1">
                   <div class="row">
                   <div class="col-md-12 card p-3  ml-auto mr-auto"  >
                   <!--New Comment -->
                  
                    <div class="subscribe-form mt-50" style="">
                                <button class="main-btn" onclick="DiscountSub()" style="">ثبت کد </button>
                                <input type="text" id ="discountcode"name="discountcode" placeholder="کد تخفیف"
                                style="text-align: center;">
                        </div>   
                 </div>
              </div>
                <!-- Form &  Body -->
                             </div>
                                    <div class="modal-footer mx-auto">
                                        <button type="button" onclick="ClosePopUpDiscount()" class="btn btnClose" data-dismiss="modal">بستن</button>
                                    </div>
                                   </div>
                                </div>
                              </div>
<!-- ModalDiscount Box --> 

</section>





<!-- Comment Box -->
<div class="row " style="margin-top:40px">
                    <div class="col-md-8 card p-3  ml-auto mr-auto" style="border: 3px dotted #20c5ba" >
                   <!--New Comment -->
                   @if(Auth::user() != null)
                   <div class="subscribe-form mt-50" style="">
                        <form method="POST" action="{{route('behavior.store')}}">
                           @csrf
                            <button class="main-btn" style="z-index:auto">ثبت نظر </button>
                            <input type="text" class="" name="content" placeholder="اینجا نظرت رو بنویس" 
                            style="text-align: center;">
                            <input type="hidden" name="type_entity" value="درس">
                            <input type="hidden" name="pk_entity" value="{{$package['pk_package']}}">
                            <input type="hidden" name="type_behavior" value="کامنت">
                        </form>
                    </div>
                    @else
                    <a href="{{route('reset.showcallbackloginform')}}" class="main-btn" style="">برای ثبت نظر باید ثبت نام/ورود کنید</a>
                    @endif
                   <!-- NEw Comment -->

               <!--Foreach -->
              
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 mx-auto mt-1">
                @foreach($behaviors as $behavior)
                    <div class="card border-none mt-3" style="border-radius: 20px;box-shadow: 0px 0px 02px black;border-style: none">
                        <div class="card-header p-0 overflow-hidden" style="border-top-left-radius: 20px;border-top-right-radius: 20px;border-style: none"> 
                        </div>
                        <div class="card-body px-4" style="margin-bottom:10px">
                            @if($behavior->profile['pic'])
                            <img  src="{{  Storage::url('profile/'.$behavior->profile['pic']) }}"  
                            alt="Profile" class="img-raised rounded-circle img-fluid" style="width: 60px;height: 60px;" >
                            @else         
                            <img  src="{{ asset('images/Template/user.svg') }}" alt="Learniaa" height="40px" width="40px">
                            @endif
                            <i class="fa fa-circle mr-2 text-warning"></i>
                            {{$behavior->user['name']}}
                            <br>
                            <p style="font-size:15px;color:#20c5ba;line-height:25px !important">{{$behavior->content}}</p>
                       
                   <!-- Reply -->
                   @if($behavior->reply != null)
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 mx-auto mt-1">
                    <div class="card border-none mt-2 mr-2" style="border-radius: 20px;box-shadow: 0px 0px 5px #20c5ba;border-style: none">
                        <div class="card-header p-0 overflow-hidden" style="border-top-left-radius: 20px;border-top-right-radius: 20px;border-style: none">
                        </div>
                     <div class="card-body px-4">    
                            <img  src="{{ asset('images/Template/Circlelogo.svg') }}" alt="Learniaa" height="40px" width="40px">
                            <i class="fa fa-circle mr-2 text-info"></i>
                           مدیر سایت
                            <br>
                            <p style="font-size:15px;color:#20c5ba;line-height:25px !important">{{$behavior->reply}} </p>
                            </div>
                            </div>
                            </div>
                            </div>
                            @endif
                        <!-- Reply -->
                        </div>
              <!--Foreach -->
               </div>
               @endforeach
             </div>
<!-- Comment Box -->
<!-- Comment Section -->
</div>



<script>

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
                   $("#TextIntro").html(' <p style="font-size: 25px;color: #20c5ba;text-align: center;font-weight: bold;">درباره دوره</p>' + data);
                                 
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
