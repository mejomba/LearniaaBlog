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
    <div class="col-lg-3 text-center mt-2 " >
            <a target="_parent" href="{{ route('academy.course', ['pk_tree' => $selected_road , 'pk_package' =>  $road_packages[$no]['data'][$package]['pk_package'] ]) }}" rel="tooltip" title="" data-placement="bottom"  dideo-checked="true">
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

        <div class="col-lg-4 mt-4 d-flex flex-column">
        @if($road_packages[$no]['data'][$package]['status'] == 'انتشار')
                <a class="btn btn-warning mt-4 d-inline roadMap-link p-3"
                href="{{ route('academy.course', ['pk_tree' => $selected_road , 'pk_package' =>  $road_packages[$no]['data'][$package]['pk_package'] ]) }}" target="_blank" rel="tooltip" title="" data-placement="bottom">
                <img src="{{ asset('images/icons/Item.svg')}}" alt="Thumbnail Image" height="30px" width="30px">
                <span >مشاهده دوره </span>
                </a>
                <a href="#python{{$row_counter}}" class="main-btn mt-2">
                    توضیحات
                </a>
                
               @else
                 <button type="button" disabled class="btn  btn-round"
                  style="background-color:beige;border-color:beige">به زودی</button>                     
                 @endif
        </div>

    </div>
</div>
<div>

 @php $row_counter =  $row_counter + 1 ; @endphp       
 @endfor
 @php $no = $no + 1 ; @endphp 
 @endforeach
<!--  RoadMap -->

      </div>
    </div>



<!-- Section RoadMap & Help -->
<script>


function ClosePopup()
 {
     document.getElementById("ModalData").setAttribute("style","");
 }

 function OpenPopup() 
{
    
    document.getElementById("ModalData").setAttribute("style","display:block;opacity:100;");
    $('#ModalData').animate({ scrollTop: 0 }, 'fast');
}

function GetPopupData(Node)
{
            $.ajax({
                url: '/api/GetTreeNodeHelp',
                data:{ Node : Node},
                error: function(err){},
                dataType: 'json',
                success: function(data)
                {
                    document.getElementById("my-video").setAttribute("poster", data.poster_video); 
                    document.getElementById("my-video").setAttribute("src", data.address_video); 
                    document.getElementById("my-video_html5_api").setAttribute("poster", data.poster_video); 
                    document.getElementById("my-video_html5_api").setAttribute("src", data.address_video); 
                    OpenPopup();
                },
                type: 'GET'
            });
}

</script>

<!-- ModalData Box -->                      
<div class="modal fade" dir="rtl" id="ModalData" tabindex="-1" role="dialog"  aria-labelledby="ModalLabelModalData" aria-hidden="true">  
      <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:1000px"> 
         <div class="modal-content" style="width:100%">
           <div class="modal-header"> 
           <img src="{{ asset('images/Template/close.svg') }}" onclick="ClosePopup()" style="width:50px"  > 
            </div>      
             <!-- Form &  Body -->                 
            <div class="modal-body" id="ModalDataBody">                      
                <div class="row">  
                    <div class="col-10 col-md-9 col-lg-9 mr-auto ml-auto">
                    <video style="margin-top:20px;margin-bottom:20px" class="afterglow" id="my-video"  width="800" height="600" > </video>
                    </div>
                </div>
            </div>
            <!-- Form &  Body -->   
      </div>
    </div>
</div>
<!-- ModalData Box --> 

<!-- RoudMap description  ---this is temporary--- -->
<div class="row">
    <div class="col-lg-11 mx-auto">
        <div class="course-description p-3" id="python1" >
            <div class="pt-5 mt-5">
                <h3><span class="text-primary">گام شماره۱:</span> دوره جامع آموزش اصول برنامه نویسی ( مخصوص تازه وارد ها)</h3>
            </div>
            <p class="mt-4 ml-4 text-justify">
                هر کاری اصول و قواعد خاص خودش رو داره برای ورود به دنیای برنامه نویسی حالا تو هر حوزه ای که بخوایی وارد بشید قطعاً باید یک سری اصول اولیه که عمومی و مشترک هست رو فرا بگیرید و هر چقدر که جلو تر میرید وارد جزئیات بیشتر بشید و روی یک مقوله خاص مثل برنامه نویسی پایتون با گرایش برنامه نویسی تحت وب کار کنید راستش این مثل مدرسه رفتن میمونه که همه باید سال های اولیه تحصیلی رو مشترک و مثل هم بگذرونن تا سواد اولیه رو بدست بیارن.
            </p>
        </div>
        <!-- <a href="" class="btn-block main-btn">شروع کنیم</a> -->
    </div>
    <div class="col-lg-11 mx-auto">
        <div id="python2" class="course-description p-3">
            <div class="pt-5 mt-5">
                <h3><span class="text-primary">گام شماره۲:</span> دوره جامع آموزش پایتون - مقدماتی</h3>
            </div>
            <p class="mt-4 ml-4 text-justify">
                بدیهی هست که برای ورود به فضای تخصصی هر زبان برنامه نویسی باید ابتدا مسائل اولیه اون زبان رو فرا بگیرید. سرفصل های این دوره طبق استاندارد های بین المللی طراحی شده و تمام مباحث اولیه که باید درباره پایتون بدونید رو شامل میشه در عین حال بین قسمت های آموزشی کوئیز هایی رو برای شما طراحی کردیم که کمک میکنه تا بهتر مطالب براتون جا بیوفته برای مشاهده توصیحات تکمیلی وارد صفحه دوره بشید.            
            </p>
        </div>
        <!-- <a href="" class="btn-block main-btn">شروع کنیم</a> -->
    </div>
    <div class="col-lg-11 mx-auto">
        <div id="python3" class="course-description p-3">
            <div class="pt-5 mt-5">
                <h3><span class="text-primary">گام شماره۳:</span> دوره جامع آموزش پایتون – سطح میانی</h3>
            </div>
            <p class="mt-4 ml-4 text-justify">
                بعد از یادگیری مباحث پایه حالا وقتشه که وارد فضای برنامه نویسی حرفه ای بشید. توی این دوره تمرکز روی ماژول ها، توابع و برنامه نویسی شی گرا هست. به عنوان یه برنامه نویس پایتون ازتون انتظار میره که حتما به این مسائل مسلط باشید. بعد از گذروندن این دوره حتی میتونید دید بهتری نسبت به مسیر آیندتون در دنیای پایتون داشته باشید. سرفصل های این دوره هم طبق استانداردهای بینالمللی هست و توی این دوره هم کوئیز داریم تا بهتر مطالب رو یاد بگیرید. برای دیدن توضیحات تکمیلی وارد صفحه دوره بشید.   
            </p>
        </div>
        <!-- <a href="" class="btn-block main-btn">شروع کنیم</a> -->
    </div>
    <div class="col-lg-11 mx-auto">
        <div id="python4" class="course-description p-3">
            <div class="pt-5 mt-5">
                <h3><span class="text-primary">گام شماره۴:</span> دوره جامع آموزش پایتون - پیشرفته</h3>
            </div>
            <p class="mt-4 ml-4 text-justify">
                قطعا تا به این مرحله مطالب زیادی از پایتون میدونید چون برای ورود به این دوره بهشون نیاز دارید. بدون شک برنامه نویسی که از دیتابیس ندونه باید همینجا کارش رو تعطیل کنه و بره، اما نگران نباشید تمرکز این دوره روی دیتابیس و برنامه نویسی رابط کاربری هست و همچنین تمام مسائل در فضای شئ گرا مورد بررسی قرار میگیرن و تکنیک های نوشتن برنامه های پایتونیک رو میبینید (مثلا بعضی از سینتکس های پیشرفته که میشه توی یک خط برنامه کار 5 خط برنامه رو انجام داد). بازم از سرفصل های بین المللی استفاده کردیم و اینجا هم بین ویدیو ها کوئیز داریم. برای دیدن توضیحات تکمیلی وارد صفحه دوره بشید.            
            </p>
        </div>
        <!-- <a href="" class="btn-block main-btn">شروع کنیم</a> -->
    </div>
</div>
<!-- RoudMap description  ---this is temporary--- -->
</section>
@endsection

