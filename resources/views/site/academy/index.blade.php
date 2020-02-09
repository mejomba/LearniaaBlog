@extends('site.Layouts.layout_landing')

@section('Head')
<title> لرنیا | وب سایت آموزش آنلاین  </title>
  <meta  name="description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد">
  <meta  name="keywords"    content="آموزش آنلاین,آموزش مبتدی کامپیوتر,یادگیری,لرنیا" > 
@endsection

@section('text_landing')

    
<img src="{{ asset('images/Template/Header_Academy.png') }}" alt="Learniaa" class="" width="100%" style="float:right">

<a href="#Move_Down" class="daneshka-scroll-bottom text-center" style="margin-top: 20px;"> <span></span></a>

@endsection


@section('pic_landing')

    
<img src="{{ asset('images/Template/Academy_landing.svg') }}" alt="Learniaa" class="" width="65%" style="float:left;padding-left:50px">

@endsection

@section('content')

<div class="container-fluid">
    <div class="row" style="padding-top:15px;padding-bottom:15px">
        
    </div>
</div>


<div id="Move_Down" class="container-fluid">

   

<div  style="border-bottom:2px solid #20c3b8;margin-bottom:10px">
    <h1 class="text-center">  اگه کار با کامپیوتر رو بلد نیستی برات یه نقشه دارم !!! <h1>
</div>

<style>
.videowrapper{
  width: 800px;
  position:relative;
  height: auto;
}
</style>

<div class="row" style="padding-top:15px;padding-bottom:15px;;font-size:15px;margin-right:10px;margin-left:10px;">

        <div class="col-md-1">
        </div> 

        <div class="videowrapper col-md-10 text-center">
            <video class="afterglow"  id="my-video"  width="600" height="300" 
            data-overscale="false"  poster="{{ asset('images/Template/Poster_Academy.png')  }}"
            src="https://5c76fd66bf6fa1001152cbea.liara.space/learniaa/Videos_Beginner_Tree/Video_Intro_Academy.mp4">
            </video>  
            </div>   

        <div class="col-md-1">
        </div>   
   
 </div>

 <div class="row" style="padding-top:15px;padding-bottom:15px;;font-size:15px;margin-right:10px;margin-left:10px;text-center">
 
        <div class="col-md-1">
        </div>

        <div class="videowrapper col-md-10 text-center">
        @if (Auth::check())
        <a href="{{ route('academy.detail')}}" class="btn btn-warning btn-round">
        <img class="img-fluid  rounded-circle shadow-lg" style="border-radius:30% !important;"
       src="{{  Storage::url('tree/'.'Profile_BeginnerTree.png') }}"
       width="40px" height="40px" alt="Profile_BeginnerTree" >   بزن بریم  </a>  
        
        @else
        <a href="{{ route('register',['introduction_Tree'=>'Yes'])}}" class="btn btn-warning btn-round">
        <img class="img-fluid  rounded-circle shadow-lg" style="border-radius:30% !important;"
       src="{{  Storage::url('tree/'.'Profile_BeginnerTree.png') }}"
       width="40px" height="40px" alt="Profile_BeginnerTree" >   بزن بریم  </a>  

        @endif
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
