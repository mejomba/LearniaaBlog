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
      <!-- Start Section -->      
           <div class="col-lg-6 col-md-12 order-lg-0 order-md-0 order-sm-0 order-0" style="padding-left:50px;">
                <div class="novel-image">
                    <img src="{{  Storage::url('post/'.$one_post['pic_content']) }}" 
                    alt="" class="w-100 m-3 p-3" style="width:820px !important;height:50%;border-radius: 50px;">
                </div>
            </div>
            <!-- End Section -->

            <!-- Start Section -->
            <div class="col-lg-5 col-md-6 col-sm-11 col-12 mx-auto mt-3">
                    <div class="card border-none mt-4" style="border-radius: 20px;box-shadow: 0px 0px 8px #0000002b;border-style:none;max-height:435px;height:435px">
                    
                        <div class="card-body px-4">
                          <div class="row">
                           <div class="col-md-4 mx-auto text-center">
                            @if($one_post->profile['pic'])
                                <img  src="{{  Storage::url('profile/'.$one_post->profile['pic']) }}"  
                                alt="{{$one_post->writer['name']}}" class="img-raised rounded-circle img-fluid"  style="width:150px;height:150px;" >
                                @else         
                                <img  src="{{ asset('images/Template/user.svg') }}" class="img-raised rounded-circle img-fluid"  alt="Learniaa"  style="width:150px;height:150px;">
                                @endif
                             </div> 
                           </div> 

                           <div class="row">
                             <div class="col-md-4 mx-auto text-center">
                             <span class="text-center">   {{$one_post->writer['name']}} </span>
                             </div> 
                           </div>

                           <div class="row">
                             <div class="col-md-12" style="margin-top: 10px;">
                             <img src="{{ asset('images/icons/Page.svg') }}" alt="Thumbnail Image" height="30px" width="30px">  موضوع :
                             </div>
                             <div class="col-md-12 text-center" style="background-color: #20C5BA;margin-top:5px;border-radius:15px">
                             <p  style="direction:rtl;font-size:20px;color:white;margin-top:10px !important;margin-bottom:10px !important;"> {{ $one_post['title'] }}</p>
                             
                             </div> 
                           </div>

                       <div class="row">
                         <div class="col-md-6" style="margin-top: 20px;">
                             <img src="{{ asset('images/icons/Category.svg') }}" alt="Thumbnail Image" height="30px" width="30px">  دسته بندی :
                              <span>  {{ $one_post->category['name'] }}  </span>
                            </div>

                            <div class="col-md-6" style="margin-top: 20px;">
                             <img src="{{ asset('images/icons/Level.svg') }}" alt="Thumbnail Image" height="30px" width="30px"> رده بندی :
                              <span>  {{ $one_post['level'] }}  </span>
                            </div>
                         
                           <div class="col-md-6" style="margin-top: 20px;">
                             <img src="{{ asset('images/icons/Calender.svg') }}" alt="Thumbnail Image" height="30px" width="30px">  تاریخ انتشار :
                              <span>  {{ $one_post['create_at'] }} </span>
                            </div>

                            <div class="col-md-6" style="margin-top: 20px;">
                             <img src="{{ asset('images/icons/Time.svg') }}" alt="Thumbnail Image" height="30px" width="30px">  زمان مطالعه :
                              <span>  {{ $one_post['readtime'] }} دقیقه </span>
                            </div>
                        </div> 
                       </div>                        
                    </div>
                </div>
            <!-- End Section -->

      </div>
    </div>
</section>
<!-- Main Content -->
<div class="container-fluid">
  <div class="row">
 
  <!-- This Magazine -->
         <div class="col-lg-9">
            <div class="card border-none pr-4 pl-3 mt-4" style="border-radius: 20px;box-shadow: 0px 0px 8px #0000002b;border-style:none;">
                    @php echo htmlspecialchars_decode($one_post['content']) ; @endphp
                    @if($one_post['video'] == 'yes')
                        <div class="row justify-content-center">
                        <div class="col-lg-7 ml-auto mr-auto">
                            <div class="section-title text-center pb-40">
                                <div class="line mt-4 mx-auto rounded-lg"></div>
                                <h3 class="title mt-2">ویدیو مقاله</h3>
                            </div> <!-- section title -->
                    <video style="margin-top:20px;margin-bottom:20px" class="afterglow" id="my-video" poster="{{ Storage::url('PosterVideoPosts/'.$one_post['poster_video']) }}" width="800" height="600" src="{{ Storage::url('VideoPosts/'.$one_post['address_video']) }}"> </video>
                    </div>
                    </div>
                    @endif
                 </div>
               </div>

  <!-- This Magazine -->               
  <!-- Others Magazine -->
           <div class="col-lg-3 mt-4">
               <div class="row text-center">
               <div class="col-lg-12 text-center">
                <span style="direction:rtl;font-size: 18.0pt;color: #20c5ba;margin-top:10px !important;margin-bottom:10px !important;border-bottom: 2px double;font-weight: bold;">مطالب مرتبط </span>
                </div>
            </div>
                <div class="row p-2" id="ListOfData" style="font-size:15px">
                @foreach($recent_post as $one_post)
                    @php  $json = json_decode($one_post['extras'],false) @endphp
                    <div class="col-lg-12 d-flex p-1">
                    <div class="card imageBlog my-4">
                         <img class="card-img-top w-100 post-image" src="{{  Storage::url('post/'.$one_post['pic_content']) }}" alt="{{ $one_post['title'] }}" >
                         <div class="card-body">
                            <h5 class="card-title py-3 px-2">
                                <a href="{{route('blog.show', ['en_title' =>  $one_post['en_title'] ]  )}}" class="">
                                    <h2 class="mt-5" style="direction:rtl;font-size:16px">{{ $one_post['title'] }}</h2>
                                </a>                           
                            </h5>
                            <p class="card-text post-summray text-justify px-2 ">
                            @php echo substr($one_post['desc_short'],0,300) . '...' @endphp
                            </p>

                      
                            
                        </div>
                            <div class="my-4 mx-3 rtl-dir">
                                <span class="text-danger"> نویسنده: </span>    
                                <span> <a href="#">نام نویسنده</a> </span>
                            </div>
                        <div class="card-footer d-flex justify-content-between">
                            <div>
                                <small class="mt-1">زمان مطالعه:  {{ $one_post['readtime'] }} دقیقه</small>
                                <img src="{{ asset('images/icons/Time.svg') }}" alt="Thumbnail Image" height="20px" width="20px">
                            </div>
                            <a href="{{route('blog.show', ['en_title' =>  $one_post['en_title'] ]  )}}" class="btn main-btn">مطالعه</a>
                        </div>
                            
                            
                        <!-- </div> -->
                        <!-- <a href="#" class="card-footer btn main-btn">مطالعه</a> -->
                    </div>
                </div>
                @endforeach
            </div>
        <!-- Others Magazine -->
       </div>
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
                    <div class="card border-none mt-3" style="border-radius: 20px;box-shadow: 0px 0px 8px #0000002b;border-style: none">
                        <div class="card-header p-0 overflow-hidden" style="border-top-left-radius: 20px;border-top-right-radius: 20px;border-style: none"> 
                        </div>
                        <div class="card-body px-4" style="margin-bottom:10px">
                            @if($behavior->profile['pic'])
                            <img  src="{{  Storage::url('profile/'.$behavior->profile['pic']) }}"  
                            alt="Profile" class="img-raised rounded-circle img-fluid" style="width: 60px;height: 60px;" >
                            @else         
                            <img  src="{{ asset('images/Template/user.svg') }}" alt="Learniaa" height="40px" width="40px">
                            @endif
                          
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
