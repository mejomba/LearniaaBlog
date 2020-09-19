@extends('Layouts.layout_main_user')

@section('Head')
<title> لیست خریداری شده ها | لرنیا </title>
  <meta  name="description" content=" لیست خریداری شده ها | لرنیا">
@endsection

@section('content')


<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                <h1 class="card-title text-center">لیست خریداری شده ها</h1>
                  <p class="card-category text-center">
                    
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
                      @foreach($packagelist as $package)
                      <!--                json process            -->  

                        <tr>
                          
                          <td>
                          {{ $package['fa_name'] }} 
                          </td>

                          <td>
                          {{ $package['en_name'] }} 
                          </td>

                          <td>
                          {{ $package['price'] }} 
                          </td>

                          <td>
                          {{$package['count']}}
                         
                          </td>

                         
                         
    
                         

                         
                          
                        </tr>
                        @endforeach
                        
                        
                        
                        
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>







@endsection