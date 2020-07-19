@extends('site.Layouts.layout_main')
@section('Head')
    <title> لرنیا آکادمی | لرنیا </title>
    <meta name="description" content="لرنیا آکادمی  | لرنیا ">
    <meta name="keywords" content="نقشه راه لرنیا,چارت آموزشی لرنیا ,لرنیا آاکادمی">
@endsection
@section('content')

<!-- Blog Posts -->
<section class="container-fluid">

    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-10 col-12 " style="margin-top:100px !important;
    border-bottom-right-radius: 50px!important;
    border-bottom-left-radius: 50px!important;">
            <div class="card shadow border-0"  >
                <div class="card-header" style="background-color:#20C5BA ">
                    <div class="text-center">
                        <h2 style="font-size:30px"> مسیر یادگیری شما</h2>
                    </div>
                </div>
                <img class="card-img-top img-border"
                     src="{{ asset('images/Academy/Academy_Road.svg') }}"
                     width="900px" height="250px" alt="Card image cap">
                <div class="card-body text-center ">
                    <h5 class="card-title "></h5>
                    <p class="card-text">
                    </p>
                    <!-- Full Pack Sale -->
                </div>
                <div class="border p-3 hover-style ml-2 mr-2 mb-3" style="border-radius: 20px;text-align: center;background-color: #20c5ba;color: white;">
                 یکی یکی دوره های زیر رو شروع به آموزش دیدن کن ...  موفق باشی ! 
               
                </div>
                <!--
                <div class="border p-3 hover-style ml-2 mr-2 mb-3" style="margin-bottom:5px;border: solid 1px grey">
                    <form action="{{route('product.pay', $tree->pk_AllCourse_product )}}" method="POST">
                        <div class="row">
                            @csrf
                            <input type="hidden" name="LocationUser" value="Academy_Product">
                            <input type="hidden" name="NameProduct" value="All_Cource">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-center">
                                <span class="text-center" style="margin-top:15px;font-size:18px;text-align:center;color:black">پکیج کامل {{$tree->name}} </span>
                            </div>

                            @if(Auth::check())
                                @if($payment_status == "Payed" )
                                    <div class="col-md-3 col-12 text-center" style="margin-top:15px ; border-radius: 5px">
                                        <span style="color:green"> {{$tree->product->price}} </span>
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
                                        <span style="color:green">{{$tree->product->price}} </span>
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
                                    <span style="color:green">{{$tree->product->price}} </span>
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
                </div>
                -->
            </div>
        </div>
    </div>



{{--================================TimeLine starts===========================--}}

                <div class="row " style="margin-top:60px">
                    <div class="col-lg-8 col-md-10 col-sm-11 col-11 border rounded-lg m-2 p-2 mx-auto"  >
                    <ul class="timeline">
                    @foreach($courses as $course)
                        <li>
                         <!-- Data -->
                            <div class="row" id="row">

                            <div class="col-lg-11 col-md-10 col-sm-11 col-11 pt-3 ml-3 hover-style k-cursor-pointer" style="border: solid 1px #20C5BA ; border-radius: 5px">

                                <div class="card-title" id="{{'id'.$course['pk_product']}}">
                                        <div class="row">
                                            <div class="col-md-1 col-12 text-center">
                           
                                            </div>

                                            <div class="col-md-4 col-12 text-center">
                                            <a class="mb-0">
                                                <button class="btn btn-link dropdown-toggle" style="white-space:normal; " data-toggle="collapse" data-target="#{{'collapse'.$course['pk_product']}}" aria-expanded="false" aria-controls="{{'collapse'.$course['pk_product']}}">
                                                {{$course['name']}}
                                                </button></a>
                                                </div>

                                            <div class="col-md-4 col-12 text-center" style="margin-top:13px">
                                            @if($course->product['price'] != 0)
                                            <span style="color:green">  {{$course->product['price']}} </span>
                                            <span style="color:green">   تومان </span>
                                            @endif
                                            @if($course->product['price'] == 0)
                                            <span style="color:green">   رایگان </span>
                                            @endif
                                            </div>

                                            <div class="col-md-2 col-12 text-center mt-lg-0 mt-md-0 mt-sm-3 mt-3">
                                            @if(Auth::check())
                                        @if($payment_status == "Payed" )
                                            <a href="{{ route('academy.show', ['id' => $course['pk_product'] , 'desc' =>  $course['name'] ]) }}"
                                               class="btn fourth btn-round">مشاهده </a>
                                              
                                                
                                        @else
                                            <a href="{{ route('academy.show', ['id' => $course['pk_product'] , 'desc' =>  $course['name'] ]) }}"
                                               class="btn fourth btn-round">مشاهده </a>
                                               
                                                
                                        @endif
                                    @else
                                        <a href="{{ route('academy.show', ['id' => $course['pk_product'] , 'desc' =>  $course['name'] ]) }}"
                                           class="btn fourth btn-round">  مشاهده </a>
                                          
                                          

                                    @endif
                                            </div>



                                      </div>

                                </div>

                                <div id="{{'collapse'.$course['pk_product']}}" class="collapse" aria-labelledby="{{'id'.$course['pk_product']}}" data-parent="#row">
                                <div class="card-text">
                                @php echo $course['description'] ; @endphp
                             </div>
                                </div>
                            </div>
                        <!-- Data -->
                            </div>
                       </li>

                    @endforeach
                </ul>

               </div>
             </div>
{{--======================timeLine ends===================--}}


 <!-- container -->
</section>
<!-- End BLog Posts -->


@endsection
