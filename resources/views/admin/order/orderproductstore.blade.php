@extends('admin.Layouts.layout_main')

@section('Head')
<title> افزودن ایتم به سفارش | لرنیا  </title>
  <meta  name="description" content=" افزودن ایتم به سفارش | لرنیا">
@endsection

@section('content')



<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center">
                <h1>افزودن ایتم به سفارش </h1>
                </div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="POST" action="{{route('admin.order.storeproduct',$order['pk_order'])}}" enctype="multipart/form-data" style="min-height:270px;">
        @csrf

     <div class="row">   

     <div class="col-md-4">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      </div>
                      <input name="pk_product" class="form-control" placeholder="کد کالا " type="text" value="">
                    </div>
                  </div>

        </div>

        <div class="col-md-4">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      </div>
                      <input name="count" class="form-control" placeholder="تعداد " type="text" value="">
                    </div>
                  </div>
        </div>


         <!-- Select Box -->
         </div>

                
  
                  <div class="text-center" style="padding-top:20px">
                    <button type="submit" class="btn btn-primary">ثبت  کالا</button>
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