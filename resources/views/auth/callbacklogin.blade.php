@extends('Layouts.layout_main_site')
@section('Head')
<title>  حساب کاربری | لرنیا</title>
<meta  name="description" content="حساب کاربری| لرنیا">
@endsection
@section('content')
<div class="row my-5" >
<div class="auth-card col-lg-4 col-md-5 col-sm-6 col-11 mx-auto text-center bg-white shadow-lg" 
style="margin-top:150px !important;border-bottom-right-radius: 50px !important;border-bottom-left-radius: 50px !important;">   
<div class="row">
<div class="col-12 p-0">
<h3 class="p-2" style="background-color:#20C5BA">ثبت نام / ورود</h3>
</div>
</div>
<form class="form py-3" method="POST" action="{{route('reset.callbacklogin')}}">
@csrf
<div class="form-group text-center">
<span>تلفن همراه یا پست الکترونیکی خود را وارد نمایید</span>
</div>
@if(isset($redirectFromURL))
<input type="hidden" name="redirectFromURL" value="{{$redirectFromURL}}">
@endif
@if(isset($_GET['pk_package']))
<input type="hidden" name="pk_package" value="{{$_GET['pk_package']}}">
@endif
<div class="form-group d-flex mt-3">
<input name="username" id="username" type="text" class="form-control" placeholder=" تلفن همراه یا پست الکترونیکی">
</div>
<input type="submit" class="btn btn-primary text-white text-center mb-5 mt-4" value="تایید">
</form>
@csrf
</div>
</div>
@endsection


<div class="area">
    <ul class="circles">
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    </ul>
</div>
