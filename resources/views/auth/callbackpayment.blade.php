@extends('site.Layouts.layout_main')

@section('Head')
<title>  حساب کاربری | لرنیا</title>
  <meta  name="description" content="حساب کاربری| لرنیا">
@endsection

@section('content')

<div class="row" >
{{--<div class="auth-card col-md-4" style=" margin-top: 100px!important;--}}
{{--    border-bottom-right-radius: 50px!important;--}}
{{--    border-bottom-left-radius: 50px!important;">--}}
{{--        <div class="card shadow border-0" style="border-radius:50px;">--}}
{{--    <div class="card-header" style="background-color:#20C5BA ">--}}
{{--                <div class="text-center"><h1 style="font-size:35px">ثبت نام / ورود</h1></div>--}}
{{--              </div>--}}

{{--    <div class="card-body px-lg-5 py-lg-5">--}}

{{--          <form class="form" method="POST" action="{{route('reset.callbackpayment')}}">--}}
{{--              @csrf--}}
{{--              <input type="hidden" name="pk_product" value="{{ $_GET['pk_product'] }}" >--}}
{{--              <input type="hidden" name="title" value="{{ $_GET['title']  }}" >--}}
{{--              <input type="hidden" name="digital_receipt" value="{{ $_GET['digital_receipt']  }}" >--}}
{{--              <div class="form-group">--}}
{{--                    <div class="input-group input-group-alternative">--}}
{{--                      <div class="input-group-prepend">--}}
{{--                      <img class="img-raised rounded-circle img-fluid"--}}
{{--                      src="{{ asset('images/Template/phone_login.svg') }}" alt="Thumbnail Image" height="45px" width="45px">--}}
{{--                      </div>--}}
{{--                      <input name="username" id="username" type="text" class="form-control" placeholder="تلفن همراه یا پست الکترونیکی">--}}
{{--                    </div>--}}
{{--                  </div>--}}

{{--                  <div class="text-center" style="padding-top:40px">--}}
{{--                    <button type="submit" class="btn btn-primary">تایید  </button>--}}
{{--                  </div>--}}


{{--              </div>--}}
{{--            </form>--}}

{{--          </div>--}}
{{--        </div>--}}


    <div class="auth-card col-lg-4 col-md-5 col-sm-6 col-8 offset-lg-1 offset-md-1 offset-sm-2 offset-2 text-center bg-white shadow-lg wow fadeInUp" data-wow-delay="2s" style=" margin-top: 100px!important;
    border-bottom-right-radius: 50px!important;
    border-bottom-left-radius: 50px!important;">
        <div class="row">
            <div class="col-12 p-0">
                <h3 class="p-2" style="background-color:#20C5BA">ثبت نام / ورود</h3>
            </div>
        </div>
        <form class="form" method="POST" action="{{route('reset.callbackpayment')}}">
            @csrf
            <input type="hidden" name="pk_product" value="{{ $_GET['pk_product'] }}" >
            <input type="hidden" name="title" value="{{ $_GET['title']  }}" >
            <input type="hidden" name="digital_receipt" value="{{ $_GET['digital_receipt']  }}" >
            <div class="form-group d-flex mt-2">
                <img class="rounded-circle mr-1"
                     src="{{ asset('images/Template/phone_login.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
                <input name="username" id="username" type="text" class="form-control" placeholder=" تلفن همراه یا پست الکترونیکی">

            </div>
            <input type="submit" class="btn btn-primary text-white text-center mt-3" value="تایید">
        </form>

    </div>


    </div>
@endsection
