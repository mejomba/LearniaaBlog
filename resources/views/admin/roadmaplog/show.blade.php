@extends('Layouts.layout_main_admin')

@section('Head')
<title> نمایش کاربران مسیریاب | لرنیا </title>
  <meta  name="description" content=" نمایش بن تخفیف | لرنیا">
@endsection

@section('content')


<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                <h1 class="card-title text-center">
                <img src="{{ asset('images/Template/icon_discount.svg') }}" alt="Thumbnail Image" height="60px" width="60px">
                کاربران مسیریاب</h1>
                  <p class="card-discount text-center">
                    

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
                        
                      </tr>

                    </thead>

                      <tbody>
                      @foreach($logs as $log)
                        <tr>
                          
                          <td>
                          {{ $log['pk_log'] }} 
                          </td>

                          <td>
                          {{ $log['name'] }} 
                          </td>

                          <td>
                          {{ $log['uuid'] }} 
                          </td>
                         
                          <td>
                          {{ $log['location_user_id'] }} 
                          </td>

                          <td>
                          {{ $log['answer'] }} 
                          </td>

                          <td>
                          {{ $log['sort'] }} 
                          </td>
                         
                      
                     
                         
                          
                        </tr>
                        @endforeach
                        
                                     
 <!---- Modal Delete -->                       

       <!-- Form &  Body -->
       
        

        <!-- Form &  Body -->
      


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