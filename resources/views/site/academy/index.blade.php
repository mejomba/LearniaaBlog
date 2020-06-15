@extends('site.Layouts.layout_landing')
@section('Head')
    <title> لرنیا | وب سایت آموزش آنلاین </title>
    <meta name="description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد">
    <meta name="keywords" content="آموزش آنلاین,آموزش مبتدی کامپیوتر,یادگیری,لرنیا">
@endsection

@section('text_landing')
<img style="width: 480px; height: 350px" src="{{asset('images/Header_Academy.png')}}" alt="">
@endsection

@section('pic_landing')
<img class="learn-bg mt-5" src="{{asset('images/Academy/Academy_index.svg')}}" alt="">
@endsection

@section('content')
<!-- Services -->
<div id="header" class="page-header container-fluid mt-4" data-parallax="true">
    <section id="features" class="services-area pt-120">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center pb-40">
                       

                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center" style="margin-top: 150px">
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s"
                         data-wow-delay="0.2s" style="border: 2px solid #20c5ba; border-radius: 10px; height: 450px">
                        <div class="services-icon">
                            <img class="shape" src="{{asset('images/services-shape.svg')}}" alt="shape">
                            <img class="shape-1" src="{{asset('images/services-shape-1.svg')}}" width="90px" alt="shape-1">
                            <img class="shape-1" style="top:52%;left:45%"src="{{asset('images/Academy/icon_Design_WebDesign.svg')}}" width="50px" alt="shape-1">
                            <i class="lni-baloon"></i>
                        </div>
                        <div class="services-content">
                            <h6 class=""><a href="#" >دوره های اموزش  طراحی وب</a></h6>
                            <span style="margin-top: 10px;">(شامل اصول طراحی - طراحی وب)</span>
                            <p class="mt-3">
                          در این دوره ها به یادگیری مفاهیم طراحی در حوزه های مختلف به همراه آموزش های متنوع ارائه می شود</p>
                            <a href="{{route('academy.start')}}"> 
                            <button class="btn fourth mt-4 d-inline" style="font-size:15px">شروع دوره</button>
                            </a>                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s"
                         data-wow-delay="0.5s" style="border: 2px solid #20c5ba; border-radius: 10px; height: 450px">
                        <div class="services-icon">
                        <img class="shape" src="{{asset('images/services-shape.svg')}}" alt="shape">
                            <img class="shape-1" src="{{asset('images/services-shape-1.svg')}}" width="90px" alt="shape-1">
                            <img class="shape-1" style="top:52%;left:45%"src="{{asset('images/Academy/icon_Beginner_Tree.svg')}}" width="50px" alt="shape-1">
                            <i class="lni-cog"></i>
                        </div>
                        <div class="services-content">
                            <h6 class="text-black-50"><a href="{{route('academy.start')}}">دوره های آموزش کامپیوتر مبتدیان</a></h6>
                            <span style="margin-top: 10px;">(ICDL شامل سطح ابتدایی و )</span>
                            <p class="mt-3">
                            در این دوره ها توانایی کار با رایانه و ویندوز ، اینترنت و نرم افزارهای کاربردی آموزش داده شده است</p>
                            <a href="{{route('academy.start')}}"> 
                            <button class="btn fourth mt-4 d-inline" style="font-size:15px">شروع دوره</button>
                            </a>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s"
                         data-wow-delay="0.8s" style="border: 2px solid #20c5ba; border-radius: 10px; height: 450px">
                        <div class="services-icon">
                        <img class="shape" src="{{asset('images/services-shape.svg')}}" alt="shape">
                            <img class="shape-1" src="{{asset('images/services-shape-1.svg')}}" width="90px" alt="shape-1">
                            <img class="shape-1" style="top:52%;left:45%"src="{{asset('images/Academy/icon_Beginner_Programing.svg')}}" width="50px" alt="shape-1">
                            <i class="lni-bolt-alt"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h6 class=""><a href="#" style="">دوره های اموزش  برنامه نویسی</a></h6>
                            <span style="margin-top: 10px;">(شامل اصول برنامه نویسی)</span>
                            <p class="mt-3">
                           در این دوره ها به یادگیری مفاهیم اولیه برنامه نویسی به همراه آموزش های اختصاصی انواع زبان های مختلف ارائه می شود</p>
                            <a href="{{route('academy.start')}}"> 
                            <button class="btn fourth mt-4 d-inline" style="font-size:15px">شروع دوره</button>
                            </a>                        </div>
                    </div> <!-- single services -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
</div>

<!-- END OF Services -->


<!-- Video LEARN -->
{{--   <div class="container" style="margin-top: 100px"> --}}
    {{--  <div class="text-center"> --}}
        {{--  <h3 class="font-weight-bold">فیلم اموزش کار با سایت</h3> --}}
            {{--  </div> --}}
       
                {{-- <div class="row mt-5"> --}}
                    {{--  <div class="col-lg-12"> --}}
                        {{--  <video class="afterglow" id="my-video" width="500" height="270" --}}
                            {{--   data-overscale="false" poster="{{ Storage::url('tree/Poster_Intro_Academy.jpg') }}" --}}
   {{--                    src="{{ Storage::url('Videos_Beginner_Tree/Video_IntroAcademy.mp4') }}"> --}}
   {{--            </video> --}}
    {{--          </div> --}}
        {{--      </div> --}}
            {{--   </div> --}}
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


@endsection
