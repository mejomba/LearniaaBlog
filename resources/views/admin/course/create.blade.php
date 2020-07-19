@extends('admin.Layouts.layout_main')

@section('Head')
<title> ایجاد درس  | لرنیا  </title>
  <meta  name="description" content=" ایجاد درس| لرنیا">
@endsection

@section('content')

<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">

          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center">
                <h1>ایجاد درس</h1>
                </div>
                
              </div>

   <div class="card-body px-lg-5 py-lg-5">
   <form method="POST" action="{{route('admin.course.store')}}" enctype="multipart/form-data" style="min-height:270px;">
        @csrf
        <div class="row">   
       
        <div class="col-md-4">
          <div class="form-group">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">   
                        </div>
                        <input class="form-control" name="name"  placeholder=" عنوان درس" type="text" >
                      </div>
                    </div>
           </div>

        <!-- Select Box -->
        <div class="col-md-4">
        <div class="row">
                        <div class="col-md-3">
                        <span>نام پکیج</span> 
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                    <select name="package" class="form-control">
                                     @foreach($packages as $package)
                                     <option value="{{$package['pk_package']}} ">{{$package['name']}} </option>
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
                        <input class="form-control" name="sort"  placeholder=" شماره قسمت" type="text" >
                      </div>
                    </div>
          </div>

       <!-- Picture Box -->
        <div class="col-md-4">
        <div class="row">

                        <div class="col-md-3">
                        <span>تصویر و کاور </span> 
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
         <!-- Picture Box -->

         <div class="col-md-4">
          <div class="form-group">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                          
                        </div>
                        <input class="form-control" name="sort"  placeholder=" شماره قسمت" type="text" >
                      </div>
                    </div>
          </div>


         </div>         
               <div class="text-center" style="padding-top:20px">
                    <button type="submit" class="btn btn-primary">ثبت درس</button>
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