@extends('admin.Layouts.layout_main')

@section('Head')
<title> تغییر سبد  | لرنیا  </title>
  <meta  name="description" content=" تغییر سبد| لرنیا">
@endsection

@section('content')



<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center">
                <h1>تغییر سبد</h1>
                </div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="POST" action="{{route('admin.order.update',$orders['pk_order'])}}" enctype="multipart/form-data" style="min-height:270px;">
        @csrf

     <div class="row">   

        <div class="col-md-4">
        <div class="row">
                        <div class="col-md-3">
                        <span>دارای کد تحفیف ؟</span> 
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                  <select name="Use_DiscountCode" class="form-control">
                                  @if($orders['Use_DiscountCode']=='بله')
                                  <option value="بله">بله </option>
                                  <option value="خیر">خیر </option>
                                  @else
                                  <option value="خیر">خیر </option>
                                  <option value="بله">بله </option>
                                  @endif
                                  </select>
                                  </div>
                                </div>
                     </div>
            
   
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      </div>
                      <input name="DiscountCode" class="form-control" placeholder="کد تحفیف " type="text" value="{{$orders['DiscountCode']}}">
                    </div>
                  </div>

        </div>
        
        <div class="col-md-4">
        <div class="row">


                        <div class="col-md-3">
                        <span>وضعیت سبد ؟</span> 
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                  <select name="status_transaction" class="form-control">
                                  @if($orders['status_transaction']=='تکمیل نشده')
                                  <option value="تکمیل نشده">تکمیل نشده </option>
                                  <option value="تکمیل شده">تکمیل شده </option>
                                  @else
                                  <option value="تکمیل شده">تکمیل شده </option>
                                  <option value="تکمیل نشده">تکمیل نشده </option>
                                  @endif
                                 
                                  </select>
                                  </div>
                                </div>
                     </div>
            
   
        </div>
        </div>

       <!-- input Box -->

      <!-- input Box -->
      
       
       
        <!-- Select Box -->
        <div class="col-md-4">
        <div class="row">


                        <div class="col-md-3">
                        <span>نوع خرید</span> 
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                  <select name="type_Delivery" class="form-control">
                                  @if($orders['type_Delivery']=='فیزیکی')
                                  <option value="فیزیکی">فیزیکی </option>
                                  <option value="ایمیل">ایمیل </option>
                                  @else
                                  <option value="ایمیل">ایمیل </option>
                                  <option value="فیزیکی">فیزیکی </option>
                                  @endif
                                  </select>
                                  </div>
                                </div>
                     </div>
            
        </div>
        </div>    

         <!-- Select Box -->
           

                
  
                  <div class="text-center" style="padding-top:20px">
                    <button type="submit" class="btn btn-primary">ثبت تغییرات سبد</button>
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