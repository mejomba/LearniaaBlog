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

               @foreach($categories as $category)
                    @foreach($categories as $category)
                            <!-- Section -->

                                    <!-- Panel -->
                                    <div class="tab-pane fade" id="tab2_text" role="tabpanel"  aria-labelledby="tab2">
                                    <!-- Data -->
                                        <p class="description">AAAA</p>
                                    <!-- Data -->
                                    </div>
                                <!-- Panel -->  
                                
                            <!-- Section -->
                    @endforeach
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
