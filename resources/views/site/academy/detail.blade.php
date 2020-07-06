@extends('site.Layouts.layout_landing')
@section('Head')
    <title> لرنیا آکادمی | لرنیا </title>
    <meta name="description" content="لرنیا آکادمی  | لرنیا ">
    <meta name="keywords" content="نقشه راه لرنیا,چارت آموزشی لرنیا ,لرنیا آاکادمی">
@endsection

@section('text_landing')
<img style="width: 480px; height: 350px" src="{{asset('images/Header_Academy.png')}}" alt="">
@endsection

@section('pic_landing')
<img class="learn-bg mt-5" src="{{asset('images/Academy/Academy_Detail.svg')}}" alt="">
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
            <!-- Back Tree Button -->
            @if(isset($_GET['pk_parent']))
            @if($_GET['level'] - 1 != 0)
            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                <a href="{{route('academy.detail',['pk_parent'=>$_GET['pk_parent'],'level'=> $_GET['level'] - 1])}}"> 
                  <button class="btn btn-primary mt-4 d-inline" style="font-size:15px;margin-bottom:10px">بازگشت</button>
                </a>
                </div>  
            @else
            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                <a href="{{route('academy.detail')}}"> 
                  <button class="btn btnLearniaa mt-4 d-inline" style="font-size:15px;margin-bottom:10px">بازگشت</button>
                </a>
                </div>  
            @endif     
            @endif
            <!-- Back Tree Button -->
                    
               <!-- Card -->
             @foreach($nodes as $node)
                <div class="col-lg-4 col-md-4 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s"
                         data-wow-delay="0.5s" 
                         style="border: 2px solid #20c5ba; border-radius: 10px;">
                        <div class="services-icon">
                        @if(isset($node->pic))
                        <img class="shape" src="{{asset('images/services-shape.svg')}}" alt="shape">
                            <img class="shape-1" src="{{asset('images/services-shape-1.svg')}}" width="90px" alt="shape-1">
                            <img class="shape-1" style="top:52%;left:45%"src="{{  Storage::url('tree/'.$node->icon) }}" width="50px" alt="{{ $node->name }}">
                            <i class="lni-cog"></i>
                        @else
                        <img class="shape" src="{{asset('images/services-shape.svg')}}" alt="shape">
                            <img class="shape-1" src="{{asset('images/services-shape-1.svg')}}"
                             width="90px" alt="shape-1">
                            <i class="lni-cog"></i>
                        @endif    
                        </div>
                        <div class="services-content text-center">
                            <h6 class="text-black-50">{{ $node->name }}</h6>
                            <span style="margin-top: 10px;"></span>
                           
                            <div class="row text-center">
                            <div class="col-12 col-md-12">
                            <a href="{{route('academy.course',['pk_tree'=>$node->pk_tree])}}"> 
                            <button class="btn btnGreen mt-4 d-inline" style="font-size:15px">شروع دوره</button>
                            </a>
                            </div>
                            </div>
                            
                            <div class="row text-center">
                            <div class="col-12 col-md-12">
                            <button  type="button" class="btn fourth mt-4 d-inline"
                             onclick="Modal_Show( Modal{{ $node->pk_tree }} )"
                             data-toggle="modal" data-target="#Modal{{ $node->pk_tree }}">اطلاعات دوره </button>
                             </div>
                             </div>

                             <div class="row text-center">
                             <div class="col-12 col-md-12">
                             <a href="{{route('academy.detail',['pk_parent'=>$node->pk_tree,'level'=> $node->level + 1])}}"> 
                            <button class="btn btnLearniaa mt-4 d-inline" style="font-size:15px">مشاهده دوره های بیشتر</button>
                            </a>
                            </div>
                            </div>

                            <!-- Modal Description Box -->                      
                                <div class="modal fade" dir="rtl" id="Modal{{ $node->pk_tree }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel{{ $node->pk_tree }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:1000px">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalLabel{{ $node->pk_tree }}">اطلاعات دوره</h5>
                                    </div>

                                    <div class="modal-body">
                                    <!-- Form &  Body -->
                                    
                                        <div class="card-body px-lg-1 py-lg-1">
                                            <div class="row" style="text-align:justify">   
                                            @php echo htmlspecialchars_decode( $node->description) ; @endphp
                                            </div>
                                            </div>

                                        <!-- Form &  Body -->
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary"  data-dismiss="modal">بستن</button>
                                       
                                    </div>
                                    </div>
                                </div>
                                </div>

                                <script>
                                function Modal_Show(pk_tree)
                                { $("#Modal"+pk_tree).show(); }
                                </script>
                                
                            <!-- Modal Description Box -->
                               
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
