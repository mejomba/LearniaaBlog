@extends('Layouts.layout_main_admin')

@section('Head')
<title> ویرایش رفتار  | لرنیا  </title>
  <meta  name="description" content=" ویرایش رفتار| لرنیا">
@endsection

@section('content')



<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center">
                <h1>ایجاد پاسخ نظر </h1>
                </div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="POST" action="{{route('admin.behavior.update',$behavior['pk_behavior'])}}" enctype="multipart/form-data" style="min-height:270px;">
        @csrf

     <div class="row">   
        <div class="col-md-12" style="font-size: 13px;">
        <div class="form-group">
                    <div class="input-group input-group-alternative">   
                      <input class="form-control" disabled name="content" type="text" value="{{ $behavior['content'] }}"
                       placeholder="محتوا کاربر" type="text">
                    </div>
                  </div>
        </div>


        <div class="col-md-12">
        <div class="form-group">
        <span> پاسخ</span>    
                <textarea name="reply" class="form-control" >{{ $behavior['reply'] }}</textarea>
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