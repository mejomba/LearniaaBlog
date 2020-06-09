@extends('site.Layouts.layout_main')
@section('Head')
    <title> لرنیا آکادمی | لرنیا </title>
    <meta name="description" content="لرنیا آکادمی  | لرنیا ">
    <meta name="keywords" content="نقشه راه لرنیا,چارت آموزشی لرنیا ,لرنیا آاکادمی">
@endsection
@section('content')



<!-- Blog Posts -->
<section id="testimonial" class="testimonial-area pt-120">
<div class="container-fluid">
<div class="row d-flex ">
<!-- Content -->
<!-- Services -->
<div id="header" class="page-header container-fluid" data-parallax="true">
    <section id="features" class="services-area pt-120">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center pb-40">
                       

                    </div> <!-- section title -->
                </div>
            </div>
          <!-- row -->
            <div class="row justify-content-center" style="margin-top: 150px">
               <!-- Card -->
             @foreach($nodes as $node)
                <div class="col-lg-6 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s"
                         data-wow-delay="0.5s" 
                         style="border: 2px solid #f1c40f; border-radius: 10px;">
                        <div class="services-icon">
                            <img class="shape" src="{{asset('images/services-shape.svg')}}" alt="shape">
                            <img class="shape-1" src="{{asset('images/services-shape-1.svg')}}"
                             width="70px" alt="shape-1">
                            <i class="lni-cog"></i>
                        </div>
                        <div class="services-content">
                            <h6 class="text-black-50">{{ $node->name }}</h6>
                            <span style="margin-top: 10px;"></span>
                            <a href="{{route('academy.detail',['pk_parent'=>$node->pk_tree,'level'=> $node->level + 1])}}"> 
                            <button class="btn btn-primary mt-4 d-inline" style="font-size:15px">مشاهده آگاهی بیشتر</button>
                            </a>
                            <a href="{{route('academy.course',['pk_tree'=>$node->pk_tree])}}"> 
                            <button class="btn fourth mt-4 d-inline" style="font-size:15px">شروع دوره</button>
                            </a>
                          
                                <p class="mt-3">
                                @php echo htmlspecialchars_decode( $node->description) ; @endphp
                                </p> 
                        </div>
                    </div> 
                </div>
             @endforeach
             <!-- Card -->
            </div>
             <!-- row -->
        </div> <!-- container -->
    </section>
</div>

<!-- END OF Services -->
<!-- Content -->      
</div>
</div>

</section>
<!-- End BLog Posts -->


@endsection
