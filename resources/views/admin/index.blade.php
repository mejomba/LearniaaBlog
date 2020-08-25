@extends('admin.Layouts.layout_main')

@section('Head')
<title> داشبورد مدیریتی | لرنیا </title>
  <meta  name="description" content=" داشبورد مدیریتی | لرنیا">
@endsection

@section('content')
<div class="col-md-12 text-center" dir="rtl" style="padding-top:100px">
    <div class="row">
       
        <div class="col-4">  
       
        </div>

        <div class="col-4">
        <img src="{{ asset('images/Template/logo.png') }}" alt="Thumbnail Image" width="100px" height="100px ">
      
        </div>
        
        <div class="col-4">
        </div>


  </div>

  <div class="row">

<div class="col-4">  

</div>

 <div class="col-4">  
 <span > به زودی ... </span>
 </div>

  <div class="col-4">  

 </div>       


</div>

</div>
<div class="modal fade" dir="rtl" id="ModalData" tabindex="-1" role="dialog"  aria-labelledby="ModalLabelModalData" aria-hidden="true">  
      <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:none"> 
         <div class="modal-content" style="width:90%">
           <div class="modal-header"> 
           <h5 class="modal-title" id="ModalLabelData">اطلاعات تابلو</h5> 
            </div>  
                                       
            <div class="modal-body" id="ModalDataBody">                      
                <!-- Form &  Body -->
                 <div class="card-body px-lg-1 py-lg-1">
                   <div class="row">  
                       <div id="content" class="col-12 col-md-12 col-lg-12">
                       <select id="pk_package" class="form-control">
                                  @foreach ($packages as $package)
                                  <option value="{{ $package->pk_package }}">{{ $package->fa_name }}</option>
                                  @endforeach
                                  </select>
                      </div>
                      <button type="button" onclick="getdata()" class="btn btn-primary"  
                      style="background-color:brown;border-color:brown" data-dismiss="modal">نمایش</button>
                 </div>

              </div>
                <!-- Form &  Body -->
                             </div>
                                    <div class="modal-footer">
                                        <button type="button" onclick="ClosePopup()" class="btn btn-primary"  
                                        style="background-color:brown;border-color:brown" data-dismiss="modal">بستن</button>
                                    </div>
                                   </div>
                                </div>
                              </div>
<!-- ModalData Box --> 
<script>

function OpenPopup() 
{
    
    document.getElementById("ModalData").setAttribute("style","display:block;opacity:100;");
    $('#ModalData').animate({ scrollTop: 0 }, 'fast');

}

function ClosePopup()
 {
     document.getElementById("ModalData").setAttribute("style","");
 }

 function getdata()
 {
   var x =  $('#pk_package').val();
  window.location.href = "http://127.0.0.1:8000/admin/course/list/"+x;

 }
 </script>

@endsection