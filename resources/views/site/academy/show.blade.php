@extends('site.Layouts.layout_main')
@section('Head')
    <title>لرنیا | {{$product['title']}} </title>
    <meta name="description" content="{{$product['desc']}}">
    <meta name="keywords" content="@php echo implode(',',$meta_keywords); @endphp">
@endsection
@section('content')

        <!---- RoadMap Help Section --->
<div class="row" style="padding-left: 10px!important">
     <div class="col-md-2 col-12" style="padding-top:15px; margin-top: 100px!important;
    border-bottom-right-radius: 50px!important;
    border-bottom-left-radius: 50px!important;">
            @if(isset($nodes_previous['pk_product']))
                <a href="{{ route('academy.show', ['id' => $nodes_previous['pk_product'] , 'desc' =>  $nodes_previous['name'] ]) }}"
                   class="btn fourth mt-4 d-inline" style="font-size:19px" >قسمت قبلی </a>      
            @endif
        </div>

        <div class="col-md-2 col-12" style="padding-top:15px ; margin-top:145px!important">
            <a href="{{ route('academy.course',['pk_tree' => $current_pk_tree])}}" class="btn btnLearniaa mt-4 d-inline"
             style="font-size:19px; "> لیست پخش  </a>     
        </div>

        <div class="col-md-2 col-12" style="padding-top:15px ; margin-top:145px!important">
            @if(isset($nodes_next['pk_product']))
                <a href="{{ route('academy.show', ['id' => $nodes_next['pk_product'] , 'desc' =>  $nodes_next['name'] ]) }}"
                   class="btn fourth mt-4 d-inline"  style="font-size:19px"> قسمت بعدی </a>
            @endif
        </div>
</div>
 <!---- RoadMap Help Section --->

  <!-- Title --->
<div class="row" style="padding-top:30px;">
        <div class="col-md-7 text-center" style="padding-top: 5px;">
                <button class="btn mt-4 d-inline BtnLearniaaColor" >
                    <h2 style="color:#FFFFFF" class="text-center">{{$product['title']}}</h2>
                </button>

      </div>
      </div>
 <!-- Title --->

  <!-- Information -->
  <div class="row">
        <div class="col-md-7 text-center">
            <div class="container-fluid" style="margin-top:30px">
                <div style="border-bottom:2px solid #20c3b8;margin-bottom:5px">
                    <h3> اطلاعات دوره <h3>
                </div>
                <!-- Information Product -->
                <div class="container-fluid">
                    <div class="row text-center" style="padding-top:25px;padding-bottom:15px;">

             <div class="col-md-9">
                 <div class="row">
                        <div class="col-4 col-md-4" style="font-size:13px">
                                <img src="{{ asset('images/Template/price-tag.svg') }}"
                                    alt="Learniaa" height="42px" width="62px">
                            </div>
                            <div class="col-4 col-md-4" style="font-size:13px">
                                <img src="{{ asset('images/Template/stopwatch.svg') }}"
                                    alt="Learniaa" height="42px" width="62px">
                            </div>
                            <div class="col-4 col-md-4" style="font-size:13px">
                                <img src="{{ asset('images/Template/video-camera.svg') }}"
                                    alt="Learniaa" height="42px" width="62px">
                            </div>

                        <!--Row 2 -->
                        <div class="col-4 col-md-4" style="font-size:15px">
                            <div class="row text-center">
                                <div class="col-12 col-md-12">
                    <span style="padding-right:5px"> @php
                            if($product['price'] != 0)
                            {
                              echo '  '.number_format($product['price']) ;

                            }
                            else
                            {

                            }
                        @endphp
                                </span>
                                </div>
                                <div class="col-12 col-md-12">
                                    @php
                                        if($product['price'] != 0)
                                        {
                                          echo 'تومان';
                                        }
                                        else
                                        {
                                          echo 'رایگان';
                                        }
                                    @endphp
                                </div>
                            </div>
                        </div>
                        <div class="col-4 col-md-4" style="font-size:13px">
                            <div class="row text-center">
                                <div class="col-12 col-md-12">
                                    {{ $product->time }}
                                </div>
                                <div class="col-12 col-md-12">
                                    دقیقه
                                </div>
                            </div>
                        </div>
                        <div class="col-4 col-md-4" style="font-size:13px">
                            <div class="row text-center">
                                <div class="col-12 col-md-12">
                                    {{ $product->count }}
                                </div>
                                <div class="col-12 col-md-12">
                                    درس
                                </div>
                            </div>
                        </div>
                        <!-- Row 2 -->

                      </div>
                 </div>

                 <div class="col-md-3 col-12" style="font-size:13px">
                   <!-- Payment -->
                    @if($payment_status == "Payed" || $product['price'] == 0 )
                        <div class="col-md-12 text-center" >
                            <a style="padding-bottom : 5px" _target="blank"
                               href="{{ $product['download_link'] }}"
                               class="btn fourth btn-video btnblogPost">دانلود آموزش</a>
                        </div>
                        </div>
                    @else
                        <div class="col-md-12 text-center" >
                            <form action="{{route('product.pay', $product['pk_product'] )}}" method="POST">
                                @csrf
                                <input type="hidden" name="LocationUser" value="Academy_Product">
                                <input type="hidden" name="NameProduct" value="{{$product['title']}}">
                                <button class="btn btnGreen"  type="submit">خرید دوره</button>
                                   
                            </form>
                        </div>
                         <!-- All Cource -->
                        </div>
                    @endif
            <!-- Payment -->
            </div>

                </div>
            </div>
        </div>
  <!-- Information -->



   <!-- JW Player Video  -->
                <div class="row">
                    <div class="col-12 col-md-7">
                    <div class="container-fluid"
                        style="padding-top: 5px;margin-left: 0px;margin-right: 0px;padding-left: 0px;padding-right: 0px">
                        <div class="container-fluid"
                            style="margin-left: 0px;margin-right: 0px;padding-left: 0px;padding-right: 0px">
                            <script type="text/javascript" src="//cdn.jsdelivr.net/npm/afterglowplayer@1.x"></script>
                            @php
                                if($payment_status == "Payed" || $product['price'] == 0 )
                            {
                                echo $product['file'] ;
                            }
                            else
                            {
                                echo $product['preview'] ;
                            }
                            @endphp
                        </div>
                    </div>
                    </div>
<!-- JW Player Video  -->


     <!-- Section Learner -->
          <div class="col-12 col-md-5">
            <div class="container-fluid" style="padding-bottom:15px;;font-size:15px;">
                <h3> اطلاعات مدرس <h3>
            </div>
            <div class="container-fluid" style="padding-bottom:15px;;font-size:15px">
                <div class="row" >
                    <div class="col-md-3 col-3">
                        <img src="{{  Storage::url('learner/'.$product->learner['pic'])  }}"
                             alt="{{$product->learner->user['name']}}" class="img-fluid rounded-circle shadow-lg"
                             style="width: 90px;height:90px">
                    </div>
                    <div class="col-md-9 col-9" style="padding-top: 3px;">
                        <div class="row">
                            {{$product->learner->user['name']}}
                        </div>
                        <div class="row" style="padding-top: 9px;">
                            {{$product->learner['job']}}
                        </div>
                    </div>
                    <div class="col-md-12 text-center" style="font-size:15px">
                        <div class="bordercardinfoLearner aboutAuthor  wi-100 flex-row jus-between al-start">
                            <div class="cardinfoLearner">درباره مدرس</div></div>
                           <div class="p-3 hover-style  container"
                            style="margin-top:10px;border :2px solid #20c5ba"> <p style="text-align:justify">
                                {{$product->learner['desc']}}
                            </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
      </div>
   <!-- Section Learner -->



    <!-- Samte Chap -->
    <!-- post meta section -->
    <div class="row">
        <div class="col-md-7 col-12">
            <div class=" p-3 hover-style  container-fluid"
             style="margin-top:10px;text-align:justify;border :2px solid #20c5ba">
                <h3>درباره دوره</h3>
                @if($product['desc'] == null)
                @php echo htmlspecialchars_decode($tree['description']) ; @endphp
                @endif
                @if($product['desc'] != null)
                @php echo htmlspecialchars_decode($product['desc']) ; @endphp
                @endif
            </div>
            <p></p>
            <p></p>
            <p></p>
        </div>
    </div>
    </div>
    </div>
    <!-- Samte Rast --->

    </div>
    </div>
    </div>
@endsection






