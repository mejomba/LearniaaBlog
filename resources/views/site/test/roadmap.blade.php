@extends('site.Layouts.layout_main')
@section('Head')
    <title> لرنیا آکادمی | لرنیا </title>
    <meta name="description" content="لرنیا آکادمی  | لرنیا ">
    <meta name="keywords" content="نقشه راه لرنیا,چارت آموزشی لرنیا ,لرنیا آاکادمی">
@endsection
@section('content')

<!-- Blog Posts -->
<section class="container-fluid">

<div class="row" >
    <div class="col-md-12  ml-auto mr-auto text-center" style="margin-top:230px">

    <input type="button" class="btn btn-primary" value="start" id="start" onclick="GenerateNewUuid()">
  


            <!-- Trigger/Open The Modal -->
            <button id="myBtn">Open Modal</button>

            <!-- The Modal -->
            <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <input type="text" class="form-control w-100" placeholder="نام خود را وارد کنید..." id="inputName">
           <input type="button" class="btn btn-info col-4 offset-4 mb-4" id="btnStart" onclick="SetFamilyUser()" value="شروع">
            </div>

            </div>




    </div>
</div>

</section>
       


<script>
$(document).ready(
function GenerateNewUuid() 
{
    $.ajax({
        url: 'http://127.0.0.1:8000/api/GenerateNewUuid',
        data: {},
        error: function(err)
         {
         },
        dataType: 'json',
        success: function(data)
         {
            var x = document.createElement("INPUT");
            x.setAttribute("type", "hidden");
            x.setAttribute("value", data.uuid);
            x.setAttribute("id", "uuid");
            document.body.append(x);
         },
        type: 'POST'
    });
    modal.style.display = "block";
}
) ;

function SetFamilyUser()
 { 
    var name = $("#inputName"). val();
    var uuid = $("#uuid"). val();

    $.ajax({
        url: 'http://127.0.0.1:8000/api/SetFamilyUser',
        data: 
        {
            Uuid : uuid ,
            Name : name
        },
        error: function(err)
         {
         },
        dataType: 'json',
        success: function(data)
         {
           if(data.status = "ok")
           {
            modal.style.display = "none";
            location.replace("http://127.0.0.1:8000/test/wellcome");
           }
           else
           {
             // show error 
           }
         },
        type: 'POST'
    });

    

 } 
</script>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

</script>


<style>
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

</style>


    </div>
 </div>                  
 <!-- container -->
</section>
<!-- End BLog Posts -->

@endsection
