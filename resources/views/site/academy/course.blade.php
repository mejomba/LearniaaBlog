@extends('site.Layouts.layout_main')
@section('Head')
<title> لرنیا آکادمی | لرنیا </title>
<meta name="description" content="لرنیا آکادمی  | لرنیا ">
<meta name="keywords" content="نقشه راه لرنیا,چارت آموزشی لرنیا ,لرنیا آاکادمی">
@endsection
@section('content')

<section class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-10 col-12 " style="margin-top:50px !important;border-bottom-right-radius: 50px!important;border-bottom-left-radius: 50px!important;">
            <div class="row">
            <div class="col-12 col-md-12 text-center">
                <a href="{{route('academy.mylearn',['pk_tree'=>$selected_road])}}">
                  <button class="btn btn-secondary mt-4 d-inline" style="font-size:15px;margin-bottom:10px">بازگشت</button>
                </a>
                </div>
          </div>
            <div class="card shadow border-0"  >
                <div class="card-header" style="background-color:#20C5BA ">
                    <div class="text-center">
                        <h2 style="font-size:30px">دوره {{$package['fa_name']}}</h2>
                    </div>
                </div> 
                <img class="card-img-top img-border"
                     src="{{ Storage::url('package/'.$package->pic)  }}"
                     width="900px" height="250px" alt="Card image cap">
                <div class="card-body text-center ">
                    <h5 class="card-title "></h5>
                    <p class="card-text">
                    </p>
                </div>
                <div class=" p-3  ml-2 mr-2 mb-3" style="border-radius: 20px;text-align: center;border:3px solid  #20c5ba;">
                 <form id="PackagePay" action="{{route('transaction.store',['pk_package' => $package['pk_package']]  )}}" method="GET">
                   @csrf
                   <input type="hidden" name="pk_tree"    id="pk_tree"    value="{{$selected_road}}">
                   <input type="hidden" name="pk_package" id="pk_package" value="{{$package['pk_package']}}">
                   <input type="hidden" name="UserLogin"  id="UserLogin"  value="{{$pk_user}}">
                   <input type="hidden" name="price"  id="price"  value="{{$package['price']}}">
                   <input type="hidden" name="redirectFromURL"  id="redirectFromURL"  value="{{url()->current()}}">
                   <input type="hidden" name="type"  id="redirectFromURL"  value="خرید دوره آموزشی">
 
                               @if($payment_status != 'Yes')
                               <div class="row"> 
                                   <div class="col-md-3" style="margin-top:10px"> قیمت خرید دوره : </div>
                                   <div class="col-md-3" style="margin-top:10px"> 
                                    <img class=" img-border" src="{{ asset('images/Academy/money.svg') }}"  width="30px" height="30px" alt="Card image cap">
                                    <span id="packageprice">{{$package['price']}}</span> تومان </div>        
                                    <div class="col-md-3">
                                     <button class="btn btnGreen" type="button" style="border-color:#c0bec0;background-image:linear-gradient(45deg, #c0bec0 50%, transparent 50%)"
                                     onclick="OpenPopUpDiscount()">کد تخفیف  </button>         
                                    </div>
                                    <div class="col-md-3">
                                     <button class="btn btnGreen" type="button"
                                     onclick="CheckUserLogin()">خرید دوره  </button>         
                                    </div>
                               </div>
                               @else
                               <div class="row"> 
                                   <div class="col-md-4" style="margin-top:10px"> قیمت خرید دوره : </div>
                                   <div class="col-md-4" style="margin-top:10px"> 
                                    <img class=" img-border" src="{{ asset('images/Academy/money.svg') }}"  width="30px" height="30px" alt="Card image cap">
                                    <span id="packageprice">{{$package['price']}}</span> تومان </div>        
                                    <div class="col-md-4">  <button type="button" class="btn btnGreen" disabled >خرید دوره</button>         
                                    </div>
                               </div>
                               @endif
                        </form> 
                </div>
            </div>
        </div>
    </div>
<!-- JS Function -->
<script>
function CheckUserLogin()
 {$pk_user = document.getElementById("UserLogin").value ;
 if($pk_user == 'Null'){document.getElementById("ModalConfirmLogin").setAttribute("style","display:block;opacity:100;"); }
 else{document.getElementById("PackagePay").submit();} }
 function ModalConfirmLogin_close()
 {document.getElementById("ModalConfirmLogin").setAttribute("style","");}
 function RedirectToLogin()
 { location.replace("{{ route('reset.showcallbackloginform',['pk_package' => $package->pk_package , 'redirectFromURL' => url()->current() ] ) }}");}
</script>
<!-- JS Function -->








<!-- Modal Confirm Login -->                      
<div class="modal fade" dir="rtl" id="ModalConfirmLogin" tabindex="-1" role="dialog"  aria-labelledby="ModalLabelConfirmLogin" aria-hidden="true">  
      <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:400px"> 
         <div class="modal-content">
           <div class="modal-header"> 
           <h5 class="modal-title" id="ModalLabelConfirmLogin">پیغام فرایند خرید</h5> 
            </div>                              
            <div class="modal-body">                      
                          <div class="card-body px-lg-1 py-lg-1">
                          <div class="row">   
                         <b style="color:red">برای انجام فرایند خرید لازم است ابتدا ثبت نام کنید </b>
                          </div>
                           </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" onclick="RedirectToLogin()"
                                     class="btn btnGreen">ثبت نام و خرید دوره</button> 
                                     
                                     <button type="button" onclick="ModalConfirmLogin_close()"
                                     class="btn btn-primary"  data-dismiss="modal">بستن</button> 
                                       
                                    </div>
                                    </div>
                                </div>
                                </div>                           
<!-- Modal Confirm Login -->

{{-- TimeLine starts --}}
                <div class="row " style="margin-top:60px">
                    <div class="col-lg-8 col-md-10 col-sm-11 col-11 border rounded-lg m-4 p-2 mx-auto"  >
                    <ul class="timeline">
                    @php $row_counter = 1 ; @endphp
                    @foreach($courses as $course)   
                     <li>
                            <div class="row" id="row">
                            <div class="col-lg-11 col-md-10 col-sm-11 col-11 pt-3 ml-3 hover-style k-cursor-pointer"  style="border: solid 1px #20C5BA ; border-radius: 5px">  
                                <div class="card-title">
                                        <div class="row">
                                            <div class="col-md-4 col-12 text-center" style="margin-top:15px">
                                            <a class="mb-0"> قسمت {{$row_counter}} :{{$course['name']}}  </a>
                                           </div>

                                            <div class="col-md-4 col-12 text-center" style="margin-top:13px">
                                            @if($payment_status == 'Yes' || $course['isFree'] == 'Yes')
                                            <img class=" img-border"
                                            src="{{ asset('images/Academy/YesPay.svg') }}"
                                            width="30px" height="30px" alt="Card image cap">
                                            <span style="color:#20c5ba">  فعال </span>
                                            @else
                                            <img class=" img-border"
                                            src="{{ asset('images/Academy/NoPay.svg') }}"
                                            width="30px" height="30px" alt="Card image cap">
                                            <span style="color:gray">  خریداری نشده </span>
                                            @endif
                                            </div>

                                          <div class="col-md-2 col-12 text-center mt-lg-0 mt-md-0 mt-sm-3 mt-3">
                                          @if($payment_status == 'Yes' || $course['isFree'] == 'Yes' )
                                            <a href="{{ route('academy.show', ['pk_course' => $course['pk_course'] ,
                                                 'desc' => $course['name'] , 'sort' => $course['sort'] ,
                                                 'pk_package' => $course['pk_package']  ]) }}"
                                               class="btn fourth btn-round">مشاهده</a>
                                               @else
                                               @endif
                                           </div>
                                     </div>
                                </div>
                            </div>
                       </div>  
                    </li>
               @php $row_counter =  $row_counter + 1 ; @endphp     
               @endforeach
                </ul>
               </div> 
             </div>         
{{-- timeLine ends --}}

<div class="modal fade" dir="rtl" id="ModalDiscount" tabindex="-1" role="dialog"  aria-labelledby="ModalLabelModalDiscount" aria-hidden="true">  
      <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:none"> 
         <div class="modal-content" style="width:90%">
           <div class="modal-header"> 
           <h5 class="modal-title" id="ModalLabelDiscount">ثبت کد تخفیف</h5> 
            </div>  
                                       
            <div class="modal-body" id="ModalDiscountBody">                      
                <!-- Form &  Body -->
                 <div class="card-body px-lg-1 py-lg-1">
                   <div class="row">  
                       <div id="content" class="col-12 col-md-12 col-lg-12">
                       <div class="modal-footer">
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                </div>
                                <input class="form-control" id ="discountcode"name="discountcode" placeholder="کد تخفیف " type="text">
                                </div>
                                <button type="button" onclick="DiscountSub()" class="btn btn-primary form-control"  
                                            style="background-color:brown;border-color:brown" data-dismiss="modal">ثبت کد تخفیف</button>
                        </div>
                </div>  
                                    
                      </div>
                     
                 </div>

              </div>
                <!-- Form &  Body -->
                             </div>
                                    <div class="modal-footer">
                                        <button type="button" onclick="ClosePopUpDiscount()" class="btn btn-primary"  
                                        style="background-color:brown;border-color:brown" data-dismiss="modal">بستن</button>
                                    </div>
                                   </div>
                                </div>
                              </div>
<!-- ModalData Box --> 

</section>


<script>

function OpenPopUpDiscount()
{
    
    document.getElementById("ModalDiscount").setAttribute("style","display:block;opacity:100;");
    $('#ModalDiscount').animate({ scrollTop: 0 }, 'fast');

}

function ClosePopUpDiscount()
 {
     document.getElementById("ModalDiscount").setAttribute("style","");
 }

 function DiscountSub()
 {
     var code = $('#discountcode').val();
     var user = $('#UserLogin').val();
    $.ajax({
                url: '/api/calculator',
                data:
                {
                    discount_code : code ,
                    pk_user:user
                },
                error: function(err)
                {
                },
                dataType: 'json',
                success: function(data)
                {
                        if(data == 'login required')
                        {  
                            ClosePopUpDiscount();
                        }else
                        {
                            document.getElementById("packageprice").innerHTML=data.price;
                            document.getElementById("price").setAttribute("value",data.price);
                            ClosePopUpDiscount();

                        }
                },
                
                type: 'POST'
            });
 }
 </script>

@endsection
