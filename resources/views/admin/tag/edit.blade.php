@extends('Layouts.layout_main_admin')

@section('Head')
<title> ویرایش تگ | لرنیا </title>
  <meta  name="description" content=" ویرایش تگ | لرنیا">
@endsection

@section('content')


<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center"><h1>ویرایش تگ</h1></div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="POST" action="{{route('admin.tag.update',$tag['pk_tags'])}}" enctype="multipart/form-data" style="min-height:270px;">
        @csrf

     <div class="row">   

        <div class="col-md-4">

        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        
                      </div>
                      <input class="form-control" value="{{ $tag['fa_name'] }}" name="fa_name" placeholder="نام فارسی" type="text">
                    </div>
                  </div>

        </div>

        <div class="col-md-4">


          
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      </div>
                      <input name="en_name" value="{{ $tag['en_name'] }}" class="form-control" placeholder="نام انگلیسی" type="text">
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
                                  @if($tag->type == "محصول" )
                                  selected="selected"
                                  @endif
                                  >محصول </option>
                                  <option value="پست"
                                  @if($tag->type == "پست"  )
                                  selected="selected"
                                  @endif>پست </option>
                                  </select>
                                  </div>
                                </div>
                     </div>
            
   
        </div>
        </div>
         <!-- Select Box -->

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