@extends('Layouts.layout_main_site')
@section('Head')
<title>تماس با ما|لرنیا</title>
<meta  name="description" content="تماس با ما|لرنیا">
<meta  name="keywords" content="تماس با ما,ارتباط با ما,ارتباط با لرنیا" >
<meta property="og:title" content="تماس با ما|لرنیا"/>
<meta property="og:url" content="{{Request::url()}}"/>
<meta property="og:image" content="{{ asset('images/Template/Circlelogo.svg') }}">
<meta property="og:type" content="website"/>
<meta name="description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد">
<meta property="og:locale" content="fa_IR"/>
<meta name="twitter:card" content="summary" /> 
<meta name="twitter:site" content="{{Request::url()}}" /> 
<meta name="twitter:title" content="تماس با ما|لرنیا" /> 
<meta name="twitter:description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد" /> 
<meta name="twitter:image" content="{{ asset('images/Template/Circlelogo.svg') }}"> 
@endsection
@section('content')
<div class="row">
<div class="col-lg-4 col-md-6 col-sm-7 col-12 " style=" margin-top: 100px!important;border-bottom-right-radius: 50px!important;border-bottom-left-radius: 50px!important;">
<div class="col-12">
<div class="card shadow border-0" style="border-bottom-right-radius:60px ;border-bottom-left-radius:60px; ">
<div class="card-header" style="background-color:#20C5BA ">
<div class="text-center"><h4>تماس با ما</h4></div>
</div>
<div class="card-body px-3 py-3">
<form role="form" method="POST" action="{{route('message.store')}}" style="height:auto; ">
@csrf
<div class="form-group">
<div class="input-group input-group-alternative">
<input name="name" id="name" class="form-control" placeholder="نام و نام خانوادگی" type="text">
</div>
</div>
<div class="form-group">
<div class="input-group input-group-alternative">
<input name="username" id="username" class="form-control" placeholder="ایمیل یا شماره موبایل" type="text">
</div>
</div>
<div class="form-group">
<div class="input-group input-group-alternative">
<textarea name="message" style="height:80px;resize: none;" id="message" type="text" class="form-control" placeholder="متن پیام"></textarea>
</div>
</div>
<div class="text-center form-group" >
<input type="submit" class="btn btnLearniaa" value="ارسال پیام">
</div>
</form>
</div>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6 col-sm-7 col-9 offset-1" style="border-bottom-right-radius: 50px!important;border-bottom-left-radius: 50px!important;">
<img  class="learn-bg d-lg-block d-md-block d-sm-none d-none"  style="right:300px;top:50px" src="{{asset('images/Template/AboutUs.svg')}}" alt="">  
</div>
</div>
<div class="col-md-12 text-center" dir="rtl" style="margin-top:15px">
<p>
</p>
</div>
@endsection
