<@extends('admin.Layouts.layout_main')

@section('Head')
<title> نمایش پست | لرنیا </title>
  <meta  name="description" content=" نمایش پست | لرنیا">
@endsection

@section('content')
<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h1 class="card-title text-center">
                  <img src="{{ asset('images/Template/icon_blog.svg') }}" alt="Thumbnail Image" height="60px" width="60px">
                 بلاگ</h1>
                  <p class="card-category text-center">
                    
                  <a href="{{route('admin.blog.create')}}" class="btn btn-primary btn-round" 
                  style="font-size:1.0rem;"> ایجاد پست
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
                      @foreach($blogs as $blog)
                        <tr>
                          <td>
                          {{ $blog['pk_blog'] }} 
                          </td>
                          <td>
                          {{ $blog['pk_category'] }} 
                          </td>
                          

                          <td>
                          {{ $blog['title'] }} 
                          </td>

                          <td>
                          {{ $blog['en_title'] }} 
                          </td>

                          <td>
                          {{ $blog['pk_writers'] }} 
                          </td>
                          
                          <td>

                            <img src="{{  Storage::url('post/'.$blog['pic_content'])  }}" width="100px" height="60px" alt=" {{ $blog['title'] }}" class="">
                      
                          </td>

                          <td>

                            @if($blog['status'] == 'انتشار')
                            <span style="font-size: 1.3rem;color:gray">
                            <a target="_blank" href="{{route('blog.show',  ['en_title' =>  $blog['en_title'] ] )}}"> 
                            <img src="{{ asset('images/Template/world.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
                            </a>
                            </span>
                            

                            @else
                            <button class="btn" type="button" style="padding:0;" onclick="GetDraftPost('{{ $blog['pk_blog'] }}')">
                            <span style="font-size: 1.3rem;color:gray">
                            <img src="{{ asset('images/Template/draft.svg') }}" alt="Thumbnail Image" height="40px" width="40px">

                            </span>
                          </button>

                            @endif

                          </td>

                       <td>

                        <span style="font-size: 1.3rem;color:black">
                      <a class="btn" style="color:#00bcd4" href="{{route('admin.blog.edit', $blog['pk_blog'] )}}"> 
                      <img src="{{ asset('images/Template/edit.svg') }}" alt="Thumbnail Image" height="30px" width="30px">
                       </a>
                        </span>

                        <span style="font-size: 1.3rem;color:black;">
                        <button style="color:#e91e63" type="button" class="btn"
                         onclick="Modal_Delete( {{ $blog['pk_blog'] }} )" >
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
           <h5 class="modal-title" id="ModalLabelData">مشاهده مقاله</h5> 
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

function GetDraftPost(pk_blog) 
{
    $.ajax({
                url: '/api/GetDraftPost',
                data:
                {
                  pk_blog : pk_blog 
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
  location.replace( baseUrl + "admin/blog/delete/"+ id);
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