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

<div class="text-center">
    <h1 class="font-weight-bolder mt-n5 display-4">
        <span class=" mr-3 main-color-blue" >لــرنیا</span>
    </h1>
    <h2 >
        <span class="text-landing-quick d-md-inline-block d-none">کماندوی برنامه نویسی شو با لرنیا</span>
        <span class="text-landing-quick-sm d-md-none d-inline-block">کماندوی برنامه نویسی شو با لرنیا</span>
    </h2>
</div>

@endsection
@section('pic_landing')
<img  class="d-md-block d-none w-50 ml-5" src="{{asset('images/Academy/Academy_index.svg')}}" alt="" />
@endsection

@section('content')
<!-- Video -->
<div class="row">
    <div class="col-lg-9 col-md-10 col-sm-11 col-12 mx-auto mt-5" >
        <div class="card-body">
             <div class="row">
                <div class="col-md-7 col-12 col-lg-7 col-sm-12 mx-auto  text-center Terms ">
                لرنیا یه آکادمی آموزش مجازیه که بهت کمک میکنه تا 
                برنامه نویسی و مهارت های نرم و سخت یه کماندوی 
                برنامه نویسی شدن رو خوب یاد بگیری
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-12 col-lg-6 col-sm-12 mx-auto ml-auto ">
                    <h2 class="text-center font-weight-bolder videoTitle" >
                        <span class="text-warning mr-1 main-color-yellow Gray-style" >لــرنیا چیه؟</span>
                        
                    </h2>
                 
                    <div class="card-body videoBody" >
                        <video  class="afterglow" id="my-video" width="630" height="355"
                         data-skin="dark" poster="https://file.learniaa.com/files/PosterVideoPosts/intro.jpg">
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



<!-- Python RoadMap -->
<div class="subscribe-area wow fadeIn container mx-auto p-3 roadMap " >
    <div class="row">
    <div class="col-lg-4 text-center mt-2 " >
            <a target="_parent" href="https://learniaa.com/academy/mylearn?pk_tree=29" rel="tooltip" title="" data-placement="bottom"  dideo-checked="true">
                <img src="{{ asset('images/Academy/Landing/Python_Course.jpg')}}" alt="Thumbnail Image"  >   
            </a>
        </div>
        <div class="col-lg-8">
            <div class="subscribe-content">
               <h2 class="h4 main-color-blue mt-lg-0 mt-4">مسیر یادگیری برنامه نویسی پایتون  ( Python )  </h2>
                <h4 class="roadMap-text-small text-justify main-color-black mt-3">اگه دوست داری یه کماندوی برنامه نویسی پایتون بشی و  ساخت برنامه های کاربردی  و کدنویسی  اون ها رو یاد بگیری روی مشاهده مسیر بزن</h4>
                <br>
                <div class="my-3">
                    <a class="nav-link  btn btn-warning mt-4 d-inline roadMap-link p-3" href="https://learniaa.com/academy/mylearn?pk_tree=29" target="_parent" rel="tooltip" title="" data-placement="bottom">
                        <img src="{{ asset('images/icons/Item.svg')}}" alt="Thumbnail Image" height="30px" width="30px">
                        <span >مشاهده مسیر</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Python RoadMap -->


<!-- FrontEnd RoadMap -->
<div class="subscribe-area wow fadeIn container mx-auto p-3 roadMap " >
    <div class="row">
    <div class="col-lg-4 text-center mt-2 " >
            <a  target="_parent" href="https://learniaa.com/academy/mylearn?pk_tree=31" rel="tooltip" title="" data-placement="bottom"  dideo-checked="true">
                <img src="{{ asset('images/Academy/Landing/FrontEnd_Course.jpg')}}" alt="Thumbnail Image"  >   
            </a>
        </div>
        <div class="col-lg-8">
            <div class="subscribe-content">
               <h2 class="h4 main-color-blue mt-lg-0 mt-4">مسیر یادگیری برنامه نویسی وب فرانت اند ( Front-End )  </h2>
                <h4 class="roadMap-text-small text-justify main-color-black mt-3">اگه دوست داری یه کماندوی برنامه نویسی فرانت اند وب بشی و  ساخت صفحات وب و کدنویسی  اون ها رو یاد بگیری روی مشاهده مسیر بزن</h4>
                <br>
                <div class="my-3">
                    <a class="nav-link  btn btn-warning mt-4 d-inline roadMap-link p-3" href="https://learniaa.com/academy/mylearn?pk_tree=31" target="_parent" rel="tooltip" title="" data-placement="bottom">
                        <img src="{{ asset('images/icons/Item.svg')}}" alt="Thumbnail Image" height="30px" width="30px">
                        <span >مشاهده مسیر</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FrontEnd RoadMap -->


<!-- ICDL RoadMap -->
<div class="subscribe-area wow fadeIn container mx-auto p-3 roadMap " >
    <div class="row">
    <div class="col-lg-4 text-center mt-2 " >
            <a target="_parent" href="https://learniaa.com/academy/course/0/8" rel="tooltip" title="" data-placement="bottom"  dideo-checked="true">
                <img src="{{ asset('images/Academy/Landing/ICDL_Course.jpg')}}" alt="Thumbnail Image"  >   
            </a>
        </div>
        <div class="col-lg-8">
            <div class="subscribe-content">
               <h2 class="h4 main-color-blue mt-lg-0 mt-4">مسیر یادگیری کامپیوتر برای تازه کار ها  ( مهارت های پایه و اولیه )  </h2>
                <h4 class="roadMap-text-small text-justify main-color-black mt-3">اگه دوست داری یه فرد ماهر در کار کردن وانجام انواع نیازهای رایانه ای خودت باشی روی مشاهده مسیر بزن</h4>
                <br>
                <div class="my-3">
                    <a class="nav-link  btn btn-warning mt-4 d-inline roadMap-link p-3" href="https://learniaa.com/academy/course/0/8" target="_parent" rel="tooltip" title="" data-placement="bottom">
                        <img src="{{ asset('images/icons/Item.svg')}}" alt="Thumbnail Image" height="30px" width="30px">
                        <span >مشاهده مسیر</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ICDL RoadMap -->



<!-- RoadMap -->
<div class="subscribe-area wow fadeIn container mx-auto p-3 roadMap " >
    <div class="row">
    <div class="col-lg-4 text-center mt-2 " >
            <a  target="_parent" rel="tooltip" title="" data-placement="bottom" href="{{route('academy.detail')}}" dideo-checked="true">
                <img src="{{ asset('images/Academy/Landing/Roadmap.jpg')}}" alt="Thumbnail Image" >   
            </a>
        </div>
        <div class="col-lg-8">
            <div class="subscribe-content">
               <h2 class="h4 main-color-blue mt-lg-0 mt-4">مسیر یادگیری برنامه نویسی تازه کار ها</h2>
                <h4 class="roadMap-text-small text-justify main-color-black mt-3">اگه دوست داری یه کماندوی برنامه نویسی بشی ولی نمیدونی چه زبان برنامه نویسی برات مناسبه و میخوای  ساخت برنامه های کاربردی  و کدنویسی  اون ها رو یاد بگیری روی شروع مسیریابی بزن</h4>
                <br>
                <div class="my-3">
                    <a class="nav-link  btn btn-warning mt-4 d-inline roadMap-link p-3 my-3" target="_parent" rel="tooltip" title="" data-placement="bottom" href="{{route('academy.detail')}}" dideo-checked="true">
                        <img src="{{ asset('images/icons/Item.svg')}}" alt="Thumbnail Image" height="30px" width="30px">
                        <span >شروع مسیریابی</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- RoadMap -->

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
    <div class="row m-3" id="ListOfData">
            <div class="card-group">
            @foreach($recent_post as $one_post)
                @php  $json = json_decode($one_post['extras'],false) @endphp
                <div class="col-lg-3 col-md-6 col-12 d-flex p-1">
                    <div class="card imageBlog">
                        <img class="card-img-top w-100 post-image" src="{{  Storage::url('post/'.$one_post['pic_content']) }}" alt="{{ $one_post['title'] }}" >
                        <div class="card-body">
                        <h5 class="card-title py-3 px-2">
                            <a href="{{route('blog.show', ['en_title' =>  $one_post['en_title'] ]  )}}" class="">
                            <h2 class="mt-2 post-title">{{ $one_post['title'] }}</h2>
                            </a>                            
                        </h5>
                        <p class="card-text post-summray text-justify px-2 ">
                            @php echo substr($one_post['desc_short'],0,200) . '...' @endphp
                        </p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{route('blog.show', ['en_title' =>  $one_post['en_title'] ]  )}}" class="btn btn-primary">مطالعه</a>
                            <div>
                                <small class="mt-1">زمان مطالعه:  {{ $one_post['readtime'] }} دقیقه</small>
                                <img src="{{ asset('images/icons/Time.svg') }}" alt="Thumbnail Image" height="20px" width="20px">
                            </div>
                        </div>
                    </div>
                </div>                              
            @endforeach
            </div>
    </div>
</section>
<!-- Posts -->


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
            <img class="d-flex" src="{{ asset('images/icons/quote.svg') }}" alt="Thumbnail Image" height="25px" width="25px"> 
            </div>
            <div class="col-6 col-md-6">  
                <span class="float-left">
                <img class="d-flex" src="{{ asset('images/icons/quote.svg') }}" alt="Thumbnail Image" height="25px" width="25px">  
                </span>
            </div>
            <div class="col-12 col-md-12">
                <p class="comments feedback-text">
                     ایده لرنیا ابعاد بسیار بزرگی دارد ، امیدوارم همه ابعاد کار در نظر گرفته شده و پیاده سازی شود که دلها شاد میشه ، موفق باشید
                </p>
            </div>
            <div class="col-12 col-md-12" dir="rtl">
                <a class="feedback-link">
                   دکتر  زاغری   (بنیانگذار  سیناتدبیر)
                </a>
            </div>
        </div>
    </div>
<!-- FeedBack -->
    <div class="single-comment text-center pb-3 pt-3 px-3 m-5 feedback-body" >
        <div class="row"> 
        <div class="col-6 col-md-6"> 
            <img class="d-flex" src="{{ asset('images/icons/quote.svg') }}" alt="Thumbnail Image" height="25px" width="25px"> 
            </div>
            <div class="col-6 col-md-6">  
                <span class="float-left">
                <img class="d-flex" src="{{ asset('images/icons/quote.svg') }}" alt="Thumbnail Image" height="25px" width="25px">  
                </span>
            </div>
            <div class="col-12 col-md-12">
                 <p class="comments feedback-text">
                     ایده  جالبه ، اگه لرنیا مشاوره های مختلف از هر نوعی رو بتونه به صورت فردی و با دقت بالا انجام بده ارزش خیلی بالایی ساخته میشه
                 </p>
            </div>
            <div class="col-12 col-md-12" dir="rtl">
                <a class="feedback-link">
                مهندس موسی پور (مدیر فنی  ابر ارون)</a>
            </div>
        </div>
    </div>
<!-- FeedBack -->
    <div class="single-comment text-center pb-3 pt-3 px-3 m-5 feedback-body" >
        <div class="row"> 
        <div class="col-6 col-md-6"> 
            <img class="d-flex" src="{{ asset('images/icons/quote.svg') }}" alt="Thumbnail Image" height="25px" width="25px"> 
            </div>
            <div class="col-6 col-md-6">  
                <span class="float-left">
                <img class="d-flex" src="{{ asset('images/icons/quote.svg') }}" alt="Thumbnail Image" height="25px" width="25px">  
                </span>
            </div>
            <div class="col-12 col-md-12">
                <p class="comments feedback-text">
                     ایده کلی روشن سازی و مشخص کردن مسیر کلی آموزش  ایده بسیار مفیدی میتونه باشه برای افراد تازه کار و مبتدی که در ابتدای مسیر هستند   
                </p>
            </div>
            <div class="col-12 col-md-12" dir="rtl">
                <a class="feedback-link">
                     مهندس شکری زاده (مدرس کندو) </a>
            </div>
        </div>
    </div>
 <!-- FeedBack -->
    <div class="single-comment text-center pb-3 pt-3 px-3 m-5 feedback-body">
        <div class="row"> 
            <div class="col-6 col-md-6"> 
            <img class="d-flex" src="{{ asset('images/icons/quote.svg') }}" alt="Thumbnail Image" height="25px" width="25px"> 
            </div>
            <div class="col-6 col-md-6">  
                <span class="float-left">
                <img class="d-flex" src="{{ asset('images/icons/quote.svg') }}" alt="Thumbnail Image" height="25px" width="25px">  
                </span>
            </div>
            <div class="col-12 col-md-12">
                <p class="comments feedback-text">
                  لرنیا مثل بقیه سایت های آموزشی ایران نیست و این رو وقتی متوجه میشیم که آکادمی  و مسیریابی شون رو بشناسیم و تفاوت های آموزشی بسیاری رو درک کنیم </p>
            </div>
            <div class="col-12 col-md-12">
                <a class="feedback-link">
                مهندس لاغری</a>
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

