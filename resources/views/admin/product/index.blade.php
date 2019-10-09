@extends('admin.Layouts.layout_main')

@section('Head')
<title> نمایش محصول | لرنیا </title>
  <meta  name="description" content=" نمایش محصول | لرنیا">
@endsection

@section('content')


<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                <h1 class="card-title text-center">جدول محصول</h1>
                  <p class="card-category text-center">
                    
                  <a href="{{route('admin.product.create')}}" class="btn btn-primary btn-round" 
                  style="font-size:1.0rem;"> ایجاد محصول
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
                      @foreach($products as $product)
                        <tr>
                          
                          <td>
                          {{ $product['pk_product'] }} 
                          </td>
                          <td>
                          {{ $product['pk_category'] }} 
                          </td>

                          <td>
                          {{ $product['pk_tag'] }} 
                          </td>

                          <td>
                          {{ $product['pk_learner'] }} 
                          </td>

                          <td>
                          {{ $product['title'] }} 
                          </td>

                          <td>
                          <img src="{{ asset('images/' . $product['pic'] ) }}" width="100px" height="60px" alt="Thumbnail Image" class="">
                      
                          </td>

                          <td>
                          {{ $product['price'] }} 
                          </td>

                          <td>
                          {{ $product['time'] }} 
                          </td>

                          <td>
                          {{ $product['desc'] }} 
                          </td>

                          <td>
                          {{ $product['count'] }} 
                          </td>

                          <td>
                          {{ $product['language'] }} 
                          </td>
                      
                          <td>
                          {{ $product['subtitle'] }} 
                          </td>

                          <td>
                          {{ $product['status'] }} 
                          </td>


                       <td>

                        <span style="font-size: 1.3rem;color:black">
                      <a style="color:#00bcd4" href="{{ route('admin.product.edit', $product['pk_product']) }}"> 
                      <img src="{{ asset('images/Template/edit.svg') }}" alt="Thumbnail Image" height="30px" width="30px">
                       </a>
                        </span>

                        <span style="font-size: 1.3rem;color:black;padding-right:25px">
                      <a style="color:#e91e63" href="{{ route('admin.product.delete', $product['pk_product']) }}">
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