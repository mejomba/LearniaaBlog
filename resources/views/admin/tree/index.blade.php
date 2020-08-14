@extends('admin.Layouts.layout_main')

@section('Head')
<title> نمایش درخت  | لرنیا  </title>
  <meta  name="description" content=" نمایش درخت| لرنیا">
@endsection

@section('content')


<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                <h1 class="card-title text-center">جدول درخت</h1>
                  <p class="card-category text-center">
                    
                  <a href="{{route('admin.tree.create')}}" class="btn btn-primary btn-round" 
                  style="font-size:1.0rem"> ایجاد درخت
                  </a>    

                
                  <span style="font-size: 1.3rem;color:black;">
                  <button style="color:#e91e63" type="button" class="btn btn-warning btn-round"
                  onclick="Modal_CreateNode()" data-toggle="modal"
                   data-target="#ModalCreateNode">
                 ایجاد گره </button>
                  </span>



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
                      @foreach($nodes as $node)
                        <tr>
                          
                          <td>
                          {{ $node['pk_tree'] }} 
                          </td>
                          <td>
                          {{ $node['pk_parent'] }} 
                          </td>

                          <td>
                          {{ $node['level'] }} 
                          </td>

                          <td>
                          {{ $node['sort'] }} 
                          </td>

                          <td>
                          {{ $node['has_children'] }} 
                          </td>

                          <td>
                          {{ $node['name'] }} 
                          </td>

                         

                          <td>

                            <span style="font-size: 1.3rem;color:black">
                            @if( $node['level'] == 0)
                            <a class="btn"  href="{{ route('admin.tree.edit', $node['pk_tree']) }}"> 
                            @endif
                            @if( $node['level'] != 0)
                            <a class="btn"  href="{{ route('admin.node.edit', $node['pk_tree']) }}"> 
                            @endif
                            <img src="{{ asset('images/Template/edit.svg') }}" alt="Thumbnail Image" height="30px" width="30px">
                             </a>
                            </span>

                           

                            <span style="font-size: 1.3rem;color:black;">
                        <button style="color:#e91e63" type="button" class="btn"
                         onclick="Modal_Delete( {{ $node['pk_tree'] }} )" >
                      <img src="{{ asset('images/Template/delete.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
                      </button>
                        </span>

                            </td>
                          
                        </tr>
                        @endforeach

                                           
 <!---- Modal Delete -->                       
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
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

<script>
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
  location.replace( baseUrl + "admin/tree/delete/"+ id);
}
</script>
<!---- Modal Delete -->      
                                    
                        

 <!---- Modal CreateNode -->                       
 <div class="modal fade" id="ModalCreateNode" tabindex="-1" role="dialog" >
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:300px">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalCreateNodeLabel">انتخاب درخت</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
       <!-- Form &  Body -->
       
          <div class="card-body px-lg-1 py-lg-1">
            <div class="row">   
          
             <!-- Select Box -->
          <div class="col-md-12">
        <div class="row">


                        <div class="col-md-3">
                        <span>نام درخت</span> 
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                  <select name="tree_parent" id="tree_parent" class="form-control">
                                  @foreach($nodes as $node)
                                  <option value="{{  $node['pk_tree'] }}">{{  $node['name'] }}</option>
                                  @endforeach 
                                  </select>
                                  </div>
                                </div>
                     </div>
            
   
        </div>
        </div>
         <!-- Select Box -->


            </div>
            </div>

        <!-- Form &  Body -->
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  data-dismiss="modal">انصراف</button>
        <button type="button" class="btn btn-primary" onclick="create()" data-dismiss="modal">ایجاد گره</button>
      </div>
    </div>
  </div>
</div>



<script>
var tree_parent = 0 ;
function Modal_CreateNode()
{
  $("#ModalCreateNode").show();
  document.getElementById("ModalCreateNode").setAttribute("class","modal fade show");
  document.getElementById("ModalCreateNode").setAttribute("style","display:block");
  
}

function create()
{ 
  tree_parent =  $("#tree_parent").val();

  var getUrl = window.location;
  var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" ;
  location.replace( baseUrl + "admin/node/create/" + tree_parent);
}
</script>
<!---- Modal CreateNode -->  



                        
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>







@endsection