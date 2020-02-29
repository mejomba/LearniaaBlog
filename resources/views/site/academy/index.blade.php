@extends('site.Layouts.layout_landing')

@section('Head')
<title> لرنیا | وب سایت آموزش آنلاین  </title>
  <meta  name="description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد">
  <meta  name="keywords"    content="آموزش آنلاین,آموزش مبتدی کامپیوتر,یادگیری,لرنیا" > 
@endsection

@section('text_landing')

    
<img src="{{ asset('images/Template/Header_Academy.png') }}" alt="Learniaa" class="" width="100%"
 style="float:right">

 <div class="col-md-12 text-center">
<a href="#" class="btn btn-warning btn-round" style="margin-top:20px">
 <img class="img-fluid  rounded-circle shadow-lg" style="border-radius:30% !important;"
src="{{  Storage::url('tree/'.'downFlash.png') }}"
width="40px" height="40px" alt="Profile_BeginnerTree" >  برو پایین  </a> 
</div>

@endsection


@section('pic_landing')

    
<img src="{{ asset('images/Template/academy.svg') }}" alt="Learniaa" class="" width="65%" style="float:left;margin-left:56px">

@endsection

@section('content')

<div class="container-fluid">
    <div class="row" style="padding-top:15px;padding-bottom:15px">
        
    </div>
</div>


<div id="Move_Down" class="container-fluid">

<button class="btn btn-round btnblogPost btn-title" style="border-radius:10px" >
<h2 style="color:#FFFFFF" class="text-center"> اگه کار با سایت رو بلد نیستی فیلم رو ببین !!!</h2>  
</button>


<style>
.videowrapper{
  width: 800px;
  position:relative;
  height: auto;
}
</style>


<div class="row" style="padding-top:15px;padding-bottom:15px;;font-size:15px;margin-right:10px;margin-left:10px;text-center">
 
 <div class="col-md-1">
 </div>

 <div class="videowrapper col-md-10 text-center">

 <a href="{{ route('academy.detail')}}" class="btn btn-warning btn-round" style="line-height: 2;font-size:16px;">
 مشاهده نقشه راه مبتدیان </a>  
 
 </div> 

 <div class="col-md-1">
 </div>                    
</div>

<div class="row" style="padding-top:15px;padding-bottom:15px;;font-size:15px;margin-right:10px;margin-left:10px;">

        <div class="col-md-1">
        </div> 

        <div class="videowrapper col-md-10 text-center">
            <video class="afterglow"  id="my-video"  width="500" height="270" 
            data-overscale="false"  poster="{{ Storage::url('tree/Poster_Intro_Academy.jpg') }}"
            src="{{ Storage::url('Videos_Beginner_Tree/Video_Intro_Academy.mp4') }}">

            </video>  
            </div>   

        <div class="col-md-1">
        </div>   
   
 </div>


             @include('site.Layouts.newspaper')
    </div>


      


</div>
</div>
</div>
</div>

@endsection
