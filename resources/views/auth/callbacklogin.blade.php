@extends('site.Layouts.layout_main')
@section('Head')
<title>  حساب کاربری | لرنیا</title>
<meta  name="description" content="حساب کاربری| لرنیا">
@endsection
@section('content')
<div class="row" >
<div class="col-lg-4 col-md-6 col-sm-9 col-10 offset-lg-1 offset-md-1 offset-sm-2 offset-1" style="" >
<div class="card shadow border-0" style="border-bottom-left-radius: 50px ; border-bottom-right-radius: 50px">
<div class="card-header" style="background-color:#20C5BA ">
<div class="text-center"><h1 style="font-size:30px">ثبت نام / ورود</h1></div>
</div>
<div class="card-body py-5">
<form class="form" method="POST" action="{{route('reset.callbacklogin')}}">

@if(isset($redirectFromURL))
<input type="hidden" name="redirectFromURL" value="{{$redirectFromURL}}">
@endif

@csrf

    <div class="form-group" >
        <div class="col-12 d-flex justify-content-around">
            <img class="rounded-circle"
            src="{{ asset('images/Template/phone_login.svg') }}" alt="Thumbnail Image" width="40px">
            <input name="username" id="username" type="text" class="form-control w-75" placeholder=" تلفن همراه یا پست الکترونیکی">
        </div>
    </div>
<div class="text-center" style="padding-top: 20px">
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
