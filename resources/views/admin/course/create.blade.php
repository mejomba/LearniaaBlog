@extends('admin.Layouts.layout_main')

@section('Head')
<title> ایجاد درس  | لرنیا  </title>
  <meta  name="description" content=" ایجاد درس| لرنیا">
@endsection

@section('content')

<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">

          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center">
                <h1>ایجاد درس</h1>
                </div>
                
              </div>

   <div class="card-body px-lg-5 py-lg-5">
   <form method="POST" action="{{route('admin.course.store')}}" enctype="multipart/form-data" style="min-height:270px;">
        @csrf
        <div class="row">   
       
        <div class="col-md-4">
          <div class="form-group">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">   
                        </div>
                        <input class="form-control" name="name"  placeholder="عنوان درس" type="text" >
                      </div>
                    </div>
           </div>

        <!-- Select Box -->
        <div class="col-md-4">
        <div class="row">
                        <div class="col-md-3">
                        <span>نام پکیج</span> 
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                    <select name="pk_package" class="form-control">
                                     @foreach($packages as $package)
                                     <option value="{{$package['pk_package']}}">{{$package['fa_name']}} </option>
                                     @endforeach
                                  </select>

                                  </div>
                                </div>
                     </div>
        </div>
        </div>    
      <!-- Select Box -->


     <!-- Select Box -->
            <div class="col-md-4">
        <div class="row">
                                <div class="col-md-3">
                                <span>مدرس </span> 
                                </div>
                                <div class="col-md-9">
                              <div class="form-group focused">
                                          <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">  
                                            </div>
                                          <select name="pk_learner" class="form-control">
                                          @foreach ($learners as $learner)
                                          <option value="{{ $learner->pk_learner }}">{{ $learner->user['name'] }}</option>
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
                        <input class="form-control" name="sort"  placeholder=" شماره قسمت" type="text" >
                      </div>
                    </div>
          </div>

       <!-- Picture Box -->
        <div class="col-md-4">
        <div class="row">

                        <div class="col-md-3">
                        <span>تصویر کاور </span> 
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                    <input  type="file" id="pic_cover" name="pic_cover">
                                  </div>
                          </div>
                     </div>
        </div>
        </div>
         <!-- Picture Box -->

         <div class="col-md-4">
          <div class="form-group">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend"> 
                        </div>
                        <input class="form-control" name="Alt_cover"  placeholder=" ALT کاور" type="text" >
                      </div>
                    </div>
               </div>

      <!-- Select Box -->
     <div class="col-md-4">
        <div class="row">
             <div class="col-md-3">
                        <span>نوع اننشار</span> 
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                  <select name="isFree" class="form-control">
                                  <option value="Yes">رایگان</option>
                                  <option value="No">پولی</option>
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
                     <textarea name="download_link" id="download_link" type="text" class="form-control" 
                     placeholder="ادرس دریافت فایل"></textarea>
                     </div>
              </div>
            </div>

            </div>
                <!-- SEO Tools (MetaTag) -->
               

                <h2 class="text-center">تنظیمات متاتگ های سئو تکنیکال</h2>

              <div class="row">                                      
                <div class="col-md-4">
                    <div class="form-group">
                                <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">   
                                  </div>
                                  <input class="form-control" name="keywords"  placeholder="keywords کلمات کلیدی" type="text" >
                                </div>
                          </div>
                    </div>

                <div class="col-md-4">
                    <div class="form-group">
                                <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">      
                                  </div>
                                  <input class="form-control" name="description"  placeholder="description توضیحات" type="text" >
                                </div>
                          </div>
                    </div>

                <div class="col-md-4">
                    <div class="form-group">
                                <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">
                                  </div>
                                  <input class="form-control" name="author"  placeholder="author نویسنده" type="text" >
                                </div>
                        </div>
                    </div>

                <div class="col-md-4">
                    <div class="form-group">
                                <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend"> 
                                  </div>
                                  <input class="form-control" name="refresh"  placeholder="refresh رفرش" type="text" >
                                </div>
                          </div>
                    </div>

                <div class="col-md-4">
                    <div class="form-group">
                                <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">  
                                  </div>
                                  <input class="form-control" name="viewport"  placeholder="viewport ویو پرت" type="text" >
                                </div>
                        </div>
                    </div>

              </div>
              <!-- SEO Tools (MetaTag) -->

              <!-- SEO Tools (Open Graph) -->

              <h2 class="text-center">تنظیمات اپن گراف سئو تکنیکال</h2>

              <div class="row">   
                                            
              <div class="col-md-4">
                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">    
                          </div>
                          <input class="form-control" name="og_title"  placeholder="og:title عنوان" type="text" >
                        </div>
                  </div>
              </div>


              <div class="col-md-4">
                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                          </div>
                          <input class="form-control" name="og_image"  placeholder="og:image تصویر" type="text" >
                        </div>
                      </div>
                    </div>

              <div class="col-md-4">
                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">  
                          </div>
                          <input class="form-control" name="og_description"  placeholder="og:description توضیحات" type="text" >
                        </div>
                      </div>
                </div>

              <div class="col-md-4">
                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">  
                          </div>
                          <input class="form-control" name="og_type"  placeholder="og:type نوع" type="text" >
                        </div>
                      </div>
                </div>

                    <div class="col-md-4">
                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">   
                          </div>
                          <input class="form-control" name="og_article"  placeholder="og:article نویسنده" type="text" >
                        </div>
                      </div>
                    </div>

              </div>
              <!-- SEO Tools (Open Graph) -->

              <!-- SEO Tools (Twitter Card) -->
                    <h2 class="text-center">تنظیمات توئیتر کارت سئو تکنیکال</h2>

              <div class="row">  

              <div class="col-md-4">
                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">  
                          </div>
                          <input class="form-control" name="twitter_card"  placeholder="twitter:card کارت" type="text" >
                        </div>
                    </div>
              </div>

              <div class="col-md-4">
                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">  
                          </div>
                          <input class="form-control" name="twitter_site"  placeholder="twitter:site سایت" type="text" >
                        </div>
                      </div>
                    </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">    
                          </div>
                          <input class="form-control" name="twitter_description"  placeholder="twitter:description توضیحات" type="text" >
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                              <div class="input-group-prepend">
                              </div>
                              <input class="form-control" name="twitter_title"  placeholder="twitter:title عنوان" type="text" >
                            </div>
                      </div>
                  </div>

      </div> 
   </div>



           </div>         
               <div class="text-center" style="padding-top:20px">
                    <button type="submit" class="btn btn-primary">ثبت درس</button>
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