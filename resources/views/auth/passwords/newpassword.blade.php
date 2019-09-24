@extends('site.Layouts.layout_auth')


@section('content')

<div class="row" >
        <div class="col-lg-4 col-md-6 ml-auto mr-auto" >
          <div class="card card-login">
          <form class="form" method="POST" action="{{route('reset.delete',$pk_user)}}">
              @csrf
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title"> تغییر رمز عبور</h4>
               
              </div>
              <p class="description text-center"></p>
              <div class="card-body">
                <span class="bmd-form-group"><div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <img class="img-raised rounded-circle img-fluid" 
                      src="{{ asset('images/Template/key_icon.png') }}" alt="Thumbnail Image" height="auto" width="auto">
                    </span>
                  </div>
                  <input name="newpassword" id="newpassword" type="text" class="form-control" placeholder="رمز عبور جدید">
                </div>
                </span>
               
                
              </div>
              <div class="footer text-center">
              <button type="submit" class="btn btn-primary btn-round">  تایید
                <div class="ripple-container"></div> </button>
              
              </div>
            </form>
          </div>
        </div>


      </div>
@endsection
