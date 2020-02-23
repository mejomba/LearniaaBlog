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
                <div class="text-center"><h1>ثبت نام کاربران</h1></div>
              </div>

    <div class="card-body px-lg-5 py-lg-5">

            <form class="form" method="POST" action="{{route('register')}}">
              @csrf

              @if(isset($_GET['introduction_Tree']))
              <input type="hidden"  name="introduction_Tree" value="Yes" class="form-control" > 
             @endif
              
              <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      <img class="img-raised rounded-circle img-fluid" 
                      src="{{ asset('images/Template/user_login.svg') }}" alt="Thumbnail Image" height="45px" width="45px">
                      </div>
                      <input name="name" id="name" type="text" class="form-control" placeholder="نام ">
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      <img class="img-raised rounded-circle img-fluid" 
                      src="{{ asset('images/Template/phone_login.svg')}}" alt="Thumbnail Image" height="45px" width="45px">
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


                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      <img class="img-raised rounded-circle img-fluid" 
                      src="{{ asset('images/Template/password_login.svg')}}" alt="Thumbnail Image" height="45px" width="45px">
                      </div>

                         <select name="attract" class="form-control">
                         <option class="" value="Instagram"  >آشنایی با لرنیا: اینستاگرام</option>
                          <option class="" value="PhysicalAdvertise"  >آشنایی با لرنیا: تراکت،بروشور،پوستر</option>
                          <option class="" value="ClickOnAds"  >آشنایی با لرنیا: تبلیغات کلیکی</option>
                          <option class="" value="InviteFriends"  >آشنایی با لرنیا: معرفی دوستان شما</option>
                          <option class="" value="Facebook"  >آشنایی با لرنیا: فیس بوک</option>
                          <option class="" value="Twitter"  >آشنایی با لرنیا: توئیتر</option>
                          <option class="" value="Linkden"  >آشنایی با لرنیا: لینکدین</option>
                          <option class="" value="SMS"  >آشنایی با لرنیا: پیامک</option>
                          <option class="" value="Telegram"  >آشنایی با لرنیا: تلگرام</option>
                          </select>
          
                    </div>
                  </div>

                  <div class="text-center" style="padding-top:20px">
                    <button type="submit" class="btn btn-primary">ثبت نام </button>
                    <a href="{{route('login')}}" class="btn btn-warning btn-round">ورود 
                      </a> 
                  </div>

                  


              </div>
            </form>
            
          </div>
        </div>


      </div>
  
@endsection
