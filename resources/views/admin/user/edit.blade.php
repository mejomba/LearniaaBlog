<@extends('admin.Layouts.layout_main')


@section('content')

<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">ایجاد کاربر </h4>
                  <p class="card-category"> </p>
                </div>

                 <!-- form Section -->

         <div class="card-body">

        <form method="POST" action="{{route('admin.user.update',$user['pk_users'])}}" enctype="multipart/form-data" >
        @csrf
             <div class="row">

                      <div class="col-md-4">
                          <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">نام کاربر</label>
                            <input  value="{{ $user['name'] }}" name="name" type="text" class="form-control">
                          
                           </div>
                      </div>

                   <div class="col-md-4">
                   <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating"> شماره موبایل</label>
                            <input  value="{{ $user['mobile'] }}" name="mobile"   type="text" class="form-control">
                          
                    </div>
                    </div>

                 <div class="col-md-4">
                     <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating"> گذرواژه</label>
                            <input  name="password" type="text" class="form-control">
                          
                           </div>
                     </div>




          </div>

          <!-- row -->

          <div class="row">




<div class="col-md-3">
                     <div class="container-fluid">    
                        <div class="form-group bmd-form-group">

                            <div class="row">

                                <div class="col-md-4">
                                <label class="bmd-label-floating">نوع </label>
                                </div>

                                <div class="col-md-8">

                                  <select name="type" class="dropdown-toggle btn btn-primary btn-round btn-block">
                                 
                                  <option class="" value="مدیر"
                                  @if($user->type =="مدیر" )
                                  selected="selected"
                                  @endif >مدیر </option>
                                  <option class="" value="نویسنده"
                                  @if($user->type == "نویسنده" )
                                  selected="selected"
                                  @endif >نویسنده </option>
                                  <option class="" value="کاربر"
                                  @if($user->type == "کاربر" )
                                  selected="selected"
                                  @endif >کاربر </option>

                                  </select>
                                
                                </div>

                           </div>

                        </div>
                     </div>
                </div>


                <div class="col-md-3">
                <div class="container-fluid">    
                          <div class="form-group bmd-form-group">
                          <div class="row">

                          

                            
                           </div>
                           </div>
                           </div>
                           </div>
               </div>



                  <!-- End data Section Form ; Below is blank row--> 
                  <div class="row text-center" style="padding-top:50px">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                         

                    <div class="clearfix">

                    <button type="submit" class="btn btn-primary pull-right">ثبت درخواست</button>
                    </div>



                        </div>
                      </div>
                    </div>

                    <!-- section operation form -->
                
                  </form>
                <!-- End Tag Form Section -->














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