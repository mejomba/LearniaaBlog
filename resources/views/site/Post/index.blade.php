@extends('site.Layouts.layout_landing')

@section('Head')
<title> بلاگ | لرنیا  </title>
  <meta  name="description" content="بلاگ | لرنیا">
@endsection

@section('text_landing')

    
<img src="{{ asset('images/Template/text_blog2.png') }}" alt="Thumbnail Image" class="" width="100%" style="float:left">

@endsection


@section('pic_landing')

    
<img src="{{ asset('images/Template/teacher.svg') }}" alt="Thumbnail Image" class="" width="100%" style="float:left">

@endsection

@section('content')

<div class="container-fluid">
  <div class="row" style="padding-top:15px;padding-bottom:15px">
     <div class="col-md-3">
     <a style="margin-bottom: 15px;"  href="{{route('category.show','توسعه مهارت های شخصی')}}" class="btn  btn-round btnblog btn-1">
       توسعه مهارت های شخصی  
        </a>
     </div>

     <div class="col-md-3">
     <a style="margin-bottom: 15px;" href="{{route('category.show','برنامه نویسی')}}" class="btn  btn-round btnblog btn-2"     >    برنامه نویسی   </a>
     </div>

     <div class="col-md-3">
     <a style="margin-bottom: 15px;" href="{{route('category.show','وب')}}" class="btn  btn-round btnblog btn-3"   > وب </a>
    
     </div>

     <div class="col-md-3">
     <a style="margin-bottom: 15px;" href="{{route('category.show','هک و امنیت')}}" class="btn  btn-round btnblog btn-4"    >   هک و امنیت </a>
    
     </div>

 </div>
</div>


<div class="container-fluid">

   <div class="row" style="padding-top:15px;padding-bottom:15px">

                <div class="col-md-4">

                </div>

                <div class="col-md-4" style="text-align:center">

                  
                  <h3> <span>
                  <img src="{{ asset('images/Template/blog.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
                    بخوانید ، بدانید ، لذت ببرید 
                    <img src="{{ asset('images/Template/blog.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
                    </span></h3>


                </div>

                <div class="col-md-4">

                </div>


   </div>

<div style="border-bottom:2px solid #20c3b8;margin-bottom:10px">
<h1> آخرین نوشته ها<h1>
</div>


     <div class="row" style="padding-top:15px;padding-bottom:15px;;font-size:15px">


            @foreach($recent_post as $one_post)
            @php  $json = json_decode($one_post['extras'],false) @endphp

            <div class="col-md-4 div-transition">

                    <a href="{{route('post.detail', $one_post['pk_post'] )}}">  <img  src="{{ asset('images/'.$one_post['pic_content'] ) }}"  
                      class="img-raised rounded img-fluid" style="width: 703px;height: 250px;" ></a>
                                            
                      <a class="text-muted" href="{{route('post.detail', $one_post['pk_post'] )}}"> 
                        <h4 style="font-size: 20px;margin-bottom:0px" >{{$one_post['title']}}</h4>
                        </a>
                                    
                          <div class="post-meta" >

                        <div class="post-meta-content" class="meta_title_post text-muted">

                                  <span class="post-auhor-date">
                                  <span class="text-muted">
                                  <img src="{{ asset('images/Template/user.svg') }}" alt="Thumbnail Image" height="20px" width="20px">
                                   {{$one_post->writer['name']}} </span>
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
                                  <p> @php $text =  substr($json->desc_short,0,380);
                                        $char = substr($text,strlen($text)-1,1);
                                        if($char != "." | $char != " ")
                                        {
                                         echo  substr($text,0,378) . " ...";
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


      


</div>



</div>
</div>
</div>

@endsection
