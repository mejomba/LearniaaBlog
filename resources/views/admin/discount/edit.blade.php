@extends('admin.Layouts.layout_main')

@section('Head')
<title> ویرایش بن تخفیف | لرنیا </title>
  <meta  name="description" content=" ویرایش بن تخفیف | لرنیا">
@endsection

@section('content')


<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center"><h1>ویرایش بن تخفیف</h1></div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="POST" action="{{route('admin.discount.update',$discount['pk_discount'])}}" enctype="multipart/form-data" style="min-height:270px;">
        @csrf

    
        <div class="row">  


        <div class="col-md-4">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      </div>
                      <input name="discount_code" class="form-control" value="{{ $discount['discount_code'] }}" placeholder="  کد تخفیف" type="text">
                    </div>
                  </div>

        </div>

        <div class="col-md-4">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      </div>
                      <input name="date_Expire" class="form-control" value="{{ $discount['date_Expire'] }}" placeholder="تاریخ انقضا" type="text">
                    </div>
                  </div>

        </div>


        <div class="col-md-4">

<div class="form-group">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
              </div>
              <input name="minimum_buy" value="{{ $discount['minimum_buy'] }}" class="form-control" placeholder="حداقل مبلغ خرید" type="text">
            </div>
          </div>

</div>

<div class="col-md-4">

<div class="form-group">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
              </div>
              <input name="limit" value="{{ $discount['limit'] }}" class="form-control" placeholder=" محدودیت در تعداد استفاده " type="text">
            </div>
          </div>

</div>

<div class="col-md-4">

<div class="form-group">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
              </div>
              <input name="percent_discount" value="{{ $discount['percent_discount'] }}" class="form-control" placeholder=" درصد تخفیف " type="text">
            </div>
          </div>

</div>

<div class="col-md-4">

<div class="form-group">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
              </div>
              <input name="maxdiscount" value="{{ $discount['maxdiscount'] }}" class="form-control" placeholder=" حداکثر میزان تخفیف " type="text">
            </div>
          </div>

</div>

<div class="col-md-4">

<div class="form-group">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
              </div>
              <input name="pk_product" class="form-control" placeholder="کد محصول " type="text">
            </div>
          </div>

</div>



  <!-- Select Box -->
  <div class="col-md-4">
<div class="row">


                <div class="col-md-3">
                <span>وضعیت</span> 
                </div>
                <div class="col-md-9">
              <div class="form-group focused">
                          <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">  
                            </div>
                          <select name="status" class="form-control">
                          <option value="فعال" 
                          @if($discount->status == "فعال" )
                                  selected="selected"
                                  @endif>فعال </option>
                          <option value="غیر فعال" 
                          @if($discount->status == "غیر فعال" )
                                  selected="selected"
                                  @endif>غیر فعال </option>
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