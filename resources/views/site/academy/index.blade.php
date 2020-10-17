@extends('Layouts.layout_landing_site')
@section('Head')
<title>لرنیا|آکادمی مجازی آموزش</title>
<meta name="description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد">
<meta name="keywords" content="آموزش آنلاین,آموزش لرنیا,آکادمی لرنیا,لرنیا">
<meta property="og:title" content="لرنیا|آکادمی مجازی آموزش"/>
<meta property="og:url" content="{{Request::url()}}"/>
<meta property="og:image" content="{{ asset('images/Template/Circlelogo.svg') }}">
<meta property="og:type" content="website"/>
<meta name="description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد">
<meta property="og:locale" content="fa_IR"/>
<meta name="twitter:card" content="summary" /> 
<meta name="twitter:site" content="{{Request::url()}}" /> 
<meta name="twitter:title" content="لرنیا|آکادمی مجازی آموزش" /> 
<meta name="twitter:description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد" /> 
<meta name="twitter:image" content="{{ asset('images/Template/Circlelogo.svg') }}">
@endsection
@section('text_landing')
<h1 class="font-weight-bolder text-center font-weight-bolder" style="font-size:9vw;margin-top: -30px">
<span class="text-warning mr-3" style="color: #20c5ba !important;">لــرنیا</span>
<span class="text-warning mr-3" style="color: #ffe735 !important;">آکادمی</span>
</h1>
<h3 class="text-justify p-lg-1 p-md-4 p-sm-4 p-4 m-lg-2 text-center">
لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد
</h3>
<h6 class="d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-0">
</h6>
@endsection
@section('pic_landing')
<img  class="learn-bg d-lg-block d-md-block d-sm-none d-none" src="{{asset('images/Academy/Academy_index.svg')}}" alt="" style="margin-top: -15px">
@endsection

@section('content')
<!-- Video -->
<section class="row main-video d-flex justify-content-center mb-5"> <a href="#video3" class="afterglow text-center"> 
<img src="{{ asset('images/video-frame.svg') }}" alt="" class="mt-lg-5 mt-md-5 mt-sm-5 mt-5" width="1000vw"><i class="fa fa-play fa-4x text-center"></i></a>
<video id="video3" controls  width="640" height="360" preload="none" data-skin="dark">
<source src="https://file.learniaa.com/files/SectionIntroVideo/LEARNIA_INTRO.mp4" type="video/mp4" /></video>
</section>
<!-- Video -->

<!-- Intro Academy -->
<div class="subscribe-area wow fadeIn container mx-auto" style="padding:10px 50px 20px;direction:rtl;margin-top:100px;box-shadow: 0px 0px 20px black;border-style: none;background-color:#20c5ba">
            <div class="row">
                <div class="col-lg-6">
                    <div class="subscribe-content mt-3">
                        <h6 style="font-size:24px;text-align:center;color:white" class="">اگه مسیر و گام های یادگیری یه کماندوی برنامه نویسی رو بلد نیستی بزن روی نقشه راه یادگیری</h6>
                    </div>
                </div>
            <div class="col-lg-6 text-center" style="margin-top:40px;direction:rtl">
            <a style="border-radius:10px;border-color: #ffe735;color: #000000;background-image: linear-gradient(45deg, #ffe735 50%, transparent 50%);background-position: 0;background-size: 400%;padding-right:30px;padding-top:15px;padding-bottom:15px" class="nav-link  btn  mt-4 d-inline" target="_parent" rel="tooltip" title="" data-placement="bottom"
             href="{{route('academy.detail')}}" dideo-checked="true">
                        <img src="http://127.0.0.1:8000/images/icons/Item.svg" alt="Thumbnail Image" height="30px" width="30px">
                        <span style="font-size:15px">نقشه راه یادگیری</span>
                     </a>
                </div>
            </div>
        </div>
<!-- Intro Academy -->



<!-- Packages -->
<div class="container-fluid">
    <div class="row p-2" id="ListOfData" style="font-size:15px">
            @foreach($packages as $package)
                <div class="col-lg-3 col-md-6 col-sm-11 col-12 mx-auto mt-3">
                    <div class="card border-none mt-4" style="border-radius: 20px;box-shadow: 0px 0px 20px black;border-style: none;height:300px;max-height:300px">
                        <div class="card-header p-0 overflow-hidden" style="border-top-left-radius: 20px;border-top-right-radius: 20px;border-style: none">
                            <a href="{{route('academy.course', ['pk_tree' =>  $package['pk_tree'],'pk_package' =>$package['pk_package'] ]  )}}">
                                <img src="{{  Storage::url('package/'.$package['pic']) }}" alt="{{ $package['fa_name'] }}"
                                 class="w-100 imageBlog" style="border-top-left-radius: 20px;border-top-right-radius: 20px;height:30vh">
                            </a>
                        </div>
                        <div class="card-body px-4 pt-2 text-center">
                            <a href="{{route('academy.course', ['pk_tree' =>  $package['pk_tree'],'pk_package' =>$package['pk_package'] ]  )}}" class="">
                            <h2 class="mt-2" style="direction:rtl;font-size:16px">{{ $package['fa_name'] }}</h2>
                            </a>
                          
                        </div>
                        <div class="card-end px-4 py-3">
                         <div class="row" style="direction:rtl">
                                        @if($package['status'] == "انتشار")
                                            <div class="col-md-6 col-6 text-center" style="font-family: Dastnevis;font-size: 20px;">
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
                                            <div class="col-md-6 col-6 text-center" style="font-family: Dastnevis;font-size: 20px;">
                                            <img class="card-img-top img-border" src="{{ asset('images/icons/Time.svg') }}" width="30px" height="30px" alt="Card image cap">
                                            {{ $package['time'] }} 
                                            </div>
                                            @endif

                                        @else
                                        <div class="col-md-3 col-12 text-center" style="margin-top:13px">
                                        </div>
                                        <div class="col-md-3 col-12 text-center" style="margin-top:13px">
                                        </div>
                                        <div class="col-md-2 col-12 text-center mt-lg-0 mt-md-0 mt-sm-3 mt-3">
                                        <button type="button" disabled class="btn  btn-round" style="background-color:beige;border-color:beige">به زودی</button>
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
<ul class="pagination px-1 py-1 text-secondary" style="background-color: transparent">
{{$packages->links()}}
</a>
</li>
</ul>
</div>
</div>
</section>
</div>

<!-- Packages -->


<!-- Posts -->
<section>
<div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="section-title text-center pb-40">
                    <div class="line mt-5 mx-auto rounded-lg"></div>
                    <h3 class="title mt-5">آخرین مقالات</h3>
                </div> <!-- section title -->
            </div>
        </div>
<div class="row p-2" id="ListOfData" style="font-size:15px">
            @foreach($recent_post as $one_post)
                @php  $json = json_decode($one_post['extras'],false) @endphp
                <div class="col-lg-3 col-md-6 col-sm-11 col-12 mx-auto mt-3">
                    <div class="card border-none mt-4" style="border-radius: 20px;box-shadow: 0px 0px 20px black;border-style: none;max-height:400px;height:400px">
                        <div class="card-header p-0 overflow-hidden" style="border-top-left-radius: 20px;border-top-right-radius: 20px;border-style: none">
                            <a href="{{route('blog.show', ['en_title' =>  $one_post['en_title'] ]  )}}">
                                <img src="{{  Storage::url('post/'.$one_post['pic_content']) }}" alt="{{ $one_post['title'] }}"
                                 class="w-100 imageBlog" style="border-top-left-radius: 20px;border-top-right-radius: 20px;height:20vh">
                            </a>
                        </div>
                        <div class="card-body px-4">
                         <!-- <span class="d-block text-secondary">{{ $one_post->category['name'] }}</span> -->
                            <a href="{{route('blog.show', ['en_title' =>  $one_post['en_title'] ]  )}}" class="">
                            <h2 class="mt-2" style="direction:rtl;font-size:17px">{{ $one_post['title'] }}</h2>
                            </a>
                            <p class="mt-2 text-secondary" style="line-height:25px !important;font-size:14px;direction:rtl">
                            @php echo substr($one_post['desc_short'],0,300) . '...' @endphp
                            </p>
                        </div>
                        <div class="card-end px-4  py-4" style="line-height:30px">
                            <span class="mt-1">زمان مطالعه:  {{ $one_post['readtime'] }} دقیقه</span>
                            <img src="{{ asset('images/icons/Time.svg') }}" alt="Thumbnail Image" height="20px" width="20px">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</section>
<!-- Posts -->


<!-- Learners -->
<section id="masters" class="pt-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="section-title text-center pb-40">
                    <div class="line mt-5 mx-auto rounded-lg"></div>
                    <h3 class="title mt-5">هیات علمی و مدرسین</h3>
                </div> <!-- section title -->
            </div>
        </div>
        <!-- row -->
        <div class="row mt-2">
           
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{asset('images/learner/Yosefvand.jpg')}}" alt=""
                              width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس یوسفوند</h4>
                        <p style="margin-top:0px;line-height: 25px !important;">مدرس لرنیا آکادمی</p>
                    </div>

                </div> 
            </div>

         
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/learner/AliKhademi.jpg') }}" alt="" 
                             width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس خادمی</h4>
                        <p style="margin-top:0px;line-height: 25px !important;">مشاور مارکتینگ و مربی کوچینگ</p>
                    </div>
                </div> 
            </div>

            
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/learner/AminZadeh.jpg') }}" alt="" 
                             width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس امین زاده</h4>
                        <p style="margin-top:0px;line-height: 25px !important;">مدرس و مشاور علمی پایتون</p>
                    </div>
                </div> 
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/learner/AliTorki.jpg') }}" alt="" 
                             width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس علی ترکی</h4>
                        <p style="margin-top:0px;line-height: 25px !important;"> JS Tehran برنامه نویس ارشد حصین و مدیر</p>
                    </div>
                </div> 
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/learner/NimaArefi.jpg') }}" alt="" 
                             width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس نیما عارفی</h4>
                        <p style="margin-top:0px;line-height: 25px !important;direction:rtl">متخصص برنامه نویسی و DevOps و مدیر React Tehran</p>
                    </div>
                </div> 
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/learner/SalarNasiri.jpg') }}" alt="" 
                             width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس سالار نصیری</h4>
                        <p style="margin-top:0px;line-height: 25px !important;">کافه بازار و دیوار   (DevOps)متخصص</p>
                    </div>
                </div> 
            </div>


            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/learner/MehdiGhaemi.jpg') }}" alt="" 
                             width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس مهدی قائمی</h4>
                        <p style="margin-top:0px;line-height: 25px !important;">مدرس لرنیا آکادمی</p>
                    </div>
                </div> 
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/learner/MehdiFarahzadi.jpg') }}" alt="" 
                             width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس مهدی فرحزادی</h4>
                        <p style="margin-top:0px;line-height: 25px !important;">اسکرام مستر فناپ و مدرس</p>
                    </div>
                </div> 
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{asset('images/learner/Laghari.jpg')}}" 
                             alt="" width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس لاغری</h4>
                        <p style="margin-top:0px;line-height: 25px !important;">برنامه نویس و مدرس طراحی سایت و برنامه نویسی</p>
                    </div>

                </div> 
            </div>
        </div> 
    </div>
</section>
<!-- Learners -->


<!-- Customer Say -->

<div class="row justify-content-center">
    <div class="col-lg-5">
        <div class="section-title text-center pb-40">
            <div class="line mt-5 mx-auto rounded-lg"></div>
            <h3 class="title mt-5">نظرات شما</h3>
        </div>
    </div>
</div>
<section class="slider">

<!-- FeedBack -->
<div class="single-comment text-center pb-3 pt-3 px-3 m-5" style="height:270px;width:300px">
  <div class="row"> 
        <div class="col-6 col-md-6">  
        <i style="color:#20c5ba" class="fa fa-quote-right float-right"></i>
        </div>
        <div class="col-6 col-md-6">  
            <span class="float-left"><i style="color:#20c5ba" class="fa fa-quote-right float-right"></i></span>
            </div>
             <div class="col-12 col-md-12">
             <p class="comments" style="line-height:2 !important">
            ایده لرنیا ابعاد بسیار بزرگی دارد ، امیدوارم همه ابعاد کار در نظر گرفته شده و پیاده سازی شود که دلها شاد میشه ، موفق باشید
             </p>
            </div>
            <div class="col-12 col-md-12" style="direction:rtl">
            <a style="font-size:20px;font-family:dastnevis"><img style="display:inherit;border-radius:50px" src="{{Storage::url('profile/'.'Dr.zaghari.jpg')}}"
               alt="userImg"  width="60px">دکتر  زاغری   (بنیانگذار  سیناتدبیر)</a>
            </div>
        </div>
    </div>
 <!-- FeedBack -->


 <!-- FeedBack -->
<div class="single-comment text-center pb-3 pt-3 px-3 m-5" style="height:270px;width:300px">
  <div class="row"> 
        <div class="col-6 col-md-6">  
        <i style="color:#20c5ba" class="fa fa-quote-right float-right"></i>
        </div>
        <div class="col-6 col-md-6">  
            <span class="float-left"><i style="color:#20c5ba" class="fa fa-quote-right float-right"></i></span>
            </div>
             <div class="col-12 col-md-12">
             <p class="comments" style="line-height:2 !important">
             ایده  جالبه ، اگه لرنیا مشاوره های مختلف از هر نوعی رو بتونه به صورت فردی و با دقت بالا انجام بده ارزش خیلی بالایی ساخته میشه
             </p>
            </div>
            <div class="col-12 col-md-12" style="direction:rtl">
            <a style="font-size:20px;font-family:dastnevis"><img style="display:inherit;border-radius:50px" src="{{Storage::url('profile/'.'ArashmousaPour.jpg')}}"
               alt="userImg"  width="60px">مهندس موسی پور (مدیر فنی  ابر ارون)</a>
            </div>
        </div>
    </div>
 <!-- FeedBack -->

<!-- FeedBack -->
<div class="single-comment text-center pb-3 pt-3 px-3 m-5" style="height:270px;width:300px">
  <div class="row"> 
        <div class="col-6 col-md-6">  
        <i style="color:#20c5ba" class="fa fa-quote-right float-right"></i>
        </div>
        <div class="col-6 col-md-6">  
            <span class="float-left"><i style="color:#20c5ba" class="fa fa-quote-right float-right"></i></span>
            </div>
             <div class="col-12 col-md-12">
             <p class="comments" style="line-height:2 !important">
             ایده کلی روشن سازی و مشخص کردن مسیر کلی آموزش  ایده بسیار مفیدی میتونه باشه برای افراد تازه کار و مبتدی که در ابتدای مسیر هستند   
             </p>
            </div>
            <div class="col-12 col-md-12" style="direction:rtl">
            <a style="font-size:20px;font-family:dastnevis"><img style="display:inherit;border-radius:50px" src="{{Storage::url('profile/'.'Shokri.jpg')}}"
               alt="userImg"  width="60px"> مهندس شکری زاده (مدرس کندو) </a>
            </div>
        </div>
    </div>
 <!-- FeedBack -->

 <!-- FeedBack -->
<div class="single-comment text-center pb-3 pt-3 px-3 m-5" style="height:270px;width:300px">
  <div class="row"> 
        <div class="col-6 col-md-6">  
        <i style="color:#20c5ba" class="fa fa-quote-right float-right"></i>
        </div>
        <div class="col-6 col-md-6">  
            <span class="float-left"><i style="color:#20c5ba" class="fa fa-quote-right float-right"></i></span>
            </div>
             <div class="col-12 col-md-12">
             <p class="comments" style="line-height:2 !important">
              لرنیا مثل بقیه سایت های آموزشی ایران نیست و این رو وقتی متوجه میشیم که آکادمی  و مسیریابی شون رو بشناسیم و تفاوت های آموزشی بسیاری رو درک کنیم </p>
            </div>
            <div class="col-12 col-md-12" style="direction:rtl">
            <a style="font-size:20px;font-family:dastnevis"><img style="display:inherit;border-radius:50px" src="{{Storage::url('profile/'.'Laghari.jpg')}}"
               alt="userImg"  width="60px">مهندس لاغری (مدرس  مجتمع فنی ) </a>
            </div>
        </div>
    </div>
 <!-- FeedBack -->
</section>


<script>
$('.slider').slick({infinite: true,slidesToShow: 3,slidesToScroll: 1 ,autoplay : false ,arrows : false ,dots:false ,draggable:true,autoplaySpeed: 7000 ,responsive: [{breakpoint: 1200,settings: {slidesToShow: 3,slidesToScroll: 1,infinite: true,dots: false}},{breakpoint:980,settings: {slidesToShow: 2,slidesToScroll:1,infinite: true,dots: false}},{breakpoint:730,settings: {slidesToShow: 1,slidesToScroll:1,infinite: true,dots: false}},]}) ;
</script>
<script>window.addEventListener('load', (event) => {$("#Pre-loader").delay(500).fadeOut();});</script>
@endsection

