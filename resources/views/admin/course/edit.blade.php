@extends('admin.Layouts.layout_main')

@section('Head')
<title> تغییر درس  | لرنیا  </title>
  <meta  name="description" content=" تغییر درس| لرنیا">
@endsection

@section('content')



<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center">
                <h1>تغییر درس</h1>
                </div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="POST" action="{{route('admin.course.update',$course['pk_course'])}}" enctype="multipart/form-data" style="min-height:270px;">
        @csrf
        <div class="row">   
        <div class="col-md-4">
        <div class="row">


                        <div class="col-md-3">
                        <span>نام محصول </span> 
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                  <select name="product" class="form-control">
                                 @foreach($products as $pro)
                                  <option value="{{$product->title}}">{{$pro['title']}} </option>
                                 @endforeach
                                  </select>
                                  </div>
                                </div>
                     </div>
            
   
        </div>
        </div>

       <!-- input Box -->

      <!-- input Box -->
      
       
       
        <!-- Select Box -->
        <div class="col-md-4">
        <div class="row">

 
                        <div class="col-md-3">
                        <span>نام درخت</span> 
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                    <select name="tree" class="form-control">
                                     @foreach($trees as $tre)
                                  <option value="{{$tree->name}}">{{$tre['name']}} </option>
                                    @endforeach
 
                                  </select>

                                  </div>
                                </div>
                     </div>
            
        </div>
        </div>    
        <div class="col-md-4">
          <div class="form-group">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                          
                        </div>
                        <input class="form-control" name="sort"  placeholder=" قسمت" type="text" value="{{$course->sort}}">
                      </div>
                    </div>
          </div>

          <div class="col-md-4">
          <div class="form-group">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                          
                        </div>
                        <input class="form-control" name="name"  placeholder=" نام درس" type="text" value="{{$course->name}}">
                      </div>
                    </div>
          </div>

          <div class="col-md-4">
          <div class="form-group">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                          
                        </div>
                        <input class="form-control" name="description"  placeholder=" توضیحات" type="text" value="{{$course->description}}">
                      </div>
                    </div>
          </div>

          <div class="col-md-4">
          <div class="form-group">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                          
                        </div>
                        <input class="form-control" name="pic"  placeholder=" لینک عکس" type="text" value="{{$course->pic}}">
                      </div>
                    </div>
          </div>
         <!-- Select Box -->
         </div> 

                
  
                  <div class="text-center" style="padding-top:20px">
                    <button type="submit" class="btn btn-primary">ثبت تغییرات سبد</button>
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