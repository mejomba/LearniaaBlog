@extends('site.Layouts.layout_main')
@section('Head')
<title>  حساب کاربری | لرنیا</title>
<meta  name="description" content="حساب کاربری| لرنیا">
@endsection
@section('content')
<div class="row" >
    <div class="auth-card col-lg-4 col-md-5 col-sm-6 col-8 offset-lg-1 offset-md-1 offset-sm-2 offset-2 text-center bg-white shadow-lg" style=" margin-top: 100px!important;
    border-bottom-right-radius: 50px!important;
    border-bottom-left-radius: 50px!important;">
        <div class="row">
            <div class="col-12 p-0">
                <h3 class="p-2" style="background-color:#20C5BA">ثبت نام / ورود</h3>
            </div>
        </div>

        <form class="form" method="POST" action="{{route('reset.callbacklogin')}}">
            @if(isset($redirectFromURL))
                <input type="hidden" name="redirectFromURL" value="{{$redirectFromURL}}">
            @endif

            @csrf
            <div class="form-group d-flex mt-5 pr-3 py-2">
                <img class="rounded-circle mr-1"
                     src="{{ asset('images/Template/phone_login.svg') }}" alt="Thumbnail Image" height="45px" width="45px">
                <input name="username" id="username" type="text" class="form-control" placeholder=" تلفن همراه یا پست الکترونیکی">

            </div>

            <input type="submit" class="btn btn-primary text-white text-center mb-5 mt-4" value="تایید">

        </form>
        @csrf
    </div>






</div>




@endsection


