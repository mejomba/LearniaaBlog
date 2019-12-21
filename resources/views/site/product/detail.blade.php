@extends('site.Layouts.layout_main')

@section('Head')
                   

                    <title> {{$product['title']}}  </title>
                      <meta  name="description" content="{{$product['desc']}}">
                     
@endsection

@section('content')


<div class="row">



<div class="col-md-8" >

    <div class="row" style="padding-top: 5px;padding-left:15px;padding-right:15px" >

        <button class="btn btn-round btnblogPost btn-title" style="border-radius:10px" >

            <h2 style="color:#FFFFFF" class="text-center">نام دوره : {{$product['title']}}</h2>  
</div>


</button>

    <!-- post meta section -->

        <div class="row" >
        <div class="col-md-12">

            <div class="container-fluid" style="padding-top: 5px;margin-left: 0px;margin-right: 0px;padding-left: 0px;padding-right: 0px">
                <div class="container-fluid" style="margin-left: 0px;margin-right: 0px;padding-left: 0px;padding-right: 0px" >

                   <!-- JW Player Video  -->
                    <!-- Without Blade Becuase Convert to String -->


                   @php
                   if($payment_status == "Payed")
                  {  
                    echo $product['file'] ; 
                  }
                  else
                  {
                    echo $product['preview'] ; 
                  }
                  @endphp 

                    <!-- Aparat Video  -->


                </div>


                <div class="container-fluid"  style="margin-top:40px;border-bottom:2px solid #20c3b8;text-align:justify">
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

   <div class="col-md-4">


                        <div class="container-fluid">

                        <div style="border-bottom:2px solid #20c3b8;margin-bottom:5px">
<h3> اطلاعات دوره <h3>
</div>

                        <div class="row" style="padding-top:10px;padding-bottom:15px;">

                                            <!-- Information Product -->

                                            <div class="col-md-12">
                                  
                                        <div class="post-meta" >

                                      <div class="post-meta-content" class="meta_title_post text-muted">

                                      <div class="row" style="padding-top:15px">

                                      

                                      <div class="col-md-4">
                                      
                                      <span class="text-muted">
                                                  <img src="{{ asset('images/Template/user.svg') }}" alt="Thumbnail Image" height="30px" width="30px">
                                                  نام مدرس</span>

                                      </div>

                                      <div class="col-md-4">

                                      <span  class="text-muted">  
                                                  <img src="{{ asset('images/Template/calendar.svg') }}" alt="Thumbnail Image" height="30px" width="30px">
                                                  تعداد ویدیو
                                                  
                                                  </span>

                                      </div>     
                                                
                                      <div class="col-md-4">

                                      <span class="text-muted" > 
                                                <img src="{{ asset('images/Template/clock.svg') }}" alt="Thumbnail Image" height="30px" width="30px">

                                                  مدت زمان
                                              
                                                  </span>  

                                      </div>


                                      <!-- Row 2 -->


                                      <div class="col-md-4 text-center">
                                      {{$product->learner->user['name']}}
                                      </div>

                                      <div class="col-md-4 text-center">
                                      {{ $product->count }} قسمت
                                      </div>

                                      <div class="col-md-4 text-center">
                                      {{ $product->time }} دقیقه
                                      </div>
                                            
                                                <div class="col-md-12 text-center" style="padding-top:35px">
                                                           <form action="{{route('product.pay', $product['pk_product'] )}}" method="POST">
                                                           @csrf
                                                            <button class="btn btn-round btn-1 btn-title" 

                                                            @if($payment_status == "Payed")
                                                            disabled
                                                            @endif
                                                            
                                                             type="submit" style="border-radius:10px" >
                                                            <h5 style="margin-top:5px">خرید دوره : 
                                                            @php 
                                                            if($product->price != 0)
                                                            {
                                                              echo number_format($product->price) ;
                                                            }
                                                            else
                                                            {
                                                              echo 'رایگان';
                                                            }
                                                            
                                                             @endphp  (تومان)</h5>
                                                            </button>
                                                            </form>  
                                                    </div>
                                        </div>
                                    </div>
                                    </div>   

                                  </div>
                                          

                          


               </div>
              </div>

    <!-- Section Learner -->

<div style="border-bottom:2px solid #20c3b8;margin-bottom:5px;margin-top:20px;">
<h3> اطلاعات مدرس <h3>
</div>


     <div class="container-fluid" style="padding-top:15px;padding-bottom:15px;;font-size:15px">

       <div class="row" style="margin-top:10px">
            
                <div class="col-md-3">
                </div>
                
                <div class="col-md-8">
                  <img src="{{  Storage::url('learner/'.$product->learner['pic'])  }}"
                    alt="Raised circle image" class="img-fluid rounded-circle shadow-lg" style="width: 160px;height:150px">
              </div>
            
              <div class="col-md-1">
            </div>
     
      </div>

      <div class="row" style="margin-top:20px">

      <div class="col-md-1">
                </div>
                
                <div class="col-md-9 text-center" style="font-size:18px">
                {{$product->learner->user['name']}}
              </div>
            
              <div class="col-md-1">
            </div>

      </div>

      <div class="row" style="margin-top:20px">

<div class="col-md-1">
          </div>
          
          <div class="col-md-10 text-center" style="font-size:18px;">
          <p style="text-align:justify">
          {{$product->learner['desc']}}
          </p>
        </div>
      
        <div class="col-md-1">
      </div>

</div>

       
        </div>
 <!-- Section Learner -->
</div>
</div>






 <!---(New Products)   Static Section -->
 <div class="container-fluid" style="padding-top:15px;padding-bottom:15px;;font-size:15px">

 <div class="row" style="margin-top:10px">

    <div class="col-md-8">

          <h3 class="" style=""> دوره های پیشنهادی </h3>
    </div>

    <div class="col-md-4 text-center">
    </div>

  </div>

       <div class="row" style="margin-top:10px">

      
     
      <div class="col-md-8">

      <div class="card shadow">
                    <div class="card-body">

            <div class="tab-pane active show " id="tab_text" role="tabpanel"  aria-labelledby="tab">          
                         <div class="row"> 
                        
                               @foreach($recent_Products as $product)
                                
                                    <!-- Data -->
                                    <div class="col-md-4 div-transition">

                                        <a href="{{route('product.detail', $product['pk_product'] )}}">
                                        <img  src="{{ Storage::url('product/'.$product['pic'])  }}"  
                                        class="img-raised rounded img-fluid" style="width: 703px;height: 250px;" ></a>
                                                                
                                        <a class="text-muted" href="{{route('product.detail', $product['pk_product'] )}}"> 
                                            <h4 style="font-size: 20px;margin-bottom:0px" >{{$product['title']}}</h4>
                                            </a>
                                                    
                                        <div class="post-meta" >

                                        <div class="post-meta-content" class="meta_title_post text-muted">

                                                <span class="post-auhor-date">
                                                <span class="text-muted">
                                                <img src="{{ asset('images/Template/user.svg') }}" 
                                                alt="Thumbnail Image" height="20px" width="20px">
                                                {{$product->learner->user['name']}} </span>
                                                <span  class="text-muted"> | 
                                                <img src="{{ asset('images/Template/calendar.svg') }}" 
                                                alt="Thumbnail Image" height="20px" width="20px">

                                                    {{ $product->count }} قسمت
                                                </span>
                                            
                                                </span>

                                                <span class="text-muted" > |
                                                <img src="{{ asset('images/Template/clock.svg') }}" 
                                                alt="Thumbnail Image" height="20px" width="20px">

                                                    {{ $product->time }} دقیقه
                                                </span>  

                                              

                                            <div class="post-content">
                                                <p>  </p>
                                            </div>

                                    <!-- Data -->
                                    </div> 
                                    </div>
                                    </div>
                                    
                                <!-- Panel -->  
                                
                            <!-- Section -->
                    @endforeach
                    </div>
                    </div>

               </div>
              </div>      

         </div>                                                 


       <div class="col-md-4">
      </div>              


      </div>
       </div>                

    <!---(New Products)   Static Section -->






<!-- Comment -->
<div class="row" style="padding-bottom:45px;padding-top:60px">

<div class="col-md-12">

@if($behavior_product == null) 

<h3 class="title text-center">نظرات و پیشنهادات</h3>

@endif

	<div class="row">
		<div class="col-md-6 offset-md-3">
			
      @php $user =  Auth::user();  @endphp
        @if($user['pk_users'] != null)                                

      <form action="{{ route('behavior.store') }}" method="POST">
      @csrf

      <input type="hidden" name="pk_product" value="{{$product->pk_product}}">
      <input type="hidden" name="type" value="comment">
                                      
             <div class="row" style="padding-right:120px">
                      <div class="col-md-9">
                          <div class="form-group bmd-form-group">
                           
                            <input type="text" name="content" class="form-control" placeholder="نظر خود را بنویسید">
                          
                           </div>
                      </div>

                      <div class="col-md-3">
                          <div class="form-group bmd-form-group">
                          <button type="submit" class="btn btn-primary btn-title btnblogPost">ثبت </button>
                          
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
                       style="border-radius:15px; background: linear-gradient(to right top, #46d2ad, #3cceb0, #32cbb3, #29c7b6, #20c3b8);">
                     <div class="row">  
                        <div class="col-md-3" style="padding-right:1.0rem">             
                          <div>
                              <h5>پاسخ مدیر سایت:</h5>
                          </div>
                      </div>
                      <div class="col-md-9" >             
                        
                              <p style="color:#FFF;padding-top:0.2rem"> {{$json->reply}} </p>    
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






