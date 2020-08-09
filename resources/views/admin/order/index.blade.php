@extends('admin.Layouts.layout_main')

@section('Head')
<title> نمایش سفارشات | لرنیا  </title>
  <meta  name="description" content=" نمایش سفارشات| لرنیا">
@endsection

@section('content')


<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                <h1 class="card-title text-center">جدول سفارشات </h1>
                  <p class="card-category text-center">
                    
                  <a href="{{route('admin.order.create')}}" class="btn btn-primary btn-round" 
                  style="font-size:1.0rem"> ایجاد سفارش
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
                      @foreach($orders as $order)
                        <tr>
                          
                          <td>
                          {{ $order['pk_order'] }} 
                          </td>
                          <td>
                          {{ $order['pk_transaction'] }} 
                          </td>

                          <td>
                          {{ $order['pk_Transportation'] }} 
                          </td>

                          <td>
                          {{ $order['pk_user'] }} 
                          </td>

                          <td>
                          {{ $order['status_transaction'] }} 
                          </td>

                          <td>
                          {{ $order['Use_DiscountCode'] }} 
                          </td>
                         

                          <td>
                          {{ $order['DiscountCode'] }} 
                          </td>

                          <td>
                          {{ $order['type_delivery'] }} 
                          </td>
                         
                         
                          <td>
                            <span style="font-size: 1.3rem;color:black">
                            <a class="btn"  href="{{ route('admin.order.edit', $order['pk_order']) }}"> 
                            <img src="{{ asset('images/Template/edit.svg') }}" alt="Thumbnail Image" height="30px" width="30px">
                             </a>
                            </span>
                            <td>

                            <span style="font-size: 1.3rem;color:black;">
                        <button style="color:#e91e63" type="button" class="btn"
                         onclick="Modal_Delete( {{ $order['pk_order'] }} )" >
                      <img src="{{ asset('images/Template/delete.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
                      </button>
                        </span>

                            </td>
                      @if($order['status_transaction'] == 'تکمیل نشده')
                      <td>

                      <a class="btn btn-warning btn-round" style="font-size:0.75rem"
                       href="{{route('admin.order.show', $order['pk_order'])}}"> 
                     مشاهده جزئیات
                       </a>
                       
                        </td>

                      @else


                          <td>
                          <a href="#" class="btn btn-primary btn-round" 
                  style="font-size:0.75rem"> تکمیل سفارش
                  </a>  
                          </td>

                      @endif
                      
                          
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
  location.replace( baseUrl + "admin/order/delete/"+ id);
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