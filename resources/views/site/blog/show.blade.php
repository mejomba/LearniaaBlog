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
           

           <div class="col-lg-7 col-md-12 order-lg-0 order-md-0 order-sm-0 order-0" style="padding-left:50px;">
                <div class="novel-image">
                    <img src="{{  Storage::url('post/'.$one_post['pic_content']) }}" 
                    alt="" class="w-100 m-3 p-3" style="width:820px !important;height:400px;border-radius: 50px;">
                </div>
                <h1 class="mr-auto mt-1 ml-5" style="font-size:20px">{{$one_post['title']}}
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                نویسنده :
                @if($one_post->profile['pic'])
                <img  src="{{  Storage::url('profile/'.$one_post->profile['pic']) }}"  
                alt="{{$one_post->writer['name']}}" class="img-raised rounded-circle img-fluid" style="width: 60px;height: 60px;" >
                @else         
                <img  src="{{ asset('images/Template/user.svg') }}" alt="Learniaa" height="40px" width="40px">
                @endif
                
                {{$one_post->writer['name']}}
                </h1>
                <hr class="dash mx-auto" style="height: 1px ; width: 90% ; background-color: #a7a5a5 ;"> 
                <div class="row mt-3 text-center">
                    <span class="col-lg-2 col-md-2 col-sm-8 col-4 order-lg-0 order-md-0 order-sm-2 order-2">100 <i class="fa fa-heart text-danger"></i></span>
                    <span class="col-lg-3 col-md-3 col-sm-4 col-8 order-lg-1 order-md-1 order-sm-3 order-3"> زمان مطالعه:  {{ $one_post['readtime'] }} دقیقه </span></span>
                    <span class="col-lg-4 col-md-4 col-sm-8 col-8 order-lg-2 order-md-2 order-sm-0 order-0">به روز شده در :  {{ $one_post['create_at'] }}</span>
                    <span class="col-lg-3 col-md-3 col-sm-4 col-4 order-lg-3 order-md-3 order-sm-1 order-1" >
                     <span style="color: WHITE;background-color:#20c5ba;border-radius: 5px;padding:3px!important">{{ $one_post->category['name'] }}</span></span>
                </div>
            </div>

       
        </div>
    </div>
</section>

<!-- Main Content -->

<div class="row " style="margin-top:40px">
                    <div class="col-md-10 card p-3  ml-auto mr-auto" style="border: 3px dotted #20c5ba" >
                    @php echo htmlspecialchars_decode($one_post['content']) ; @endphp
               </div>
             </div>
<!-- Main Content -->


@endsection
