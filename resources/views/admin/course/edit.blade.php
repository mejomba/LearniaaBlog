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
          <div class="form-group">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">   
                        </div>
                        <input class="form-control" name="name"  placeholder="عنوان درس" type="text" value="{{$course->name}}" >
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
                                     <option value="{{$package['pk_package']}}" 
                                     @if($package->pk_package == $course->pk_package )
                                  selected="selected"
                                  @endif>{{$package['fa_name']}} </option>
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
                                          <option value="{{ $learner->pk_learner }}"
                                          @if($learner->pk_learner == $course->pk_learner )
                                          selected="selected"
                                          @endif>{{ $learner->user->name }}</option>
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
                        <input class="form-control" name="sort"  placeholder=" شماره قسمت" type="text" value="{{$course->sort}}" >
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
                        <input class="form-control" name="Alt_cover"  placeholder=" ALT کاور" type="text" value="{{$course->Alt_cover}}" >
                      </div>
                    </div>
               </div>


  <!-- Select Box -->
  <div class="col-md-4">
        <div class="row">
                        <div class="col-md-3">
                        <span>نوع انتشار</span> 
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                <select name="isFree" class="form-control">
                                  <option value="Yes" @if($course->isFree == "Yes" )
                                  selected="selected"
                                  @endif>رایگان</option>
                                  <option value="No" @if($course->isFree == "No" )
                                  selected="selected"
                                  @endif >پولی</option>
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
                     placeholder="ادرس دریافت فایل">{{$course->download_link}}</textarea>
                     </div>
              </div>
            </div>

            </div>
              <!-- SEO Tools (MetaTag) -->
              @php  $metatag = json_decode($course['metatag'],false) @endphp
             
              <h2 class="text-center">تنظیمات متاتگ های سئو تکنیکال</h2>

            <div class="row">                                      
              <div class="col-md-4">
                  <div class="form-group">
                              <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">   
                                </div>
                                <input class="form-control" name="keywords" value="{{$metatag->htmlmeta->keywords}}"    placeholder="keywords کلمات کلیدی" type="text" >
                              </div>
                        </div>
                  </div>

              <div class="col-md-4">
                  <div class="form-group">
                              <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">      
                                </div>
                                <input class="form-control" name="description" value="{{$metatag->htmlmeta->description}}" placeholder="description توضیحات" type="text" >
                              </div>
                        </div>
                  </div>

              <div class="col-md-4">
                  <div class="form-group">
                              <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                </div>
                                <input class="form-control" name="author" value="{{$metatag->htmlmeta->author}}"  placeholder="author نویسنده" type="text" >
                              </div>
                      </div>
                  </div>

              <div class="col-md-4">
                  <div class="form-group">
                              <div class="input-group input-group-alternative">
                                <div class="input-group-prepend"> 
                                </div>
                                <input class="form-control" name="refresh" value="{{$metatag->htmlmeta->refresh}}"  placeholder="refresh رفرش" type="text" >
                              </div>
                        </div>
                  </div>

              <div class="col-md-4">
                  <div class="form-group">
                              <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">  
                                </div>
                                <input class="form-control" name="viewport" value="{{$metatag->htmlmeta->viewport}}"  placeholder="viewport ویو پرت" type="text" >
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
                        <input class="form-control" name="og_title" value="{{$metatag->opengraph->og_title}}"  placeholder="og:title عنوان" type="text" >
                      </div>
                </div>
            </div>


            <div class="col-md-4">
                  <div class="form-group">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                        </div>
                        <input class="form-control" name="og_image" value="{{$metatag->opengraph->og_image}}"  placeholder="og:image تصویر" type="text" >
                      </div>
                    </div>
                  </div>

            <div class="col-md-4">
                  <div class="form-group">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">  
                        </div>
                        <input class="form-control" name="og_description" value="{{$metatag->opengraph->og_description}}"  placeholder="og:description توضیحات" type="text" >
                      </div>
                    </div>
              </div>

            <div class="col-md-4">
                  <div class="form-group">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">  
                        </div>
                        <input class="form-control" name="og_type" value="{{$metatag->opengraph->og_type}}"  placeholder="og:type نوع" type="text" >
                      </div>
                    </div>
              </div>

                  <div class="col-md-4">
                  <div class="form-group">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">   
                        </div>
                        <input class="form-control" name="og_article" value="{{$metatag->opengraph->og_article}}"  placeholder="og:article نویسنده" type="text" >
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
                        <input class="form-control" name="twitter_card"  value="{{$metatag->twitter->twitter_card}}"  placeholder="twitter:card کارت" type="text" >
                      </div>
                  </div>
            </div>

            <div class="col-md-4">
                  <div class="form-group">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">  
                        </div>
                        <input class="form-control" name="twitter_site" value="{{$metatag->twitter->twitter_site}}"  placeholder="twitter:site سایت" type="text" >
                      </div>
                    </div>
                  </div>

              <div class="col-md-4">
                  <div class="form-group">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">    
                        </div>
                        <input class="form-control" name="twitter_description" value="{{$metatag->twitter->twitter_description}}"  placeholder="twitter:description توضیحات" type="text" >
                      </div>
                  </div>
              </div>

              <div class="col-md-4">
                      <div class="form-group">
                          <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                            </div>
                            <input class="form-control" name="twitter_title" value="{{$metatag->twitter->twitter_title}}"  placeholder="twitter:title عنوان" type="text" >
                          </div>
                    </div>
                </div>

            </div> 
            </div>



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