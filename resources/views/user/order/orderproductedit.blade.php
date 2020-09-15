@extends('Layouts.layout_main_admin')

@section('Head')
<title> ویرایش ایتم به سفارش  | لرنیا  </title>
  <meta  name="description" content=" ویرایش ایتم به سفارش | لرنیا">
@endsection

@section('content')



<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center">
                <h1>ویرایش ایتم به سفارش </h1>
                </div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="POST" action="{{route('admin.order.updateproduct',[$orderproduct['pk_order'],$orderproduct['pk_orderproduct']])}}" enctype="multipart/form-data" style="min-height:270px;">
        @csrf

     <div class="row">   

    
        <div class="col-md-4">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      </div>
                      <input name="count" class="form-control" placeholder="تعداد " type="text" value="{{$orderproduct['count']}}">
                    </div>
                  </div>

        </div>
      <!-- input Box -->
     
      </div>
  
                  <div class="text-center" style="padding-top:20px">
                    <button type="submit" class="btn btn-primary">ثبت تغییرات کالا</button>
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