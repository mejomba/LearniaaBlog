@extends('site.Layouts.layout_main')

@section('Head')
<title> تماس با ما | لرنیا  </title>
  <meta  name="description" content="تماس با ما | لرنیا ">
  <meta  name="keywords"    content="تماس با ما,ارتباط با ما,لرنیا" >
@endsection

@section('content')
 <!-- Section -->
    <div class="row" style="margin-top: -70px">

<div class="col-lg-4 col-md-6 col-sm-7 col-9 offset-1">
              <div class="col-12" style="margin-top: -20px">
            <div class="card shadow border-0" style="border-bottom-right-radius:60px ;border-bottom-left-radius:60px; ">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center"><h4>تماس با ما</h4></div>

              </div>
              <div class="card-body px-3 py-3">
                <form role="form" method="POST" action="{{route('message.store')}}" style="height:auto; ">
                @csrf
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <input name="name" id="name" class="form-control" placeholder="نام و نام خانوادگی" type="text">
                    </div>
                  </div>

                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                            <input name="email" id="email" class="form-control" placeholder="ایمیل" type="text">
                        </div>
                    </div>


              <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <textarea name="message" style="height:80px;resize: none;" id="message" type="text" class="form-control" placeholder="متن پیام"></textarea>
                    </div>
                  </div>

                  <div class="text-center form-group" >
                    <input type="submit" class="btn btn-primary" value="ارسال پیام">
                  </div>

                </form>
              </div>
            </div>
          </div>
  </div>

{{--<div class="col-md-4">--}}
{{--<!----}}
{{--<img src="{{ asset('images/Template/customer_service.svg') }}" style=""  width="500px" height="600px" alt="Learniaa">--}}
{{-- -->--}}
{{--</div>--}}


            </div>

           <!-- Form -->
           <div class="col-md-12 text-center" dir="rtl" style="margin-top:15px">
<p>
</p>

</div>

 <!-- Section -->
@endsection
