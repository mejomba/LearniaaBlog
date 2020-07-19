
@extends('site.Layouts.layout_landing')

@section('Head')
    <title> بلاگ | لرنیا  </title>
    <meta  name="description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد">
    <meta  name="keywords"    content="اخبار,مقالات,بلاگ,لرنیا" >
@endsection

@section('text_landing')

<<<<<<< HEAD
      <title> لرنیا | {{$one_post['title']}} </title>
      @endforeach

      @foreach($detail_post as $one_post)

      @php $meta=json_decode($one_post['metatag'],true) @endphp

      <!-- HTML Meta -->

      @foreach($meta['htmlmeta'] as $key => $value)
      
      <meta  name="{{$key}}" content="{{$value}}" >

      @endforeach
      <!-- OpenGraph Meta -->
      @foreach($meta['opengraph'] as $key => $value)

      <meta  name="{{$key}}" content="{{$value}}" >

      @endforeach
      <!-- Twitter Meta -->

      @foreach($meta['twitter'] as $key => $value)

      <meta  name="{{$key}}" content="{{$value}}" >

      @endforeach


      <!-- Schema Meta -->

      @php $meta=json_decode($one_post['schema_markup'],true) @endphp

        @foreach($meta as $key => $value)

        <meta  name="{{$key}}" content="{{$value}}" >

        @endforeach

      @if($one_post['video'] == 'yes')
      @php $videometa=json_decode($one_post['video_schema'],true) @endphp

      <!-- Video meta -->
     

      <script type="application/ld+json">
      {
        @foreach($videometa as $key => $value)
        "{{$key}}" {{':'}} "{{$value}}",
        @endforeach

      }
      </script>
      @endif

    @endforeach

=======
    {{--<img src="{{ asset('images/Template/text_blog2.png') }}" alt="Learniaa" class="" width="100%" style="float:left">--}}
    <h1 class="font-weight-bolder text-center font-weight-bolder" style="font-size:9vw;margin-top: -30px"><span class="text-warning mr-3">لرنیا</span><span class="text-info">بلاگ</span></h1>
    <h3 class="text-justify p-lg-1 p-md-4 p-sm-4 p-4 m-lg-2 text-center">لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد</h3>
    <h6 class="d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-0">
        <button class="btn fourth text-center">شروع کن</button>
    </h6>
@endsection

>>>>>>> 09670972de12e89a298eef85199bbfa030ffe7ef

@section('pic_landing')
    <img  class="learn-bg d-lg-block d-md-block d-sm-none d-none" src="{{asset('images/Template/teacher.svg')}}" alt="" style="margin-top: -15px">
    {{--<img src="{{ asset('images/Template/teacher.svg') }}" alt="Learniaa">--}}
@endsection

@section('content')

    <div class="container-fluid">

        <div class="row mt-5 mb-4" style="padding-top:20px;">

            <div class="col-12 mx-auto text-center">

                <h3>
                        <span style="font-size: 20px ; font-weight: 900">
                    <img src="{{ asset('images/Template/blog.svg') }}" alt="Learniaa" height="25px" width="25px">
                    بخوانید ، بدانید ، لذت ببرید
                    <img src="{{ asset('images/Template/blog.svg') }}" alt="Learniaa" height="25px" width="25px">
                        </span>
                </h3>

            </div>

        </div>

        <div class="row p-2 m-5" id="ListOfData" style="font-size:15px">


            @foreach($recent_post as $one_post)
                @php  $json = json_decode($one_post['extras'],false) @endphp

                <div class="col-lg-4 col-md-6 col-sm-11 col-12 mx-auto mt-3">
                    <div class="card border-none mt-4" style="border-radius: 20px;box-shadow: 0px 0px 20px black;border-style: none">
                        <div class="card-header p-0 overflow-hidden" style="border-top-left-radius: 20px;border-top-right-radius: 20px;border-style: none">
                            <a href="{{route('post.detail', ['slug' => $one_post['pk_post'] , 'desc' =>  $one_post['title'] ]  )}}" class="">
                                <img src="{{  Storage::url('post/'.$one_post['pic_content']) }}" alt="{{ $one_post['title'] }}" class="w-100 imageBlog" style="border-top-left-radius: 20px;border-top-right-radius: 20px;height:30vh">
                            </a>
                        </div>

                        <div class="card-body px-4">
                            <span class="d-block text-secondary">برنامه نویسی</span>
                            <a href="" class="">
                                <h6 class="mt-2">کلاس PHP + آموزش رایگان شی گرایی در PHP</h6>
                            </a>


                            <p class="mt-2 text-secondary">fefwefgnnkgnerogjkbmijgtenbjgnbjnjkfnjkfb.bfgfbf....</p>
                        </div>
                        <div class="card-end px-4 mt-3 py-2">
                            <span class="mt-1">vmdfmvkjdfnbkjgnknf</span><i class="fa fa-circle mr-2 text-info  "></i>
                            <input type="button" class="btn btn-primary float-right px-4 py-2" value="مشاهده">
                        </div>
                    </div>
                </div>


            @endforeach

        </div>


        {{--    Pagination starts--}}
        <section class="Pagination">
            <div class="row mx-auto">
                <div class="col-12">
                    <ul class="pagination px-1 py-1 text-secondary" style="background-color: rgba(248,244,244,0.65)">

                        <li class="border-secondary m-2">
                            <a class="page-link shadow-lg" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>

                        <li class="page-item active border-secondary m-2"><a class="page-link shadow-lg" href="#">1</a></li>

                        <li class="border-secondary m-2"><a class="page-link shadow-lg" href="#">2</a></li>

                        <li class="border-secondary m-2"><a class="page-link shadow-lg" href="#">3</a></li>

                        <li class="border-secondary m-2 rounded">
                            <a class="page-link shadow-lg" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

        </section>
        {{--    Pagination ends--}}

    </div>

    {{--===================================================================--}}


<<<<<<< HEAD
<!-- Comment--> 
=======
    {{--===========================================================================================--}}





@endsection




<script>

    var getUrl = window.location;
    var baseUrl = "https:" + "//" + getUrl.host  ;
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
   <a href="${baseUrl+"/post/" +json.pk_post  + "/" + json.title }">
   <img src="https://5c76fd66bf6fa1001152cbea.liara.space/learniaa/post/${json.pic_content}" class="img-raised rounded img-fluid" alt="${json.title}" style="width: 703px;height: 250px;"></a>
  <a class="text-muted" href="${baseUrl+"/post/" +json.pk_post + "/" + json.title }">
    <h4 style="font-size: 20px;margin-bottom:0px">${json.title}</h4>
    </a>
      <div class="post-meta">
    <div class="post-meta-content">

              <span class="post-auhor-date">
              <span class="text-muted">
              <img src="${baseUrl+ "/images/Template/user.svg"}"  alt="Learniaa" height="20px" width="20px">
              ${writer.name}
                </span>
              <span class="text-muted"> |
              <img src="${baseUrl+ "/images/Template/calendar.svg"}" alt="Learniaa" height="20px" width="20px">

              ${json.extras.create_at}
              </span>

              </span>

             <span class="text-muted"> |
             <img src="${baseUrl+ "/images/Template/clock.svg"}" alt="Learniaa" height="20px" width="20px">

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
                fetch(baseUrl + '/api/posts')
                    .then( response =>    response.json())
                    .then((json) => {

                        page = 1 ;
                        json = JSON.stringify(json);
                        json = JSON.parse(json);

                        if(json.first_page_url != null)
                        {
                            page_url =  json.first_page_url;
                        }
                        else
                        {
                            page_url =  null ;
                            $("#btn_more").css("display","none");
                            return 0;
                        }


                    })
>>>>>>> 09670972de12e89a298eef85199bbfa030ffe7ef

                first_run = 1 ;
            }

        }

        else
        {
            if(first_run == 0)
            {
                fetch(baseUrl + '/api/postsByCategory/'+categoryOfPage)
                    .then(response =>   response.json())
                    .then((json) => {

                        // console.log(json);
                        page = 1 ;
                        json = JSON.stringify(json);

                        json = JSON.parse(json);

                        if(json.first_page_url != null)
                        {
                            page_url =  json.first_page_url;
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


            fetch(baseUrl + '/api/writers/'+item.pk_writers)
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

