@extends('site.Layouts.layout_main')

@section('Head')
<title> ارتباط با ما | لرنیا  </title>
  <meta  name="description" content="ارتباط با ما | لرنیا ">
@endsection

@section('content')

 <!-- Section -->
    <div class="row">

          <!-- Text -->
            <div class="col-md-7" dir="rtl">

            <h2 class="title" style="font-size:30px;color: #303030">
                    با ما در ارتباط باشید 
                  </h2>

            <!-- Text -->

             <!-- Image -->
            <img  
             src="{{ asset('images/Template/customer_service.svg') }}"
             width="500px" height="90%" alt="Thumbnail Image">
              <!-- Image -->     
            
            </div>
             

           <!-- Form -->
           <div class="col-md-5">
              

              <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center"><h4>ارتباط با ما</h4></div>
                
              </div>
              <div class="card-body px-lg-5 py-lg-5">
                
                <form role="form" style="
      height: 270px;
  ">
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        
                      </div>
                      <input class="form-control" placeholder="نام و نام خانوادگی" type="text">
                    </div>
                  </div>
  
  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        
                      </div>
                      <input class="form-control" placeholder="ایمیل" type="text">
                    </div>
                  </div>
  
  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        
                      </div>
                      <textarea name="content" id="content" type="text" class="form-control" placeholder="متن پیام"></textarea>
                    </div>
                  </div>
                
                  <div class="text-center" style="padding-top:20px">
                    <button type="button" class="btn btn-primary">ارسال پیام</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
  </div>

            </div>
           <!-- Form -->
  </div>
 <!-- Section -->

@endsection
