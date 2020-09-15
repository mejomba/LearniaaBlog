@extends('Layouts.layout_main_admin')

@section('Head')
<title> ویرایش تگ | لرنیا </title>
  <meta  name="description" content=" ویرایش تگ | لرنیا">
@endsection

@section('content')


<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center"><h1>ویرایش نظرسنجی</h1></div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="POST" action="{{route('admin.vote.update',$vote['pk_vote'])}}" enctype="multipart/form-data" style="min-height:270px;">
        @csrf

     <div class="row">   

     <div class="col-md-4">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">    
                      </div>
                      <input class="form-control" value="{{ $vote['name_vote'] }}" name="name_vote" placeholder=" نام نظرسنجی" type="text">
                    </div>
                  </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">    
                      </div>
                      <input class="form-control" value="{{ $vote['question'] }}" name="question" placeholder=" سوال نظرسنجی" type="text">
                    </div>
                  </div>
        </div>


 <!--                json process            -->  
 @php  $json = json_decode($vote['extras'],false)  @endphp                       
 
        <div class="col-md-4">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      </div>
                      <input name="option1" value="{{$json[0]->option1 ?? '' }}" class="form-control" placeholder="گزینه1 " type="text">
                    </div>
                  </div>
        </div>


        <div class="col-md-4">
<div class="form-group">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">     
              </div>
              <input class="form-control" value="{{$json[0]->option2 ?? '' }}" name="option2" placeholder=" گزینه2 " type="text">
            </div>
          </div>
</div>


      
<div class="col-md-4">      
<div class="form-group">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
              </div>
              <input name="option3" value="{{$json[0]->option3 ?? '' }}" class="form-control" placeholder="گزینه 3 " type="text">
            </div>
          </div>
</div>



      
<div class="col-md-4">           
<div class="form-group">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
              </div>
              <input name="option4" value="{{$json[0]->option4 ?? '' }}" class="form-control" placeholder=" گزینه 4  " type="text">
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