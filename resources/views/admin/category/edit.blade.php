<@extends('admin.Layouts.layout_main')


@section('content')

<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">ایجاد دسته بندی </h4>
                  <p class="card-category"> </p>
                </div>

                 <!-- form Section -->

         <div class="card-body">

        <form method="POST" action="{{route('admin.category.update',$category['pk_categories'])}}" enctype="multipart/form-data" >
        @csrf
             <div class="row">

                    

                   <div class="col-md-4">
                   <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">نام</label>
                            <input value="{{ $category['name'] }}" name="name" type="text" class="form-control">
                          
                    </div>
                    </div>

                 <div class="col-md-4">
                     <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">توضیحات</label>
                            <input value="{{ $category['desc'] }}" name="desc"  type="text" class="form-control">
                          
                           </div>
                     </div>




          </div>

          <!-- row -->

          <div class="row">

<div class="col-md-4">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">لینک</label>
      <input value="{{ $category['link'] }}" name="link"  type="text" class="form-control">
    
     </div>
</div>


<div class="col-md-3">
                     <div class="container-fluid">    
                        <div class="form-group bmd-form-group">

                            <div class="row">

                                <div class="col-md-4">
                                <label class="bmd-label-floating">نوع </label>
                                </div>

                                <div class="col-md-8">

                                  <select name="type" class="dropdown-toggle btn btn-primary btn-round btn-block">
                                  
                                  <option class="" value="محصول" 
                                  @if($category->type == "محصول" )
                                  selected="selected"
                                  @endif >محصول </option>
                                  <option class="" value="پست" 
                                  @if($category->type == "پست"  )
                                  selected="selected"
                                  @endif >پست </option>
                                 
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


     <!-- Body Card ( Main) -->
     </div>




                </div>
              </div>
            </div>
            
          </div>
        </div>
        </div>


@endsection