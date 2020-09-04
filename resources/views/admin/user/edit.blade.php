@extends('admin.Layouts.layout_main')

@section('Head')
<title> ویرایش کاربر | لرنیا </title>
  <meta  name="description" content=" ویرایش کاربر | لرنیا">
@endsection

@section('content')

<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center">
                <h1>ویرایش کاربر </h1>
                </div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="POST" action="{{route('admin.user.update',$user['pk_users'])}}" enctype="multipart/form-data" style="min-height:270px;">
        @csrf

     <div class="row">   

        <div class="col-md-4">

        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        
                      </div>
                      <input class="form-control" value="{{ $user['name'] }}" name="name" placeholder="نام کاربر" type="text">
                    </div>
                  </div>

        </div>

        <div class="col-md-4">

        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      </div>
                      <input  name="username" value="{{ $user['username'] }}"  class="form-control" placeholder="مشخصه کاربری" type="text">
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
                                  <option value="مدیر"  @if($user->type =="مدیر" )
                                  selected="selected"
                                  @endif >مدیر </option>
                                  <option value="نویسنده" @if($user->type == "نویسنده" )
                                  selected="selected"
                                  @endif>نویسنده </option>
                                  <option value="کاربر"  @if($user->type == "کاربر" )
                                  selected="selected"
                                  @endif>کاربر </option>
                                  </select>
                                  </div>
                                </div>
                     </div>
            
   
        </div>
        </div>
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

      <div class="col-md-4">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      <span>کیف پول</span> 
                      </div>
                      <input name="wallet" value="{{ $wallet }}" class="form-control" placeholder="کیف پول" type="text">
                    </div>
              </div>
        </div>

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
                                    <textarea name="extras" class="form-control">{{$user->extras}}</textarea>
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