@extends('site.Layouts.layout_main')
@section('Head')
<title> لرنیا آکادمی  | لرنیا  </title>
  <meta  name="description" content="لرنیا آکادمی  | لرنیا ">
  <meta  name="keywords"    content="نقشه راه لرنیا,چارت آموزشی لرنیا ,لرنیا آاکادمی" > 
@endsection
@section('content')
  <!-- Section --> 
  <!-- Images & Text -->
   <!-- Text -->
            <div class="container-fluid" style="margin-top:15px">
            <div class="row text-center">
            <div class="col-md-12">  
<!--
 <h1 class="title" style="padding-right: 30px;font-size:30px;color: #303030">
 نقشه راه کامپیوتر برای مبتدیان
 </h1>
-->
<button class="btn btn-round btnblogPost btn-title" style="border-radius:10px" >
<h4 style="color:#FFFFFF" class="text-center"> مسیر گام به گام آموزش جامع کامپیوتر </h4>  
<h4 style="color:#F9F860" class="text-center"> !! روی آموزش ها بزن و ببین !!</h4>  
</button>            
             <!-- Text -->
                 <!-- Images -->        
              <div class="row text-center">
                    <div class="col-md-3">
                    </div>
                    <!--
                    <div class="col-md-6">
                    <img class="img-fluid rounded-circle shadow-lg" style="border-radius:20% !important;margin-top:20px;"
                    src="{{ asset('images/Template/RoadMap_BeginnerTree.jpg') }}"
                    width="900px" height="400px" alt="Learniaa" >
                    </div>          
                    -->
                     <!--
                    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/afterglowplayer@1.x"></script>
                    <style>.videowrapper{width: 800px;position:relative;height: auto;}</style>
                    <div class="videowrapper col-md-6 text-center" style="margin-top:10px">
                    <video class="afterglow"  id="my-video"  width="500" height="270" 
                    data-overscale="false"  poster="{{ Storage::url('tree/Poster_Intro_Academy.jpg') }}"
                    src="{{ Storage::url('Videos_Beginner_Tree/Video_IntroAcademy.mp4') }}">
                    </video>  
                    </div>   
                    -->

                   <!-- 
                    <div class="col-md-3">
                    <img class="img-fluid rounded-circle shadow-lg" style="padding-top:40px"
                    src="{{ asset('images/Template/looking_for_idea_with_team(1).svg') }}"
                    width="150px" height="50px" alt="Thumbnail Image" >
                    </div>
                     -->
                    <div class="col-md-3">
                    </div>
                </div>
            </div>
            </div>
            </div>  
             <!-- Images -->   
             <!-- Images & Text -->
            <!-- Text Content -->
            <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6" style="padding-top:30px;">
            <div style="border-bottom:2px solid #20c3b8;margin-bottom:5px;margin-top:5px">
            <form action="{{route('product.pay', $pkProduct_BeginnerTree )}}" method="POST">
            <div class="row">
            @csrf
                 <input type="hidden" name="LocationUser" value="Academy_Product">
                 <input type="hidden" name="NameProduct" value="All_Cource">
            <div class="col-md-5 col-12 text-center">
              <img class="img-fluid  rounded-circle shadow-lg" style="border-radius:40% !important;margin-bottom:5px"
                                          src="{{  Storage::url('tree/'.'Profile_AllCource_BeginnerTree.png') }}"
                                          width="70px" height="70px" alt="Profile_AllCource_BeginnerTree" >
                  <span style="font-size:16px;"> پکیج کامل آموزش کامپیوتر </span>
                  </div>
                  <div class="col-md-3 col-12 text-center" style="margin-bottom:5px;margin-top:20px">  
                                   <!--   <img class="img-fluid  rounded-circle " style="border-radius:10% !important;margin-bottom:5px;margin-top:10px"
                                        src="{{  Storage::url('tree/'.'price_AllCource_BeginnerTree.svg') }}"
                                        width="200px" height="200px" alt="price_AllCource_BeginnerTree" >
                                        -->
                            <span style="color:green" >  99000 </span>
                            <span style="color:green">   تومان </span>
                                        </div>
                  @if(Auth::check()) 
                  @if($payment_status == "Payed" )                  
                        <div class="col-md-3 col-12 text-center">                           
                            <button class="btn btn-warning" disabled      
                            type="submit" style="border-radius:20px;background-color:#30D533;border-color:#30D533;margin-bottom:5px;margin-top:10px" >
                            <span style="margin-top:5px;font-size:16px;color: #FFFFFF;line-height:0;">خرید</span>
                        </button>
                      </div>
                      @else
                      <div class="col-md-3 col-12 text-center">                           
                            <button class="btn btn-warning "     
                            type="submit" style="border-radius:20px;background-color:#30D533;border-color:#30D533;margin-bottom:5px;margin-top:10px" >
                            <span style="margin-top:5px;font-size:16px;color: #FFFFFF;line-height:0;">خرید</span>
                        </button>
                      </div>
                      @endif
                @else 
                <div class="col-md-3 col-12 text-center">                           
                            <button class="btn btn-warning "     
                            type="submit" style="border-radius:20px;background-color:#30D533;border-color:#30D533;margin-bottom:5px;margin-top:10px" >
                            <span style="margin-top:5px;font-size:16px;color: #FFFFFF;line-height:0;">خرید</span>
                        </button>
                      </div>
                  @endif
                      </div>
                  </form>  
            </div>
            <div class="row" style="font-size:15px">
            <p style="font-size:18px;line-height: 26pt;">  </p> 
                    <ul class="timeline">
                    @foreach($nodes as $node)          
                          <li>
                          <div class="row">
                          <div class="col-md-6 col-12">
                            <span class="text-muted float-right" style="display:contents" > 
                            <a href="{{ route('academy.show', ['id' => $node['pk_product'] , 'desc' =>  $node['name'] ]) }}"> 
                             <img class="img-fluid  rounded-circle shadow-lg" style="border-radius:30% !important;"
                                        src="{{  Storage::url('tree/'.$node['pic']) }}"
                                        width="50px" height="50px" alt="{{$node['name']}}" >
                                        </a> 
                            </span>          
                                <a href="{{ route('academy.show', ['id' => $node['pk_product'] , 'desc' =>  $node['name'] ]) }}"> 
                                  {{$node['name']}}
                                </a> 
                          </div>  
                          <div class="col-md-3 col-12" style="margin-top:13px">
                            <span style="color:green" >  {{$node->product['price']}} </span>
                            <span style="color:green">   تومان </span>
                          </div>
                          <!--
                          <div class="col-md-3 col-12">
                          <img class="img-fluid  rounded-circle " style="border-radius:10% !important;margin-bottom:5px"
                           src="{{  Storage::url('tree/'.'price_Product_BeginnerTree_' . $node['pk_product'] .'.svg') }}"
                           width="100px" height="100px" alt="price_AllCource_BeginnerTree" >
                          </div> 
                          -->
                          <div class="col-md-3 col-12">
                          @if(Auth::check()) 
                              @if($payment_status == "Payed" )  
                              <a href="{{ route('academy.show', ['id' => $node['pk_product'] , 'desc' =>  $node['name'] ]) }}"
                                      class="btn btn-warning btn-round" 
                                      style="font-size:14px;background-color:#30D533;border-color:#30D533;">
                                مشاهده </a>  
                                @else
                                <a href="{{ route('academy.show', ['id' => $node['pk_product'] , 'desc' =>  $node['name'] ]) }}"
                                      class="btn btn-warning btn-round" 
                                      style="font-size:14px;">
                                مشاهده </a>  
                                @endif 
                        @else
                        <a href="{{ route('academy.show', ['id' => $node['pk_product'] , 'desc' =>  $node['name'] ]) }}"
                                      class="btn btn-warning btn-round" 
                                      style="font-size:14px;">
                                مشاهده </a>  

                           @endif
                          </div> 
                          </div>
                                </li>              
                              @endforeach      
                          </ul>
             </div>
             <div class="row" style="padding-top:35px">
             <div class="col-md-4">                              
             </div>  
          <div class="col-md-4">
         </div>  
       <div class="col-md-4">
       </div>  
      </div>
      </div>
      <div class="col-md-3">
      </div>
            </div>
            </div>
            <!-- Text Content -->
 <!-- Section -->
@endsection
