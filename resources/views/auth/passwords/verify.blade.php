@extends('site.Layouts.layout_auth')

@section('Head')
<title> تایید رمز  | لرنیا  </title>
  <meta  name="description" content=" تایید رمز| لرنیا">
@endsection

@section('content')

<div class="row" >
        <div class="col-lg-4 col-md-6 ml-auto mr-auto" >
        <div class="card shadow border-0">
    <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center"><h1>دریافت کد تایید</h1></div>
              </div>

    <div class="card-body px-lg-5 py-lg-5">

          <form class="form" method="GET" action="{{route('reset.update',$pk_user)}}">
              @csrf
            
              <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      <img class="img-raised rounded-circle img-fluid" 
                      src="{{ asset('images/Template/user_icon.png') }}" alt="Thumbnail Image" height="auto" width="auto">
                      </div>
                      <input name="token" id="token" type="text" class="form-control" placeholder="کد تایید">
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
