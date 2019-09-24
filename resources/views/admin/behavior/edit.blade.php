<@extends('admin.Layouts.layout_main')


@section('content')

<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">ایجاد پاسخ نظر </h4>
                  <p class="card-category"> </p>
                </div>

                 <!-- form Section -->

         <div class="card-body">

        <form method="POST" action="{{route('admin.behavior.update',$behavior['pk_behavior'])}}" enctype="multipart/form-data" >
        @csrf
             <div class="row">

                 <div class="col-md-6">
                     <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">محتوا کاربر</label>
                            <input disabled name="content" type="text" value="{{ $behavior['content'] }}" class="form-control">
                          
                           </div>
                     </div>


                      @php  $json = json_decode($behavior->extras,false);  @endphp  

                <div class="col-md-6">
                <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">پاسخ</label>
                        <input name="reply" type="text" value="{{ $json->reply ?? '' }}" class="form-control">
                      
                </div>
                </div>


                <div class="col-md-3">
                     <div class="container-fluid">    
                        <div class="form-group bmd-form-group">

                            <div class="row">

                                <div class="col-md-4">
                                <label class="bmd-label-floating">وضعیت </label>
                                </div>

                                <div class="col-md-8">

                                  <select name="status" class="dropdown-toggle btn btn-primary btn-round btn-block">
                                  
                                  <option class="" value="رد نظر"
                                  @if($behavior->status == "رد نظر" )
                                  selected="selected"
                                  @endif
                                   >رد نظر</option>
                                  <option class="" value="تایید شده"
                                  @if($behavior->status == "تایید شده" )
                                  selected="selected"
                                  @endif
                                  >تایید شده</option>
                                 
                                  </select>
                                
                                </div>

                           </div>

                        </div>
                     </div>



                     </div>
          </div>

          <!-- row -->
          <div class="row">

      

          <!-- End data Section Form ; Below is blank row--> 
          <div class="col-md-12 text-center">
                <div class="form-group bmd-form-group">
                

            <div class="clearfix">

            <button type="submit" class="btn btn-primary pull-right">ثبت درخواست<div class="ripple-container"></div></button>
            </div>



                </div>
              </div>

            <!-- section operation form -->

          </div>
                
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