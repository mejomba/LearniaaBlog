@extends('Layouts.layout_main_site')
@section('Head')
<title> ورود  | لرنیا  </title>
<meta  name="description" content=" ورود| لرنیا">
@endsection
@section('content')
<section class="login-users my-5">
<div class="row py-3" >
<div class="auth-card col-lg-4 col-md-5 col-sm-6 col-11 mx-auto text-center bg-white shadow-lg" 
style="margin-top:150px !important;border-bottom-right-radius: 50px !important;border-bottom-left-radius: 50px !important;">
<div class="row">
<div class="col-12 p-0">
<h3 class="p-2" style="background-color:#20C5BA">ورود کاربران</h3>
</div>
</div>
<form class="form py-3" method="POST" action="{{route('login')}}">
@csrf
<div class="form-group text-center">
<span>رمز عبور خود را وارد نمایید</span>
</div>
@if(isset($_GET['redirectFromURL']))
<input type="hidden" name="redirectFromURL" value="{{$_GET['redirectFromURL']}}">
@endif
@if(isset($_GET['pk_package']))
<input type="hidden" name="pk_package" value="{{$_GET['pk_package']}}">
@endif
<div class="form-group d-flex mt-3">
@if(isset($_GET['username']))
<input type="hidden" name="username" value="{{ $_GET['username'] }}">
@else
<script>window.location = "/reset/showcallbackloginform";</script>
@endif
<input name="password" id="password" type="password" class="form-control" placeholder="رمز عبور">
</div>
<input type="submit" class="btn btn-primary text-white text-center" value="ورود">
<p class=""><a href="{{route('reset.index')}}" class="">فراموشی رمز عبور</a></p>
</form>
</div>
</div>
</section>
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