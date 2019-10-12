@extends('site.Layouts.layout_main')

@section('Head')
                    @foreach($detail_product as $product)

                    <title> {{$product['title']}}  </title>
                      <meta  name="description" content="{{$product->desc}}">
                      @endforeach
@endsection

@section('content')


<div class="row">

@foreach($detail_product as $product)

<div class="col-md-8" >

    <div class="row" style="padding-top: 5px;padding-left:15px;padding-right:15px" >

        <button class="btn btn-round btnblogPost btn-title" style="border-radius:10px" >

            <h1 style="color:#FFFFFF" class="">{{$product['title']}}</h1>  
</div>
@endforeach

</button>

    <!-- post meta section -->

        <div class="row" >
        <div class="col-md-12">

            <div class="container-fluid" style="padding-top: 5px;margin-left: 0px;margin-right: 0px;padding-left: 0px;padding-right: 0px">
                <div class="container-fluid" style="margin-left: 0px;margin-right: 0px;padding-left: 0px;padding-right: 0px" >

                <!-- Example
                    <video class="img-raised rounded img-fluid"
                     src="https://as7.cdn.asset.aparat.com/aparat-video/dd103528b00bb6c2fbe28c2286020da317378201-480p__26835.mp4"
                height="250px" width="100%" >
                    -->

                   <!-- Aparat Video  -->
                    <!-- Without Blade Becuase Convert to String -->

                   @php echo $product['file'] ;  @endphp 

                    <!-- Aparat Video  -->


                </div>


                <div class="container-fluid" style="margin-top:40px">
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
                        <div class="row" style="padding-top:50px;padding-bottom:15px;">

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


                                      <div class="col-md-4">
                                      {{$product->learner->user['name']}}
                                      </div>

                                      <div class="col-md-4">
                                      {{ $product->count }} قسمت
                                      </div>

                                      <div class="col-md-4">
                                      {{ $product->time }} دقیقه
                                      </div>
                                            
                                                <div class="col-md-12" style="padding-top:15px">
                                                        <button class="btn btn-round btn-1  btn-title" style="border-radius:10px" >
                                                        <h2>قیمت : {{$product->price}} (تومان)</h2>
                                                        </button>
                                                    </div>
                                        </div>
                                    </div>
                                    </div>   

                                  </div>
                                          

                          


               </div>
              </div>

    <!-- Section Learner -->

<div style="border-bottom:2px solid #20c3b8;margin-bottom:10px">
<h3> اطلاعات مدرس <h3>
</div>


     <div class="container-fluid" style="padding-top:15px;padding-bottom:15px;;font-size:15px">

       <div class="row" style="margin-top:10px">
       
               
       </div>

       
        </div>
 <!-- Section Learner -->
</div>
</div>




<!-- Comment -->
<div class="row" style="padding-bottom:45px">

<div class="col-md-12">

<h3 class="title text-center">نظرات و پیشنهادات</h3>



	<div class="row">
		<div class="col-md-6 offset-md-3">
			
      @php $user =  Auth::user();  @endphp
        @if($user['pk_users'] != null)                                

      <form action="{{ route('behavior.store') }}" method="POST">
      @csrf

      <input type="hidden" name="pk_product" value="{{$detail_product[0]->pk_product}}">
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






