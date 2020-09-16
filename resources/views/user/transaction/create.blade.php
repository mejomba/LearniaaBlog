@extends('Layouts.layout_main_admin')

@section('Head')
<title> افزایش موجودی کیف  | لرنیا  </title>
  <meta  name="description" content="افزایش موجودی کیف | لرنیا">
@endsection

@section('content')



<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center"><h1>مدیریت موجودی </h1></div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="GET" action="{{ route('admin.transaction.addwalletmoney') }}"
   enctype="multipart/form-data" style="min-height:270px;">
        @csrf
        <input type="hidden" name="type" value="افزایش موجودی کیف پول"/> 
     <div class="row">   
      <div class="col-md-4">
        </div>
       <div class="col-md-4">
        <div class="form-group">
           <div class="input-group input-group-alternative">
            <div class="input-group-prepend">    
             </div>
             <img src="{{  asset('images/Template/icon_wallet.svg') }}" width="50px" >
          <input class="form-control" style="text-align:center" disabled  value="{{ $wallet }}" name="wallet" type="text">
          <label style="padding-right:10px;padding-top:10px">( تومان )</label>
       </div>
   </div>
</div>

      <div class="col-md-4">
      </div>
     <div class="col-md-4">
     </div>
     <div class="col-md-4">
      <div class="form-group">
       <div class="input-group input-group-alternative">
        <div class="input-group-prepend">    
          </div>
          <label style="padding-left:10px;padding-top:10px">افزایش موجودی</label>
        <input class="form-control" name="price" placeholder="مبلغ" type="text">
        <label style="padding-right:10px;padding-top:10px">( تومان )</label>
        </div>
      </div>
   </div>
    <div class="col-md-4">
    </div>


        </div>
       


                  <div class="text-center" style="padding-top:20px">
                    <button type="submit" class="btn btn-primary">پرداخت</button>
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