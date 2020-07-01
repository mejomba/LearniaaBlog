@extends('site.Layouts.layout_main')

@section('Head')
<title> فراموشی رمز  | لرنیا  </title>
  <meta  name="description" content=" فراموشی رمز| لرنیا">
@endsection

@section('content')
<div class="row" >
<div class="col-lg-4 col-md-5 col-sm-6 col-9 offset-lg-1 offset-md-1 offset-sm-1 offset-1">
<div class="card shadow border-0" style="border-radius:30px;">
    <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center"><h3 style="font-size: 22px">فراموشی رمز عبور</h3></div>
              </div>

    <div class="card-body px-2 py-3">

          <form class="form" method="POST" action="{{route('reset.store')}}">
              @csrf
              <div class="form-group mt-4">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      <img class="img-raised rounded-circle img-fluid"
                      src="{{ asset('images/Template/phone_login.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
                      </div>
                      <input name="username" id="username" type="text" class="form-control" placeholder="تلفن همراه">
                    </div>
                  </div>

                  <div class="text-center mt-5 mb-4">
                    <button type="submit" class="btn btn-primary">تایید  </button>
                  </div>

          </form>
              </div>

          </div>
        </div>
    </div>
@endsection
