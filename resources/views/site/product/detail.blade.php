@extends('site.Layouts.layout_main')

@section('Head')
                   
 <title>لرنیا | {{$product['title']}} </title>
 <meta  name="description" content="{{$product['desc']}}">
 <meta  name="keywords" content="@php echo implode(',',$meta_keywords); @endphp" >                  
@endsection

@section('content')


<div class="row"style="padding-top:30px">
<div class="col-md-8" >

    <div class="row" style="padding-top: 5px;padding-left:15px;padding-right:15px" >

    <button class="btn btn-round btnblogPost btn-title" style="border-radius:10px" >
              <h2 style="color:#FFFFFF" class="text-center">{{$product['title']}}</h2>  
          </button>

                    <!-- JW Player Video  -->
                    <!-- Without Blade Becuase Convert to String -->
          <div class="container-fluid" style="padding-top: 5px;margin-left: 0px;margin-right: 0px;padding-left: 0px;padding-right: 0px">
                <div class="container-fluid" style="margin-left: 0px;margin-right: 0px;padding-left: 0px;padding-right: 0px" >


                <script type="text/javascript" src="//cdn.jsdelivr.net/npm/afterglowplayer@1.x"></script>
                   @php
                   if($payment_status == "Payed" || $product->price == 0 )
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
              <!-- JW Player Video  -->
                    <!-- Without Blade Becuase Convert to String -->

          
  </div>
  </div>
  <!-- Samte Chap -->

  <div class="col-md-4">
          <div class="container-fluid">
              <div style="border-bottom:2px solid #20c3b8;margin-bottom:5px">
                <h3> اطلاعات دوره <h3>
              </div>

      <!-- Information Product -->
      <div class="container-fluid">
          <div class="row text-center" style="padding-top:25px;padding-bottom:15px;">
        
              <div class="col-4 col-md-4"  style="font-size:13px">
              <img src="{{ asset('images/Template/price-tag.svg') }}" 
              alt="Learniaa" height="42px" width="62px">
              </div>

                <div class="col-4 col-md-4" style="font-size:13px">
                <img src="{{ asset('images/Template/stopwatch.svg') }}" 
                alt="Learniaa" height="42px" width="62px">
                </div>

                <div class="col-4 col-md-4"  style="font-size:13px">
                <img src="{{ asset('images/Template/video-camera.svg') }}" 
                alt="Learniaa" height="42px" width="62px">
                </div>

        </div>


        <div class="row" >
          <div class="col-4 col-md-4"  style="font-size:15px">

              <div class="row text-center">
                <div class="col-12 col-md-12">
                    <span style="padding-right:5px" > @php 
                                if($product->price != 0)
                                {
                                  echo '  '.number_format($product->price) ;
                                
                                }
                                else
                                {
                                  
                                }
                                @endphp
                                </span>
                </div>

                <div class="col-12 col-md-12">
                        @php
                        if($product->price != 0)
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

          <div class="col-4 col-md-4"  style="font-size:13px">
        
            <div class="row text-center">
                <div class="col-12 col-md-12">
                {{ $product->count }}
                </div>
                <div class="col-12 col-md-12">
                درس
                </div>
                </div>             

          </div>




      </div>





                    <!-- Payment -->

                    @if($payment_status == "Payed" || $product->price == 0 )

                    <div class="col-md-12 text-center" style="padding-top:35px">
                    <a style="padding-bottom : 5px" _target="blank" 
                    href="{{ $product['download_link'] }}"  
                    class="btn btn-primary btn-video btnblogPost">دریافت فایل</a>

                    </div>
                    @else
                                      <div class="col-md-12 text-center" style="padding-top:35px">
                                            <form action="{{route('product.pay', $product['pk_product'] )}}" method="POST">
                                              @csrf
                                              <input type="hidden" name="LocationUser" value="Academy_Product">
                                              <input type="hidden" name="NameProduct" value="{{$product['title']}}">
                                              <button   class="btn btn-warning" 
                                                              
                                                  type="submit" style="border-radius:10px;background-color:#30D533;border-color:#30D533;" >
                                                  <h5 style="margin-top:5px;font-size:16px;color: #FFFFFF;line-height:1;">خرید دوره </h5>
                                                  
                                                                  </button>
                                                                  </form>  
                                                </div>
                                @endif               

                                    

                    </div>
                    </div>

          <!-- Section Learner -->

      <div style="border-bottom:2px solid #20c3b8;margin-bottom:5px;margin-top:20px;">
      <h3> اطلاعات مدرس <h3>
      </div>


          <div class="container-fluid" style="padding-top:15px;padding-bottom:15px;;font-size:15px">

            <div class="row" style="margin-top:10px">
                  
                      <div class="col-md-4 col-4">
                      <img src="{{  Storage::url('learner/'.$product->learner['pic'])  }}"
                      alt="{{$product->learner->user['name']}}" class="img-fluid rounded-circle shadow-lg" style="width: 90px;height:90px">
                      </div>
                      
                      <div class="col-md-8 col-8" style="padding-top: 3px;">
          
                        <div class="row">
                        {{$product->learner->user['name']}}
                        </div>
                        <div class="row" style="padding-top: 9px;">
                        {{$product->learner['job']}}
                        </div>

                    </div>
                  
                  
            </div>

            <div class="row" >

            <div class="col-md-1">
                      </div>
                      
                      <div class="col-md-9 text-center" style="font-size:15px">
                      <div  class="bordercardinfoLearner aboutAuthor  wi-100 flex-row jus-between al-start">
                      <div class="cardinfoLearner">درباره مدرس</div>

                      <p style="text-align:justify">
                      {{$product->learner['desc']}}
                      </p>

                      </div>
                    
                    </div>
                  
                    <div class="col-md-1">
                  </div>

            </div>

            <div class="row" style="margin-top:20px">

      <div class="col-md-1">
                </div>
                
                <div class="col-md-10 text-center" style="font-size:18px;">
                <p style="text-align:justify">
              
                </p>
              </div>
            
              <div class="col-md-1">
            </div>

      </div>

            
              </div>
      <!-- Section Learner -->
      </div>
      </div>
   </div>  

  <!-- Samte Chap -->

    <!-- post meta section -->

    <div class="row" >
        <div class="col-md-12">


                <div class="container-fluid"  style="margin-top:10px;border-bottom:2px solid #20c3b8;text-align:justify">
                <h3>درباره دوره</h3>
                @php echo htmlspecialchars_decode($product['desc']) ; @endphp 
                </div>
                

                <p></p>
                <p></p>
                <p></p>
                

            </div>
        </div>




    </div>
</div>

<!-- Samte Rast --->

 <!---(New Products)   Static Section -->
 <div class="container-fluid" style="padding-top:15px;padding-bottom:15px;;font-size:15px">

 <div class="row" style="margin-top:10px">

    <div class="col-md-8">

          <h3 class="" style=""> دوره های پیشنهادی </h3>
    </div>


  </div>

       <div class="row" style="margin-top:10px">

      
     
      <div class="col-md-12">

      <div class="card shadow">
                    <div class="card-body">

       

                    <div class="tab-pane active show " id="tab_text" role="tabpanel"  aria-labelledby="tab"> 
                             
                             <div class="container-fluid">
     
                              <div class="row"> 
                             
     
     
                                    @foreach($recent_Products as $product)
                                     
                                         <!-- Data -->
                                         <div class="col-md-4 div-transition"   style="background: white;margin-top:15px;box-shadow:0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);">
     
                                             <a  href="{{route('product.detail',  ['slug' => $product['pk_product'] , 'desc' =>  $product['title'] ]  )}}">
                                             <img  src="{{ Storage::url('product/'.$product['pic'])   }}"  alt="{{ $product['title'] }}" 
                                             class="img-raised rounded img-fluid" style="margin-top:15px;width: 500px;height: 250px;" ></a>
                                                                     
                                             <a class="text-muted" href="{{route('product.detail',  ['slug' => $product['pk_product'] , 'desc' =>  $product['title'] ]  )}}"> 
                                                 <h4 style="padding-top:10px;font-size: 20px;margin-bottom:0px" >{{$product['title']}}</h4>
                                                 </a>
     
                                                 <!-- Writer -->
                                      <div class="container-fluid" style="margin-top:20px">
                                                 <span class="" style="padding-top:40px;color:#000">
                                                 
                                                 @if($product->learner['pic'])
                                                 <img  src="{{ Storage::url('learner/'.$product->learner['pic'])  }}"  
                                                 alt="{{$product->learner->user['name']}}" class="img-raised rounded-circle img-fluid" style="width: 60px;height: 60px;" >
                                                 @else         
                                                 <img  src="{{ asset('images/Template/user.svg') }}" alt="Learniaa" height="40px" width="40px">
                                                 @endif
                                                 &nbsp;{{$product->learner->user['name']}}</span>
                                         </div>
                                                 <!-- Writer -->
     
     
                                                 <!-- Videos INFORMATION -->
                                                 <div class="container-fluid" style="margin-top:20px;padding-bottom:20px">
                                                 <div class="row">
     
                                                     <div class="col-4 col-md-4"  style="font-size:13px">
                                                     <img src="{{ asset('images/Template/price-tag.svg') }}" 
                                                     alt="Learniaa" height="42px" width="42px">
                                                    <span style="padding-right:5px"> @php 
                                                                 if($product->price != 0)
                                                                 {
                                                                   echo '  '.number_format($product->price) ;
                                                                  
                                                                 }
                                                                 else
                                                                 {
                                                                   echo 'رایگان';
                                                                 }
                                                                 
                                                                  @endphp
                                                                  </span>
                                                     </div>
     
                                                     <div class="col-4 col-md-4" style="font-size:13px">
                                                     <img src="{{ asset('images/Template/stopwatch.svg') }}" 
                                                     alt="Learniaa" height="42px" width="42px">
                                                     {{ $product->time }} 
                                                     </div>
     
                                                     <div class="col-4 col-md-4"  style="font-size:13px">
                                                     <img src="{{ asset('images/Template/video-camera.svg') }}" 
                                                     alt="Learniaa" height="42px" width="42px">
                                                     {{ $product->count }} درس
                                                     </div>
     
                                                 </div>
                                                 </div>
                                                  <!-- Videos INFORMATION -->
     
                                         </div>                         
                                       
     
                                         
                                         
                                     <!-- Panel -->  
                                     
                                 <!-- Section -->
                         @endforeach
                         </div>
                         </div>
     
                         </div>
    <!---(New Products)   Static Section -->

    </div>
    </div>
    </div>
    </div>




<!-- Comment -->
<div class="row" style="padding-bottom:45px;padding-top:60px">

<div class="col-md-12">

@php $user =  Auth::user();  @endphp
@if($user['pk_users'] != null) 

<h3 class="title">نظرات و پیشنهادات</h3>

@endif

	<div class="row">
		<div class="col-md-6">
			
     
        @if($user['pk_users'] != null)                                

      <form action="{{ route('behavior.store') }}" method="POST">
      @csrf

      <input type="hidden" name="pk_product" value="{{$product->pk_product}}">
      <input type="hidden" name="type" value="comment">
                                      
             <div class="row" >
                      <div class="col-md-9">
                          <div class="form-group bmd-form-group">
                           
                            <input type="text" name="content" class="form-control" placeholder="نظر خود را بنویسید">
                          
                           </div>
                      </div>

                      <div class="col-md-3">
                          <div class="form-group bmd-form-group">
                          <button type="submit" style="width:100px;font-size:12px;"  class="btn btn-primary btn-title btnblogPost">ثبت </button>
                          
                           </div>
                      </div>                   

                </div>                       
      </form> 

       @endif                                 

      <p></p>
			<ul class="timeline">

      @foreach($behavior_product as $one_behavior)
      @php  $json = json_decode($one_behavior['extras'],false) @endphp
                                        

            <li>
              <span class="text-muted float-right" style="display:contents" > 
                              <i class="fas fa-user"></i>
                             
                            {{$one_behavior->user->name }}
              </span>
              <span class="text-muted float-left" > 
                             <i class="fas fa-calendar-alt"></i>
                             1398/08/09
               </span>
                  <p>{{ $one_behavior['content']  }} </p> 

               @if(isset($json->reply))                         
               <!-- Reply box -->
               <div class="col-md-12" >
                  <div class=" card-login" style="margin-top:5px">
                   <div class="card-body card-header-primary"
                       style="border-radius:15px; background: rgba(30, 183, 173, 0.7);">
                     <div class="row">  
                        <div class="col-md-3" style="padding-right:1.0rem">             
                          <div>
                              <h5>پاسخ مدیر سایت:</h5>
                          </div>
                      </div>
                     
                      <div class="col-md-3" >
                            </div>
                            <div class="col-md-3" >
                            </div>
                            <div class="col-md-3" >
                            </div>

                              <div class="col-md-12" >             
                                <div  style="padding-right:9px;padding-left:9px;">         
                                <p style="color:#FFF;padding-top:0.2rem; text-align: justify;"> {{$json->reply}} </p>   
                                </div>  
                              </div>                    
                    </div> 
                  </div>
                  </div>              
              <!-- Reply box -->  
              @endif    

          </li>
          @endforeach      

			





				
			</ul>
		</div>
	</div>





       
      </div>
         
   <!-- end media-post -->
        
          </div>
          </div>
        </div>















 @endsection






