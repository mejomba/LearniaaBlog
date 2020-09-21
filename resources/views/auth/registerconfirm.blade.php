@extends('Layouts.layout_main_site')
@section('Head')
<title> کد تایید  | لرنیا  </title>
<meta  name="description" content=" کد تایید| لرنیا">
@endsection
@section('content')
<div class="row" >
<div class="auth-card col-lg-4 col-md-5 col-sm-6 col-8 offset-lg-1 offset-md-1 offset-sm-2offset-2 text-center bg-white shadow-lg wow fadeInUp" data-wow-delay="0.5s" style=" margin-top: 100px!important;  border-bottom-right-radius: 50px!important;border-bottom-left-radius: 50px!important;">
<div class="row">
<div class="col-12 p-0">
<h3 class="p-2" style="background-color:#20C5BA">دریافت کد تایید</h3>
</div>
</div>
<form class="form px-1 py-2" method="POST" action="{{route('register')}}">
@csrf
<div class="form-group mt-2 text-center">
<span>کد تایید ارسال شده را وارد نمایید </span>
</div>
<div class="form-group d-flex mt-2">

@if(isset($_GET['redirectFromURL']))
<input type="hidden" name="redirectFromURL" value="{{$_GET['redirectFromURL']}}">
@endif
@if(isset($_GET['pk_package']))
<input type="hidden" name="pk_package" value="{{$_GET['pk_package']}}">
@endif
<input type="hidden" name="username" value="{{ $_GET['username'] }}">
<input type="hidden" name="name" value="{{ $_GET['name'] }}">
<input type="hidden" name="password" value="{{ $_GET['password'] }}">
<input type="hidden" name="attract" value="{{ $_GET['attract'] }}">


<img class="rounded-circle mr-1" src="{{ asset('images/Template/phone_login.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
<input name="code" id="code" type="text" class="form-control" placeholder=" کد تایید ">
</div>
<input type="submit" class="btn btn-primary text-white text-center mt-3" value="تایید">
</form>
</div>
</div>
@endsection
