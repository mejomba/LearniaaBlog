@extends('site.Layouts.layout_landing')

@section('Head')
<title> آموزش سریع | لرنیا  </title>
  <meta  name="description" content="آموزش سریع | لرنیا">
@endsection

@section('text_landing')

    
<img src="{{ asset('images/Template/Header_Product.png') }}" alt="Thumbnail Image" class="" width="100%" style="float:left">

@endsection


@section('pic_landing')

    
<img src="{{ asset('images/Template/Product_landing.svg') }}" alt="Thumbnail Image" class="" width="100%" style="float:left">

@endsection

@section('content')

<div class="container-fluid">
    <div class="row" style="padding-top:15px;padding-bottom:15px">
        
    </div>
</div>


<div class="container-fluid">

   <div class="row" style="padding-top:15px;padding-bottom:15px">

                <div class="col-md-4">

                </div>

                <div class="col-md-4" style="text-align:center">

                  
                  <h3> <span>
                  <img src="{{ asset('images/Template/student.svg') }}" alt="Thumbnail Image" height="80px" width="80px">
                    سریع ، آسان ، لذت بخش 
                    <img src="{{ asset('images/Template/student.svg') }}" alt="Thumbnail Image" height="80px" width="80px">
                    </span></h3>


                </div>

                <div class="col-md-4">

                </div>


   </div>

<div style="border-bottom:2px solid #20c3b8;margin-bottom:10px">
    <h1>  محصولات <h1>
</div>


     <div class="row" style="padding-top:15px;padding-bottom:15px;;font-size:15px">

    <div class="col-md-4">
    </div>

    <div class="col-md-4">

            <div class="nav-wrapper">
                <ul class="nav nav-pills nav-fill flex-column flex-sm-row" id="tabs-icons-text" role="tablist">
                   
                   <!-- dadas
                <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0 active " id="tab" data-toggle="tab"
                         href="#tab_text" role="tab" 
                        aria-controls="tab" aria-selected="true">
                        جدیدترین </a>
                    </li>
                    -->

                @foreach($categories as $category)

                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0 " id="tab{{$category['pk_categories']}}" data-toggle="tab"
                         href="#tab{{$category['pk_categories']}}_text" role="tab" 
                        aria-controls="tab{{$category['pk_categories']}}" aria-selected="true">
                        {{$category['name']}} </a>
                    </li>
                    
                @endforeach    

                </ul>
            </div>

      </div>


    <div class="col-md-4">
    </div>

</div>

<div class="row" style="padding-top:15px;padding-bottom:15px;;font-size:15px">

    <div class="col-md-1">
    </div>

    <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">

                            <!-- Section -->

                                   

                                     
                @foreach($categories as $category)
               
                     <!-- Panel -->
                     <div class="tab-pane " id="tab{{$category['pk_categories']}}_text" role="tabpanel"
                                      aria-labelledby="tab{{$category['pk_categories']}}">

                          <div class="row">
                               @foreach($category->product as $product)
                                
                                    <!-- Data -->
                                    <div class="col-md-4 div-transition">

                                        <a href="{{route('product.detail', $product['pk_product'] )}}">
                                        <img  src="{{ asset('images/product/'.$product['pic'] ) }}"  
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
                                                <p> @php $text =  substr($product->desc,0,380);
                                                        $char = substr($text,strlen($text)-1,1);
                                                        if($char != "." | $char != " ")
                                                        {
                                                        echo  substr($text,0,378);
                                                        }
                                                        else
                                                        {
                                                        echo $text ;
                                                        }                                  
                                                    @endphp  </p>
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
                @endforeach     

                         


                        </div>
                    </div>
                </div>

    </div>    

   <div class="col-md-1">
    </div>       

 </div>




    </div>


      


</div>
</div>
</div>
</div>

@endsection
