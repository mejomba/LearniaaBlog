@extends('site.Layouts.layout_main')

@section('Head')

      @foreach($detail_post as $one_post)
      @php  $json = json_decode($one_post['extras'],false) @endphp

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


@endsection

@section('content')


<div class="row">

@foreach($detail_post as $one_post)
@php  $json = json_decode($one_post['extras'],false) @endphp


<div class="col-md-7">

    <div class="row" style="padding-top: 5px;padding-left:15px;padding-right:15px" >

        <button class="btn   btn-round btnblogPost btn-title" style="border-radius:10px" >

            <h2 style="color:#FFFFFF" class="">{{$one_post['title']}}</h2>



    <div class="post-meta" >

<div class="post-meta-content" class="meta_title_post text-muted" style="font-size:15px">

 <div class="row">

 <div class="col-1">
</div>

<div  class="col-10" style="padding-top:15px">
<span class="post-auhor-date">
            <span class="" style="color:#000">

            @if($one_post->profile['pic'])
            <img  src="{{  Storage::url('profile/'.$one_post->profile['pic']) }}"
            alt="{{$one_post->writer['name']}}" class="img-raised rounded-circle img-fluid" style="width: 60px;height: 60px;" >
            @else
            <img  src="{{ asset('images/Template/user.svg') }}" alt="Learniaa" height="40px" width="40px">
            @endif
            &nbsp;{{$one_post->writer['name']}}</span>
            |

            <span  class="" style="color:#000" >
            <img src="{{ asset('images/Template/calendar.svg') }}" alt="Learniaa" height="40px" width="40px">
              {{ $json->create_at }}
            </span>

            </span>

            |

            <span class="" style="color:#000" >
          <img src="{{ asset('images/Template/clock.svg') }}" alt="Learniaa" height="40px" width="40px">
         {{ $json->readtime }}:00
            </span>

      <div class="post-content">
            <p> </p>
      </div>


</div>


  <div class="col-1">
</div>

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

                    <img class="img-raised rounded img-fluid" src="{{   Storage::url('post/'.$one_post['pic_content'])   }}"
                    alt="{{ $one_post['title'] }}"   height="450px" width="100%" >

                </div>


                <div class="container-fluid" style="margin-top:40px">
                @php echo htmlspecialchars_decode($one_post['content']) ; @endphp
                </div>


                <p></p>
                <p></p>
                <p></p>

                <div style="border-top:2px solid #20c3b8;margin-bottom:10px"> </div>

                    <div class="row">

                          <div class="col-md-3 col-4 center">
                            @if($one_post['pdf_content'])
                          <a style="padding-bottom : 5px" _target="blank" href="{{Storage::url('pdf/'.$one_post['pdf_content'])}}"
                          class="btn btn-primary btn-download btnblogPost">دریافت فایل  (PDF) </a>
                           @else
                           <a style="padding-bottom : 5px"
                            class="btn btn-primary btn-disabled btnblogPost ">دریافت فایل  (PDF) </a>
                           @endif

                          </div>

                  </div>

                 <!-- <div style="border-bottom:2px solid #20c3b8;margin-top:10px">
                   </div>  -->

            </div>

        </div>

    </div>
</div>

   <div class="col-md-5">


          <div class="container-fluid">
          <div class="row" style="padding-top:10px;padding-bottom:15px;">

                        <div class="col-md-1">
                        </div>

                        <div class="col-md-5">
                        <a style="margin-bottom: 15px;width:90%"
                        href="{{route('category.show','توسعه مهارت های شخصی')}}" class="btn  btn-round btnblogPost btn-1">
                          توسعه مهارت
                            </a>
                        </div>

                        <div class="col-md-5">
                        <a style="margin-bottom: 15px;width:90%"
                        href="{{route('category.show','برنامه نویسی')}}" class="btn  btn-round btnblogPost btn-2">    برنامه نویسی   </a>
                        </div>

                        <div class="col-md-1">
                        </div>

                        <div class="col-md-1">
                        </div>

                        <div class="col-md-5">
                        <a style="margin-bottom: 15px;width:90%"
                        href="{{route('category.show','وب')}}" class="btn  btn-round btnblogPost btn-3"> وب </a>
                        </div>

                        <div class="col-md-5">
                        <a style="margin-bottom: 15px;width:90%"
                        href="{{route('category.show','هک و امنیت')}}" class="btn  btn-round btnblogPost btn-4">   هک و امنیت </a>
                        </div>

                        <div class="col-md-1">
                        </div>


        </div>
        </div>
            <!-- Section -->


<div style="border-bottom:2px solid #20c3b8;margin-bottom:10px">
<h3> آخرین نوشته ها</h3>
</div>


     <div class="container-fluid" style="padding-top:15px;padding-bottom:15px;;font-size:15px">


            @foreach($recent_post as $one_post)
            @php  $json = json_decode($one_post['extras'],false) @endphp

       <div class="row div-transition" style="margin-top:10px">

                <div class="col-md-3">

                        <a href="{{route('post.detail',  ['slug' => $one_post['pk_post'] , 'desc' =>  $one_post['title'] ] )}}">
                           <img src="{{ Storage::url('post/'.$one_post['pic_content'])  }}"
                           alt="{{ $one_post['title'] }}"  class="img-raised rounded img-fluid" style="width: 200px;height: 100px;" ></a>
                </div>

                <div class="col-md-9">

                <div class="row">

                        <a class="text-muted" href="{{route('post.detail',  ['slug' => $one_post['pk_post'] , 'desc' =>  $one_post['title'] ] )}}">
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




<!-- Comment--> 






			</ul>
		</div>
	</div>






      </div>

   <!-- end media-post -->

          </div>
          </div>
        </div>















 @endsection






