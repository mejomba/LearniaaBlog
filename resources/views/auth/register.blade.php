@extends('Layouts.layout_main_site')
@section('Head')
<title> ثبت نام | لرنیا  </title>
<meta  name="description" content="ثبت نام| لرنیا">
@endsection
@section('content')
<div class="row ">
<div class="auth-card col-lg-4 col-md-7 col-sm-8 col-9 offset-1 wow fadeInUp" data-wow-delay="0.5s" style=" margin-top: 100px!important;border-bottom-right-radius: 50px!important;border-bottom-left-radius: 50px!important;" >
<div class="card shadow border-0">
<div class="card-header" style="background-color:#20C5BA ">
<div class="text-center"><h3>ثبت نام کاربران</h3></div>
</div>
<div class="card-body pr-3 py-3">
<form class="form" method="GET" action="{{route('registerconfirm')}}">
@csrf
@if(isset($_GET['redirectFromURL']))
<input type="hidden" name="redirectFromURL" value="{{$_GET['redirectFromURL']}}">
@endif
@if(isset($_GET['pk_package']))
<input type="hidden" name="pk_package" value="{{$_GET['pk_package']}}">
@endif
<div class="form-group">
<div class="input-group input-group-alternative">
<div class="input-group-prepend">
<img class="img-raised rounded-circle img-fluid"
src="{{ asset('images/Template/user_login.svg') }}" alt="Thumbnail Image" height="45px" width="45px">
</div>
<input name="name" id="name" type="text" class="form-control" placeholder="نام و نام خانوادگی ">
</div>
</div>
@if(isset($_GET['username']))
<input type="hidden" name="username" value="{{ $_GET['username'] }}">
@else
<input type="hidden" name="username" value="{{ $email }}">
@endif

<div class="form-group">
<div class="input-group input-group-alternative">
<div class="input-group-prepend">
<img class="img-raised rounded-circle img-fluid"
src="{{ asset('images/Template/password_login.svg')}}" alt="Thumbnail Image" height="45px" width="45px">
</div>
<input name="password" id="password" type="password" class="form-control" placeholder="رمز عبور دلخواه شما">
</div>
</div>
<div class="form-group">
<div class="input-group input-group-alternative">
<div class="input-group-prepend">
<img class="img-raised rounded-circle img-fluid"
src="{{ asset('images/Template/invite_login.svg')}}" alt="Thumbnail Image" height="45px" width="45px">
</div>


<select name="attract" class="form-control custom-select">
<option class="" value="Instagram"  > آشنایی با ما از اینستاگرام </option>
<option class="" value="PhysicalAdvertise"  > آشنایی با ما از تراکت،بروشور،پوستر</option>
<option class="" value="ClickOnAds"  > آشنایی با ما از تبلیغات کلیکی</option>
<option class="" value="InviteFriends"  >آشنایی با ما از معرفی دوستان شما</option>
<option class="" value="Facebook"  > آشنایی با ما از فیس بوک</option>
<option class="" value="Twitter"  > آشنایی با ما از توئیتر</option>
<option class="" value="Linkden"  > آشنایی با ما از لینکدین</option>
<option class="" value="SMS"  >آشنایی با ما از پیامک</option>
<option class="" value="Telegram"  >آشنایی با ما از تلگرام</option>
</select>
</div>
@php $id = rand(1,10) @endphp
<input type="hidden" name="picid" value="{{ $id }}">
<div class="input-group-prepend">
<img class="img-raised img-fluid"
src="{{ asset('RECAPTCHA/'.$id.'.jpg')}}" alt="Thumbnail Image" height="250px" width="250px">
<input name="confirm" id="confirm" type="confirm" class="form-control" placeholder=" اعداد داخل کادر را وارد کنید ">
</div>
</div>
<div class="text-center mt-1">
<button type="submit" class="btn btn-primary">ثبت نام</button>
</div>
</div>
</form>
</div>
</div>
</div>
@endsection
