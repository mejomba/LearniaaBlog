@extends('site.Layouts.layout_main')

@section('Head')

    <title>{{ $one_post['title'] }}</title>

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


@endsection

@section('content')

<section class="show-novel">
    <div class="container-fluid" style="padding-top:50px;">
        <div class="row">
           

            <div class="col-lg-7 col-md-12 order-lg-0 order-md-0 order-sm-0 order-0" style="padding-left:50px;" >
                <div class="novel-image">
                    <img src="{{  Storage::url('post/'.$one_post['pic_content']) }}" alt="" class="w-100 m-3 p-3" style="height:40vh">
                </div>

                <h4 class="mr-auto mt-1 ml-5">آموزش بورس گام به گام (+ دانلود ویدیوی آموزشی)</h4>
                <hr class="dash mx-auto" style="height: 1px ; width: 90% ; background-color: #a7a5a5 ;">
                <div class="row mt-3 text-center">
                    <span class="col-lg-2 col-md-2 col-sm-8 col-4 order-lg-0 order-md-0 order-sm-2 order-2">48 <i class="fa fa-heart text-danger"></i></span>
                    <span class="col-lg-3 col-md-3 col-sm-4 col-8 order-lg-1 order-md-1 order-sm-3 order-3"> زمان مطالعه:  51 دقیقه </span></span>
                    <span class="col-lg-4 col-md-4 col-sm-8 col-8 order-lg-2 order-md-2 order-sm-0 order-0">به روز شده در :  1399/07/01</span>
                    <span class="col-lg-3 col-md-3 col-sm-4 col-4 order-lg-3 order-md-3 order-sm-1 order-1" >
                     <span style="color: WHITE;background-color:#20c5ba;border-radius: 5px;padding:3px!important">کسب و کار</span></span>
                </div>
                <div class="explanation mx-lg-5 px-lg-5 my-5">
                    <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus illo omnis quas suscipit. Corporis deleniti dicta error est explicabo harum in incidunt laboriosam minima modi, qui repellat sapiente unde. Eos!</p>
                </div>
            </div>
            <!--
            <div class="col-lg-3 col-md-7 col-sm-8 col-11 order-lg-0 order-md-1 order-sm-1 order-1 mx-auto">
                <div class="card border-none mt-4" style="border-radius: 20px;box-shadow: 0px 0px 20px black;border-style: none">
                    <div class="card-header p-0 overflow-hidden" style="border-top-left-radius: 20px;border-top-right-radius: 20px;border-style: none">
                        <a href="" class="">
                            <img src="{{  Storage::url('post/'.$one_post['pic_content']) }}" alt="" class="w-100 imageBlog" style="border-top-left-radius: 20px;border-top-right-radius: 20px;height:30vh">
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

                    </div>
                </div>

                <div class="card border-none mt-4" style="border-radius: 20px;box-shadow: 0px 0px 20px black;border-style: none">
                    <div class="card-header p-0 overflow-hidden" style="border-top-left-radius: 20px;border-top-right-radius: 20px;border-style: none">
                        <a href="" class="">
                            <img src="{{  Storage::url('post/'.$one_post['pic_content']) }}" alt="" class="w-100 imageBlog" style="border-top-left-radius: 20px;border-top-right-radius: 20px;height:30vh">
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

                    </div>
                </div>

                <div class="card border-none mt-4" style="border-radius: 20px;box-shadow: 0px 0px 20px black;border-style: none">
                    <div class="card-header p-0 overflow-hidden" style="border-top-left-radius: 20px;border-top-right-radius: 20px;border-style: none">
                        <a href="" class="">
                            <img src="{{  Storage::url('post/'.$one_post['pic_content']) }}" alt="" class="w-100 imageBlog" style="border-top-left-radius: 20px;border-top-right-radius: 20px;height:30vh">
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

                    </div>
                </div>
            </div>
            -->
        </div>
    </div>
</section>
@endsection
