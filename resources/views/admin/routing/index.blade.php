@extends('Layouts.layout_main_admin')

@section('Head')
<title> نمایش مسیرها | لرنیا </title>
  <meta  name="description" content=" نمایش مسیرها | لرنیا">
@endsection

@section('content')


<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                <h1 class="card-title text-center">
                <img src="{{ asset('images/Template/icon_routing.svg') }}" alt="Thumbnail Image" height="60px" width="60px">
                مسیر</h1>
                  <p class="card-category text-center">
                    
                  <a href="{{route('admin.routing.create')}}" class="btn btn-primary btn-round" 
                  style="font-size:1.0rem;"> ایجاد مسیر
                  </a>                

                    </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                     
                    <thead class=" text-primary">
                        <tr>
                            @foreach($names as $name)
                          <th>
                         {{ $name }} 
                        </th>
                        @endforeach
                        <th>
                    عملیات
                        </th>
                        
                      </tr>

                    </thead>

                      <tbody>
                      @foreach($routing as $route)
                        <tr>
                          
                          <td>
                          {{ $route['pk_routing'] }} 
                          </td>
                          <td>
                          {{ $route['location_user_id'] }} 
                          </td>
                          
                          <td>
                          {{ $route['type_question'] }} 
                          </td>

                       <td>

                        <span style="font-size: 1.3rem;color:black">
                      <a class="btn" style="color:#00bcd4" href="{{ route('admin.routing.edit', $route['pk_routing']) }}"> 
                      <img src="{{ asset('images/Template/edit.svg') }}" alt="Thumbnail Image" height="30px" width="30px">
                       </a>
                        </span>

                        <button class="btn" type="button" style="padding:0;" onclick="GetContentRouting('{{ $route['pk_routing'] }}')">
                            <span style="font-size: 1.3rem;color:gray">
                            <img src="{{ asset('images/Template/draft.svg') }}" alt="Thumbnail Image" height="40px" width="40px">

                            </span>
                          </button>
                       

                        <span style="font-size: 1.3rem;color:black;">
                        <button style="color:#e91e63" type="button" class="btn"
                         onclick="Modal_Delete( {{ $route['pk_routing'] }} )">
                      <img src="{{ asset('images/Template/delete.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
                      </button>
                        </span>

                        </td>
                          
                        </tr>
                        @endforeach
                        
          
 <!---- Modal Delete -->                       
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:300px">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">تایید حذف کردن</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
       <!-- Form &  Body -->
       
          <div class="card-body px-lg-1 py-lg-1">
            <div class="row">   
          
            </div>
            </div>

        <!-- Form &  Body -->
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  data-dismiss="modal">انصراف</button>
        <button type="button" class="btn btn-primary" onclick="del()" data-dismiss="modal">حذف</button>
      </div>
    </div>
  </div>
</div>


<!-- ModalData Box -->                      
<div class="modal fade" dir="rtl" id="ModalData" tabindex="-1" role="dialog"  aria-labelledby="ModalLabelModalData" aria-hidden="true">  
      <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:none"> 
         <div class="modal-content" style="width:90%">
           <div class="modal-header"> 
           <h5 class="modal-title" id="ModalLabelData">مشاهده مسیر</h5> 
            </div>  
                                       
            <div class="modal-body" id="ModalDataBody">                      
                <!-- Form &  Body -->
                 <div class="card-body px-lg-1 py-lg-1">
                   <div class="row">  
                       <div id="content" class="col-12 col-md-12 col-lg-12">
                      
                       
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
}

function deletecontent()
{
    $("#content").html('');
}

function GetContentRouting(pk_routing) 
{
    $.ajax({
                url: '/api/GetContentRouting',
                data:
                {
                  pk_routing : pk_routing 
                },
                error: function(err)
                {
                },
                dataType: 'json',
                success: function(data)
                {
                    deletecontent();
                    $("#content").html(data.content);
                    OpenPopup();
                },
                type: 'POST'
            });
}

function ClosePopup()
 {
     document.getElementById("ModalData").setAttribute("style","");
 }

var id = 0 ;
function Modal_Delete(row)
{
  id = row ;
  $("#exampleModal").show();
  document.getElementById("exampleModal").setAttribute("class","modal fade show");
}

function del()
{ 
  var getUrl = window.location;
  var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" ;
  location.replace( baseUrl + "admin/routing/delete/"+ id);
}
</script>
<!---- Modal Delete -->                            
                        
                        
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>







@endsection