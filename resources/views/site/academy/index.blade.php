@extends('site.Layouts.layout_landing')
@section('Head')
    <title> لرنیا | وب سایت آموزش آنلاین </title>
    <meta name="description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد">
    <meta name="keywords" content="آموزش آنلاین,آموزش مبتدی کامپیوتر,یادگیری,لرنیا">
@endsection

@section('text_landing')
<img style="width: 380px; height: 250px" src="{{asset('images/Header_Academy.png')}}" alt="">
@endsection

@section('pic_landing')
<img class="learn-bg mt-5" src="{{asset('images/header-teamwork.svg')}}" alt="">
@endsection

@section('content')
<!-- Services -->
<div id="header" class="page-header container-fluid mt-4" data-parallax="true">
    <section id="features" class="services-area pt-120">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center pb-40">
                        <div class="line m-auto"></div>

                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center" style="margin-top: 150px">
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s"
                         data-wow-delay="0.2s" style="height: 450px; background: #F4F6F6">
                        <h3 style="color: gray; margin-top: -30px">بزودی</h3>
                        <div class="services-icon">
                            <img class="shape" src="{{asset('images/services-shape.svg')}}" alt="shape">
                            <img class="shape-1" src="{{asset('images/services-shape-1.svg')}}" alt="shape-1">
                            <i class="lni-baloon"></i>
                        </div>
                        <div class="services-content">
                            <h6 class=""><a href="#" style="color: #D6DBDF;">طراحی وب</a></h6>
                            <span style="margin-top: 10px; color: aqua">(HTML-5 and CSS-3)</span>
                            <p class="text" style="color: darkgray">Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam nonu eirmod
                                tempor invidunt labore.</p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s"
                         data-wow-delay="0.5s" style="border: 2px solid #E74C3C; border-radius: 10px; height: 450px">
                        <div class="services-icon">
                            <img class="shape" src="{{asset('images/services-shape.svg')}}" alt="shape">
                            <img class="shape-1" src="{{asset('images/services-shape-1.svg')}}" alt="shape-1">
                            <i class="lni-cog"></i>
                        </div>
                        <div class="services-content">
                            <h6 class="text-black-50"><a style="color: black;" href="#">دوره آموزش کامپیوتر مبتدیان</a></h6>
                            <span style="margin-top: 10px; color: aqua">(ICDL)</span>
                            <p class="mt-3">Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam nonu eirmod
                                tempor invidunt labore.</p>
                            <button class="btn-style fourth mt-4 d-inline">شروع دوره</button>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s"
                         data-wow-delay="0.8s" style=";height: 450px; background: #F4F6F6">
                        <h3 style="color: gray; margin-top: -30px">بزودی</h3>
                        <div class="services-icon">
                            <img class="shape" src="{{asset('images/services-shape.svg')}}" alt="shape">
                            <img class="shape-1" src="{{asset('images/services-shape-1.svg')}}" alt="shape-1">
                            <i class="lni-bolt-alt"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h6 class=""><a href="#" style="color: #D6DBDF;">دوره اموزش اصول برنامه نویسی</a></h6>
                            <span style="margin-top: 10px; color: aqua">(یادگیری برنامه نویسی)</span>
                            <p class="text" style="color: darkgray">Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam nonu eirmod
                                tempor invidunt labore.</p>
                        </div>
                    </div> <!-- single services -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
</div>

<!-- END OF Services -->


<!-- Video LEARN -->
    <div class="container" style="margin-top: 100px">
        <div class="text-center">
            <h3 class="font-weight-bold">فیلم اموزش کار با سایت</h3>
        </div>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/afterglowplayer@1.x"></script>
        <div class="row mt-5">
            <div class="col-lg-12">
                <video class="afterglow" id="my-video" width="500" height="270"
                       data-overscale="false" poster="{{ Storage::url('tree/Poster_Intro_Academy.jpg') }}"
                       src="{{ Storage::url('Videos_Beginner_Tree/Video_IntroAcademy.mp4') }}">
                </video>
            </div>
        </div>
    </div>
<!-- END Video LEARN -->

<!-- Customer Say -->
{{-- <section id="testimonial" class="testimonial-area pt-120"> --}}
{{--  <div class="container"> --}}
{{--   <div class="row justify-content-center"> --}}
{{--    <div class="col-lg-5"> --}}
{{--      <div class="section-title text-center pb-40"> --}}
{{--    <div class="line m-auto"></div> --}}
{{--         <h3 class="title mt-5">نظرات مشتریان</h3> --}}
{{--     </div> <!-- section title --> --}}
{{--  </div>--}}
{{--  </div> --}}
 <!-- row -->
{{--        <div class="row testimonial-active wow fadeInUpBig mt-5 dsble" data-wow-duration="1s" data-wow-delay="0.8s">--}}
{{--            <div class="col-lg-4">--}}
{{--                <div class="single-testimonial">--}}
{{--                    <div class="testimonial-review d-flex align-items-center justify-content-between">--}}
{{--                        <div class="quota">--}}
{{--                            <i class="lni-quotation"></i>--}}
{{--                        </div>--}}
{{--                        <div class="star">--}}
{{--                            <ul>--}}
{{--                                <li><i class="lni-star-filled"></i></li>--}}
{{--                                <li><i class="lni-star-filled"></i></li>--}}
{{--                                <li><i class="lni-star-filled"></i></li>--}}
{{--                                <li><i class="lni-star-filled"></i></li>--}}
{{--                                <li><i class="lni-star-filled"></i></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="testimonial-text">--}}
{{--                        <p class="text" style="color: darkgray">Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam nonu eirmod--}}
{{--                            tempor invidunt labore.Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam--}}
{{--                            nonu.</p>--}}
{{--                    </div>--}}
{{--                    <div class="testimonial-author d-flex align-items-center">--}}
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

{{--            <div class="col-lg-4">--}}
{{--                <div class="single-testimonial">--}}
{{--                    <div class="testimonial-review d-flex align-items-center justify-content-between">--}}
{{--                        <div class="quota">--}}
{{--                            <i class="lni-quotation"></i>--}}
{{--                        </div>--}}
{{--                        <div class="star">--}}
{{--                            <ul>--}}
{{--                                <li><i class="lni-star-filled"></i></li>--}}
{{--                                <li><i class="lni-star-filled"></i></li>--}}
{{--                                <li><i class="lni-star-filled"></i></li>--}}
{{--                                <li><i class="lni-star-filled"></i></li>--}}
{{--                                <li><i class="lni-star-filled"></i></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="testimonial-text">--}}
{{--                        <p class="text" style="color: darkgray">Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam nonu eirmod--}}
{{--                            tempor invidunt labore.Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam--}}
{{--                            nonu.</p>--}}
{{--                    </div>--}}
{{--                    <div class="testimonial-author d-flex align-items-center">--}}
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
{{--            <div class="col-lg-4">--}}
{{--                <div class="single-testimonial">--}}
{{--                    <div class="testimonial-review d-flex align-items-center justify-content-between">--}}
{{--                        <div class="quota">--}}
{{--                            <i class="lni-quotation"></i>--}}
{{--                        </div>--}}
{{--                        <div class="star">--}}
{{--                            <ul>--}}
{{--                                <li><i class="lni-star-filled"></i></li>--}}
{{--                                <li><i class="lni-star-filled"></i></li>--}}
{{--                                <li><i class="lni-star-filled"></i></li>--}}
{{--                                <li><i class="lni-star-filled"></i></li>--}}
{{--                                <li><i class="lni-star-filled"></i></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="testimonial-text">--}}
{{--                        <p class="text" style="color: darkgray">Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam nonu eirmod--}}
{{--                            tempor invidunt labore.Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam--}}
{{--                            nonu.</p>--}}
{{--                    </div>--}}
{{--                    <div class="testimonial-author d-flex align-items-center">--}}
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
    </div> <!-- container -->
</section>
<!-- END Customer Say -->


<!-- Blog Posts -->
<section id="testimonial" class="testimonial-area pt-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="section-title text-center pb-40">
                    <div class="line m-auto"></div>
                    <h3 class="title mt-5">آخرین مطالب</h3>
                </div> <!-- section title -->
            </div>
        </div> 

         <div class="container mt-5 ">
        <div class="row d-flex justify-content-around">

                    <div class="card p-3 hover-style ml-2" style="width: 20rem;">
                        <img class="card-img-top img-border" src="{{asset('images/learnia-image.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        </div>
                    </div>

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

            </div>
        </div>

</div> <!-- container -->
</section>
<!-- End BLog Posts -->


@endsection
