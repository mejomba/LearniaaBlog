@extends('admin.Layouts.layout_main')

@section('Head')
<title> ایجاد سبد  | لرنیا  </title>
  <meta  name="description" content=" ایجاد سبد| لرنیا">
@endsection

@section('content')



<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center">
                <h1>ایجاد سبد</h1>
                </div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="POST" action="{{route('admin.order.store')}}" enctype="multipart/form-data" style="min-height:270px;">
        @csrf

     <div class="row">   

        <div class="col-md-4">

        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        
                      </div>
                      <input class="form-control" name="pk_user" placeholder="کلید کاربر " type="text">
                    </div>
                  </div>

        </div>
        
        <div class="col-md-4">
        <div class="row">


                        <div class="col-md-3">
                        <span>وضعیت سبد ؟</span> 
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                  <select name="status_transaction" class="form-control">
                                  <option value="تکمیل نشده">تکمیل نشده </option>
                                  <option value="تکمیل شده">تکمیل شده </option>
                                  </select>
                                  </div>
                                </div>
                     </div>
            
   
        </div>
        </div>

       <!-- input Box -->

      <!-- input Box -->
      
       
       
        <!-- Select Box -->
        <div class="col-md-4">
        <div class="row">


                        <div class="col-md-3">
                        <span>نوع خرید</span> 
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                  <select name="type_delivery" class="form-control">
                                  <option value="فیزیکی">فیزیکی </option>
                                  <option value="ایمیل">ایمیل </option>
                                  </select>
                                  </div>
                                </div>
                     </div>
            
   
        </div>
        </div>
         <!-- Select Box -->
         </div>

                
  
                  <div class="text-center" style="padding-top:20px">
                    <button type="submit" class="btn btn-primary">ایجاد سبد</button>
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