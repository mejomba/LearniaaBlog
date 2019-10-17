@extends('admin.Layouts.layout_main')

@section('Head')
<title> افزایش موجودی کیف  | لرنیا  </title>
  <meta  name="description" content="افزایش موجودی کیف | لرنیا">
@endsection

@section('content')



<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center"><h1>افزایش موجودی کیف </h1></div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="GET" action="{{ route('admin.transaction.store') }}"
   enctype="multipart/form-data" style="min-height:270px;">
        @csrf

        <input type="hidden" name="type" value="افزایش موجودی کیف پول"/> 

     <div class="row">   

                <div class="col-md-4">
                </div>

           

              <div class="col-md-4">

                  <div class="form-group">
                              <div class="input-group input-group-alternative">
                              <div class="input-group-prepend">
                                  
                              </div>
                              <label style="padding-left:10px"> موجودی ( تومان ) </label>
                              <input class="form-control" disabled  value="{{$wallet}}" name="wallet" placeholder="موجودی" type="text">
                              </div>
                          </div>

                  </div>

                  <div class="col-md-4">
                </div>

                <div class="col-md-4">
                </div>


                  <div class="col-md-4">

                  <div class="form-group">
                              <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                  
                                </div>
                                <input class="form-control"   name="price" placeholder="مبلغ به تومان" type="text">
                              </div>
                            </div>

                  </div>

                  <div class="col-md-4">
                </div>


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