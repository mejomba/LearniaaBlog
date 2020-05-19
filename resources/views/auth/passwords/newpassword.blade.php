@extends('site.Layouts.layout_main')

@section('Head')
<title> رمز جدید  | لرنیا  </title>
  <meta  name="description" content=" رمز جدید| لرنیا">
@endsection

@section('content')
<div class="row" >
<div class="col-md-2">
</div>
<div class="col-md-4" style="padding: 0px 28px;" >
<div class="card shadow border-0" style="border-radius: 30%;">
<div class="card shadow border-0" style="border-radius: 30%;">
<div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center"><h1>تغییر رمز عبور</h1></div>
              </div>
   <div class="card-body px-lg-5 py-lg-5">          
          <form class="form" method="POST" action="{{route('reset.delete',$pk_user)}}">
              @csrf
             
              <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      <img class="img-raised rounded-circle img-fluid" 
                      src="{{ asset('images/Template/password_login.svg')}}" alt="Thumbnail Image" height="45px" width="45px">
                      </div>
                      <input name="newpassword" id="newpassword" type="text" class="form-control" placeholder="رمز عبور جدید">
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
@endsection
