@extends('admin.Layouts.layout_main')

@section('Head')
<title> لیست تراکنش ها | لرنیا </title>
  <meta  name="description" content=" لیست تراکنش ها | لرنیا">
@endsection

@section('content')


<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                <h1 class="card-title text-center">
                <img src="{{ asset('images/Template/icon_wallet.svg') }}" alt="Thumbnail Image" height="60px" width="60px">
              تراکنش</h1>
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
                        <th>
                    عملیات
                        </th>
                        
                      </tr>

                    </thead>

                      <tbody>
                      @foreach($transactions as $transaction)
                      <!--                json process            -->  
                      @php  $json = json_decode($transaction->extras,false)  @endphp 

                        <tr>
                          
                          <td>
                          {{ $transaction['pk_transaction'] }} 
                          </td>
                          <td>
                          {{ $transaction['pk_admins'] }} 
                          </td>

                          <td>
                          {{ $transaction['digital_receipt'] }} 
                          </td>

                          <td>
                          {{ $transaction['price'] }} 
                          </td>

                          <td>
                          {{ $transaction['type'] }} 
                          </td>

                          <td>
                          {{ $transaction['created_at'] }} 
                          </td>

                          <td>
                          {{ $transaction['updated_at'] }} 
                          </td>

                          <td>
                          {{$json->problem ?? '' }}
                          </td>
                      
                         

                          <td>

                        <span style="font-size: 1.3rem;color:black">
                      <a style="color:#00bcd4" href="{{ route('admin.transaction.show', $transaction['pk_transaction']) }}"> 
                      <img src="{{ asset('images/Template/edit.svg') }}" alt="Thumbnail Image" height="30px" width="30px">
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