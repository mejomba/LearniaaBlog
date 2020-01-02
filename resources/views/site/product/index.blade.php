@extends('site.Layouts.layout_landing')

@section('Head')
<title> آموزش سریع | لرنیا  </title>
  <meta  name="description" content="آموزش سریع | لرنیا">
@endsection

@section('text_landing')

    
<img src="{{ asset('images/Template/Header_Product.png') }}" alt="Thumbnail Image" class="" width="100%" style="float:right">

<a href="#Move_Down" class="daneshka-scroll-bottom text-center" style="margin-top: 20px;"> <span></span></a>

@endsection


@section('pic_landing')

    
<img src="{{ asset('images/Template/Product_landing.svg') }}" alt="Thumbnail Image" class="" width="70%" style="float:left;padding-left:50px">

@endsection

@section('content')

<div class="container-fluid">
    <div class="row" style="padding-top:15px;padding-bottom:15px">
        
    </div>
</div>


<div id="Move_Down" class="container-fluid">

   <div class="row" style="padding-top:15px;padding-bottom:15px">

                <div class="col-1 col-md-4">

                </div>

                <div class=" col-10 col-md-4" style="text-align:center">

                  
                  <h3 style="font-size:20px"> <span>
                  <img src="{{ asset('images/Template/learn.svg') }}" alt="Thumbnail Image" height="30px" width="30px">
                    سریع ، آسان ، لذت بخش 
                    <img src="{{ asset('images/Template/learn.svg') }}" alt="Thumbnail Image" height="30px" width="30px">
                    </span></h3>


                </div>

                <div class="col-1 col-md-4">

                </div>


   </div>

<div  style="border-bottom:2px solid #20c3b8;margin-bottom:10px">
    <h1>  آموزش ها <h1>
</div>


     <div class="row" style="padding-top:15px;padding-bottom:15px;;font-size:15px">

   

    <div class="col-md-12 text-center">

            <div class="nav-wrapper">
                <ul class="nav nav-pills nav-fill flex-column flex-sm-row" id="tabs-icons-text" role="tablist">
                   
                   
                <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0 active " style="border-radius:0.7rem;font-size:17px" id="tab" data-toggle="tab"
                         href="#tab_text" role="tab" 
                        aria-controls="tab" aria-selected="true">
                        جدیدترین </a>
                    </li>
                    

                @foreach($categories as $category)

                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0 " style="border-radius:0.7rem;font-size:17px" id="tab{{$category['pk_categories']}}" data-toggle="tab"
                         href="#tab{{$category['pk_categories']}}_text" role="tab" 
                        aria-controls="tab{{$category['pk_categories']}}" aria-selected="true">
                        {{$category['name']}} </a>
                    </li>
                    
                @endforeach    

                </ul>
            </div>

      </div>


   
</div>

<div class="row" style="padding-top:15px;padding-bottom:15px;;font-size:15px;margin-right:10px;margin-left:10px;">

    <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent" style="background: rgba(237, 237, 237, 0.1);">

                 <!---(New Products)   Static Section -->


                        <div class="tab-pane active show " id="tab_text" role="tabpanel"  aria-labelledby="tab"> 
                             
                        <div class="container-fluid">

                         <div class="row"> 
                        


                               @foreach($recent_Products as $product)
                                
                                    <!-- Data -->
                                    <div class="col-md-4 div-transition"   style="background: white;margin-top:15px;box-shadow:0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);">

                                        <a  href="{{route('product.detail',  ['slug' => $product['pk_product'] , 'desc' =>  $product['title'] ]  )}}">
                                        <img  src="{{ Storage::url('product/'.$product['pic'])   }}"  
                                        class="img-raised rounded img-fluid" style="margin-top:15px;width: 500px;height: 250px;" ></a>
                                                                
                                        <a class="text-muted" href="{{route('product.detail',  ['slug' => $product['pk_product'] , 'desc' =>  $product['title'] ]  )}}"> 
                                            <h4 style="padding-top:10px;font-size: 20px;margin-bottom:0px" >{{$product['title']}}</h4>
                                            </a>

                                            <!-- Writer -->
                                 <div class="container-fluid" style="margin-top:20px">
                                            <span class="" style="padding-top:40px;color:#000">
                                            
                                            @if($product->learner['pic'])
                                            <img  src="{{ Storage::url('learner/'.$product->learner['pic'])  }}"  
                                                        class="img-raised rounded-circle img-fluid" style="width: 60px;height: 60px;" >
                                            @else         
                                            <img  src="{{ asset('images/Template/user.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
                                            @endif
                                            &nbsp;{{$product->learner->user['name']}}</span>
                                    </div>
                                            <!-- Writer -->


                                            <!-- Videos INFORMATION -->
                                            <div class="container-fluid" style="margin-top:20px;padding-bottom:20px">
                                            <div class="row">

                                                <div class="col-4 col-md-4"  style="font-size:13px">
                                                <img src="{{ asset('images/Template/price-tag.svg') }}" 
                                                alt="Thumbnail Image" height="42px" width="42px">
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
                                                alt="Thumbnail Image" height="42px" width="42px">
                                                {{ $product->time }} 
                                                </div>

                                                <div class="col-4 col-md-4"  style="font-size:13px">
                                                <img src="{{ asset('images/Template/video-camera.svg') }}" 
                                                alt="Thumbnail Image" height="42px" width="42px">
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



                 <!-- (Dynamic Categories Products) Section -->
     
                @foreach($categories as $category)
               
                     <!-- Panel -->
                     <div class="tab-pane " id="tab{{$category['pk_categories']}}_text" role="tabpanel"
                                      aria-labelledby="tab{{$category['pk_categories']}}">

                     <div class="container-fluid">  

                          <div class="row">
                               @foreach($category->product as $product)
                                
                                    <!-- Data -->
                                    <div class="col-md-4 div-transition"   style="background: white;margin-top:15px;box-shadow:0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);">

                                        <a href="{{route('product.detail', ['slug' => $product['pk_product'] , 'desc' =>  $product['title'] ] )}}">
                                        <img  src="{{  Storage::url('product/'.$product['pic'])  }}"  
                                        class="img-raised rounded img-fluid" style="margin-top:15px;width: 500px;height: 250px;" ></a>
                                                                
                                        <a class="text-muted" href="{{route('product.detail',  ['slug' => $product['pk_product'] , 'desc' =>  $product['title'] ]  )}}"> 
                                            <h4 style="padding-top:10px;font-size: 20px;margin-bottom:0px" >{{$product['title']}}</h4>
                                            </a>

                                          <!-- Writer -->
                                 <div class="container-fluid" style="margin-top:20px">
                                            <span class="" style="padding-top:40px;color:#000">
                                            
                                            @if($product->learner['pic'])
                                            <img  src="{{ Storage::url('learner/'.$product->learner['pic'])  }}"  
                                                        class="img-raised rounded-circle img-fluid" style="width: 60px;height: 60px;" >
                                            @else         
                                            <img  src="{{ asset('images/Template/user.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
                                            @endif
                                            &nbsp;{{$product->learner->user['name']}}</span>
                                    </div>
                                                    <!-- Writer -->               

                                            <!-- Videos INFORMATION -->

                                            <div class="container-fluid" style="margin-top:20px;padding-bottom:20px">
                                            <div class="row">

                                                <div class="col-4 col-md-4"  style="font-size:13px">
                                                <img src="{{ asset('images/Template/price-tag.svg') }}" 
                                                alt="Thumbnail Image" height="42px" width="62px">
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
                                                alt="Thumbnail Image" height="42px" width="62px">
                                                {{ $product->time }} 
                                                </div>

                                                <div class="col-4 col-md-4"  style="font-size:13px">
                                                <img src="{{ asset('images/Template/video-camera.svg') }}" 
                                                alt="Thumbnail Image" height="42px" width="62px">
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
                @endforeach     

                         


                        </div>
                    </div>
                </div>

    </div>    

   

 </div>


                <!-- Banner -- section -->
                <div class="row" style="padding-top:15px;padding-bottom:15px;;font-size:15px;margin-right:10px;margin-left:10px;">

                    <div class="col-md-12 col-12">
                    <div class="container-fluid banner">
                    
                    <div class="row">
                    <div class="col-md-1 col-12">
                     </div>
                             <div class="col-md-5 text-center" style=""> 
                            <p style="margin-top: 10px;font-size: 19px;font-weight: 800;"> 
                            برای آگاهی از تخفیف ها و جشنواره ها پست الکترونیکی خود را وارد نمایید
                            </p>
                            
                            </div> 

                            <div class="col-md-6 col-12">
                                <div class="row">
                                <div class="col-md-8 col-12">         
                                <form class="form" method="POST" action="{{route('message.newspaper')}}">
                                @csrf

                                <input name="name" id="name" value="ناشناس" type="hidden" class="form-control"> 
                                <input name="message" id="message" value="درخواست خبرنامه" type="hidden" class="form-control">

                                             <div class="form-group focused" style="background: white;">
                                            <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                            <img class="img-raised  img-fluid" 
                                            src="{{ asset('images/Template/user_email.svg')}}" 
                                            alt="Thumbnail Image" height="45px" width="45px">
                                            </div>
                                            <input name="email" id="email" type="text" class="form-control" 
                                            placeholder="پست الکترونیکی">
                                            </div>
                                            </div>

                                        </div>
                                        <div class="col-md-4 col-12">
                                            <button type="submit" class="btn btn-warning btn-round">ثبت</button>
                                        </div>
                                        
                            </div> 
                            </div>
                            
                            </form>
                             
             


                   
            </div>                                      

                    
                    </div>
                    </div>    

                

                </div>




                <!-- Banner -- section -->


    </div>


      


</div>
</div>
</div>
</div>

@endsection
