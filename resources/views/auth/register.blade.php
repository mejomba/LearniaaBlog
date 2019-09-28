@extends('site.Layouts.layout_auth')

@section('Head')
<title> ثبت نام | لرنیا  </title>
  <meta  name="description" content="ثبت نام| لرنیا">
@endsection

@section('content')

<div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
        <div class="card shadow border-0">
    <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center"><h4>ثبت نام کاربران</h4></div>
              </div>

    <div class="card-body px-lg-5 py-lg-5">

            <form class="form" method="POST" action="{{route('register')}}">
              @csrf
             
              
              <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      <img class="img-raised rounded-circle img-fluid" 
                      src="{{ asset('images/Template/user_icon.png') }}" alt="Thumbnail Image" height="auto" width="auto">
                      </div>
                      <input name="name" id="name" type="text" class="form-control" placeholder="نام ">
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      <img class="img-raised rounded-circle img-fluid" 
                      src="{{ asset('images/Template/phone_icon.png')}}" alt="Thumbnail Image" height="auto" width="auto">
                      </div>
                      <input name="mobile" id="mobile" type="text" class="form-control" placeholder="تلفن همراه">
                    </div>
                  </div>

                  
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      <img class="img-raised rounded-circle img-fluid" 
                      src="{{ asset('images/Template/key_icon.png')}}" alt="Thumbnail Image" height="auto" width="auto">
                      </div>
                      <input name="password" id="password" type="password" class="form-control" placeholder="رمز عبور">
                    </div>
                  </div>

                  <div class="text-center" style="padding-top:20px">
                    <button type="submit" class="btn btn-primary">ثبت نام </button>
                  </div>


              </div>
            </form>
            
          </div>
        </div>


      </div>
  
@endsection
