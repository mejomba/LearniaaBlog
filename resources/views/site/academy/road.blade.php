@extends('site.Layouts.layout_main')
@section('Head')
    <title> لرنیا آکادمی | لرنیا </title>
    <meta name="description" content="لرنیا آکادمی  | لرنیا ">
    <meta name="keywords" content="نقشه راه لرنیا,چارت آموزشی لرنیا ,لرنیا آاکادمی">
@endsection
@section('content')

<<<<<<< HEAD


<!-- Blog Posts -->
<section id="testimonial" class="testimonial-area pt-120">
    <div class="container-fluid">

    {{--    <div class="row justify-content-center"> --}}
        {{--     <div class="col-lg-5"> --}}
            {{--      <div class="section-title text-center pb-40"> --}}
                {{--       <h3 class="title mt-5">آخرین مطالب</h3> --}}
                    {{--     </div> <!-- section title --> --}}
                {{--     </div> --}}
            {{--  </div>  --}}


         <div class="container-fluid">
        <div class="row d-flex ">
        <div class="col-md-1">
</div>
<div class="col-md-5 col-sm-12" >

                 <div class="card shadow border-0 " >
                    <div class="card-header" style="background-color:#20C5BA ">
                            <div class="text-center"><h2 style="font-size:35px">مسیر آموزش کامپیوتر مبتدیان</h2>
                        </div>
                    </div>
                    <img class="card-img-top img-border"
                    src="{{ asset('images/Template/RoadMap_BeginnerTree.jpg') }}"
                      width="900px" height="330px" alt="Card image cap">
                      <div class="card-body text-center ">
                            <h5 class="card-title "></h5>
                            <p class="card-text">
                            در این دوره توانایی کار با رایانه و ویندوز ، اینترنت و نرم افزارهای کاربردی آموزش داده شده است
                            </p>
                <!-- Full Pack Sale -->
                </div>

                <div class="card p-3 hover-style ml-2 mr-2" style="margin-bottom:5px;">
                <form action="{{route('product.pay', $pkProduct_BeginnerTree )}}" method="POST">
                    <div class="row">
                        @csrf
                        <input type="hidden" name="LocationUser" value="Academy_Product">
                        <input type="hidden" name="NameProduct" value="All_Cource">
                        <div class="col-md-6 col-12">
                            <img class="img-fluid  rounded-circle shadow-sm"
                                 style="border-radius:40% !important;margin-bottom:5px"
                                 src="{{  Storage::url('tree/'.'Profile_AllCource_BeginnerTree.png') }}"
                                 width="70px" height="70px" alt="Profile_AllCource_BeginnerTree">
                            <span style="font-size:16px;"> پکیج کامل آموزش کامپیوتر </span>
                        </div>

                        @if(Auth::check())
                            @if($payment_status == "Payed" )
                            <div class="col-md-3 col-12 text-center" style="margin-top:15px">
                            <span style="color:green"> 200,000 </span>
                            <span style="color:green">   تومان </span>
                            </div>
                            <div class="col-md-3 col-12 text-center">
                                    <button class="btn btn-warning" disabled
                                            type="submit"
                                            style="border-radius:20px;background-color:#30D533;border-color:#30D533;margin-bottom:5px;margin-top:10px">
                                        <span
                                            style="margin-top:5px;font-size:16px;color: #FFFFFF;line-height:0;">خرید</span>
                                    </button>
                                </div>
                            @else
                            <div class="col-md-3 col-12 text-center" style="margin-top:15px">
                            <span style="color:green"> 200,000 </span>
                            <span style="color:green">   تومان </span>
                            </div>
                            <div class="col-md-3 col-12 text-center">
                                    <button class="btn btn-warning "
                                            type="submit"
                                            style="border-radius:20px;background-color:#30D533;border-color:#30D533;margin-bottom:5px;margin-top:10px">
                                        <span
                                            style="margin-top:5px;font-size:16px;color: #FFFFFF;line-height:0;">خرید</span>
                                    </button>
                                </div>
                            @endif
                        @else
                        <div class="col-md-3 col-12 text-center" style="margin-top:25px">
                            <span style="color:green"> 200,000 </span>
                            <span style="color:green">   تومان </span>
                            </div>
                            <div class="col-md-3 col-12 text-center">
                                <button class="btn btn-warning "
                                        type="submit"
                                        style="border-radius:20px;background-color:#30D533;border-color:#30D533;margin-bottom:5px;margin-top:10px">
                                    <span
                                        style="margin-top:5px;font-size:16px;color: #FFFFFF;line-height:0;">خرید</span>
                                </button>
                            </div>
                        @endif
                    </div>
                </form>
=======
    <div class="row">
        <div class="col-lg-6 col-md-10 col-sm-12 col-12"
         style=" margin-top: 35px!important; border-bottom-right-radius: 50px!important;border-bottom-left-radius: 50px!important;">
        
         <div class="row" >
                <div class="col-md-12  ml-auto mr-auto text-center"   >
                    
                <a href="{{route('academy.detail')}}">
                  <button class="btn btn-secondary mt-4 d-inline" style="font-size:15px;margin-bottom:10px">بازگشت</button>
                </a>
              </div>
          </div>    

            <div class="card shadow border-0"  >
                <div class="card-header" style="background-color:#20C5BA ">
                    <div class="text-center">
                        <h2 style="font-size:30px"> {{$tree->name}}</h2>
                    </div>
                </div>
                <img class="card-img-top img-border"
                     src="{{  Storage::url('tree/'.$tree->course['pic'])  }}"
                     width="900px" height="270px" alt="Card image cap">
                <div class="card-body text-center ">
                    <h5 class="card-title "></h5>
                    <p class="card-text">
                    </p>
                    <!-- Full Pack Sale -->
                </div>

                <div class="border p-3 hover-style ml-2 mr-2 mb-3" style="border-radius: 20px;text-align: center;background-color: #20c5ba;color: white;">
                اطلاعات و آگاهی های ما در کادر پایین بخون و تصمیم بگیر
               
                </div>

               
>>>>>>> 30f4994b56fb535dc6883102bbabc8b330891212
            </div>
        </div>
    </div>



{{-- infomation Section starts --}}

            <div class="row" >
                    <div class="col-md-12  ml-auto mr-auto text-center" style="margin-top:10px"  >
                    
                    <a href="{{route('academy.course',['pk_tree'=>$tree->pk_tree])}}"> 
                            <button class="btn fourth mt-4 d-inline" style="font-size:15px">شروع یادگیری</button>
                            </a> 
                     </div>
                </div>

<<<<<<< HEAD
                <div class="row " style="margin-top:15px">
                    <div class="col-md-8 card p-3 hover-style ml-auto mr-auto" >
                    <ul class="timeline">
                    @foreach($nodes as $node)
                        <li>
                         <!-- Data -->
                            <div class="row" id="row">

                            <div class="col-md-11 card p-3 ml-3" >

                                <div class="card-title" id="{{'id'.$node['pk_product']}}">
                                        <div class="row">
                                            <div class="col-md-1 col-12 text-center">
                                    <a href="{{ route('academy.show', ['id' => $node['pk_product'] , 'desc' =>  $node['name'] ]) }}">
                                        <img class="img-fluid  rounded-circle shadow-sm" style="border-radius:30% !important;"
                                            src="{{  Storage::url('tree/'.$node['pic']) }}"
                                            width="50px" height="50px" alt="{{$node['name']}}"></a>


                                            </div>

                                            <div class="col-md-4 col-12 text-center">
                                            <a class="mb-0">
                                                <button class="btn btn-link dropdown-toggle" style="white-space:normal; " data-toggle="collapse" data-target="#{{'collapse'.$node['pk_product']}}" aria-expanded="false" aria-controls="{{'collapse'.$node['pk_product']}}">
                                                {{$node['name']}}
                                                </button></a>
                                                </div>

                                            <div class="col-md-4 col-12 text-center" style="margin-top:13px">
                                            <span style="color:green">  {{$node->product['price']}} </span>
                                            <span style="color:green">   تومان </span>
                                            </div>

                                            <div class="col-md-2 col-12 text-center">
                                            @if(Auth::check())
                                        @if($payment_status == "Payed" )
                                            <a href="{{ route('academy.show', ['id' => $node['pk_product'] , 'desc' =>  $node['name'] ]) }}"
                                               class="btn btn-warning btn-round"
                                               style="font-size:14px;background-color:#30D533;border-color:#30D533;">
                                                مشاهده </a>
                                        @else
                                            <a href="{{ route('academy.show', ['id' => $node['pk_product'] , 'desc' =>  $node['name'] ]) }}"
                                               class="btn btn-warning btn-round"
                                               style="font-size:14px;">
                                                مشاهده </a>
                                        @endif
                                    @else
                                        <a href="{{ route('academy.show', ['id' => $node['pk_product'] , 'desc' =>  $node['name'] ]) }}"
                                           class="btn btn-warning btn-round"
                                           style="font-size:14px;">
                                            مشاهده </a>

                                    @endif
                                            </div>



                                      </div>

                                </div>

                                <div id="{{'collapse'.$node['pk_product']}}" class="collapse" aria-labelledby="{{'id'.$node['pk_product']}}" data-parent="#row">
                                <div class="card-text">
                                @php echo $node['description'] ; @endphp
                             </div>
                                </div>
                            </div>
                            </div>
                        <!-- Data -->
                       </li>
                    @endforeach
                </ul>

               </div>
             </div>

            </div>
        </div>
=======
                <div class="row " style="margin-top:40px">
                    <div class="col-md-10 card p-3 hover-style ml-auto mr-auto"  >
                    @php echo htmlspecialchars_decode($tree['description']) ; @endphp
               </div>
             </div>
{{-- infomation Section ends --}}



  <!-- Card -->
  @foreach($nodes as $node)
                <div class="col-lg-4 col-md-6 col-sm-8 col-11 ml-auto mr-auto">
                    <div class="single-services text-center mt-3 wow fadeIn" data-wow-duration="1s"
                         data-wow-delay="0.5s"
                         style="border: 2px solid #20c5ba; border-radius: 10px;">
                        <div class="services-icon">
                        @if(isset($node->icon))
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
                            <h6 class="text-black-100">{{ $node->name }}</h6>
                            <span style="margin-top: 10px;"></span>

                            <p class="mt-3">{{ $node->short_description }} </p>
                         
                            <div class="row text-center">
                            <div class="col-12 col-md-12">
                           
                            <a href="{{route('academy.road',['pk_tree'=>$node->pk_tree])}}"> 
                            <button class="btn fourth mt-4 d-inline" style="font-size:15px">آره همین!</button>
                            </a>

                            </div>
                            </div>
                            
                          
                           
                        </div>
                    </div>
                </div>
             @endforeach
             <!-- Card -->



>>>>>>> 30f4994b56fb535dc6883102bbabc8b330891212
 <!-- container -->
</section>
<!-- End BLog Posts -->


@endsection
