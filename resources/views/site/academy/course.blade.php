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
                            <div class="text-center">
                            <h2 style="font-size:35px"> {{$tree->name}}</h2>
                        </div>
                    </div>
                    <img class="card-img-top img-border"
                    src="{{  Storage::url('tree/'.$tree->course['pic'])  }}"
                      width="900px" height="330px" alt="Card image cap">
                      <div class="card-body text-center ">
                            <h5 class="card-title "></h5>
                            <p class="card-text">
                            </p>
                <!-- Full Pack Sale -->
                </div>

                <div class="border p-3 hover-style ml-2 mr-2 mb-3" style="margin-bottom:5px;border: solid 1px grey">
                <form action="{{route('product.pay', $tree->pk_AllCourse_product )}}" method="POST">
                    <div class="row">
                        @csrf
                        <input type="hidden" name="LocationUser" value="Academy_Product">
                        <input type="hidden" name="NameProduct" value="All_Cource">
                        <div class="col-md-6 col-12">

                            <span style="font-size:18px;text-align:center;color:black">پکیج کامل {{$tree->name}} </span>
                        </div>

                        @if(Auth::check())
                            @if($payment_status == "Payed" )
                            <div class="col-md-3 col-12 text-center" style="margin-top:15px ; border-radius: 5px">
                            <span style="color:green"> {{$tree->product->price}} </span>
                            <span style="color:green">   تومان </span>
                            </div>
                            <div class="col-md-3 col-12 text-center">
                            <button class="btn btnGreen" type="submit">
                                <span>خرید</span>     
                                </button>
                                </div>
                            @else
                            <div class="col-md-3 col-12 text-center" style="margin-top:15px">
                            <span style="color:green">{{$tree->product->price}} </span>
                            <span style="color:green">   تومان </span>
                            </div>
                            <div class="col-md-3 col-12 text-center">
                            <button class="btn btnGreen" type="submit">
                                <span>خرید</span>     
                                </button>
                                </div>
                            @endif
                        @else
                        <div class="col-md-3 col-12 text-center" style="margin-top:25px">
                            <span style="color:green">{{$tree->product->price}} </span>
                            <span style="color:green">   تومان </span>
                            </div>
                            <div class="col-md-3 col-12 text-center">
                                <button class="btn btnGreen" type="submit">
                                <span>خرید</span>     
                                </button>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
      <!-- End OF Full Pack Sale -->

                        </div>
                    </div>
                </div>

                <div class="row " style="margin-top:15px">
                    <div class="col-md-8 card p-3  ml-auto mr-auto"  >
                    <ul class="timeline">
                    @foreach($courses as $course)
                        <li>
                         <!-- Data -->
                            <div class="row" id="row">

                            <div class="col-md-11 p-3 ml-3" style="border: solid 1px #20C5BA ; border-radius: 5px">

                                <div class="card-title" id="{{'id'.$course['pk_product']}}">
                                        <div class="row">
                                            <div class="col-md-1 col-12 text-center">
                                <!--    <a href="{{ route('academy.show', ['id' => $course['pk_product'] , 'desc' =>  $course['name'] ]) }}">
                                        <img class="card-img-top img-border" style="border-radius:30% !important;"
                                            src="{{  Storage::url('tree/'.$course->pic) }}"
                                            width="70px" height="50px" alt="{{$course['name']}}"></a>  -->


                                            </div>

                                            <div class="col-md-4 col-12 text-center">
                                            <a class="mb-0">
                                                <button class="btn btn-link dropdown-toggle" style="white-space:normal; " data-toggle="collapse" data-target="#{{'collapse'.$course['pk_product']}}" aria-expanded="false" aria-controls="{{'collapse'.$course['pk_product']}}">
                                                {{$course['name']}}
                                                </button></a>
                                                </div>

                                            <div class="col-md-4 col-12 text-center" style="margin-top:13px">
                                            <span style="color:green">  {{$course->product['price']}} </span>
                                            <span style="color:green">   تومان </span>
                                            </div>

                                            <div class="col-md-2 col-12 text-center">
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
                       </li>
                    @endforeach
                </ul>

               </div>
             </div>

            </div>
        </div>

</div> <!-- container -->
</section>
<!-- End BLog Posts -->


@endsection
