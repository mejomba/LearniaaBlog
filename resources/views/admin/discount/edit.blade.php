@extends('admin.Layouts.layout_main')

@section('Head')
<title> ویرایش بن تخفیف | لرنیا </title>
  <meta  name="description" content=" ویرایش بن تخفیف | لرنیا">
@endsection

@section('content')


<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center"><h1>ویرایش بن تخفیف</h1></div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="POST" action="{{route('admin.discount.update',$discount['pk_discount'])}}" enctype="multipart/form-data" style="min-height:270px;">
        @csrf

    
        <div class="row">   

<div class="col-md-4">

<div class="form-group">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                
              </div>
              <input class="form-control" value="{{ $discount['serial'] }}" name="serial" placeholder="سریال کد" type="text">
            </div>
          </div>

</div>

<div class="col-md-4">

  <!--                json process            -->  
  @php  $json = json_decode($discount->owners,false)  @endphp   
  @php   $owners =  implode(",",$json);           @endphp 

<div class="form-group">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
              </div>
              <input name="owners" value="{{$owners ?? '' }}"  class="form-control" placeholder="مالکین" type="text">
            </div>
          </div>

</div>

  <!-- Select Box -->
  <div class="col-md-4">
<div class="row">


                <div class="col-md-3">
                <span>وضعیت</span> 
                </div>
                <div class="col-md-9">
              <div class="form-group focused">
                          <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">  
                            </div>
                          <select name="status" class="form-control">
                          <option value="فعال" 
                          @if($discount->status == "فعال" )
                                  selected="selected"
                                  @endif>فعال </option>
                          <option value="غیر فعال" 
                          @if($discount->status == "غیر فعال" )
                                  selected="selected"
                                  @endif>غیر فعال </option>
                          </select>
                          </div>
                        </div>
             </div>
    

</div>
</div>
 <!-- Select Box -->

</div>

        

        
          <div class="text-center" style="padding-top:20px">
                    <button type="submit" class="btn btn-primary">ثبت درخواست</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
  </div>

     <!-- Body Card ( Main) -->
     </div>





                </div>
              </div>
            </div>
            
          </div>
        </div>
        </div>



@endsection