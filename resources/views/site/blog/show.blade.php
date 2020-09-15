@extends('Layouts.layout_main_site')
@section('Head')
<title>{{ $one_post['title'] }}</title>
@php $meta=json_decode($one_post['metatag'],true) @endphp
@foreach($meta['htmlmeta'] as $key => $value)<meta  name="{{$key}}" content="{{$value}}" >@endforeach
@foreach($meta['opengraph'] as $key => $value)<meta  name="{{$key}}" content="{{$value}}" >@endforeach
@foreach($meta['twitter'] as $key => $value)<meta  name="{{$key}}" content="{{$value}}" >@endforeach
@php $meta=json_decode($one_post['schema_markup'],true) @endphp
@foreach($meta as $key => $value)<meta  name="{{$key}}" content="{{$value}}" > @endforeach
@if($one_post['video'] == 'yes') @php $videometa=json_decode($one_post['video_schema'],true) @endphp
<script type="application/ld+json">{@foreach($videometa as $key => $value)"{{$key}}" {{':'}} "{{$value}}",@endforeach}</script>@endif
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
                    @if($one_post['video'] == 'yes')
                    <div class="col-md-6  p-3  ml-auto mr-auto" >
                    
             <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-title text-center pb-40">
                    <div class="line mt-4 mx-auto rounded-lg"></div>
                    <h3 class="title mt-2">ویدیو مقاله</h3>
                </div> <!-- section title -->
            </div>
        </div>
                 <!--   <p style="font-size:20px;color:#20c5ba;text-align:center"> ویدیو خلاصه مقاله </p> -->
                    <video style="margin-top:20px" class="afterglow" id="my-video" poster="{{ Storage::url('PosterVideoPosts/'.$one_post['poster_video']) }}" width="1200" height="800" src="{{ Storage::url('VideoPosts/'.$one_post['address_video']) }}"> </video>
                    </div>
                    @endif
               </div>
             </div>
<!-- Main Content -->

<!-- Comment Section -->
<div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="section-title text-center pb-40">
                    <div class="line mt-4 mx-auto rounded-lg"></div>
                    <h3 class="title mt-2">دیدگاه و نظرات</h3>
                </div> <!-- section title -->
            </div>
        </div>
<!-- Comment Box -->
<div class="row " style="margin-top:40px">
                    <div class="col-md-8 card p-3  ml-auto mr-auto" style="border: 3px dotted #20c5ba" >
                   <!--New Comment -->
                   @if(Auth::user() != null)
                   <div class="subscribe-form mt-50" style="">
                        <form method="POST" action="{{route('behavior.store')}}">
                           @csrf
                            <button class="main-btn" style="">ثبت نظر </button>
                            <input type="text" class="" name="content" placeholder="اینجا نظرت رو بنویس" 
                            style="text-align: center;">
                            <input type="hidden" name="type_entity" value="پست">
                            <input type="hidden" name="pk_entity" value="{{$one_post['pk_blog']}}">
                            <input type="hidden" name="type_behavior" value="کامنت">
                        </form>
                    </div>
                    @else
                    <a href="{{route('reset.showcallbackloginform')}}" class="main-btn" style="">برای ثبت نظر باید ثبت نام/ورود کنید</a>
                    @endif
                   <!-- NEw Comment -->

               <!--Foreach -->
              
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 mx-auto mt-1">
                @foreach($behaviors as $behavior)
                    <div class="card border-none mt-3" style="border-radius: 20px;box-shadow: 0px 0px 02px black;border-style: none">
                        <div class="card-header p-0 overflow-hidden" style="border-top-left-radius: 20px;border-top-right-radius: 20px;border-style: none"> 
                        </div>
                        <div class="card-body px-4" style="margin-bottom:10px">
                            @if($behavior->profile['pic'])
                            <img  src="{{  Storage::url('profile/'.$behavior->profile['pic']) }}"  
                            alt="Profile" class="img-raised rounded-circle img-fluid" style="width: 60px;height: 60px;" >
                            @else         
                            <img  src="{{ asset('images/Template/user.svg') }}" alt="Learniaa" height="40px" width="40px">
                            @endif
                            <i class="fa fa-circle mr-2 text-warning"></i>
                            {{$behavior->user['name']}}
                            <br>
                            <p style="font-size:15px;color:#20c5ba;line-height:25px !important">{{$behavior->content}}</p>
                       
                   <!-- Reply -->
                   @if($behavior->reply != null)
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 mx-auto mt-1">
                    <div class="card border-none mt-2 mr-2" style="border-radius: 20px;box-shadow: 0px 0px 5px #20c5ba;border-style: none">
                        <div class="card-header p-0 overflow-hidden" style="border-top-left-radius: 20px;border-top-right-radius: 20px;border-style: none">
                        </div>
                     <div class="card-body px-4">    
                            <img  src="{{ asset('images/Template/Circlelogo.svg') }}" alt="Learniaa" height="40px" width="40px">
                            <i class="fa fa-circle mr-2 text-info"></i>
                           مدیر سایت
                            <br>
                            <p style="font-size:15px;color:#20c5ba;line-height:25px !important">{{$behavior->reply}} </p>
                            </div>
                            </div>
                            </div>
                            </div>
                            @endif
                        <!-- Reply -->
                        </div>
              <!--Foreach -->
               </div>
               @endforeach
             </div>
<!-- Comment Box -->
<!-- Comment Section -->
</div>
@endsection
