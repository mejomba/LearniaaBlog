@extends('site.Layouts.layout_main')
@section('Head')
<title>  حساب کاربری | لرنیا</title>
<meta  name="description" content="حساب کاربری| لرنیا">
@endsection
@section('content')
<div class="row" style="margin-top: 120px" >
<div class="col-lg-5 col-md-7 col-sm-8 col-11 offset-1" style="padding: 0px 28px;" >
<div class="card shadow border-0" style="">
<div class="card-header" style="background-color:#20C5BA ">
<div class="text-center"><h1 style="font-size:30px">ثبت نام / ورود</h1></div>
</div>
<div class="card-body">
<form class="form" method="POST" action="{{route('reset.callbacklogin')}}">

@if(isset($redirectFromURL))
<input type="hidden" name="redirectFromURL" value="{{$redirectFromURL}}">
@endif

@csrf

    <div class="form-group" style="margin-top: 70px;">
        <div class="col-12 d-flex justify-content-around">
            <img class="rounded-circle"
            src="{{ asset('images/Template/phone_login.svg') }}" alt="Thumbnail Image" width="40px">
            <input name="username" id="username" type="text" class="form-control w-75" placeholder=" تلفن همراه یا پست الکترونیکی">
        </div>
    </div>
<div class="text-center" style="padding-top:40px">
<button type="submit" class="btn btn-primary">تایید  </button>
</div>
    <br>


</form>


</div>

<!--
<form class="form" method="POST" action="{{route('login.google')}}">
@csrf
<button type="submit" class="btn btn-primary">google  </button>
</form>
-->
</div>
</div>
</div>
</div>
@endsection
