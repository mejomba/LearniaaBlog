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
                      
                       
                      </div>
                 </div>

                 <div class="row">  
                       <div id="question" class="col-6 col-md-6 col-lg-6 mr-auto ml-auto"
                       style="border: #20c5ba 3px solid;padding-top: 10px; padding-bottom: 10px;margin-top: 10px;margin-bottom: 10px;">
    
                      </div>
                 </div>
                 <div class="row">  
                       <div id="feedback" class="col-12 col-md-12 col-lg-12">
                      
                       
                      </div>
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

    $.ajax({
                url: '/api/GetPopupData',
                data:
                {
                    
                },
                error: function(err)
                {
                },
                dataType: 'json',
                success: function(data)
                {
                    deletecontent();
                    $("#content").html(data.content);
                    $("#question").html(data.question);
                    data.feedback.forEach(function(item, index) 
                    {
                    let Name = document.createElement("button");
                    Name.setAttribute('type','button');
                    Name.setAttribute('class', "btn btn-primary");
                    Name.textContent = item.caption ;
                    Name.setAttribute('SelectAnswerId',item.key);
                    Name.setAttribute('id',item.key+'_feedback');
                    Name.setAttribute('radepa',item.radepa);
                    Name.setAttribute('onclick',"SetAnswerUser('"+item.key+"','"+item.radepa+"')");
                    document.getElementById("feedback").append(Name);   
                    $('#'+item.key+'_feedback').css('margin-left','10px');                  
                    });
                    OpenPopup();
                },
                type: 'POST'
            });
}

function ClosePopup()
 {
     document.getElementById("ModalData").setAttribute("style","");
 }
 </script>

@endsection