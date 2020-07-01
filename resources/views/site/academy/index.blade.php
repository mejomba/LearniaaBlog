@extends('site.Layouts.layout_landing')
@section('Head')
    <title> لرنیا | وب سایت آموزش آنلاین </title>
    <meta name="description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد">
    <meta name="keywords" content="آموزش آنلاین,آموزش مبتدی کامپیوتر,یادگیری,لرنیا">

@endsection




            @section('text_landing')
{{--                <img class="" src="{{asset('images/Header_Academy.png')}}" alt="">--}}
                <h1 class="font-weight-bolder text-center font-weight-bolder" style="font-size:9vw;margin-top: -30px"><span class="text-warning mr-3">لرنیا</span><span class="text-info">آکادمی</span></h1>
                <h3 class="text-justify p-lg-1 p-md-4 p-sm-4 p-4 m-lg-2 text-center">لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد</h3>
                <h6 class="d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-0">
                    <button class="btn fourth text-center">شروع کن</button>
                </h6>
            @endsection

            @section('pic_landing')
                <img  class="learn-bg d-lg-block d-md-block d-sm-none d-none" src="{{asset('images/header-teamwork.svg')}}" alt="" style="margin-top: -15px">
            @endsection


@section('content')


<!-- Video LEARN -->

<section class="video d-flex justify-content-center mt-5" style="position: relative ; width: 100%">
    <img class="img-fluid rounded-lg shadow" width="80%" src="{{ asset('images/video-frame.svg') }}" alt="" >
    <span class="video-play-button" data-toggle="modal" data-target="#LearniaaVideo">
                <span></span>
            </span>
</section>

<!-- Modal -->
<div class="modal fade"  id="LearniaaVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border: none!important ; background-color: transparent;">
            <div class="model-header">

            </div>
            <div class="modal-body d-flex justify-content-center align-items-center align-content-center">
                <button type="button" class="close d-block" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times"></i>
                </button>
                <video class="main-video" autoplay controls >
                    <source class="Video" src="{{ asset('images/video.mp4') }}" type="video/mp4">
                </video>
            </div>
        </div>
    </div>
</div>


<!-- END Video LEARN -->

<!-- Customer Say -->
{{-- <section id="testimonial" class="testimonial-area pt-120">--}}
{{--  <div class="container-fluid">--}}
{{--   <div class="row justify-content-center">--}}
{{--    <div class="col-lg-5">--}}
{{--      <div class="section-title text-center pb-40">--}}
{{--    <div class="line mt-5 mx-auto rounded-lg"></div>--}}
{{--         <h3 class="title mt-5">نظرات مشتریان</h3>--}}
{{--     </div> <!-- section title -->--}}
{{--  </div>--}}
{{--  </div>--}}
{{-- <!-- row -->--}}
{{--        <div class="row testimonial-active mt-5 slide">--}}
{{--            <div class="">--}}
{{--                <div class="single-testimonial ">--}}
{{--                    <div class="testimonial-review ">--}}
{{--                        <div class="quota">--}}
{{--                            <i class="fa fa-quote-right"></i>--}}
{{--                        </div>--}}
{{--                        <div class="star">--}}
{{--                            <ul class="">--}}
{{--                                <li><i class="fa fa-star"></i></li>--}}
{{--                                <li><i class="fa fa-star"></i></li>--}}
{{--                                <li><i class="fa fa-star"></i></li>--}}
{{--                                <li><i class="fa fa-star"></i></li>--}}
{{--                                <li><i class="fa fa-star"></i></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="testimonial-text">--}}
{{--                        <p class="text" style="color: darkgray">Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam nonu eirmod--}}
{{--                            tempor invidunt labore.Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam--}}
{{--                            nonu.</p>--}}
{{--                    </div>--}}
{{--                    <div class="testimonial-author ">--}}
{{--                        <div class="author-image">--}}
{{--                            <img class="shape" src="{{asset('images/services-shape.svg')}}" alt="shape">--}}
{{--                            <img class="author" src="{{asset('images/services-shape-3.svg')}}" alt="author">--}}
{{--                        </div>--}}
{{--                        <div class="author-content media-body">--}}
{{--                            <h6 class="holder-name" style="color: darkgray">Jenny Deo</h6>--}}
{{--                            <p class="text" style="color: darkgray">CEO, SpaceX</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div> <!-- single testimonial -->--}}
{{--            </div>--}}
{{--            <div class="">--}}
{{--                <div class="single-testimonial">--}}
{{--                    <div class="testimonial-review ">--}}
{{--                        <div class="quota">--}}
{{--                            <i class="fa fa-quote-right"></i>--}}
{{--                        </div>--}}
{{--                        <div class="star">--}}
{{--                            <ul>--}}
{{--                                <li><i class="fa fa-star"></i></li>--}}
{{--                                <li><i class="fa fa-star"></i></li>--}}
{{--                                <li><i class="fa fa-star"></i></li>--}}
{{--                                <li><i class="fa fa-star"></i></li>--}}
{{--                                <li><i class="fa fa-star"></i></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="testimonial-text">--}}
{{--                        <p class="text" style="color: darkgray">Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam nonu eirmod--}}
{{--                            tempor invidunt labore.Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam--}}
{{--                            nonu.</p>--}}
{{--                    </div>--}}
{{--                    <div class="testimonial-author ">--}}
{{--                        <div class="author-image">--}}
{{--                            <img class="shape" src="{{asset('images/services-shape.svg')}}" alt="">--}}
{{--                            <img class="author" src="{{asset('images/services-shape-3.svg')}}" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="author-content media-body">--}}
{{--                            <h6 class="holder-name" style="color: darkgray">Marjin Otte</h6>--}}
{{--                            <p class="text" style="color: darkgray">UX Specialist, Yoast</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div> <!-- single testimonial -->--}}
{{--            </div>--}}
{{--            <div class="">--}}
{{--                <div class="single-testimonial">--}}
{{--                    <div class="testimonial-review ">--}}
{{--                        <div class="quota">--}}
{{--                            <i class="fa fa-quote-right"></i>--}}
{{--                        </div>--}}
{{--                        <div class="star">--}}
{{--                            <ul>--}}
{{--                                <li><i class="fa fa-star"></i></li>--}}
{{--                                <li><i class="fa fa-star"></i></li>--}}
{{--                                <li><i class="fa fa-star"></i></li>--}}
{{--                                <li><i class="fa fa-star"></i></li>--}}
{{--                                <li><i class="fa fa-star"></i></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="testimonial-text">--}}
{{--                        <p class="text" style="color: darkgray">Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam nonu eirmod--}}
{{--                            tempor invidunt labore.Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam--}}
{{--                            nonu.</p>--}}
{{--                    </div>--}}
{{--                    <div class="testimonial-author ">--}}
{{--                        <div class="author-image">--}}
{{--                            <img class="shape" src="{{asset('images/services-shape.svg')}}" alt="shape">--}}
{{--                            <img class="author" src="{{asset('images/services-shape-3.svg')}}" alt="author">--}}
{{--                        </div>--}}
{{--                        <div class="author-content media-body">--}}
{{--                            <h6 class="holder-name" style="color: darkgray">David Smith</h6>--}}
{{--                            <p class="text" style="color: darkgray">CTO, Alphabet</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div> <!-- single testimonial -->--}}
{{--            </div>--}}
{{--            <div class="">--}}
{{--                <div class="single-testimonial">--}}
{{--                    <div class="testimonial-review ">--}}
{{--                        <div class="quota">--}}
{{--                            <i class="fa fa-quote-right"></i>--}}
{{--                        </div>--}}
{{--                        <div class="star">--}}
{{--                            <ul>--}}
{{--                                <li><i class="fa fa-star"></i></li>--}}
{{--                                <li><i class="fa fa-star"></i></li>--}}
{{--                                <li><i class="fa fa-star"></i></li>--}}
{{--                                <li><i class="fa fa-star"></i></li>--}}
{{--                                <li><i class="fa fa-star"></i></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="testimonial-text">--}}
{{--                        <p class="text" style="color: darkgray">Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam nonu eirmod--}}
{{--                            tempor invidunt labore.Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam--}}
{{--                            nonu.</p>--}}
{{--                    </div>--}}
{{--                    <div class="testimonial-author ">--}}
{{--                        <div class="author-image">--}}
{{--                            <img class="shape" src="{{asset('images/services-shape.svg')}}" alt="shape">--}}
{{--                            <img class="author" src="{{asset('images/services-shape-3.svg')}}" alt="author">--}}
{{--                        </div>--}}
{{--                        <div class="author-content media-body">--}}
{{--                            <h6 class="holder-name" style="color: darkgray">David Smith</h6>--}}
{{--                            <p class="text" style="color: darkgray">CTO, Alphabet</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div> <!-- single testimonial -->--}}
{{--            </div>--}}

{{--        </div> <!-- row -->--}}
{{--    </div> <!-- container -->--}}
{{--</section>--}}
<!-- END Customer Say -->
<section class="slider">

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
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad consequuntur eligendi expedita facere illo libero nesciunt nulla odio pariatur possimus quis repellat repellendus totam ut, vero voluptas voluptatem voluptates! Commodi!
        </p>
        <p class="float-right">
            <span class="username">Jenny Doe</span>
        </p>
        <p class="float-right">
            <span class="">CEO</span>
        </p>
        <img src={{ asset('images/Template/user_login.svg') }} alt="userImg" class="float-left" width="40px">
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
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad consequuntur eligendi expedita facere illo libero nesciunt nulla odio pariatur possimus quis repellat repellendus totam ut, vero voluptas voluptatem voluptates! Commodi!
        </p>
        <p class="float-right">
            <span class="username">Jenny Doe</span>
        </p>
        <p class="float-right">
            <span class="">CEO</span>
        </p>
        <img src={{ asset('images/Template/user_login.svg') }} alt="userImg" class="float-left" width="40px">
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
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad consequuntur eligendi expedita facere illo libero nesciunt nulla odio pariatur possimus quis repellat repellendus totam ut, vero voluptas voluptatem voluptates! Commodi!
        </p>
        <p class="float-right">
            <span class="username">Jenny Doe</span>
        </p>
        <p class="float-right">
            <span class="">CEO</span>
        </p>
        <img src={{ asset('images/Template/user_login.svg') }} alt="userImg" class="float-left" width="40px">
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
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad consequuntur eligendi expedita facere illo libero nesciunt nulla odio pariatur possimus quis repellat repellendus totam ut, vero voluptas voluptatem voluptates! Commodi!
        </p>
        <p class="float-right">
            <span class="username">Jenny Doe</span>
        </p>
        <p class="float-right">
            <span class="">CEO</span>
        </p>
        <img src={{ asset('images/Template/user_login.svg') }} alt="userImg" class="float-left" width="40px">
    </div>

</section>

<!-- Blog Posts -->
<section id="testimonial" class="testimonial-area pt-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="section-title text-center pb-40">

                  <!--  <h3 class="title mt-5">آخرین مطالب</h3>  -->
                </div> <!-- section title -->
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

                <!--
                    <div class="card p-3 hover-style ml-2" style="width: 20rem; border: 2px solid #F1948A">
                        <img class="card-img-top img-border" src="{{asset('images/learnia-image.jpg')}}" alt="Card image cap">
                        <div class="card-body" style="height: 200px">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                             card's content.</p>
                        </div>
                    </div>

                    <div class="card p-3 hover-style ml-2" style="width: 20rem;">
                        <img class="card-img-top img-border" src="{{asset('images/learnia-image.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        </div>
                    </div>

                    -->

            </div>
        </div>

</div> <!-- container -->
</section>
<!-- End BLog Posts -->

<section id="masters" class="pt-120">
    <div class="container">
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
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{asset('images/testimonials-background.jpg')}}" alt="" width="150px" height="150px" class="rounded-circle" >
                        </span>

                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">حسین حسینی</h4>
                        <p class="">Business Developer</p>
                        <i class="fa fa-instagram text-danger ml-3"></i>
                        <i class="fa fa-telegram text-info"></i>
                    </div>

                </div> <!-- single testimonial -->
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{asset('images/testimonials-background.jpg')}}" alt="" width="150px" height="150px" class="rounded-circle" >
                        </span>

                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">حسین حسینی</h4>
                        <p class="">Business Developer</p>
                        <i class="fa fa-instagram text-danger ml-3"></i>
                        <i class="fa fa-telegram text-info"></i>
                    </div>

                </div> <!-- single testimonial -->
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/Template/user_login.svg') }}" alt="" width="150px" height="150px" class="rounded-circle" >
                        </span>

                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">حسین حسینی</h4>
                        <p class="">Business Developer</p>
                        <i class="fa fa-instagram text-danger ml-3"></i>
                        <i class="fa fa-telegram text-info"></i>
                    </div>

                </div> <!-- single testimonial -->
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{asset('images/testimonials-background.jpg')}}" alt="" width="150px" height="150px" class="rounded-circle" >
                        </span>

                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">حسین حسینی</h4>
                        <p class="">Business Developer</p>
                        <i class="fa fa-instagram text-danger ml-3"></i>
                        <i class="fa fa-telegram text-info"></i>
                    </div>

                </div> <!-- single testimonial -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
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

@endsection

