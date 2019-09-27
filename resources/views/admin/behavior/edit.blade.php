@extends('admin.Layouts.layout_main')


@section('content')



<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center"><h4>ایجاد پاسخ نظر </h4></div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="POST" action="{{route('admin.behavior.update',$behavior['pk_behavior'])}}" enctype="multipart/form-data" style="min-height:270px;">
        @csrf

     <div class="row">   

        <div class="col-md-4">

        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      
                      <input class="form-control" disabled name="content" type="text" value="{{ $behavior['content'] }}"
                       placeholder="محتوا کاربر" type="text">
                    </div>
                  </div>

        </div>

        <div class="col-md-4">

        @php  $json = json_decode($behavior->extras,false);  @endphp  
          
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      </div>
                      <input  name="reply" type="text" value="{{ $json->reply ?? '' }}" class="form-control" placeholder="پاسخ" type="text">
                    </div>
                  </div>

        </div>


    
   <!-- Select Box -->
   <div class="col-md-4">
        <div class="row">


                        <div class="col-md-2">
                        <span>وضعیت</span> 
                        </div>
                        <div class="col-md-10">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                  <select  name="status" class="form-control">
                                  <option  value="رد نظر"
                                  @if($behavior->status == "رد نظر" )
                                  selected="selected"
                                  @endif
                                   >رد نظر</option>
                                  <option value="تایید شده"
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
         <!-- Select Box -->
    
  
                
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