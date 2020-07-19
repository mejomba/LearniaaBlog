@extends('site.Layouts.layout_main')

@section('Head')
<title> رمز جدید  | لرنیا  </title>
  <meta  name="description" content=" رمز جدید| لرنیا">
@endsection

@section('content')
<div class="row" >

    <div class="auth-card col-lg-4 col-md-5 col-sm-6 col-8 offset-lg-1 offset-md-1 offset-sm-2 offset-2
     text-center bg-white shadow-lg wow fadeInUp" data-wow-delay="0.5s" style=" margin-top: 100px!important;
    border-bottom-right-radius: 50px!important;
    border-bottom-left-radius: 50px!important;">
        <div class="row">
            <div class="col-12 p-0">
                <h3 class="p-2" style="background-color:#20C5BA"> فراموشی رمز عبور</h3>
            </div>
        </div>
        <form class="form px-1 py-5" method="POST" action="{{route('reset.delete',$pk_user)}}">
            @csrf
            <div class="form-group d-flex mt-2">
                <img class="rounded-circle mr-1"
                     src="{{ asset('images/Template/password_login.svg')}}" alt="Thumbnail Image" height="40px" width="40px">
                <input name="newpassword" id="newpassword" type="text" class="form-control" placeholder="رمز عبور جدید" />

            </div>
            <input type="submit" class="btn btn-primary text-white text-center mt-3" value="تایید">
        </form>

    </div>
@endsection
