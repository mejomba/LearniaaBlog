@extends('admin.Layouts.layout_main')


@section('content')


<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                <h4 class="card-title text-center">جدول کاربر ها</h4>
                  <p class="card-category text-center">
                    
                  <a href="{{route('admin.user.create')}}" class="btn btn-primary btn-round" 
                  style="font-size:1.0rem;"> ایجاد کاربر
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
                      @foreach($users as $user)
                        <tr>
                          
                          <td>
                          {{ $user['pk_users'] }} 
                          </td>
                          <td>
                          {{ $user['type'] }} 
                          </td>

                          <td>
                          {{ $user['name'] }} 
                          </td>
                          <td>
                          {{ $user['mobile'] }} 
                          </td>

                         
                         

                          <td>

                        <span style="font-size: 1.3rem;color:black">
                      <a style="color:#00bcd4" href="{{ route('admin.user.edit', $user['pk_users']) }}"> 
                      <img src="{{ asset('images/Template/edit.svg') }}" alt="Thumbnail Image" height="30px" width="30px">
                        </a>
                        </span>

                        <span style="font-size: 1.3rem;color:black;padding-right:25px">
                      <a style="color:#e91e63" href="{{ route('admin.user.delete', $user['pk_users']) }}">
                      <img src="{{ asset('images/Template/delete.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
                        </a>
                        
                        </span>

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