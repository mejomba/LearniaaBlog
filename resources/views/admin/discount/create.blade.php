@extends('Layouts.layout_main_admin')

@section('Head')
<title> ایجاد بن تخفیف | لرنیا </title>
  <meta  name="description" content=" ایجاد بن تخفیف | لرنیا">
@endsection

@section('content')

<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center">
                <h1>ایجاد بن تخفیف</h1>
                </div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="POST" action="{{route('admin.discount.store')}}" enctype="multipart/form-data" style="min-height:270px;">
        @csrf

     <div class="row">   
        <div class="col-md-4">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">  
                      </div>
                      <input class="form-control" name="discount_code" placeholder="کد تخفیف" type="text">
                    </div>
                  </div>
            </div>


          <!-- Select Box-->
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
                                            <option value="عمومی">عمومی </option>
                                            <option value="محصول محور">محصول محور </option>
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
              <input name="pk_package" class="form-control" placeholder="کد محصول " type="text">
            </div>
          </div>
      </div>


        <div class="col-md-4">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      </div>
                      <input name="date_Expire" class="form-control" placeholder="تاریخ انقضا" type="text">
                    </div>
                  </div>

        </div>

  <div class="col-md-4">

<div class="form-group">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
              </div>
              <input name="minimum_buy" class="form-control" placeholder="حداقل مبلغ خرید" type="text">
            </div>
          </div>

</div>

<div class="col-md-4">

<div class="form-group">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
              </div>
              <input name="limit" class="form-control" placeholder=" محدودیت در تعداد استفاده " type="text">
            </div>
          </div>

</div>


<div class="col-md-4">

<div class="form-group">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
              </div>
              <input name="percent_discount" class="form-control" placeholder=" درصد تخفیف " type="text">
            </div>
          </div>

</div>


<div class="col-md-4">

<div class="form-group">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
              </div>
              <input name="maxdiscount" class="form-control" placeholder=" حداکثر میزان تخفیف " type="text">
            </div>
          </div>

</div>



          <!-- Select Box-->
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
                                  <option value="فعال">فعال </option>
                                  <option value="غیر فعال">غیر فعال </option>
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