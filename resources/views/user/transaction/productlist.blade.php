@extends('user.Layouts.layout_main')

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
                      @foreach($transactions as $transaction)
                      <!--                json process            -->  
                      @php  $json = json_decode($transaction->extras,false)  @endphp 

                        <tr>
                          
                          <td>
                          {{ $transaction['pk_product'] }} 
                          </td>
                          <td>
                          {{ $transaction->product['title'] }} 
                          </td>

                          <td>
                          @if($transaction->product['price'] == 0)
                          رایگان
                          @else
                          {{ $transaction->product['price'] }} 
                          @endif
                          </td>

                          <td>
                          <a style="margin-bottom: 15px;" href="{{route('product.detail',[$transaction['pk_product'] , $transaction->product['title'] ] )}}" 
                          class="btn btn-primary btn-round" >  مشاهده  </a>
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