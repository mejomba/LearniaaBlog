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
<h1 class="font-weight-bolder text-center font-weight-bolder text-landing">
    <span class=" mr-3 main-color-blue" >لــرنیا</span>
  <!--  <span class="mr-3 main-color-yellow" >آکادمی</span> -->
</h1>
<h2 class="text-justify p-lg-1 p-md-4 p-sm-4 p-4 m-lg-2 text-center text-landing-quick">
 کماندوی برنامه نویسی شو با لرنیا
</h2>
<div class="text-justify p-lg-1 p-md-4 p-sm-4 p-4  text-center">
 لرنیا یه آکادمی آموزش مجازیه که بهت کمک میکنه تا 
 </div>
 <div class="text-justify p-lg-1 p-md-4 p-sm-4 p-4  text-center">
 برنامه نویسی و مهارت های نرم و سخت یه کماندوی 
 </div>
 <div class="text-justify p-lg-1 p-md-4 p-sm-4 p-4  text-center">
 برنامه نویسی شدن رو خوب یاد بگیری </div>



<!--<h6 class="d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-0">
</h6>-->
@endsection
@section('pic_landing')
<img  class="learn-bg d-lg-block d-md-block d-sm-none d-none" src="{{asset('images/Academy/Academy_index.svg')}}" alt="" />
@endsection

@section('content')
<!-- Video -->
<div class="row">
    <div class="col-lg-9 col-md-10 col-sm-11 col-12 mx-auto mt-5" >
        <div class="card-body">
             <div class="row">
                <div class="col-md-12 col-12 col-lg-12 col-sm-12  ">
                    <h2 class="font-weight-bolder text-center font-weight-bolder videoTitle " >
                        <span class="text-warning mr-1 main-color-yellow" >لــرنیا</span>
                        <span class="text-warning mr-1 main-color-yellow" >چیه؟</span>
                    </h2>
                  <!--  <h3 class="font-weight-bolder text-center" >
                    فیلم رو ببین تا بیشتر با ما آشنا بشی 
                    </h3> -->
                    <div class="card-body videoBody" >
                        <video  class="afterglow" id="my-video" width="630" height="355"
                         data-skin="dark" poster="{{asset('images/product/PosterIntro2.png')}}">
                            <source type="video/mp4"  
                            src="https://file.learniaa.com/files/SectionIntroVideo/LEARNIA_INTRO.mp4" />
                        </video>     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
<!-- Video -->


<!-- FrontEnd RoadMap -->
<div class="subscribe-area wow fadeIn container mx-auto p-3 roadMap " >
    <div class="row">

    <div class="col-lg-4 text-center mt-2 " >
            <a  target="_parent" rel="tooltip" title="" data-placement="bottom" href="{{route('academy.detail')}}" dideo-checked="true">
                <img src="{{ asset('images/Academy/Landing/FrontEnd_Course.jpg')}}" alt="Thumbnail Image" width="350px" height="218px" >   
            </a>
        </div>
        <div class="col-lg-8">
            <div class="subscribe-content">
               <h2 class="roadMap-text-right main-color-blue">مسیر یادگیری برنامه نویسی وب فرانت اند ( Front-End )  </h2>
                <h4 class="roadMap-text-small main-color-black mt-2">اگه دوست داری یه کماندوی برنامه نویسی فرانت اند وب بشی و  ساخت صفحات وب و کدنویسی  اون ها رو یاد بگیری روی مشاهده مسیر بزن</h4>
                <br>
                <a class="nav-link  btn  mt-4 d-inline roadMap-link p-3" target="_parent" rel="tooltip" title="" data-placement="bottom" href="{{route('academy.detail')}}" dideo-checked="true">
                <img src="{{ asset('images/icons/Item.svg')}}" alt="Thumbnail Image" height="30px" width="30px">
                <span >مشاهده مسیر</span>
            </a>
            </div>
        </div>
    </div>
</div>
<!-- FrontEnd RoadMap -->



<!-- Python RoadMap -->
<div class="subscribe-area wow fadeIn container mx-auto p-3 roadMap " >
    <div class="row">

    <div class="col-lg-4 text-center mt-2 " >
            <a  target="_parent" rel="tooltip" title="" data-placement="bottom" href="{{route('academy.detail')}}" dideo-checked="true">
                <img src="{{ asset('images/Academy/Landing/Python_Course.jpg')}}" alt="Thumbnail Image" width="350px" height="218px" >   
            </a>
        </div>
        <div class="col-lg-8">
            <div class="subscribe-content">
               <h2 class="roadMap-text-right main-color-blue">مسیر یادگیری برنامه نویسی پایتون  ( Python )  </h2>
                <h4 class="roadMap-text-small main-color-black mt-2">اگه دوست داری یه کماندوی برنامه نویسی پایتون بشی و  ساخت برنامه های کاربردی  و کدنویسی  اون ها رو یاد بگیری روی مشاهده مسیر بزن</h4>
                <br>
                <a class="nav-link  btn  mt-4 d-inline roadMap-link p-3" target="_parent" rel="tooltip" title="" data-placement="bottom" href="{{route('academy.detail')}}" dideo-checked="true">
                <img src="{{ asset('images/icons/Item.svg')}}" alt="Thumbnail Image" height="30px" width="30px">
                <span >مشاهده مسیر</span>
            </a>
            </div>
        </div>
    </div>
</div>
<!-- Python RoadMap -->

<!-- Packages -->
<div class="container-fluid mb-5">
    <div class="row p-2" id="ListOfData" >
        @foreach($packages as $package)
            <div class="col-lg-3 col-md-10 col-sm-11 col-12 mx-auto mt-3 ">
                <div class="card border-none mt-4 pakage-content">
                    <div class="card-header p-0 overflow-hidden pakage-header" >
                        <a href="{{route('academy.course', ['pk_tree' =>  $package['pk_tree'],'pk_package' =>$package['pk_package'] ]  )}}">
                            <img src="{{  Storage::url('package/'.$package['pic']) }}" alt="{{ $package['fa_name'] }}" class="imageBlog pakage-image" />
                        </a>
                    </div>
                    <div class="card-body px-4 pt-2 text-center">
                        <a href="{{route('academy.course', ['pk_tree' =>  $package['pk_tree'],'pk_package' =>$package['pk_package'] ]  )}}" class="">
                            <h2 class="mt-2 pakage-title" >{{ $package['fa_name'] }}</h2>
                        </a>
                    </div>
                    <div class="card-end px-4 py-3">
                         <div class="row" >
                            @if($package['status'] == "انتشار")
                                <div class="col-md-6 col-6 text-center pakage-footer" >
                                    @if($package['price'] == 0)
                                        <img class="card-img-top img-border" src="{{ asset('images/icons/Wallet.svg')  }}" width="30px" height="30px" alt="Card image cap">
                                        <span >   رایگان </span>
                                         @else
                                        <img class="card-img-top img-border" src="{{ asset('images/icons/Wallet.svg')  }}" width="30px" height="30px" alt="Card image cap">
                                        <span > @php echo number_format($package['price'],0) @endphp </span>
                                        <span >   تومان </span>
                                    @endif
                                </div>
                            @if($package['status'] == "انتشار")
                                <div class="col-md-6 col-6 text-center pakage-footer" >
                                    <img class="card-img-top img-border" src="{{ asset('images/icons/Time.svg') }}" width="30px" height="30px" alt="Card image cap">
                                    {{ $package['time'] }} 
                                </div>
                                @endif
                                @else
                                    <div class="col-md-2 col-12 text-center mt-lg-0 mt-md-0 mt-sm-3 mt-3">
                                        <button type="button" disabled class="btn  btn-round pakage-soon" >به زودی</button>
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
                <div class="pagination px-1 py-1 text-secondary" >
                    {{$packages->links()}}
                </div>
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
    <div class="row p-2" id="ListOfData">
            @foreach($recent_post as $one_post)
                @php  $json = json_decode($one_post['extras'],false) @endphp
                <div class="col-lg-3 col-md-6 col-sm-11 col-12 mx-auto mt-3">
                    <div class=" mt-4 post-content" >
                        <div class=" p-0 overflow-hidden post-banner">
                            <a href="{{route('blog.show', ['en_title' =>  $one_post['en_title'] ]  )}}">
                                <img src="{{  Storage::url('post/'.$one_post['pic_content']) }}" alt="{{ $one_post['title'] }}"  class="w-100 imageBlog post-image" >
                            </a>
                        </div>
                        <div class="px-4">
                         <!-- <span class="d-block text-secondary">{{ $one_post->category['name'] }}</span> -->
                            <a href="{{route('blog.show', ['en_title' =>  $one_post['en_title'] ]  )}}" class="">
                            <h2 class="mt-2 post-title">{{ $one_post['title'] }}</h2>
                            </a>
                            <p class="mt-2 text-secondary post-summray">
                            @php echo substr($one_post['desc_short'],0,300) . '...' @endphp
                            </p>
                        </div>
                        <div class="card-end px-4  py-4 post-footer">
                            <span class="mt-1">زمان مطالعه:  {{ $one_post['readtime'] }} دقیقه</span>
                            <img src="{{ asset('images/icons/Time.svg') }}" alt="Thumbnail Image" height="20px" width="20px">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</section>
<!-- Posts -->


<!-- Teachers -->
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
                             <img src="{{asset('images/learner/Yosefvand.jpg')}}" alt="" width="150px" height="150px" class="rounded-circle" >
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
                             <img src="{{ asset('images/learner/AliKhademi.jpg') }}" alt="" width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس خادمی</h4>
                        <p class="teacher-craft">مشاور مارکتینگ و مربی کوچینگ</p>
                    </div>
                </div> 
            </div>

            
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/learner/AminZadeh.jpg') }}" alt=""  width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس امین زاده</h4>
                        <p class="teacher-craft">مدرس و مشاور علمی پایتون</p>
                    </div>
                </div> 
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/learner/AliTorki.jpg') }}" alt="" width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس علی ترکی</h4>
                        <p class="teacher-craft"> JS Tehran برنامه نویس ارشد حصین و مدیر</p>
                    </div>
                </div> 
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/learner/NimaArefi.jpg') }}" alt="" width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس نیما عارفی</h4>
                        <p class="teacher-craft" dir="rtl">متخصص برنامه نویسی و DevOps و مدیر React Tehran</p>
                    </div>
                </div> 
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/learner/SalarNasiri.jpg') }}" alt="" width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس سالار نصیری</h4>
                        <p class="teacher-craft">کافه بازار و دیوار   (DevOps)متخصص</p>
                    </div>
                </div> 
            </div>


            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/learner/MehdiGhaemi.jpg') }}" alt="" width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس مهدی قائمی</h4>
                        <p class="teacher-craft">مدرس لرنیا آکادمی</p>
                    </div>
                </div> 
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/learner/MehdiFarahzadi.jpg') }}" alt="" width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس مهدی فرحزادی</h4>
                        <p class="teacher-craft">اسکرام مستر فناپ و مدرس</p>
                    </div>
                </div> 
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{asset('images/learner/Laghari.jpg')}}" alt="" width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس لاغری</h4>
                        <p class="teacher-craft">برنامه نویس و مدرس طراحی سایت و برنامه نویسی</p>
                    </div>

                </div> 
            </div>
        </div> 
    </div>
</section>
<!-- teachers -->


<!-- Customer Say -->

<div class="row justify-content-center">
    <div class="col-lg-5">
        <div class="section-title text-center pb-40">
            <div class="line mt-5 mx-auto rounded-lg"></div>
            <h3 class="title mt-5">نظرات شما</h3>
        </div>
    </div>
</div>
<!-- FeedBack -->
<section class="slider"> 
    <div class="single-comment text-center pb-3 pt-3 px-3 m-5 feedback-body">
        <div class="row"> 
            <div class="col-6 col-md-6">  
                <i class="fa fa-quote-right float-right main-color-blue"></i>
            </div>
            <div class="col-6 col-md-6">  
                <span class="float-left ">
                    <i class="fa fa-quote-right float-right main-color-blue"></i>
                </span>
            </div>
            <div class="col-12 col-md-12">
                <p class="comments feedback-text">
                     ایده لرنیا ابعاد بسیار بزرگی دارد ، امیدوارم همه ابعاد کار در نظر گرفته شده و پیاده سازی شود که دلها شاد میشه ، موفق باشید
                </p>
            </div>
            <div class="col-12 col-md-12" dir="rtl">
                <a class="feedback-link">
                    <img class="feedback-image" src="{{Storage::url('profile/'.'Dr.zaghari.jpg')}}" alt="userImg"  width="60px">دکتر  زاغری   (بنیانگذار  سیناتدبیر)
                </a>
            </div>
        </div>
    </div>
 
<!-- FeedBack -->
    <div class="single-comment text-center pb-3 pt-3 px-3 m-5 feedback-body" >
        <div class="row"> 
            <div class="col-6 col-md-6">  
                <i class="fa fa-quote-right float-right main-color-blue"></i>
            </div>
            <div class="col-6 col-md-6">  
                <span class="float-left">
                     <i class="fa fa-quote-right float-right main-color-blue"></i>
                </span>
            </div>
            <div class="col-12 col-md-12">
                 <p class="comments feedback-text">
                     ایده  جالبه ، اگه لرنیا مشاوره های مختلف از هر نوعی رو بتونه به صورت فردی و با دقت بالا انجام بده ارزش خیلی بالایی ساخته میشه
                 </p>
            </div>
            <div class="col-12 col-md-12" dir="rtl">
                <a class="feedback-link">
                <img class="feedback-image" src="{{Storage::url('profile/'.'ArashmousaPour.jpg')}}" alt="userImg"  width="60px">مهندس موسی پور (مدیر فنی  ابر ارون)</a>
            </div>
        </div>
    </div>

<!-- FeedBack -->
    <div class="single-comment text-center pb-3 pt-3 px-3 m-5 feedback-body" >
        <div class="row"> 
             <div class="col-6 col-md-6">  
                <i class="fa fa-quote-right float-right main-color-blue"></i>
            </div>
            <div class="col-6 col-md-6">  
                <span class="float-left">
                    <i class="fa fa-quote-right float-right main-color-blue"></i>
                </span>
            </div>
            <div class="col-12 col-md-12">
                <p class="comments feedback-text">
                     ایده کلی روشن سازی و مشخص کردن مسیر کلی آموزش  ایده بسیار مفیدی میتونه باشه برای افراد تازه کار و مبتدی که در ابتدای مسیر هستند   
                </p>
            </div>
            <div class="col-12 col-md-12" dir="rtl">
                <a class="feedback-link">
                    <img class="feedback-image" src="{{Storage::url('profile/'.'Shokri.jpg')}}" alt="userImg"  width="60px"> مهندس شکری زاده (مدرس کندو) </a>
            </div>
        </div>
    </div>

 <!-- FeedBack -->
    <div class="single-comment text-center pb-3 pt-3 px-3 m-5 feedback-body">
        <div class="row"> 
            <div class="col-6 col-md-6">  
                <i class="fa fa-quote-right float-right main-color-blue"></i>
            </div>
            <div class="col-6 col-md-6">  
                <span class="float-left">
                    <i class="fa fa-quote-right float-right main-color-blue"></i>
                </span>
            </div>
            <div class="col-12 col-md-12">
                <p class="comments feedback-text">
                  لرنیا مثل بقیه سایت های آموزشی ایران نیست و این رو وقتی متوجه میشیم که آکادمی  و مسیریابی شون رو بشناسیم و تفاوت های آموزشی بسیاری رو درک کنیم </p>
            </div>
            <div class="col-12 col-md-12">
                <a class="feedback-link">
                <img class="feedback-image" src="{{Storage::url('profile/'.'Laghari.jpg')}}" alt="userImg"  width="60px">مهندس لاغری</a>
            </div>
        </div>
    </div>
</section>

<script>
    $('.slider').slick({infinite: true,
                        slidesToShow: 3,
                        slidesToScroll: 1 ,
                        autoplay : false ,
                        arrows : false ,
                        dots:false ,
                        draggable:true,
                        autoplaySpeed: 7000 ,
                        responsive: [{breakpoint: 1200,
                                     settings: {slidesToShow: 3,
                                                slidesToScroll: 1,
                                                infinite: true,
                                                dots: false}},
                                                {breakpoint:980,
                                                settings: {slidesToShow: 2,
                                                            slidesToScroll:1,
                                                            infinite: true,
                                                            dots: false}},
                                                            {breakpoint:730,
                                                                settings: {slidesToShow: 1,
                                                                            slidesToScroll:1,
                                                                            infinite: true,
                                                                            dots: false}},]}) ;
</script>
<script>window.addEventListener('load', (event) => {$("#Pre-loader").delay(500).fadeOut();});</script>


@endsection <!-- end section content !-->

