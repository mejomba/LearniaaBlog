@extends('Layouts.layout_main_site')
@section('Head')
<title> ثبت نام | لرنیا  </title>
<meta  name="description" content="ثبت نام| لرنیا">
@endsection
@section('content')
<div class="row ">
    <div class="auth-card col-lg-4 col-md-5 col-sm-6 col-11 mx-auto text-center" 
    style="margin-top:150px !important;border-bottom-right-radius: 50px !important;border-bottom-left-radius: 50px !important;">
        <div class="card shadow-lg border-0">
          <div class="card-header" style="background-color:#20C5BA ">
              <div class="text-center"><h3>ثبت نام کاربران</h3>
            </div>
          </div>

        <div class="pr-3 py-3">
        <form class="form py-3" method="GET" action="{{route('registerconfirm')}}">
            @csrf
            <div class="form-group text-center">
            <span>لطفا تمامی اطلاعات خواسته شده را وارد نمایید</span>
            </div>
                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                        </div>
                    <input name="name" id="name" type="text" class="form-control" placeholder="نام و نام خانوادگی ">
                    </div>
                    </div>

                <div class="form-group">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                    </div>
                <input name="password" id="password" type="password" class="form-control" placeholder="رمز عبور دلخواه شما">
                    </div>
                </div>

                <div class="form-group">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend mx-auto">
                   دوست خوبم از چه راهی با لرنیا آشنا شدی ؟
                       </div>
                  </div>
                </div>
                

                <div class="form-group">
                   <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      </div>
                    <select name="attract" class="form-control custom-select">
                    <option class="" value="Instagram"  > آشنایی با ما از اینستاگرام </option>
                    <option class="" value="PhysicalAdvertise"  > آشنایی با ما از تراکت،بروشور،پوستر</option>
                    <option class="" value="ClickOnAds"  > آشنایی با ما از تبلیغات کلیکی</option>
                    <option class="" value="InviteFriends"  >آشنایی با ما از معرفی دوستان شما</option>
                    <option class="" value="Facebook"  > آشنایی با ما از فیس بوک</option>
                    <option class="" value="Twitter"  > آشنایی با ما از توئیتر</option>
                    <option class="" value="Linkden"  > آشنایی با ما از لینکدین</option>
                    <option class="" value="SMS"  >آشنایی با ما از پیامک</option>
                    <option class="" value="Telegram"  >آشنایی با ما از تلگرام</option>
                    </select>
                </div>
              </div>



        @php $id = rand(1,10) @endphp
        <input type="hidden" name="picid" value="{{ $id }}">
          
        <div class="form-group">
                <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                </div>  
                <img class="img-raised img-fluid mx-auto" style="height:120px;width:auto"
                src="{{ asset('RECAPTCHA/'.$id.'.jpg')}}" alt="Thumbnail Image" height="170px" width="170px">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                    </div>  
                <input name="confirm" id="confirm" type="confirm" class="form-control" placeholder=" اعداد تصویر بالا را وارد نمایید ">
                </div>
            </div>

                <div class="text-center mt-1">
                <button type="submit" class="btn btn-primary">ثبت نام</button>
                </div>
        </div>
                    @if(isset($_GET['username']))
                    <input type="hidden" name="username" value="{{ $_GET['username'] }}">
                    @else
                    <input type="hidden" name="username" value="{{ $email }}">
                    @endif
                    @if(isset($_GET['redirectFromURL']))
                    <input type="hidden" name="redirectFromURL" value="{{$_GET['redirectFromURL']}}">
                    @endif
                    @if(isset($_GET['pk_package']))
                    <input type="hidden" name="pk_package" value="{{$_GET['pk_package']}}">
                    @endif
        </form>
      </div>
    </div>
</div>
@endsection
