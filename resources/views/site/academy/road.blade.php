@extends('site.Layouts.layout_main')
@section('Head')
    <title> لرنیا آکادمی | لرنیا </title>
    <meta name="description" content="لرنیا آکادمی  | لرنیا ">
    <meta name="keywords" content="نقشه راه لرنیا,چارت آموزشی لرنیا ,لرنیا آاکادمی">
@endsection
@section('content')

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



 <!-- container -->
</section>
<!-- End BLog Posts -->


@endsection
