<!-- Modal Error Box -->                      
<div class="modal fade" dir="rtl" id="ModalError" tabindex="-1" role="dialog"  aria-labelledby="ModalLabelModalError" aria-hidden="true">  
<div class="modal-dialog modal-dialog-centered" role="document" style="max-width:500px"> 
<div class="modal-content">
<div class="modal-header"> 
<h5 class="modal-title" id="ModalLabelError">پیغام</h5></div>                             
<div class="modal-body">                      
<div class="card-body px-lg-1 py-lg-1">
<div class="row">   
@if ($errors->any())
@foreach ($errors->all() as $error)
<input type="hidden" name="errors[]" value ="{{ $error }}" id="errors">
<br></br>
 <b style="color:red;">پیام خطا: {{ $error }}</b>  
@endforeach
@endif
@if(Session::has('success'))
<input type="hidden" name="errors[]" value ="{{ Session::get('success')  }}" id="errors">
<b style="color:green">پیام موفقیت: {{ Session::get('success') }} </b>
@endif
@if(Session::has('report'))
<input type="hidden" name="errors[]" value ="{{ Session::get('report') }}" id="errors">
<b style="color:red">پیام خطا: {{ Session::get('report') }} </b>
@endif
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" onclick="ModalError_close()" class="btn btn-primary"
 style="background-color:brown;border-color:brown"
>بستن</button>  
</div>
</div>
</div>
</div>
 <script>
 function ModalError_close()
 {document.getElementById("ModalError").setAttribute("style","");}
 document.addEventListener('DOMContentLoaded',function()
 { if(document.getElementById("errors"))
 {document.getElementById("ModalError").setAttribute("style","display:block;opacity:100;");}}, false);  
 </script>                             
<!-- Modal Error Box --> 




