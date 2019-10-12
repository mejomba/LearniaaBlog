@extends('site.Layouts.layout_main')

@section('Head')
                    @foreach($detail_post as $one_post)
                    @php  $json = json_decode($one_post['extras'],false) @endphp

                    <title> {{$one_post['title']}}  </title>
                      <meta  name="description" content="{{$json->desc_short}}">
                      @endforeach
@endsection

@section('content')


<div class="row">

@foreach($detail_post as $one_post)
@php  $json = json_decode($one_post['extras'],false) @endphp


<div class="col-md-7">

    <div class="row" style="padding-top: 5px;padding-left:15px;padding-right:15px" >

        <button class="btn   btn-round btnblogPost btn-title" style="border-radius:10px" >

            <h1 style="color:#FFFFFF" class="">{{$one_post['title']}}</h1>
        


    <div class="post-meta" >

<div class="post-meta-content" class="meta_title_post text-muted" style="font-size:15px">

          <span class="post-auhor-date">
          <span class="text-muted"> <img src="{{ asset('images/Template/user.svg') }}" alt="Thumbnail Image" height="20px" width="20px">&nbsp;{{$one_post->writer['name']}}</span>
          <span  class="text-muted"> | 
          <img src="{{ asset('images/Template/calendar.svg') }}" alt="Thumbnail Image" height="20px" width="20px">
            {{ $json->create_at }}
          </span>
      
          </span>

         <span class="text-muted" > | 
         <img src="{{ asset('images/Template/clock.svg') }}" alt="Thumbnail Image" height="20px" width="20px">
            {{ $json->readtime }} دقیقه
           </span>  

    <div class="post-content">
          <p> </p>
    </div>

</div>
</div>   

</div>
@endforeach

</button>

    <!-- post meta section -->



    <!-- post meta section -->

        <div class="row" >
        <div class="col-md-12">

            <div class="container-fluid" style="padding-top: 5px;margin-left: 0px;margin-right: 0px;padding-left: 0px;padding-right: 0px">
                <div class="container-fluid" style="margin-left: 0px;margin-right: 0px;padding-left: 0px;padding-right: 0px" >

                    <img class="img-raised rounded img-fluid" src="{{ asset('images/'.$one_post['pic_content'] ) }}"
                height="450px" width="100%" >
                    
                </div>


                <div class="container-fluid" style="margin-top:40px">
                @php echo htmlspecialchars_decode($one_post['content']) ; @endphp 
                </div>
                

                <p></p>
                <p></p>
                <p></p>

            </div>
        </div>




    </div>
</div>

   <div class="col-md-5">


                        <div class="container-fluid">
                        <div class="row" style="padding-top:50px;padding-bottom:15px;">
                            
                             
     <div class="col-md-3">
     <a style="margin-bottom: 15px;" href="{{route('category.show','توسعه مهارت های شخصی')}}" class="btn  btn-round btnblogPost btn-1">
       توسعه مهارت   
        </a>
    
     </div>

     <div class="col-md-3">
     <a style="margin-bottom: 15px;" href="{{route('category.show','برنامه نویسی')}}" class="btn  btn-round btnblogPost btn-2"     >    برنامه نویسی   </a>
 
     </div>

     <div class="col-md-3">
     <a style="margin-bottom: 15px;" href="{{route('category.show','وب')}}" class="btn  btn-round btnblogPost btn-3"   > وب </a>
    
     </div>

     <div class="col-md-3">
     <a style="margin-bottom: 15px;" href="{{route('category.show','هک و امنیت')}}" class="btn  btn-round btnblogPost btn-4"    >   هک و امنیت </a>
    
     </div>


                        </div>
                        </div>
            <!-- Section -->

            
<div style="border-bottom:2px solid #20c3b8;margin-bottom:10px">
<h3> آخرین نوشته ها<h3>
</div>


     <div class="container-fluid" style="padding-top:15px;padding-bottom:15px;;font-size:15px">


            @foreach($recent_post as $one_post)
            @php  $json = json_decode($one_post['extras'],false) @endphp

       <div class="row div-transition" style="margin-top:10px">
       
                <div class="col-md-3">

                        <a href="{{route('post.detail', $one_post['pk_post'] )}}">  <img src="{{ asset('images/'.$one_post['pic_content'] ) }}"  
                            class="img-raised rounded img-fluid" style="width: 200px;height: 100px;" ></a>
                </div>
               
                <div class="col-md-9"> 
                      
                <div class="row">

                        <a class="text-muted" href="{{route('post.detail', $one_post['pk_post'] )}}"> 
                            <h4 style="font-size: 20px;margin-bottom:0px" >{{$one_post['title']}}</h4>
                            </a>
                 </div>           


                   <div class="row">

                   <div class="post-content">
                                  <p> @php $text =  substr($json->desc_short,0,180);
                                        $char = substr($text,strlen($text)-1,1);
                                        if($char != "." | $char != " ")
                                        {
                                         echo  substr($text,0,178) . " ...";
                                        }
                                        else
                                        {
                                          echo $text ;
                                        }                                  
                                      @endphp  </p>
                            </div>

                   </div>   


                </div>
          
       </div>

        @endforeach

        </div>
 <!-- Section -->
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

      <input type="hidden" name="pk_post" value="{{$detail_post[0]->pk_post}}">
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

      @foreach($behavior_post as $one_behavior)
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






