@extends('site.Layouts.layout_main')
@section('Head')
<title> ورود  | لرنیا  </title>
<meta  name="description" content=" ورود| لرنیا">
@endsection
@section('content')
    <section class="login-users">
        <div class="row" >

            <div class="auth-card col-lg-4 col-md-5 col-sm-6 col-8 offset-lg-1 offset-md-1 
            offset-sm-2 offset-2 text-center bg-white shadow-lg wow fadeInUp" data-wow-delay="0.5s" style=" margin-top: 100px!important;
    border-bottom-right-radius: 50px!important;
    border-bottom-left-radius: 50px!important;">
                <div class="row">
                    <div class="col-12 p-0">
                        <h3 class="p-2" style="background-color:#20C5BA">ورود کاربران</h3>
                    </div>
                </div>
                <form class="form pr-3 py-5" method="POST" action="{{route('login')}}">

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
                        <div class="form-group d-flex mt-2">
                            <img class="rounded-circle mr-1"
                                 src="{{ asset('images/Template/password_login.svg')}}" alt="Thumbnail Image" height="45px" width="45px">
                            <input type="hidden" name="username" value="{{ $_GET['username'] }}">
                            <input name="password" id="password" type="password" class="form-control" placeholder="رمز عبور">

                        </div>

                        <input type="submit" class="btn btn-primary text-white text-center" value="ورود">
                        <p class=""><a href="{{route('reset.index')}}" class="">فراموشی رمز عبور</a></p>
                </form>

            </div>

        </div>
    </section>



@endsection
