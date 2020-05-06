@extends('admin.Layouts.layout_main')

@section('Head')
<title> گزارش نظرسنجی | لرنیا </title>
  <meta  name="description" content=" گزارش نظرسنجی | لرنیا">
@endsection

@section('content')


<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center"><h1>گزارش نظرسنجی</h1></div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="POST" action="" enctype="multipart/form-data" style="min-height:270px;">
        @csrf

     <div class="row">   

     <div class="col-md-4">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">    
                      </div>
                      <label>گزینه1 </label>
                      <input class="form-control" value="{{ $ResultOption1 }}" name="ResultOption1" placeholder="گزینه1" type="text">
                    </div>
                  </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">    
                      </div>
                      <label>گزینه2 </label>
                      <input class="form-control" value="{{ $ResultOption2 }}" name="ResultOption2" placeholder="گزینه2" type="text">
                    </div>
                  </div>
        </div>


 <!--                json process            -->  
 
        <div class="col-md-4">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      </div>
                      <label>گزینه3 </label>
                      <input name="ResultOption3" value="{{$ResultOption3}}" class="form-control" placeholder="گزینه3 " type="text">
                    </div>
                  </div>
        </div>


        <div class="col-md-4">
<div class="form-group">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">     
              </div>
              <label>گزینه4 </label>
              <input class="form-control" value="{{$ResultOption4}}" name="ResultOption4" placeholder=" گزینه4 " type="text">
            </div>
          </div>
</div>


                
                  <div class="text-center" style="padding-top:20px">
                  <!--  <button type="submit" class="btn btn-primary">ثبت درخواست</button> -->
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