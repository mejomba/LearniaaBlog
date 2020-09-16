@extends('Layouts.layout_main_admin')

@section('Head')
<title> ویرایش دسته بندی  | لرنیا  </title>
  <meta  name="description" content=" ویرایش دسته بندی| لرنیا">
@endsection

@section('content')



<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center">
                <h1>ویرایش دسته بندی</h1>
                </div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="POST" action="{{route('admin.category.update',$category['pk_category'])}}" 
   enctype="multipart/form-data" style="min-height:270px;">
        @csrf

     <div class="row">   

        <div class="col-md-4">

        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        
                      </div>
                      <input class="form-control"value="{{ $category['name'] }}" name="name" placeholder="نام " type="text">
                    </div>
                  </div>

        </div>

        <div class="col-md-4">


          
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      </div>
                      <input value="{{ $category['desc'] }}" name="desc" class="form-control" placeholder="توضیحات" type="text">
                    </div>
                  </div>

        </div>

 




   <!-- Select Box -->
   <div class="col-md-4">
        <div class="row">


                        <div class="col-md-3">
                        <span>نوع</span> 
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                  <select name="type" class="form-control">
                                  <option  value="محصول"
                                  @if($category->type == "محصول" )
                                  selected="selected"
                                  @endif
                                  >محصول </option>
                                  <option value="پست"
                                  @if($category->type == "پست"  )
                                  selected="selected"
                                  @endif>پست </option>
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