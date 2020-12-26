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
        <div class="col-lg-6 col-md-8 col-sm-10 col-12 course mx-auto" >
            <div class="row">
                <div class="col-12 col-md-12 text-center">
                        <a href="{{redirect()->back()->getTargetUrl() }}">
                            <button class="btn btn-secondary mt-4 d-inline mb-4" >بازگشت</button>
                        </a>
                </div>
            </div>

          <!-- Payment Section -->
            <div class="">
                <div class="" >
                    <div class="text-center">
                        <h2>{{$package['fa_name']}}</h2>
                    </div>
                </div> 
                <img class="card-img-top img-border" src="{{ Storage::url('package/'.$package->pic)  }}" width="900px" height="320px" alt="Card image cap">
                <div class="card-body text-center ">
                    <h5 class="card-title "></h5>
                    <p class="card-text"></p>
                </div>
                <div class=" p-3  ml-2 mr-2 mb-3  course-form">
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
                                <div class="col-md-5 mt-2" ><h5><img class=" img-border" src="{{ asset('images/Academy/money.svg') }}"
                                  width="30px" height="30px" alt="Card image cap"> قیمت :  
                                    <span id="packageprice" class="feedback-link">
                                        <h4 class=" d-inline pakage-footer ">@php echo number_format($package['price'],0) @endphp</h4>
                                    </span  class="pakage-footer"> تومان  </h5>
                                </div>
                                
                                <div class="col-md-4 mt-1">
                                    <button class="btn btn-takhfif" type="button" onclick="OpenPopUpDiscount()"> افزودن کد تخفیف </button>         
                                </div>
                                <div class="col-md-3 mt-1">
                                    <button class="btn btnGreen" type="button" onclick="CheckUserLogin()">خرید دوره  </button>         
                                </div>
                            </div>
                        @else
                            <div class="row"> 
                                <div class="col-md-5 mt-2" >
                                    <h5><img class=" img-border" src="{{ asset('images/Academy/money.svg') }}"
                                  width="30px" height="30px" alt="Card image cap"> قیمت :  
                                    <span id="packageprice" class="feedback-link">
                                        <h4 class=" d-inline pakage-footer">@php echo number_format($package['price'],0) @endphp</h4>
                                    </span  class="pakage-footer"> تومان  </h5>
                                </div>   
                                <div class="col-md-4 mt-1">
                                    <button class="btn btn-takhfif" type="button" onclick="OpenPopUpDiscount()"> افزودن کد تخفیف </button>         
                                </div>     
                                <div class="col-md-3 mt-1">  
                                    <button type="button" class="btn btnGreen" disabled >خرید دوره</button>         
                                </div>
                           </div>
                        @endif
                    </form> 
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
                                <div class="col-md-4 mt-1" >
                                    <img class="card-img-top img-border" src="{{ asset('images/icons/Time.svg')}}"
                                    width="30px" height="30px" alt="Card image cap">
                                    <span class="pakage-footer" > {{ $package['time'] }}</span>
                                </div>
                                <div class="col-md-4 mt-1" >
                                    <img class="card-img-top img-border" src="{{ asset('images/icons/Page.svg')}}"
                                    width="30px" height="30px" alt="Card image cap">
                                    <span class="pakage-footer" >{{ $package['count'] }} </span><span class="pakage-footer"> قسمت</span>
                                </div>
                                <div class="col-md-4 mt-1" >
                                    <img class="card-img-top img-border" src="{{ asset('images/icons/Message.svg')}}"
                                    width="30px" height="30px" alt="Card image cap">
                                    <span class="pakage-footer" >ارتباط با مدرس دوره</span>
                                </div>
                            </div>
                </div>
            </div>
          <!-- Information Section -->

       </div>
    </div>
</section>

 <!-- About Course -->
 <div class="row mt-4 ">
            <div class="col-lg-6 mx-auto text-center">
                <h3 class="main-color-blue">درباره دوره</h3>
        </div>
      </div>

 <div class="container-fluid">
     <div class="row">
       <div class="col-lg-9 mx-auto">
                <div class="card border-none p-3 mt-4 pakage-desc">
                @php echo htmlspecialchars_decode($package['desc']) ; @endphp     
                 </div>
               </div>
             </div>
          </div>
<!-- About Course -->



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

<!-- ModalIntro Box -->                      
<div class="modal fade" dir="rtl" id="ModalIntro" tabindex="-1" role="dialog"  aria-labelledby="ModalLabelModalIntro" aria-hidden="true">  
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:none"> 
        <div class="modal-content" style="width:90%">
            <div class="modal-header"> 
                <img src="{{ asset('images/Template/close.svg') }}" onclick="ClosePopupIntro()" style="width:40px">    
            </div>                         
            <div class="modal-body" id="ModalIntroBody">                      
                <div class="card-body px-lg-1 py-lg-1">
                    <div class="row"> 
                        <div class="col-12 col-md-12 col-lg-12 text-center" id="TextIntro"> </div>
                    </div>
                    <div class="row"> 
                        <div class="col-12 col-md-12 col-lg-12 text-center mt-3" > 
                            <h3 class="main-color-blue font-weight-bold text-center">معرفی دوره از زبان خود مدرس!</h3>
                        </div>
                    </div>
                    <div class="row">  
                        <div id="content afterglow" class="col-12 col-md-12 col-lg-12 text-center">
                            <section class="row main-video d-flex justify-content-center">
                                <a href="#video3" class="afterglow text-center"> 
                                    <img src="{{ asset('images/video-frame.svg') }}" alt="" class="mt-lg-5 mt-md-5 mt-sm-5 mt-5" width="1000vw">
                                    <img class="d-flex text-center" style="left:41vw !important" src="{{ asset('images/icons/play_button.svg') }}" alt="Thumbnail Image" height="25px" width="25px">
                                       
                                </a>
                                <video id="video3" controls  width="640" height="360" preload="none">
                                    <source id="VideoIntro" src="" type="video/mp4" data-skin="dark" />
                                </video>
                            </section>
                        </div>
                    </div>
                </div>
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


<!-- Intro Videos -->

<div class="row mt-4 ">
   <div class="col-lg-6 mx-auto text-center">
      <h3 class="main-color-blue">معرفی دوره </h3>
   </div>
</div>
    @foreach($DataSection as $section) 
    @if($section['Section']['intro'] != 'ندارد')
    <div class="row mt-3">
    <div class="col-lg-8 col-md-10 col-sm-11 col-11  rounded-lg m-4 p-2 mx-auto">
    <video  class="afterglow" id="my-video" width="1920" height="1080" data-skin="dark" poster="{{asset('images/product/PosterIntro2.png')}}" src="{{$section['Section']['intro']}}">
    </video>
    </div>
    </div>
    @endif
    @endforeach

<!-- Intro VIdeos -->



<!-- New TimeLine -->
<div class="row mt-4 ">
   <div class="col-lg-6 mx-auto text-center">
      <h3 class="main-color-blue">فیلم های آموزشی دوره</h3>
   </div>
</div>

<div class="row mt-3">
        <div class="col-lg-8 col-md-10 col-sm-11 col-11  rounded-lg m-4 p-2 mx-auto"  >

@php $section_counter = 1 ; @endphp
     @php $row_counter = 1 ; @endphp
     @foreach($DataSection as $section) 
</div>
<div class="subscribe-area wow fadeIn container mx-auto p-3 roadMap ">
    <div class="row">

         <div class="col-lg-3 text-center mt-2 " >
           <h2 class="roadMap-text-right main-color-blue">بخش {{$section_counter}}</h2>
        </div>

        <div class="col-lg-7 mt-2">
            <div class="subscribe-content">
              <h4 class="roadMap-text-small main-color-black mt-2">
              {{$section['Section']['name']}}
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

                <div class="subscribe-area wow fadeIn container mx-auto p-3 roadMap " >
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
                <img src="{{ asset('images/icons/Play.svg')}}" alt="Thumbnail Image" height="35px" width="35px">
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
<!-- ModalDiscount Box --> 



<!-- ModalResultDiscount Box --> 
<div class="modal fade" dir="rtl" id="ModalResultDiscount" tabindex="-1" role="dialog"  aria-labelledby="ModalLabelModalResultDiscount" aria-hidden="true">  
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:400px"> 
        <div class="modal-content" style="width:90%">
            <div class="modal-header"> 
                <img src="{{ asset('images/Template/close.svg') }}" onclick="ClosePopUpResultDiscount()" style="width:35px"> 
            </div>                            
            <div class="modal-body" id="ModalResultDiscountBody">                
                 <div class="card-body px-lg-1 py-lg-1">
                    <div class="row">
                        <div class="col-md-12 card p-3  ml-auto mr-auto">
                        <b style="" id="result_discount"></b> 
                        </div>
                    </div>
                </div>
                <div class="modal-footer mx-auto">
                    <button type="button" onclick="ClosePopUpResultDiscount()" class="btn btnClose" data-dismiss="modal">بستن</button>
                </div>
            </div>
        </div>
    </div> 
</div>
<!-- ModalResultDiscount Box --> 


<!-- Comment Box -->
<div class="row mt-5" >
    <div class="col-md-8 card p-3  ml-auto mr-auto comment-border" > <!--New Comment -->
         @if(Auth::user() != null)
           <div class="subscribe-form mt-50" style="">
                <form method="POST" action="{{route('behavior.store')}}">
                    @csrf
                    <button class="main-btn" style="z-index:auto">ثبت نظر </button>
                    <input type="text" class="text-center" name="content" placeholder="اینجا نظرت رو بنویس">
                    <input type="hidden" name="type_entity" value="درس">
                    <input type="hidden" name="pk_entity" value="{{$package['pk_package']}}">
                    <input type="hidden" name="type_behavior" value="کامنت">
                </form>
            </div>
        @else
            <a href="{{route('reset.showcallbackloginform')}}" class="main-btn">برای ثبت نظر باید ثبت نام/ورود کنید</a>
        @endif
    <div class="col-lg-12 col-md-12 col-sm-12 col-12 mx-auto mt-1">
        @foreach($behaviors as $behavior)
            <div class="card border-none mt-3 pakage-header" >
                <div class="card-header p-0 overflow-hidden pakage-header"> </div>
                    <div class="card-body px-4" style="margin-bottom:10px">
                        @if($behavior->profile['pic'])
                            <img  src="{{  Storage::url('profile/'.$behavior->profile['pic']) }}" alt="Profile" class="img-raised rounded-circle img-fluid" style="width: 60px;height: 60px;" >
                        @else         
                            <img  src="{{ asset('images/Template/user.svg') }}" alt="Learniaa" height="40px" width="40px">
                        @endif
                          
                            {{$behavior->user['name']}}
                            <br>
                            <p class="comment-p">{{$behavior->content}}</p>  
                        @if($behavior->reply != null)  <!-- Reply -->
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 mx-auto mt-1">
                                <div class="card border-none mt-2 mr-2 comment-box" >
                                    <div class="card-header p-0 overflow-hidden pakage-header"> </div>
                                    <div class="card-body px-4">    
                                        <img  src="{{ asset('images/Template/Circlelogo.svg') }}" alt="Learniaa" height="40px" width="40px">
                                       
                                            مدیر سایت
                                        <br>
                                        <p class="comment-p">{{$behavior->reply}} </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
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

    function OpenPopUpResultDiscount()
    { 
        document.getElementById("ModalResultDiscount").setAttribute("style","display:block;opacity:100;");
        $('#ModalResultDiscount').animate({ scrollTop: 0 }, 'fast');
    }

    function ClosePopUpResultDiscount()
    {
        document.getElementById("ModalResultDiscount").setAttribute("style","");
    }

    function DiscountSub()
    {
        var pk_package =  {{$package['pk_package']}} ;
        var code = $('#discountcode').val();
      
        $.ajax({
            url: '/api/calculator',
            data:
            {
                discount_code : code ,
                pk_package : pk_package

            },
            error: function(err)
            {
                document.getElementById("result_discount").innerHTML='کد تخفیف وارد شده قابل استفاده نمی باشد';
                document.getElementById("result_discount").setAttribute("style","color:red");
                ClosePopUpDiscount();
                OpenPopUpResultDiscount();
            },
            dataType: 'json',
            success: function(data)
            {   
                if(data=='not vaild')
                {
                    document.getElementById("result_discount").innerHTML='کد تخفیف وارد شده قابل استفاده نمی باشد';
                    document.getElementById("result_discount").setAttribute("style","color:red");
                    ClosePopUpDiscount();
                    OpenPopUpResultDiscount();
                }
                else
                { 
                    document.getElementById("packageprice").innerHTML=data.price;
                    document.getElementById("packageprice").setAttribute("style","color:green");
                    document.getElementById("price").setAttribute("value",data.price);
                    document.getElementById("result_discount").innerHTML='کد تخفیف اعمال شد';
                    document.getElementById("result_discount").setAttribute("style","color:green");
                    ClosePopUpDiscount();
                    OpenPopUpResultDiscount();
                }
            },    
            type: 'POST'
        });
    }
 </script>

@endsection
