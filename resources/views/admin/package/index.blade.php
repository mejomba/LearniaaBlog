@extends('admin.Layouts.layout_main')

@section('Head')
<title> نمایش پکیج | لرنیا </title>
  <meta  name="description" content=" نمایش پکیج | لرنیا">
@endsection

@section('content')


<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                <h1 class="card-title text-center">جدول پکیج</h1>
                  <p class="card-category text-center">
                    
                  <a href="{{route('admin.package.create')}}" class="btn btn-primary btn-round" 
                  style="font-size:1.0rem;"> ایجاد پکیج
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
                      @foreach($packages as $package)
                        <tr>
                          
                          <td>
                          {{ $package['pk_package'] }} 
                          </td>
                          <td>
                          {{ $package['pk_tree'] }} 
                          </td>
                          
                          <td>
                          {{ $package['pk_category'] }} 
                          </td>

                          <td>
                          {{ $package['fa_name'] }} 
                          </td>
                          <td>
                          {{ $package['en_name'] }} 
                          </td>
                          <td>
                          {{ $package['sort_tree'] }} 
                          </td>

                        

                          <td>
                                @php 
                                if($package->price != 0)
                                {
                                  echo number_format($package->price) ;
                                }
                                else
                                  {
                                    echo 'رایگان';
                                  }
                                                                  
                                @endphp
                          </td>

                          <td>
                          {{ $package['time'] }} 
                          </td>

                         
                          <td>
                          {{ $package['count'] }} 
                          </td>

                          <td>
                          {{ $package['download_count'] }} 
                          </td>

                          <td>
                          @if($package['status'] == 'انتشار')
                            <span style="font-size: 1.3rem;color:gray">
                            <a target="_blank" href="{{route('package.detail',  ['slug' => $package['pk_package'] , 'desc' =>  $package['title'] ] )}}"> 
                            <img src="{{ asset('images/Template/world.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
                            </a>
                            </span>
                            @else
                            <span style="font-size: 1.3rem;color:gray">
                            <img src="{{ asset('images/Template/draft.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
                            </span>
                            @endif
                          </td>
                          
                         
                       <td>

                        <span style="font-size: 1.3rem;color:black">
                      <a class="btn" style="color:#00bcd4" href="{{ route('admin.package.edit', $package['pk_package']) }}"> 
                      <img src="{{ asset('images/Template/edit.svg') }}" alt="Thumbnail Image" height="30px" width="30px">
                       </a>
                        </span>

                        <span style="font-size: 1.3rem;color:black">
                      <a class="btn" style="color:#00bcd4" href="{{ route('admin.package.duplicate', $package['pk_package']) }}"> 
                      <img src="{{ asset('images/Template/duplicate.svg') }}" alt="Thumbnail Image" height="30px" width="30px">
                       </a>
                        </span>


                       

                        <span style="font-size: 1.3rem;color:black;">
                        <button style="color:#e91e63" type="button" class="btn"
                         onclick="Modal_Delete( {{ $package['pk_package'] }} )" data-toggle="modal" data-target="#exampleModal">
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



<script>
var id = 0 ;
function Modal_Delete(row)
{
  id = row ;
  $("#exampleModal").show();
}

function del()
{ 
  var getUrl = window.location;
  var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" ;
  location.replace( baseUrl + "admin/package/delete/"+ id);
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