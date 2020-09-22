@extends('Layouts.layout_main_site')
@section('Head')
<title> فراموشی رمز  | لرنیا  </title>
<meta  name="description" content=" فراموشی رمز| لرنیا">
@endsection
@section('content')
<div class="row" >
<div class="auth-card col-lg-4 col-md-5 col-sm-6 col-11 mx-auto text-center bg-white shadow-lg" 
style="margin-top:150px !important;border-bottom-right-radius: 50px !important;border-bottom-left-radius: 50px !important;"><div class="row">
<div class="col-12 p-0">
<h3 class="p-2" style="background-color:#20C5BA">فراموشی رمز عبور</h3>
</div>
</div>
<form class="form py-3" method="POST" action="{{route('reset.store')}}">
@csrf
<div class="form-group text-center">
<span>تلفن همراه یا پست الکترونیکی خود را وارد نمایید</span>
</div>
<div class="form-group d-flex mt-3">
<input name="username" id="username" type="text" class="form-control" placeholder=" تلفن همراه یا پست الکترونیکی">
</div>
<input type="submit" class="btn btn-primary text-white text-center mt-3" value="تایید">
</form>
</div>
</div>
@endsection
