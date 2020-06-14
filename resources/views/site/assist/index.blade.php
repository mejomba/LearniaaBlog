@extends('site.Layouts.layout_auth')
@section('Head')
<title> همکاری با ما  | لرنیا  </title>
<meta  name="description" content=" همکاری با ما| لرنیا">
@endsection
@section('content')
<div class="row" >
<div class="col-lg-4 col-md-6 ml-auto mr-auto" >
<div class="card shadow border-0">
<div class="card-header" style="background-color:#20C5BA ">
<div class="text-center"><h1>همکاری با ما </h1></div>
</div>
<div class="card-body px-lg-5 py-lg-5">
<form class="form" method="POST" action="{{route('assist')}}">


<div class="form-group">
<div class="input-group input-group-alternative">
<div class="input-group-prepend">
<img class="img-raised rounded-circle img-fluid"
src="{{ asset('images/Template/phone_login.svg') }}" alt="Thumbnail Image" height="45px" width="45px">
</div>
<input name="pk_assist" id="mobile" type="hidden"  >
</div>

<div class="input-group input-group-alternative">
<div class="input-group-prepend">
<img class="img-raised rounded-circle img-fluid"
src="{{ asset('images/Template/phone_login.svg') }}" alt="Thumbnail Image" height="45px" width="45px">
</div>
<input name="name" id="name" type="text" class="form-control" placeholder=" نام ">
</div>


<div class="input-group input-group-alternative">
<div class="input-group-prepend">
<img class="img-raised rounded-circle img-fluid"
src="{{ asset('images/Template/phone_login.svg') }}" alt="Thumbnail Image" height="45px" width="45px">
</div>
<input name="lastname" id="lastname" type="text" class="form-control" placeholder=" نام خانوادگی ">
</div>


<div class="input-group input-group-alternative">
<div class="input-group-prepend">
<img class="img-raised rounded-circle img-fluid"
src="{{ asset('images/Template/phone_login.svg') }}" alt="Thumbnail Image" height="45px" width="45px">
</div>
<input name="coursename" id="coursename" type="text" class="form-control" placeholder=" نام دوره ">
</div>



<div class="input-group input-group-alternative">
<div class="input-group-prepend">
<img class="img-raised rounded-circle img-fluid"
src="{{ asset('images/Template/phone_login.svg') }}" alt="Thumbnail Image" height="45px" width="45px">
</div>
<input name="expertise" id="expertise" type="text" class="form-control" placeholder=" تخصص  ">
</div>

<div class="input-group input-group-alternative">
<div class="input-group-prepend">
<img class="img-raised rounded-circle img-fluid"
src="{{ asset('images/Template/phone_login.svg') }}" alt="Thumbnail Image" height="45px" width="45px">
</div>
<input name="phonenumber" id="phonenumber" type="text" class="form-control" placeholder=" شماره تلفن  ">
</div>

<div class="input-group input-group-alternative">
<div class="input-group-prepend">
<img class="img-raised rounded-circle img-fluid"
src="{{ asset('images/Template/phone_login.svg') }}" alt="Thumbnail Image" height="45px" width="45px">
</div>
<input name="email" id="email" type="text" class="form-control" placeholder=" ایمیل   ">
</div>











</div>
<div class="form-group">
<div class="input-group input-group-alternative">
<div class="input-group-prepend">
<img class="img-raised rounded-circle img-fluid"
src="{{ asset('images/Template/password_login.svg')}}" alt="Thumbnail Image" height="45px" width="45px">
</div>
<input name="password" id="password" type="password" class="form-control" placeholder="رمز عبور">
</div>
</div>
<div class="text-center" style="">
<button type="submit" class="btn btn-primary" style="width:200px">ورود</button>
<a href="{{route('reset.index')}}" class="btn btn-round" style="margin-top:10px" >فراموشی رمز عبور
</a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
@endsection
