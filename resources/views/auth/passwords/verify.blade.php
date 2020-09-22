@extends('Layouts.layout_main_site')
@section('Head')
<title> تایید رمز  | لرنیا  </title>
<meta  name="description" content=" تایید رمز| لرنیا">
@endsection
@section('content')
<div class="row" >
<div class="auth-card col-lg-4 col-md-5 col-sm-6 col-11 mx-auto text-center bg-white shadow-lg" 
style="margin-top:150px !important;border-bottom-right-radius: 50px !important;border-bottom-left-radius: 50px !important;">
<div class="row">
<div class="col-12 p-0">
<h3 class="p-2" style="background-color:#20C5BA">دریافت کد تایید</h3>
</div>
</div>
<form class="form py-3" method="GET" action="{{route('reset.update',$pk_user)}}">
@csrf
<div class="form-group mt-2 text-center">
<span>کد تایید ارسال شده را وارد نمایید </span>
</div>
<div class="form-group d-flex mt-3">
<input name="username" id="username" type="text" class="form-control" placeholder="کد تایید">
</div>
<input type="submit" class="btn btn-primary text-white text-center mb-5 mt-4" value="تایید">
</form>
</div>
</div>
@endsection
