@extends('admin.Layouts.layout_main')

@section('Head')
<title> نمایش رفتار  | لرنیا  </title>
  <meta  name="description" content=" نمایش رفتار| لرنیا">
@endsection

@section('content')


<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                <h1 class="card-title text-center">جدول رفتارها </h1>
                  <p class="card-category text-center">
                    

                   <!--
                  <a href="{{route('admin.behavior.create')}}" class="btn btn-primary btn-round" 
                  style="font-size:1.0rem;background: linear-gradient(to right, #1aafd0 0%, #1aafd0 51%, #1aafd0 100%);"> ایجاد تگ
                  </a> 
                  -->               

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
                      @foreach($behavior as $behavior_one)
                        <tr>
                          
                          <td>
                          {{ $behavior_one['pk_behavior'] }} 
                          </td>

                          <td>
                          {{ $behavior_one['pk_entity'] }} 
                          </td>

                          <td>
                          {{ $behavior_one['pk_users'] }} 
                          </td>

                          <td>
                          {{ $behavior_one['type'] }} 
                          </td>

                          <td>
                          {{ $behavior_one['content'] }} 
                          </td>

                          
                      
                          <td>

                        <span style="font-size: 1.3rem;color:black">
                      <a  href="{{ route('admin.behavior.edit', $behavior_one['pk_behavior']) }}"> 
                      <img src="{{ asset('images/Template/edit.svg') }}" alt="Thumbnail Image" height="30px" width="30px"> </a>
                        </span>

                        <span style="font-size: 1.3rem;color:black;padding-right:25px">
                      <a  href="{{ route('admin.behavior.delete', $behavior_one['pk_behavior']) }}">
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