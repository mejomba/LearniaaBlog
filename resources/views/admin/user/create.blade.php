@extends('Layouts.layout_main_admin')

@section('Head')
<title> ایجاد کاربر | لرنیا </title>
  <meta  name="description" content=" ایجاد کاربر | لرنیا">
@endsection

@section('content')


<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center">
                <h1>ایجاد کاربر </h1>
                </div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="POST" action="{{route('admin.user.store')}}" enctype="multipart/form-data" style="min-height:270px;">
        @csrf

     <div class="row">   

        <div class="col-md-4">

        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        
                      </div>
                      <input class="form-control" name="name" placeholder="نام کاربر" type="text">
                    </div>
                  </div>

        </div>

        <div class="col-md-4">

        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      </div>
                      <input  name="username"  class="form-control" placeholder="مشخصه کاربری" type="text">
                    </div>
                  </div>

        </div>

        <div class="col-md-4">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      </div>
                      <input name="password"  class="form-control" placeholder="رمز عبور" type="text">
                    </div>
                  </div>
        </div>


    <!-- Select Box -->
    <div class="col-md-4">
        <div class="row">


                        <div class="col-md-3">
                        <span>نوع</span> 
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                  <select name="type" class="form-control">
                                  <option value="مدیر">مدیر </option>
                                  <option value="نویسنده">نویسنده </option>
                                  <option value="کاربر">کاربر </option>
                                  </select>
                                  </div>
                                </div>
                     </div>
            
   
        </div>
        </div>
         <!-- Select Box -->


    <!-- Select Box -->
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
    <!-- Select Box -->


       <!-- Select Box -->
       <div class="col-md-4">
        <div class="row">
                        <div class="col-md-3">
                        <span>تصویر </span> 
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                    <input  type="file" id="pic" name="pic">
                                  </div>
                            </div>
                     </div>
        </div>
        </div>
      <!-- Select Box -->


       <!-- textarea Box -->
       <div class="col-md-12">
        <div class="row">
                        <div class="col-md-1">
                        <span>درباره من </span> 
                        </div>
                        <div class="col-md-11">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                    <textarea name="extras" class="form-control"></textarea>
                                  </div>
                            </div>
                     </div>
        </div>
        </div>
      <!-- textarea Box -->
     

    </div>

                
  
                
                  <div class="text-center" style="padding-top:20px">
                    <button type="submit" class="btn btn-primary">ثبت درخواست</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
  </div>




     <!-- Body Card ( Main) -->
     </div>




                </div>
              </div>
            </div>
            
          </div>
        </div>
        </div>


@endsection