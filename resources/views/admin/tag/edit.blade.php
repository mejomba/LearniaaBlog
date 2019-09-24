<@extends('admin.Layouts.layout_main')


@section('content')

<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">ایجاد تگ </h4>
                  <p class="card-category"> </p>
                </div>

                 <!-- form Section -->

         <div class="card-body">

        <form method="POST" action="{{route('admin.tag.update',$tag['pk_tags'])}}" enctype="multipart/form-data" >
        @csrf
             <div class="row">

                     

                   <div class="col-md-4">
                   <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">نام فارسی</label>
                            <input name="fa_name" type="text" value="{{ $tag['fa_name'] }}" class="form-control">
                          
                    </div>
                    </div>

                 <div class="col-md-4">
                     <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">نام انگلیسی</label>
                            <input name="en_name" type="text" value="{{ $tag['en_name'] }}" class="form-control">
                          
                           </div>
                     </div>




          </div>

          <!-- row -->

          <div class="row">

      

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







     <!-- Body Card ( Main) -->
     </div>



                </div>
              </div>
            </div>
            
          </div>
        </div>
        </div>


@endsection