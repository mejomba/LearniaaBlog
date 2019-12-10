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


     <div class="row" id="ListOfData" style="padding-top:15px;padding-bottom:15px;;font-size:15px">


            @foreach($recent_post as $one_post)
            @php  $json = json_decode($one_post['extras'],false) @endphp

            <div class="col-md-4 div-transition">

                    <a href="{{route('post.detail', ['slug' => $one_post['pk_post'] , 'desc' =>  $one_post['title'] ]  )}}"> 
                       <img  src="{{  Storage::url('post/'.$one_post['pic_content']) }}"  
                      class="img-raised rounded img-fluid" style="width: 703px;height: 250px;" ></a>
                                            
                      <a class="text-muted" href="{{route('post.detail',  ['slug' => $one_post['pk_post'] , 'desc' =>  $one_post['title'] ]  )}}"> 
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

   
   <!-- Show More -->
   <div class="row">
            <div class="col-md-5 col-4">                       
        
                </div>
               

                <div class="col-md-2 col-4">                       
                <button style="margin-bottom: 35px;font-size:12px" id="btn_more"   onclick="loading( '{{ $categoryOfPage }}' )" class="btn btn-primary  btn-round  ">
     مشاهده بیشتر  
        </button>
                </div>

                <div class="col-md-4 col-4">                       
        
                </div>

             
                
        </div>
<!-- Show More -->

<!-- Animation -->
                <div class="row">

                            <div class="col-md-2 col-2">                       
                        
                                </div>

                                <div class="col-md-2 col-2">                       
                        
                              </div>

                            <div class="col-md-4 col-4"> 
                                                
                                <div class="text-center" id="loading" style="display:none">

                                @php echo file_get_contents('images/Template/loading.svg'); @endphp
                      
                                </div>
                        </div>

                        <div class="col-md-2 col-2">                       
                        
                        </div>

                        <div class="col-md-2 col-2">                       
                        
                        </div>


                  </div> 
  <!-- Animation --> 

</div>



</div>
</div>
</div>

@endsection




<script>

  var getUrl = window.location;
  var baseUrl = "https:" + "//" + getUrl.host + "/" ;
  var page_url = "";
  var first_run = 0 ;
  var writer = "";
  var writers = [];

  function SetData(json,writer)
   {
    var Data = document.getElementById('ListOfData');

 //   json.data[0].extras = JSON.stringify(json.data[0].extras);
    json.extras =  JSON.parse(json.extras);
    

    Data.insertAdjacentHTML('beforeend',`<div class="col-md-4 div-transition">
   <a href="${baseUrl+"post/" +json.pk_post  + "/" + json.title }"> 
   <img src="https://5c76fd66bf6fa1001152cbea.liara.space/learniaa/post/${json.pic_content}" class="img-raised rounded img-fluid" style="width: 703px;height: 250px;"></a>                  
  <a class="text-muted" href="${baseUrl+"/post/" +json.pk_post + "/" + json.title }"> 
    <h4 style="font-size: 20px;margin-bottom:0px">${json.title}</h4>
    </a>   
      <div class="post-meta">
    <div class="post-meta-content">

              <span class="post-auhor-date">
              <span class="text-muted">
              <img src="http://127.0.0.1:8000/images/Template/user.svg" alt="Thumbnail Image" height="20px" width="20px">
              ${writer.name}
                </span>
              <span class="text-muted"> | 
              <img src="http://127.0.0.1:8000/images/Template/calendar.svg" alt="Thumbnail Image" height="20px" width="20px">

              ${json.extras.create_at}
              </span>
          
              </span>

             <span class="text-muted"> |
             <img src="http://127.0.0.1:8000/images/Template/clock.svg" alt="Thumbnail Image" height="20px" width="20px">

             ${json.extras.readtime} دقیقه
               </span>  

        <div class="post-content">
              <p>${json.extras.desc_short} </p>
        </div>

  </div>
  </div>   

</div>`);


   }

 function loading(categoryOfPage)
 {

  if(categoryOfPage == "All")
  {

          if(first_run == 0)
          {  
                 fetch(baseUrl + 'api/posts')
                 .then( response =>    response.json())
                    .then((json) => {
                                            
                                              page = 1 ;
                                              json = JSON.stringify(json);
                                              json = JSON.parse(json);

                                              if(json.next_page_url != null)
                                                {
                                                  page_url =  json.next_page_url;
                                                }
                                                else
                                                {
                                                  page_url =  null ;
                                                  $("#btn_more").css("display","none");
                                                       return 0;
                                                }
                                            })

                                            first_run = 1 ;
              }

  }

  else
  {
    if(first_run == 0)
          {  
              fetch(baseUrl + 'api/postsByCategory/'+categoryOfPage)
                    .then(response =>   response.json())
                    .then((json) => {
                                            
                                           // console.log(json);
                                              page = 1 ;
                                              json = JSON.stringify(json);
                                            
                                              json = JSON.parse(json);

                                              if(json.next_page_url != null)
                                                {
                                                  page_url =  json.next_page_url;
                                                }
                                                else
                                                {
                                                  page_url =  null ;
                                                  $("#btn_more").css("display","none");
                                                    return 0;
                                                }
                                            
                                              
                                            })

                                            first_run = 1 ;
              }
  }




            $("#loading").css("display","block");
            setTimeout(prepare, 2000);
            console.log('start');
 }


  function prepare()
   {
      $("#loading").css("display","none");

         var res = page_url.replace("http", "https");

             fetch(res)
            .then(response => response.json())
            .then((json) => {
                                  console.log(json);
                                      json = JSON.stringify(json);
                                      json = JSON.parse(json);
                                  
                                   if(json.next_page_url != null)
                                   {
                                    page_url =  json.next_page_url;
                                    this.SetWriter(json);
                                   }
                                   else
                                   {
                                    this.SetWriter(json);
                                    page_url =  null ;
                                    $("#btn_more").css("display","none");
                                    return 0;
                                   }
                                      
                                    })
  
  }

  


   function SetWriter(json)
   {
  
     Object.entries(json.data).forEach(([index, item]) =>
    {
      
      
      fetch(baseUrl + 'api/writers/'+item.pk_writers)
              .then(response =>   response.json())
              .then((json) => {
                                    
                                      json = JSON.stringify(json);
                                      var writer = JSON.parse(json);
                                      this.SetData(item,writer);
                                    
                                      })

                                    
    });
   
     ////////////////////////////////////////////////////////////
  }

   
</script>
