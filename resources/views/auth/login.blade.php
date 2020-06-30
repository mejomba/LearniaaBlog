@extends('site.Layouts.layout_main')
@section('Head')
<title> ورود  | لرنیا  </title>
<meta  name="description" content=" ورود| لرنیا">
@endsection
@section('content')
<div class="row" >

<div class="col-lg-4 col-md-5 col-sm-7 col-10 offset-lg-1 offset-md-1 offset-sm-1 offset-1" style="margin-top: -70px" >
<div class="card shadow border-0" style="border-radius:50px;">
<div class="card-header" style="background-color:#20C5BA ">
<div class="text-center"><h3>ورود کاربران</h3></div>
</div>
<div class="card-body px-4 py-4">
<form class="form" method="POST" action="{{route('login')}}">

@if(isset($_GET['redirectFromURL']))
<input type="hidden" name="redirectFromURL" value="{{$_GET['redirectFromURL']}}">
@endif


@csrf
@if(isset($_GET['pk_product']))
<input type="hidden" name="pk_product" value="{{ $_GET['pk_product'] }}">
@else
<input type="hidden" name="pk_product" value="null">
@endif
@if(isset($_GET['title']))
<input type="hidden" name="title" value="{{ $_GET['title'] }}">
@else
<input type="hidden" name="title" value="null">
@endif
@if(isset($_GET['digital_receipt']))
<input type="hidden" name="digital_receipt" value="{{ $_GET['digital_receipt'] }}">
@else
<input type="hidden" name="digital_receipt" value="null">
@endif
<div class="form-group">
<div class="input-group input-group-alternative">
<div class="input-group-prepend">
<img class="img-raised rounded-circle img-fluid"
src="{{ asset('images/Template/password_login.svg')}}" alt="Thumbnail Image" height="45px" width="45px">
</div>
<input type="hidden" name="username" value="{{ $_GET['username'] }}">
<input name="password" id="password" type="password" class="form-control" placeholder="رمز عبور">
</div>
</div>
<div class="text-center" style="padding-top:20px">
<button type="submit" class="btn btn-primary" style="width:200px">ورود</button>
    <br>
<a href="{{route('reset.index')}}" style="margin-top:10px" >
    <p class="d-block forget-password">فراموشی رمز عبور</p>
</a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
@endsection
