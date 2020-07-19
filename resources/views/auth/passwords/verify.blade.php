@extends('site.Layouts.layout_main')

@section('Head')
<title> تایید رمز  | لرنیا  </title>
  <meta  name="description" content=" تایید رمز| لرنیا">
@endsection

@section('content')

<div class="row" >
    <div class="auth-card col-lg-4 col-md-5 col-sm-6 col-8 offset-lg-1 offset-md-1 offset-sm-2 offset-2
     text-center bg-white shadow-lg wow fadeInUp" data-wow-delay="0.5s" style=" margin-top: 100px!important;
    border-bottom-right-radius: 50px!important;
    border-bottom-left-radius: 50px!important;">
        <div class="row">
            <div class="col-12 p-0">
                <h3 class="p-2" style="background-color:#20C5BA">دریافت کد تایید</h3>
            </div>
        </div>

        <form class="form" method="GET" action="{{route('reset.update',$pk_user)}}">

            @csrf
            <div class="form-group d-flex mt-5 pr-3 py-2">
                <img class="rounded-circle mr-1"
                     src="{{ asset('images/Template/password_login.svg')}}" alt="Thumbnail Image" height="45px" width="45px">
                <input name="username" id="username" type="text" class="form-control" placeholder="کد تایید">

            </div>

            <input type="submit" class="btn btn-primary text-white text-center mb-5 mt-4" value="تایید">

        </form>
    </div>

      </div>
@endsection
