@extends('site.Layouts.layout_landing')


@section('text_landing')

    
<img src="{{ asset('images/Template/text_blog2.png') }}" alt="Thumbnail Image" class="" width="100%" style="float:left">

@endsection


@section('pic_landing')

    
<img src="{{ asset('images/Template/teacher.svg') }}" alt="Thumbnail Image" class="" width="100%" style="float:left">

@endsection

@section('content')

<style>

.btnblog
{
  color : #fff ;
  text-transform:uppercase ;
  transition : 0.5s ;
  padding : 2.125rem 2.25rem ;
  width : 100% ;
  background-color : ;
  border-color : ;
  background-size : 200% auto ;
  font-size: 20px;

}

.btnblog:hover 
{
  background-position: right center; /* change the direction of the change here */
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

/* Magic Stuff End -> */
</style>


<!--<div class="container-fluid">
  <div class="row" style="padding-top:15px;padding-bottom:15px;padding-left:35px">
       
     <div class="col-md-3">
     <a  href="{{route('category.show','توسعه مهارت های شخصی')}}" class="btn btn-primary btn-round btnblog btn-1">
       توسعه مهارت های شخصی  
        </a>
    
     </div>

     <div class="col-md-3">
     <a  href="{{route('category.show','برنامه نویسی')}}" class="btn btn-primary btn-round btnblog btn-2"     >    برنامه نویسی   </a>
 
     </div>

     <div class="col-md-3">
     <a href="{{route('category.show','وب')}}" class="btn btn-primary btn-round btnblog btn-3"   > وب </a>
    
     </div>

     <div class="col-md-3">
     <a href="{{route('category.show','هک و امنیت')}}" class="btn btn-primary btn-round btnblog btn-4"    >   هک و امنیت </a>
    
     </div>

 </div>
</div>

-->








<div class="card card-nav-tabs">
                <div class="card-header card-header-primary">
                  <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active show" href="#profile" data-toggle="tab" dideo-checked="true">
                          <img src="{{ asset('images/Template/elearning.svg') }}" alt="Thumbnail Image" height="30px" width="30px">

آموزش ها    
            <div class="ripple-container"></div></a>
                        </li>
                       <!-- <li class="nav-item">
                          <a class="nav-link" href="#messages" data-toggle="tab" dideo-checked="true">
                            <i class="material-icons">chat</i> Messages
                          <div class="ripple-container"></div></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#settings" data-toggle="tab" dideo-checked="true">
                            <i class="material-icons">build</i> Settings
                          <div class="ripple-container"></div></a>
                        -->
                        
                        
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body ">
                  <div class="tab-content text-center">
                    <div class="tab-pane active show" id="profile">







                    <div class="row" style="padding-top:15px;padding-bottom:15px;;font-size:15px">


                        
<div class="col-md-4">

        <a href="http://192.168.1.101:8000/post/115" dideo-checked="true">  <img src="http://192.168.1.101:8000/images/marketing.png" class="img-raised rounded img-fluid" style="width: 703px;height: 250px;"></a>
                                
          <a class="text-muted" href="http://192.168.1.101:8000/post/115" dideo-checked="true"> 
            <h4 style="font-size: 20px;margin-bottom:0px">پست شماره 2</h4>
            </a>
                        
              <div class="post-meta">

            <div class="post-meta-content">

                      <span class="post-auhor-date">
                      <span class="text-muted">
                      <img src="http://192.168.1.101:8000/images/Template/user.svg" alt="Thumbnail Image" height="20px" width="20px">
                       محمد ملک پایین </span>
                      <span class="text-muted"> | 
                      <img src="http://192.168.1.101:8000/images/Template/calendar.svg" alt="Thumbnail Image" height="20px" width="20px">

                        1398/08/09
                      </span>
                  
                      </span>

                     <span class="text-muted"> |
                     <img src="http://192.168.1.101:8000/images/Template/clock.svg" alt="Thumbnail Image" height="20px" width="20px">

                        13 دقیقه
                       </span>  

                <div class="post-content">
                      <p> برای مثال سلام علیکمdadasda ...  </p>
                </div>

          </div>
          </div>   

</div>
          
<div class="col-md-4">

        <a href="http://192.168.1.101:8000/post/116" dideo-checked="true">  <img src="http://192.168.1.101:8000/images/marketing3.jpg" class="img-raised rounded img-fluid" style="width: 703px;height: 250px;"></a>
                                
          <a class="text-muted" href="http://192.168.1.101:8000/post/116" dideo-checked="true"> 
            <h4 style="font-size: 20px;margin-bottom:0px">سلام</h4>
            </a>
                        
              <div class="post-meta">

            <div class="post-meta-content">

                      <span class="post-auhor-date">
                      <span class="text-muted">
                      <img src="http://192.168.1.101:8000/images/Template/user.svg" alt="Thumbnail Image" height="20px" width="20px">
                       محمد ملک پایین </span>
                      <span class="text-muted"> | 
                      <img src="http://192.168.1.101:8000/images/Template/calendar.svg" alt="Thumbnail Image" height="20px" width="20px">

                        1398/08/08
                      </span>
                  
                      </span>

                     <span class="text-muted"> |
                     <img src="http://192.168.1.101:8000/images/Template/clock.svg" alt="Thumbnail Image" height="20px" width="20px">

                        12 دقیقه
                       </span>  

                <div class="post-content">
                      <p> علاوه بر این، برخی از چالش ها محدود به استعداد محدودی است. شما ممکن است بسیاری از توسعه دهندگان Swift در اطراف شما را در مقایسه با دیگر زبان های منبع باز پیدا کنید. نظرسنجی های اخیر می گویند تنها 8.1 درصد از 78000 پاسخ  ...  </p>
                </div>

          </div>
          </div>   

</div>
            



</div>







                    </div>
                    <div class="tab-pane" id="messages">
                      <p> I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at.</p>
                    </div>
                    <div class="tab-pane" id="settings">
                      <p>I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. So when you get something that has the name Kanye West on it, it’s supposed to be pushing the furthest possibilities. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus.</p>
                    </div>
                  </div>
                </div>
              </div>

















<!--<div class="container-fluid">

   <div class="row" style="padding-top:15px;padding-bottom:15px">

                <div class="col-md-4">

                </div>

                <div class="col-md-4" style="text-align:center">

                  
                  <h3> <span>
                  <img src="{{ asset('images/Template/blog.svg') }}" alt="Thumbnail Image" height="60px" width="60px">
                    بخوانید ، بدانید ، لذت ببرید 
                    <img src="{{ asset('images/Template/blog.svg') }}" alt="Thumbnail Image" height="60px" width="60px">
                    </span></h3>


                </div>

                <div class="col-md-4">

                </div>


   </div>

<div style="border-bottom:2px solid #20c3b8;margin-bottom:10px">
<h3> آخرین نوشته ها<h3>
</div>
-->

     <div class="row" style="padding-top:15px;padding-bottom:15px;;font-size:15px">

        <!--

            @foreach($prdoucts as $product)
            @php  $json = json_decode($product['extras'],false) @endphp

            <div class="col-md-4">

                    <a href="{{route('post.detail', $product['pk_post'] )}}">  <img src="{{ asset('images/'.$product['pic_content'] ) }}"  
                      class="img-raised rounded img-fluid" style="width: 703px;height: 250px;" ></a>
                                            
                      <a class="text-muted" href="{{route('post.detail', $product['pk_post'] )}}"> 
                        <h4 style="font-size: 20px;margin-bottom:0px" >{{$product['title']}}</h4>
                        </a>
                                    
                          <div class="post-meta" >

                        <div class="post-meta-content" class="meta_title_post text-muted">

                                  <span class="post-auhor-date">
                                  <span class="text-muted">
                                  <img src="{{ asset('images/Template/user.svg') }}" alt="Thumbnail Image" height="20px" width="20px">
                                   {{$product->writer['name']}} </span>
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
              

                                        -->

    </div>


      


</div>



</div>
</div>
</div>

@endsection
