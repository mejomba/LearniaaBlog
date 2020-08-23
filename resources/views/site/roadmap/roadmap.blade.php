
@extends('site.roadmap.layout_game')
@section('Head')
    <title> لرنیا آکادمی | لرنیا </title>
    <meta name="description" content="لرنیا آکادمی  | لرنیا ">
    <meta name="keywords" content="نقشه راه لرنیا,چارت آموزشی لرنیا ,لرنیا آاکادمی">
@endsection
@section('content')
<style>
@keyframes pulse2
    {0% { opacity: 0; }
    50% {opacity: 0.5; } 
    100% {opacity: 1; }
    }
</style>
<section class="container-fluid" style="direction:ltr !important">
<div class="row">
    <div class="col-md-12  ml-auto mr-auto text-center" style="margin-top:230px">

<!-- ModalSandogh Box -->                      
<div class="modal fade" dir="rtl" id="ModalSandogh" tabindex="-1" role="dialog"  aria-labelledby="ModalLabelModalSandogh" aria-hidden="true">  
      <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:none"> 
         <div class="modal-content" style="width:60%">
           <div class="modal-header"> 
           <h5 class="modal-title" id="ModalLabelModalSandogh">صندوق گنج</h5> 
            </div>  
                                       
            <div class="modal-body"  id="ModalSandoghBody">                      
                <!-- Form &  Body -->
                 <div class="card-body px-lg-1 py-lg-1">
                   <div class="row">  
                       <div id="SectionPic" class="col-12 col-md-12 col-lg-12">
                       <img src="{{ asset('images/Academy/roadmap/Ganj.png') }}" alt="Learniaa" height="120px" width="300px">
                       <h3 class="text-justify p-lg-1 p-md-4 p-sm-4 p-4 m-lg-2 text-center" style="font-family:DastNevis;font-size:45px">گنج یادگیری خودت رو پیدا کردی</h3>
                      </div>
                 </div>
                 <div class="row">  
                       <div  class="col-12 col-md-12 col-lg-12">
                       <h2 class="text-justify p-lg-1 p-md-4 p-sm-4 p-4 m-lg-2 text-center"
                        id="SectionTitle"
                        style=""></h2>
                       
                      </div>
                 </div>
                 <div class="row">  
                       <div  class="col-12 col-md-12 col-lg-12">
                       <a class="btn btn-primary" id="SectionFeedBack" href="" 
                        style="background-color:#ffe735;border-color:#ffe735;color:black">شروع یادگیری</a>
                       
                      </div>
                 </div>
              </div>
                <!-- Form &  Body -->
                             </div>
                                    <div class="modal-footer">
                                        <button type="button" onclick="CloseSandogh()" class="btn btn-primary"  
                                        style="background-color:brown;border-color:brown" data-dismiss="modal">بستن</button>
                                    </div>
                                   </div>
                                </div>
                              </div>
<!-- ModalSandogh Box --> 


<!-- ModalData Box -->                      
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


<form method="POST" id="Data" action="{{route('roadmap')}}" enctype="multipart/form-data">
@csrf

<input type="hidden" id="Uuid" name="Uuid" value="{{$uuid}}">

<input type="hidden" id="Name" name="Name" value="{{$name}}">

</form>

<script>

    var last_location_user_id = 'tablo_start';

document.addEventListener('DOMContentLoaded',function()
{   document.querySelector('.header-bg').style.display = 'none';
    $("#tablo_webprograming").css('opacity','0');
    $("#tablo_python").css('opacity','0');
    $("#tablo_frontend").css('opacity','0');
    $("#tablo_backend").css('opacity','0');
    $("#tablo_htmlcss").css('opacity','0');
    $("#tablo_php").css('opacity','0');
    $("#tablo_js").css('opacity','0');
    $("#tablo_laravel").css('opacity','0');
    $("#tablo_react").css('opacity','0');


    $("#sandogh_python").css('opacity','0');
    $("#sandogh_htmlcss").css('opacity','0');
    $("#sandogh_php").css('opacity','0');
    $("#sandogh_js").css('opacity','0');
    $("#sandogh_laravel").css('opacity','0');
    $("#sandogh_react").css('opacity','0');

    $("#radepa_to_web").css('opacity','0');
    $("#radepa_to_python").css('opacity','0');
    $("#radepa_to_frontend").css('opacity','0');
    $("#radepa_to_backend").css('opacity','0');
    $("#radepa_to_htmlcss").css('opacity','0');
    $("#radepa_to_php").css('opacity','0');
    $("#radepa_to_laravel").css('opacity','0');
    $("#radepa_to_js").css('opacity','0');
    $("#radepa_to_react").css('opacity','0');

    $("#radepa_to_sandogh_python").css('opacity','0');
    $("#radepa_to_sandogh_frontend").css('opacity','0');
    $("#radepa_to_sandogh_backend").css('opacity','0');
    $("#radepa_to_sandogh_frontend").css('opacity','0');
    $("#radepa_to_sandogh_htmlcss").css('opacity','0');
    $("#radepa_to_sandogh_php").css('opacity','0');
    $("#radepa_to_sandogh_laravel").css('opacity','0');
    $("#radepa_to_sandogh_react").css('opacity','0');
    $("#radepa_to_sandogh_js").css('opacity','0');

    $("#tablo_start").css('animation','pulse2 1.6s linear infinite');
    
}, false); 

function OpenPopup() 
{
    
    document.getElementById("ModalData").setAttribute("style","display:block;opacity:100;");
    $('#ModalData').animate({ scrollTop: 0 }, 'fast');
}

function ClosePopup()
 {
     document.getElementById("ModalData").setAttribute("style","");
 }

 function OpenSandogh() 
{
    document.getElementById("ModalSandogh").setAttribute("style","display:block;opacity:100;");
    $('#ModalSandogh').animate({ scrollTop: 0 }, 'fast');
}

function CloseSandogh()
 {
     document.getElementById("ModalSandogh").setAttribute("style","");
 }

function deletecontent()
{
    $("#content").html('');
    $("#question").html('');
    $("#feedback").html('');

}

function GetPopupData(LocationUserId)
 {
     if(LocationUserId == last_location_user_id)
     {
        if(LocationUserId === 'sandogh_python'||
        LocationUserId === 'sandogh_htmlcss'|| 
        LocationUserId === 'sandogh_php'||
        LocationUserId === 'sandogh_js'||
        LocationUserId === 'sandogh_laravel'||
        LocationUserId ===  'sandogh_react')
    {
        SetEndRoadMap(LocationUserId);
        if(LocationUserId === 'sandogh_python' )
        {
            $("#SectionTitle").text('پایتون (Python)');
            $("#SectionFeedBack").attr("href",' https://learniaa.com/academy/mylearn?pk_tree=29');
            OpenSandogh() ;
        }
        if(LocationUserId === 'sandogh_htmlcss' )
        {
            $("#SectionTitle").text('اچ تی ام ال - سی اس اس (HTML-CSS)');
            $("#SectionFeedBack").attr("href",' https://learniaa.com/academy/mylearn?pk_tree=31');
            OpenSandogh() ;
        }
        if(LocationUserId === 'sandogh_php')
        {
            $("#SectionTitle").text('پی اچ پی (PHP)');
            $("#SectionFeedBack").attr("href",' https://learniaa.com/academy/mylearn?pk_tree=28');
            OpenSandogh() ;
        }
        if(LocationUserId === 'sandogh_js')
        {
            $("#SectionTitle").text('جاوا اسکریپت (JAVASCRIPT)');
            $("#SectionFeedBack").attr("href",' https://learniaa.com/academy/mylearn?pk_tree=32');
            OpenSandogh() ;
        }
        if(LocationUserId === 'sandogh_laravel')
        {
            $("#SectionTitle").text('لاراول (LARAVEL)');
            $("#SectionFeedBack").attr("href",' https://learniaa.com/academy/mylearn?pk_tree=30');
            OpenSandogh() ;
        }
        if(LocationUserId === 'sandogh_react')
        {
            $("#SectionTitle").text('ری اکت (REACT)');
            $("#SectionFeedBack").attr("href",' https://learniaa.com/academy/mylearn?pk_tree=33');
            OpenSandogh() ;
        }
    }
         else
         {
            var uuid = $("#uuid").val();

            $.ajax({
                url: '/api/GetPopupData',
                data:
                {
                    Uuid : uuid ,
                    LocationUserId : LocationUserId
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
     }
     
    else
    {  
    }
}

function Showitem(SelectAnswerId,radepa)
 {
     console.log(SelectAnswerId);
    $('#'+SelectAnswerId).css('opacity','1');
    $('#'+radepa).css('opacity','1');
    $('#'+last_location_user_id).css('animation','');
    $('#'+SelectAnswerId).css('animation','pulse2 1.6s linear infinite');
    last_location_user_id = SelectAnswerId;
 }

 function SetEndRoadMap(LocationUserId)
{
    var uuid = $("#Uuid").val();
    $.ajax({
                url: '/api/SetEndRoadMap',
                data:
                {
                    Uuid : uuid ,
                    LocationUserId:LocationUserId
                },
                error: function(err)
                {
                },
                dataType: 'json',
                success: function(data)
                {

                },
                
                type: 'POST'
            });

}
function SetAnswerUser(SelectAnswerId,radepa)
 {
     
    if(SelectAnswerId === 'sandogh_python'||
       SelectAnswerId === 'sandogh_htmlcss'|| 
       SelectAnswerId === 'sandogh_php'||
       SelectAnswerId === 'sandogh_js'||
       SelectAnswerId === 'sandogh_laravel'||
       SelectAnswerId ===  'sandogh_react')
    {
        Showitem(SelectAnswerId,radepa);
        ClosePopup();
        
    }
        
        else
        {
            var uuid = $("#Uuid").val();
            var dardepa = $("#radepa").val();
            $.ajax({
                url: '/api/SetAnswerUser',
                data:
                {
                    Uuid : uuid ,
                    LocationUserId : last_location_user_id,
                    SelectAnswerId:SelectAnswerId
                },
                error: function(err)
                {
                },
                dataType: 'json',
                success: function(data)
                {

                    if(data.status = 'ok')
                    {
                    Showitem(SelectAnswerId,radepa);
                    ClosePopup();
                    }

                },
                
                type: 'POST'
            });
       } 
 }

</script>
