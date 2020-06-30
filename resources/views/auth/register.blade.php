@extends('site.Layouts.layout_main')
@section('Head')
<title> ثبت نام | لرنیا  </title>
<meta  name="description" content="ثبت نام| لرنیا">
@endsection
@section('content')
<div class="row">

<div class="col-lg-4 col-md-7 col-sm-8 col-9 offset-1" style="padding: 0px 28px;margin-top: -60px"  >
<div class="card shadow border-0" style="border-bottom-right-radius:60px; border-bottom-left-radius:60px">
<div class="card-header" style="background-color:#20C5BA ">
<div class="text-center"><h3>ثبت نام کاربران</h3></div>
</div>
<div class="card-body pr-3 py-3">
<form class="form" method="POST" action="{{route('register')}}">

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
<option value="0">راه آشنایی با لرنیا</option>
<option class="" value="Instagram"  > اینستاگرام</option>
<option class="" value="PhysicalAdvertise"  > تراکت،بروشور،پوستر</option>
<option class="" value="ClickOnAds"  > تبلیغات کلیکی</option>
<option class="" value="InviteFriends"  >معرفی دوستان شما</option>
<option class="" value="Facebook"  > فیس بوک</option>
<option class="" value="Twitter"  > توئیتر</option>
<option class="" value="Linkden"  > لینکدین</option>
<option class="" value="SMS"  >پیامک</option>
<option class="" value="Telegram"  > تلگرام</option>
</select>
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
