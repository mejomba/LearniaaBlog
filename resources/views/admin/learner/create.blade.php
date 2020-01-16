@extends('admin.Layouts.layout_main')

@section('Head')
<title> ایجاد مدرس | لرنیا </title>
  <meta  name="description" content=" ایجاد مدرس | لرنیا">
@endsection

@section('content')

<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center">
                <h1>ایجاد مدرس</h1>
                </div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="POST" action="{{route('admin.learner.store')}}" enctype="multipart/form-data" style="min-height:270px;">
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
                                    <select name="pk_users" class="form-control">
                                    @foreach ($users as $user)
                                    <option value="{{ $user->pk_users }}">{{ $user->name }}</option>
                                    @endforeach 
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
                        <input class="form-control" name="desc"  placeholder=" توضیحات" type="text">
                      </div>
                    </div>
          </div>


          <div class="col-md-4">
          <div class="form-group">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                          
                        </div>
                        <input class="form-control" name="job"  placeholder=" حوزه کاری" type="text">
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