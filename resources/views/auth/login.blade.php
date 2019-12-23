@extends('site.Layouts.layout_auth')

@section('Head')
<title> ورود  | لرنیا  </title>
  <meta  name="description" content=" ورود| لرنیا">
@endsection

@section('content')

<div class="row" >
        <div class="col-lg-4 col-md-6 ml-auto mr-auto" >
        <div class="card shadow border-0">
    <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center"><h1>ورود کاربران</h1></div>
              </div>

    <div class="card-body px-lg-5 py-lg-5">
      
          <form class="form" method="POST" action="{{route('login')}}">
              @csrf


              <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      <img class="img-raised rounded-circle img-fluid" 
                      src="{{ asset('images/Template/phone_login.svg') }}" alt="Thumbnail Image" height="45px" width="45px">
                      </div>
                      <input name="mobile" id="mobile" type="text" class="form-control" placeholder="تلفن همراه">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      <img class="img-raised rounded-circle img-fluid" 
                      src="{{ asset('images/Template/password_login.svg')}}" alt="Thumbnail Image" height="45px" width="45px">
                      </div>
                      <input name="password" id="password" type="password" class="form-control" placeholder="رمز عبور">
                    </div>
                  </div>


                  <div class="text-center" style="padding-top:20px">
                    <button type="submit" class="btn btn-primary">ورود </button>
                    <a href="{{route('reset.index')}}" class="btn btn-warning btn-round">  فراموشی رمزعبور
                      </a> 
                  </div>

                
              </div>

            </form>
            </div>
          </div>
        </div>
      </div>
@endsection
