@extends('site.Layouts.layout_landing')
@section('Head')
<title> لرنیا | وب سایت آموزش آنلاین </title>
<meta name="description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد">
<meta name="keywords" content="آموزش آنلاین,آموزش مبتدی کامپیوتر,یادگیری,لرنیا">
@endsection
@section('text_landing')
<h1 class="font-weight-bolder text-center font-weight-bolder" style="font-size:9vw;margin-top: -30px">
<span class="text-warning mr-3" style="color: #20c5ba !important;">لرنیا</span><span class="text-info"></span></h1>
<h3 class="text-justify p-lg-1 p-md-4 p-sm-4 p-4 m-lg-2 text-center">
لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد
</h3>
<h6 class="d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-0">
<a class="btn fourth text-center" href="{{route('academy.detail')}}">شروع کن</a>
</h6>
@endsection
@section('pic_landing')
<img  class="learn-bg d-lg-block d-md-block d-sm-none d-none" src="{{asset('images/Academy/Academy_index.svg')}}" alt="" style="margin-top: -15px">
@endsection

@section('content')
<!-- Video -->
<section class="row main-video d-flex justify-content-center mb-5"> <a href="#video3" class="afterglow text-center"> 
<img src="{{ asset('images/video-frame.svg') }}" alt="" class="mt-lg-5 mt-md-5 mt-sm-5 mt-5" width="1000vw"><i class="fa fa-play fa-4x text-center"></i></a>
<video id="video3" controls  width="640" height="360" preload="none"><source src="{{ asset('images/Academy/LEARNIA-INTRO-1.5.2-C.mp4') }}" type="video/mp4" /></video>
</section>
<!-- Video -->


<!-- Customer Say -->
<!--
<div class="row justify-content-center">
    <div class="col-lg-5  wow fadeIn" data-wow-delay="1s">
        <div class="section-title text-center pb-40">
            <div class="line mt-5 mx-auto rounded-lg"></div>
            <h3 class="title mt-5">نظرات مشتریان</h3>
        </div>
    </div>
</div>
<section class="slider wow fadeIn" data-wow-delay="1s">
    <div class="single-comment text-center pb-3 pt-3 px-3 m-5" style="height: auto ; width:300px">
        <i class="fa fa-quote-right float-right"></i>
        <span class="float-left">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
         </span>
        <p class="comments mt-5">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad consequuntur eligendi 
            expedita facere illo libero nesciunt nulla odio pariatur possimus quis repellat repellendus
             totam ut, vero voluptas voluptatem voluptates! Commodi!
        </p>
        <p class="float-right">
            <span class="username">علیرضا خوند</span>
        </p>
        <p class="float-right">
            <span class="">عکاس و طراح</span>
        </p>
        <img src="{{ asset('images/Template/user_login.svg') }}" alt="userImg" class="float-left" width="40px">
    </div>
</section>
-->


<!-- Blog Posts -->

<!-- Blog Posts -->

<section id="masters" class="pt-120">
    <div class="container wow fadeIn" data-wow-delay="1s">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="section-title text-center pb-40">
                    <div class="line mt-5 mx-auto rounded-lg"></div>
                    <h3 class="title mt-5">اساتید و مدرسین</h3>
                </div> <!-- section title -->
            </div>
        </div>
        <!-- row -->
        <div class="row mt-2">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 wow fadeIn">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{asset('images/learner/Afhami.jpeg')}}" alt=""
                              width="150px" height="150px" class="rounded-circle" >
                        </span>

                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس افهمی</h4>
                        <p class="">برنامه نویسی جاوا اسکریپت</p>
                       <!-- <i class="fa fa-instagram text-danger ml-3"></i>
                        <i class="fa fa-telegram text-info"></i> -->
                    </div>

                </div> 
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12 wow fadeInDown">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{asset('images/learner/Yosefvand.jpeg')}}" alt=""
                              width="150px" height="150px" class="rounded-circle" >
                        </span>

                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس یوسفوند</h4>
                        <p class="">برنامه نویسی پایتون</p>
                     <!--   <i class="fa fa-instagram text-danger ml-3"></i>
                        <i class="fa fa-telegram text-info"></i> -->
                    </div>

                </div> 
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12 wow fadeInDown">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/learner/Malek.png') }}" alt="" 
                             width="150px" height="150px" class="rounded-circle" >
                        </span>

                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس محمد ملک</h4>
                        <p class="">اصول و پیش نیازهای برنامه نویسی</p>
                       <!-- <i class="fa fa-instagram text-danger ml-3"></i>
                        <i class="fa fa-telegram text-info"></i>  -->
                    </div>

                </div> 
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12 wow fadeInDown">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/learner/Soltanian.jpeg') }}" alt="" 
                             width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس سلطانیان</h4>
                        <p class="">برنامه نویسی پی اچ پی</p>
                       <!-- <i class="fa fa-instagram text-danger ml-3"></i>
                        <i class="fa fa-telegram text-info"></i>  -->
                    </div>
                </div> 
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12 wow fadeInDown">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/learner/Esmaeili.jpg') }}" alt="" 
                             width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس اسماعیلی</h4>
                        <p class="">ساختمان داده و طراحی الگوریتم</p>
                       <!-- <i class="fa fa-instagram text-danger ml-3"></i>
                        <i class="fa fa-telegram text-info"></i>  -->
                    </div>
                </div> 
            </div>

            
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 wow fadeInDown">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/learner/Soltanieh.jpg') }}" alt="" 
                             width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس سلطانیه</h4>
                        <p class="">برنامه نویسی پی اچ پی</p>
                       <!-- <i class="fa fa-instagram text-danger ml-3"></i>
                        <i class="fa fa-telegram text-info"></i>  -->
                    </div>
                </div> 
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12 wow fadeInDown">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/learner/AminZadeh.jpg') }}" alt="" 
                             width="150px" height="150px" class="rounded-circle" >
                        </span>

                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس امین زاده</h4>
                        <p class="">برنامه نویسی پایتون</p>
                       <!-- <i class="fa fa-instagram text-danger ml-3"></i>
                        <i class="fa fa-telegram text-info"></i>  -->
                    </div>

                </div> 
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12 wow fadeInDown">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{asset('images/learner/Laghari.jpeg')}}" 
                             alt="" width="150px" height="150px" class="rounded-circle" >
                        </span>

                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس لاغری</h4>
                        <p class="">دوره طراحی وب</p>
                      <!--  <i class="fa fa-instagram text-danger ml-3"></i>
                        <i class="fa fa-telegram text-info"></i> -->
                    </div>

                </div> 
            </div>
        </div> 
    </div>
</section>
<!-- END Customer Say -->

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
                <div class="col-lg-4 col-md-6 col-sm-11 col-12 mx-auto mt-3">
                    <div class="card border-none mt-4" style="border-radius: 20px;box-shadow: 0px 0px 20px black;border-style: none">
                        <div class="card-header p-0 overflow-hidden" style="border-top-left-radius: 20px;border-top-right-radius: 20px;border-style: none">
                            <a href="{{route('blog.show', ['en_title' =>  $one_post['en_title'] ]  )}}">
                                <img src="{{  Storage::url('post/'.$one_post['pic_content']) }}" alt="{{ $one_post['title'] }}"
                                 class="w-100 imageBlog" style="border-top-left-radius: 20px;border-top-right-radius: 20px;height:30vh">
                            </a>
                        </div>
                        <div class="card-body px-4">
                            <span class="d-block text-secondary">{{ $one_post->category['name'] }}</span>
                            <a href="{{route('blog.show', ['en_title' =>  $one_post['en_title'] ]  )}}" class="">
                            <h2 class="mt-2" style="direction:rtl;font-size:16px">{{ $one_post['title'] }}</h2>
                            </a>
                            <p class="mt-2 text-secondary" style="line-height:25px !important">
                            @php echo substr($one_post['desc_short'],0,144) @endphp
                            </p>
                        </div>
                        <div class="card-end px-4 mt-3 py-2">
                        <span class="mt-1">نویسنده:  {{$one_post->writer['name']}}</span><i class="fa fa-circle mr-2 text-warning  "></i>
                            <br>
                            <span class="mt-1">زمان مطالعه:  {{ $one_post['readtime'] }} دقیقه</span><i class="fa fa-circle mr-2 text-info  "></i>
                            <a class="btn btn-primary float-right px-4 py-2" 
                            href="{{route('blog.show', ['en_title' =>  $one_post['en_title'] ]  )}}">
                            مشاهده</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</section>


<script>
$('.slider').slick({infinite: true,slidesToShow: 3,slidesToScroll: 1 ,autoplay : true ,arrows : false ,dots:true ,draggable:true,autoplaySpeed: 3000 ,responsive: [{breakpoint: 1200,settings: {slidesToShow: 3,slidesToScroll: 1,infinite: true,dots: true}},{breakpoint:980,settings: {slidesToShow: 2,slidesToScroll:1,infinite: true,dots: true}},{breakpoint:730,settings: {slidesToShow: 1,slidesToScroll:1,infinite: true,dots: true}},]}) ;
</script>
<script>window.addEventListener('load', (event) => {$("#Pre-loader").delay(500).fadeOut();});</script>
@endsection

