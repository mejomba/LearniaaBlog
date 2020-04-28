@extends('admin.Layouts.layout_main')

@section('Head')
<title> ایجادنظرسنجی  | لرنیا </title>
  <meta  name="description" content=" ایجادنظرسنجی | لرنیا">
@endsection

@section('content')

<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center">
                <h1> ایجادنظرسنجی</h1>
                </div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="POST" action="{{route('admin.vote.store')}}" enctype="multipart/form-data" style="min-height:270px;">
        @csrf

     <div class="row">   

        <div class="col-md-4">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      </div>
                      <input class="form-control" name="name" placeholder="نام نظرسنجی " type="text">
                    </div>
                  </div>
           </div>

           <div class="col-md-4">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      </div>
                      <input class="form-control" name="question" placeholder="سوال نظرسنجی " type="text">
                    </div>
                  </div>
           </div>

        <div class="col-md-4">
      <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      </div>
                      <input name="option1" class="form-control" placeholder="گزینه 1 " type="text">
                    </div>
                  </div>
        </div>

        <div class="col-md-4">


          
<div class="form-group">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
              </div>
              <input name="option2" class="form-control" placeholder="گزینه 2 " type="text">
            </div>
          </div>

</div>

<div class="col-md-4">


          
<div class="form-group">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
              </div>
              <input name="option3" class="form-control" placeholder="گزینه 3 " type="text">
            </div>
          </div>

</div>

<div class="col-md-4">


          
<div class="form-group">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
              </div>
              <input name="option4" class="form-control" placeholder="گزینه 4 " type="text">
            </div>
          </div>

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