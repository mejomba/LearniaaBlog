@extends('admin.Layouts.layout_main')


@section('content')


<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center"><h4>ایجاد کاربر </h4></div>
                
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
                      <input  name="mobile"  class="form-control" placeholder="شماره موبایل" type="text">
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


                        <div class="col-md-2">
                        <span>نوع</span> 
                        </div>
                        <div class="col-md-10">
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