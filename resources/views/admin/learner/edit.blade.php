@extends('Layouts.layout_main_admin')

@section('Head')
<title> ویرایش مدرس | لرنیا </title>
  <meta  name="description" content=" ویرایش مدرس | لرنیا">
@endsection

@section('content')

<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center">
                <h1>ویرایش مدرس</h1>
                </div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="POST" action="{{route('admin.learner.update',$learner['pk_learner'])}}" enctype="multipart/form-data" style="min-height:270px;">
   @csrf

<div class="row">   


          <!-- Select Box -->
          <div class="col-md-4">
          <div class="row">


                          <div class="col-md-3">
                          <span>مدرس </span> 
                          </div>
                          <div class="col-md-9">
                        <div class="form-group focused">
                                    <div class="input-group input-group-alternative">
                                      <div class="input-group-prepend">  
                                      </div>
                                    <select  name="pk_users" class="form-control">
                                   <option value="{{ $learner['pk_user'] }}"  selected="selected"> 
                                   {{$learner->user['name']}}
                                   </option>
                                    
                                    </select>
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
                          
                        </div>
                        <input class="form-control" name="desc" value="{{ $learner['desc'] }}"  placeholder=" توضیحات" type="text">
                      </div>
                    </div>
          </div>


          <div class="col-md-4">
          <div class="form-group">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                          
                        </div>
                        <input class="form-control" name="job" value="{{ $learner['job'] }}"  placeholder=" حوزه کاری" type="text">
                      </div>
                    </div>
           </div>



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