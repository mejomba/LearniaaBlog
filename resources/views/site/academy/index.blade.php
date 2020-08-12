@extends('site.Layouts.layout_landing')

@section('Head')
    <title> لرنیا | وب سایت آموزش آنلاین </title>
    <meta name="description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد">
    <meta name="keywords" content="آموزش آنلاین,آموزش مبتدی کامپیوتر,یادگیری,لرنیا">

@endsection


@section('text_landing')
<h1 class="font-weight-bolder text-center font-weight-bolder" style="font-size:9vw;margin-top: -30px">
<span class="text-warning mr-3">لرنیا</span>
<span class="text-info"></span>
</h1>
     <h3 class="text-justify p-lg-1 p-md-4 p-sm-4 p-4 m-lg-2 text-center">
     لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد
     </h3>
     <h6 class="d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-0">
     <a class="btn fourth text-center" href="{{route('academy.detail')}}">شروع کن</a>
     </h6>
@endsection

@section('pic_landing')
<img  class="learn-bg d-lg-block d-md-block d-sm-none d-none" 
src="{{asset('images/Academy/Academy_index.svg')}}" alt="" 
style="margin-top: -15px">
@endsection


@section('content')

<!-- Video LEARN -->
<section class="row main-video d-flex justify-content-center mb-5">
    <a href="#video3" class="afterglow text-center">
        <img src="{{ asset('images/video-frame.svg') }}" alt="" class="mt-lg-5 mt-md-5 mt-sm-5 mt-5" width="1000vw">
        <i class="fa fa-play fa-4x text-center"></i>
    </a>
    <video id="video3" controls  width="640" height="360" preload="none">
        <source src="{{ asset('images/Academy/LEARNIA-INTRO-1.5.2-C.mp4') }}" type="video/mp4" />
    </video>
</section>
<!-- END Video LEARN -->


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
    <div class="single-comment  text-center pb-3 pt-3 px-3 m-5 " style="height: auto ; width:300px">
        <span class="float-left">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
         </span>
        <i class="fa fa-quote-right float-right"></i>
        <p class="comments mt-5">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad consequuntur 
            eligendi expedita facere illo libero nesciunt nulla odio pariatur possimus 
            quis repellat repellendus totam ut, vero voluptas voluptatem voluptates! Commodi!
        </p>
        <p class="float-right">
            <span class="">مشاور - </span>
        </p>
        <p class="float-right">
            <span class="username"> علی قیومی</span>
        </p>
        <img src="{{ asset('images/Template/user_login.svg') }}" alt="userImg" class="float-left" width="40px">
    </div>

    <div class="single-comment text-center pb-3 pt-3 px-3  m-5" style="height: auto ; width:300px">
        <i class="fa fa-quote-right float-right"></i>
        <span class="float-left">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
         </span>
        <p class="comments mt-5">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
            Ad consequuntur eligendi expedita facere illo libero nesciunt nulla 
            odio pariatur possimus quis repellat repellendus totam ut, vero voluptas 
            voluptatem voluptates! Commodi!
        </p>
        <p class="float-right">
            <span class="">مشاور - </span>
        </p>
        <p class="float-right">
            <span class="username"> علی قیومی</span>
        </p>
        <img src="{{ asset('images/Template/user_login.svg') }}" alt="userImg" class="float-left" width="40px">
    </div>

    <div class="single-comment  text-center pb-3 pt-3 px-3 m-5 " style="height: auto ; width:300px">
        <i class="fa fa-quote-right float-right"></i>
        <span class="float-left">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
         </span>
        <p class="comments mt-5">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
            Ad consequuntur eligendi expedita facere illo libero nesciunt nulla odio pariatur possimus
             quis repellat repellendus totam ut, vero voluptas voluptatem voluptates! Commodi!
        </p>
        <p class="float-right">
            <span class="">مشاور - </span>
        </p>
        <p class="float-right">
            <span class="username"> علی قیومی</span>
        </p>
        
        <img src="{{ asset('images/Template/user_login.svg') }}" alt="userImg" class="float-left" width="40px">
    </div>
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
<!--
<section id="testimonial" class="testimonial-area pt-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="section-title text-center pb-40">
                 <h3 class="title mt-5">آخرین مطالب</h3> 
                </div>
            </div>
        </div>

         <div class="container mt-5 ">
        <div class="row d-flex justify-content-around">

        @foreach($last_posts as $one_post)
            @php  $json = json_decode($one_post['extras'],false) @endphp

                    <div class="card p-3 hover-style ml-2" style="width: 20rem;">
                    <a href="{{route('post.detail', ['slug' => $one_post['pk_post'] , 'desc' =>  $one_post['title'] ]  )}}">
                        <img class="card-img-top img-border" src="{{ Storage::url('post/'.$one_post['pic_content'])}}" alt="Card image cap">
                        </a>

                        <div class="card-body">
                        <a href="{{route('post.detail', ['slug' => $one_post['pk_post'] , 'desc' =>  $one_post['title'] ]  )}}">
                            <h5 class="card-title">{{$one_post['title']}}</h5></a>
                            <p class="card-text">
                            @php $text =  substr($json->desc_short,0,380);
                                        $char = substr($text,strlen($text)-1,1);
                                        if($char != "." | $char != " ")
                                        {
                                         echo  substr($text,0,378) . " ...";
                                        }
                                        else
                                        {
                                          echo $text ;
                                        }
                                      @endphp
                            </p>
                        </div>
                    </div>
        @endforeach

            </div>
        </div>    
</div>
</section>
 -->



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


<script>
    $('.slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1 ,
        autoplay : true ,
        arrows : false ,
        dots:true ,
        draggable:true,
        autoplaySpeed: 3000 ,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint:980,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll:1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint:730,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll:1,
                    infinite: true,
                    dots: true
                }
            },

        ]

    }) ;
</script>


    <script>
        window.addEventListener('load', (event) => {
            $("#Pre-loader").delay(500).fadeOut();
        });
    </script>

@endsection

