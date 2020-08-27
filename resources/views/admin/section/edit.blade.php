@extends('admin.Layouts.layout_main')

@section('Head')
<title> ویرایش سکشن | لرنیا </title>
  <meta  name="description" content=" ویرایش سکشن | لرنیا">
@endsection

@section('content')


<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center"><h1>ویرایش سکشن</h1></div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="POST" action="{{route('admin.section.update',$section['pk_section'])}}" enctype="multipart/form-data" style="min-height:270px;">
        @csrf
        <div class="row"> 
        <!-- Select Box -->
      <div class="col-md-4">
            <div class="row">
                            <div class="col-md-3">
                            <span>پکیج</span> 
                            </div>
                            <div class="col-md-9">
                          <div class="form-group focused">
                                      <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">  
                                        </div>
                                      <select name="pk_package" class="form-control">
                                      @foreach ($packages as $package)
                                      <option value="{{ $package->pk_package }}"
                                      @if($section->pk_package == $package->pk_package )
                                      selected="selected"
                                      @endif>{{ $package->fa_name }}</option>
                                      @endforeach 
                                      </select>
                                      </div>
                              </div>
                        </div>
            </div>
            </div>
            <!-- Select Box -->

        <div class="col-md-4">
          <div class="form-group">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                          
                        </div>
                        <input class="form-control" name="sort" value="{{ $section['sort'] }}"  placeholder="ترتیب" type="text" >
                      </div>
                    </div>
          </div>

          <div class="col-md-4">
          <div class="form-group">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                          
                        </div>
                        <input class="form-control" name="name" value="{{ $section['name'] }}"  placeholder=" نام " type="text" >
                      </div>
                    </div>
          </div>

          <div class="col-md-4">
          <div class="form-group">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                          
                        </div>
                        <input class="form-control" name="part_from" value="{{ $section['part_from'] }}"  placeholder=" شروع سکشن" type="text" >
                      </div>
                    </div>
          </div>

          <div class="col-md-4">
          <div class="form-group">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                          
                        </div>
                        <input class="form-control" name="part_to" value="{{ $section['part_to'] }}"  placeholder=" انتهای سکشن" type="text" >
                      </div>
                    </div>
          </div>

          <div class="col-md-4">
        <div class="form-group">
        <span> ویدیو</span>    
                <textarea name="intro" class="form-control" >{{ $section['intro'] }}</textarea>
                  </div>
        </div>

   <!-- End -->
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