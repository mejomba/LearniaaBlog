@extends('site.Layouts.layout_main')
@section('Head')
<title>  حساب کاربری | لرنیا</title>
<meta  name="description" content="حساب کاربری| لرنیا">
@endsection
@section('content')
<div class="row" >
<div class="col-lg-4 col-md-6 col-sm-9 col-10 offset-lg-1 offset-md-1 offset-sm-2 offset-1">
<div class="card shadow border-0" style="border-bottom-left-radius: 50px ; border-bottom-right-radius: 50px">
<div class="card-header" style="background-color:#20C5BA ">
<div class="text-center"><h3>ثبت نام / ورود</h3></div>
</div>
<div class="card-body">
<form class="form" method="POST" action="{{route('reset.callbacklogin')}}">

@if(isset($redirectFromURL))
<input type="hidden" name="redirectFromURL" value="{{$redirectFromURL}}">
@endif

@csrf

    <div class="form-group mt-4" >
        <div class="col-12 d-flex justify-content-center">
            <img class="rounded-circle d-inline mr-1"
            src="{{ asset('images/Template/phone_login.svg') }}" alt="Thumbnail Image" width="40px">
            <input name="username" id="username" type="text" class="form-control" placeholder=" تلفن همراه یا پست الکترونیکی">
        </div>
    </div>
<div class="text-center" style="padding-top: 20px">
<button type="submit" class="btn btn-primary">تایید  </button>
</div>

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
