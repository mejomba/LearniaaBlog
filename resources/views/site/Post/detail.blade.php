@extends('site.Layouts.layout_main')

@section('Head')
                    @foreach($detail_post as $one_post)
                    @php  $json = json_decode($one_post['extras'],false) @endphp

                    <title> {{$one_post['title']}}  </title>
                      <meta  name="description" content="{{$json->desc_short}}">
                      @endforeach
@endsection

@section('content')

<style>
ul.timeline {
    list-style-type: none;
    position: relative;
}
ul.timeline:before {
    content: ' ';
    background: #d4d9df;
    display: inline-block;
    position: absolute;
    right: 29px;
    width: 2px;
    height: 100%;
    z-index: 400;
}
ul.timeline > li {
    margin: 20px 0;
    padding-right: 20px;
}
ul.timeline > li:before {
    content: ' ';
    background: white;
    display: inline-block;
    position: absolute;
    border-radius: 50%;
    border: 3px solid #22c0e8;
    right: 20px;
    width: 20px;
    height: 20px;
    z-index: 400;
}
</style>


<style>

.btnblog
{
  color : #fff ;
  text-transform:uppercase ;
  transition : 0.5s ;
  padding : 0.825rem 0.825rem ;
  width : 100% ;
  background-color : ;
  border-color : ;
  background-size : 100% auto ;
 

}

.btnblog:hover 
{
  background-position: right center; /* change the direction of the change here */
}

.btn-title {
    background-image: linear-gradient(to right top, #46d2ad, #3cceb0, #32cbb3, #29c7b6, #20c3b8);
}


.btn-1 {
  background-image: linear-gradient(to right, #DCE35B 0%, #45B649 51%, #DCE35B 100%);

  background-image: linear-gradient(to right, #F9F871 0%, #FFE171 51%, #F9F871 100%);

  #FFE171
}

.btn-2 {
  background-image: linear-gradient(to right, #fbc2eb 0%, #a6c1ee 51%, #fbc2eb 100%);

 /* background-image: linear-gradient(to right, #F9F871 0%, #20C5BA  51%, #F9F871 100%); */

   
}

.btn-3 {
  background-image: linear-gradient(to right, #DD5E89 0%, #F7BB97 51%, #DD5E89 100%);

  background-image: linear-gradient(to right, #FFC6A3 0%, #F88F6F 51%, #FFC6A3 100%);

  background-image: linear-gradient(to right, #9BDE7D 0%, #68EDCB 51%, #9BDE7D 100%);

  background-image: linear-gradient(to right, #68EDCB 0%, #9BDE7D 51%, #68EDCB 100%);

 /* background-image: linear-gradient(to right, #20C5BA 0%, #F9F871 51%, #20C5BA 100%); */
}

.btn-4 {
  background-image: linear-gradient(to right, #FC354C 0%, #0ABFBC 51%, #FC354C 100%);

  background-image: linear-gradient(to right, #008E85 0%, #0ABFBC 51%, #008E85 100%);

  
}

.btn-5 {
  background-image: linear-gradient(to right, #ffecd2 0%, #fcb69f 51%, #ffecd2 100%);
}


.btn_save_comment{
  background-image: linear-gradient(to right, #FC354C 0%, #0ABFBC 51%, #FC354C 100%);
}

</style>



<div class="row">

@foreach($detail_post as $one_post)
@php  $json = json_decode($one_post['extras'],false) @endphp


<div class="col-md-7" >

    <div class="row" style="padding-top: 5px;padding-left:15px;padding-right:15px" >

        <button class="btn   btn-round btnblog btn-title" style="border-radius:10px" >

            <h3 style="color:#FFFFFF" class="">{{$one_post['title']}}</h3>
        


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
                        <div class="row" style="padding-top:50px;padding-bottom:15px;padding-left:35px">
                            
                             
     <div class="col-md-3">
     <a  href="{{route('category.show','توسعه مهارت های شخصی')}}" class="btn  btn-round btnblog btn-1">
       توسعه مهارت   
        </a>
    
     </div>

     <div class="col-md-3">
     <a  href="{{route('category.show','برنامه نویسی')}}" class="btn  btn-round btnblog btn-2"     >    برنامه نویسی   </a>
 
     </div>

     <div class="col-md-3">
     <a href="{{route('category.show','وب')}}" class="btn  btn-round btnblog btn-3"   > وب </a>
    
     </div>

     <div class="col-md-3">
     <a href="{{route('category.show','هک و امنیت')}}" class="btn  btn-round btnblog btn-4"    >   هک و امنیت </a>
    
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
                          <button type="submit" class="btn btn-primary btn-title btnblog">ثبت </button>
                          
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






