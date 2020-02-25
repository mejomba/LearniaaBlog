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
<h2 style="color:#FFFFFF" class="text-center"> نقشه راه کامپیوتر برای مبتدیان</h2>  
<h4 style="color:#F9F860" class="text-center"> !! روی آموزش ها بزن و ببین !!</h4>  
</button>            


             <!-- Text -->

                 <!-- Images -->        

              <div class="row text-center">

                    <div class="col-md-3">

                    </div>

                    <div class="col-md-6">

                    <img class="img-fluid rounded-circle shadow-lg" style="border-radius:20% !important;margin-top:20px;"
                    src="{{ asset('images/Template/RoadMap_BeginnerTree.jpg') }}"
                    width="900px" height="400px" alt="Learniaa" >

                    
                    </div>
                            
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
            <div class="col-md-6" style="padding-top:30px;text-align: justify;">
            <div class="row" style="font-size:15px">

            <p style="font-size:18px;line-height: 26pt;">  </p>
            

                    <ul class="timeline">
                    @foreach($nodes as $node)
                          <li>
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
