@extends('admin.Layouts.layout_main')

@section('Head')
<title> نمایش بن تخفیف | لرنیا </title>
  <meta  name="description" content=" نمایش بن تخفیف | لرنیا">
@endsection

@section('content')


<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                <h1 class="card-title text-center">جدول بن تخفیف ها</h1>
                  <p class="card-discount text-center">
                    
                  <a href="{{route('admin.discount.create')}}" class="btn btn-primary btn-round" 
                  style="font-size:1.0rem;"> ایجاد بن تخفیف
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
                      @foreach($discounts as $discount)
                        <tr>
                          
                          <td>
                          {{ $discount['pk_discount'] }} 
                          </td>
                          <td>
                          {{ $discount['serial'] }} 
                          </td>

                          <td>
                          {{ $discount['owners'] }} 
                          </td>

                          <td>
                          {{ $discount['status'] }} 
                          </td>

                     
                          <td>

                            <span style="font-size: 1.3rem;color:black">
                            <a  href="{{ route('admin.discount.edit', $discount['pk_discount']) }}"> 
                            <img src="{{ asset('images/Template/edit.svg') }}" alt="Thumbnail Image" height="30px" width="30px">
                            </a>
                            </span>

                            <span style="font-size: 1.3rem;color:black;padding-right:25px">
                            <a  href="{{ route('admin.discount.delete', $discount['pk_discount']) }}">
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