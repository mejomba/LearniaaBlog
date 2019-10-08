@extends('admin.Layouts.layout_main')

@section('Head')
<title> نمایش مدرس | لرنیا </title>
  <meta  name="description" content=" نمایش مدرس | لرنیا">
@endsection

@section('content')


<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                <h1 class="card-title text-center">جدول مدرس ها</h1>
                  <p class="card-category text-center">
                    
                  <a href="{{route('admin.learner.create')}}" class="btn btn-primary btn-round" 
                  style="font-size:1.0rem;"> ایجاد مدرس
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
                      @foreach($learners as $learner)
                        <tr>
                          
                          <td>
                          {{ $learner['pk_learner'] }} 
                          </td>
                          <td>
                          {{ $learner['pk_user'] }} 
                          </td>

                          <td>
                          {{ $learner['pk_profile'] }} 
                          </td>

                          <td>
                          <img src="{{ asset('images/' . $learner['pic'] ) }}" width="100px" height="60px" alt="Thumbnail Image" class="">
                      
                          </td>

                          <td>
                          {{ $learner['desc'] }} 
                          </td>

                      
                          <td>

                        <span style="font-size: 1.3rem;color:black">
                      <a style="color:#00bcd4" href="{{ route('admin.learner.edit', $learner['pk_learner']) }}"> 
                      <img src="{{ asset('images/Template/edit.svg') }}" alt="Thumbnail Image" height="30px" width="30px">
                       </a>
                        </span>

                        <span style="font-size: 1.3rem;color:black;padding-right:25px">
                      <a style="color:#e91e63" href="{{ route('admin.learner.delete', $learner['pk_learner']) }}">
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