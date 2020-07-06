@extends('site.Layouts.layout_main')

@section('Head')
<title>  حساب کاربری | لرنیا</title>
  <meta  name="description" content="حساب کاربری| لرنیا">
@endsection

@section('content')

<div class="row" >
<div class="col-md-2">
</div>
<div class="col-md-4">
        <div class="card shadow border-0" style="border-radius:50px;">
    <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center"><h1 style="font-size:35px">ثبت نام / ورود</h1></div>
              </div>

    <div class="card-body px-lg-5 py-lg-5">

          <form class="form" method="POST" action="{{route('reset.callbackpayment')}}">
              @csrf
              <input type="hidden" name="pk_product" value="{{ $_GET['pk_product'] }}" >
              <input type="hidden" name="title" value="{{ $_GET['title']  }}" >
              <input type="hidden" name="digital_receipt" value="{{ $_GET['digital_receipt']  }}" >
              <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      <img class="img-raised rounded-circle img-fluid"
                      src="{{ asset('images/Template/phone_login.svg') }}" alt="Thumbnail Image" height="45px" width="45px">
                      </div>
                      <input name="username" id="username" type="text" class="form-control" placeholder="تلفن همراه یا پست الکترونیکی">
                    </div>
                  </div>

                  <div class="text-center" style="padding-top:40px">
                    <button type="submit" class="btn btn-primary">تایید  </button>
                  </div>


              </div>
            </form>

          </div>
        </div>
    </div>
      </div>
@endsection
