@extends('Layouts.layout_main_admin')

@section('Head')
<title> ایجاد پست | لرنیا </title>
  <meta  name="description" content=" ایجاد پست | لرنیا">
@endsection

@section('content')

<!-- Body Card ( Main) -->
<div class="container-fluid">
          <div class="row">
          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center">
                <h1>ایجاد پست</h1>
                </div>     
              </div>
              <div class="card-body px-lg-5 py-lg-5">  
   <form method="POST" action="{{route('admin.blog.store')}}" enctype="multipart/form-data" style="min-height:270px;">
        @csrf
     <div class="row">   

      <div class="col-md-4">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend"> 
                      <span>عنوان فارسی</span>    
                      </div>
                      <input class="form-control" name="title" placeholder="عنوان فارسی" type="text">
                    </div>
              </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">  
                      <span>عنوان خارجی (URL)</span>    
                      </div>
                      <input class="form-control" name="en_title" placeholder="عنوان خارجی (URL) " style="direction:ltr" type="text">
                    </div>
              </div>
        </div>


          <!-- Select Box -->
          <div class="col-md-4">
        <div class="row">
                        <div class="col-md-3">
                        <span>دسته بندی</span> 
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                  <select name="pk_category" class="form-control">
                                  @foreach ($categories as $category)
                                  <option value="{{ $category->pk_category }}">{{ $category->name }}</option>
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
                        <span>نویسنده</span> 
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                  <select name="pk_users" class="form-control">
                                  @foreach ($users as $user)
                                  <option value="{{ $user->pk_users }}">{{ $user->name }}</option>
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
                        <span>وضعیت</span> 
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                  <select name="status" class="form-control">
                                  <option value="پیش نویس" selected="selected">پیش نویس</option>
                                  </select>
                                  </div>
                           </div>
                     </div>
        </div>
        </div>
         <!-- Select Box -->

    
      <!-- Picture Box -->
      <div class="col-md-4">
        <div class="row">
                        <div class="col-md-3">
                        <span>تصویر </span> 
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                    <input  type="file" id="pic_content" name="pic_content">
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
                      <span>alt تصویر </span>
                      </div>
                      <input class="form-control" name="alt" placeholder="alt تصویر" type="text">
                    </div>
               </div>
        </div>  
           

        <div class="col-md-4">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      <span>مدت زمان مطالعه</span>
                      </div>
                      <input name="readtime" class="form-control" placeholder="مدت زمان مطالعه " type="text">
                    </div>
              </div>
        </div>

     
        <div class="col-md-4">
            <div class="form-group">
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                          <span>تاریخ ایجاد</span>
                          </div>
                          <input name="create_at" class="form-control" placeholder="تاریخ ایجاد " type="text">
                      </div>
                </div>
          </div>


          <div class="col-md-4">
            <div class="form-group">
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                          <span>توضیح کوتاه</span>
                          </div>
                          <input name="desc_short" class="form-control" placeholder="توضیح کوتاه" type="text">
                        </div>
                  </div>
            </div>
       
    <!-- Select Box -->
      <div class="col-md-4">
        <div class="row">
                        <div class="col-md-3">
                        <span>ویدئو دارد ؟</span> 
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                  <select name="videocheck" class="form-control">
                                  <option value="{{ 'yes' }}">بله</option>
                                  <option value="{{ 'no' }}"> خیر</option>
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
                  <span>ادرس فایل ویدئو</span>
                     </div>
                       <textarea name="address_video" id="video" type="text" class="form-control" placeholder="ادرس فایل ویدئو"></textarea>
                  </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
            <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                  <span>ادرس عکس ویدئو</span>
                     </div>
                       <textarea name="poster_video" id="video" type="text" class="form-control" placeholder="ادرس عکس ویدئو"></textarea>
                  </div>
            </div>
        </div>


          <!-- Picture Box -->
        <!--  <div class="col-md-4">
        <div class="row">
                <div class="col-md-3">
                        <span>فایل PDF </span> 
                        </div>
                  <div class="col-md-9">
                   <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                    <input  type="file" id="pdf_content" name="pdf_content">
                             </div>
                       </div>
                 </div>
        </div>
        </div>  -->
         <!-- Picture Box -->

         <div class="col-md-4">
                    <div class="form-group">
                                <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend"> 
                                  <span>رده بندی </span>  
                                  </div>
                                  <input class="form-control" name="level"  placeholder="رده بندی" type="text" >
                                </div>
                          </div>
                    </div>

         
           
                                              
                <div class="col-md-4">
                    <div class="form-group">
                                <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend"> 
                                  <span>کلمات کلیدی </span>  
                                  </div>
                                  <input class="form-control" name="keywords"  placeholder="keywords کلمات کلیدی" type="text" >
                                </div>
                          </div>
                    </div>


        <!-- Check Box -->
        <div class="col-md-12">
        <div class="row">
                 <div class="col-md-1">
                        <span>تگ ها</span> 
                        </div>
                        <div class="col-md-11">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                    @foreach($tags as $tag)                                
                                <div style="margin-right:8px" class="custom-control custom-checkbox mb-3">
                                <input class="custom-control-input" id="{{ $tag->pk_tags }}" 
                                name="pk_tags[]" type="checkbox" value="{{ $tag->pk_tags }}" >                            
                                <label class="custom-control-label" for="{{ $tag->pk_tags }}"> {{ $tag->fa_name }} |</label>
                               </div>
                            @endforeach 
                       </div>
                    </div>
                 </div>
        </div>
        </div>
      <!-- Check Box -->
        
        <div class="col-md-12" style="min-height:700px">
               <span> محتوا</span>  
                            <!-- ckeditor -->
                            <textarea name="content"  class="form-control" id="article-ckeditor"></textarea>
                          
                            <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
                            <script>
                                CKEDITOR.replace( 'article-ckeditor' , {
    language:'fa',
   filebrowserUploadMethod: 'form',
    contentsLangDirection: 'rtl',
    filebrowserUploadUrl: "{{route('admin.blog.upload', ['_token' => csrf_token() ])}}",
    filebrowserImageUploadUrl: "{{route('admin.blog.upload', ['_token' => csrf_token() ])}}",
   
    on: {
        instanceReady: function() {
            this.dataProcessor.htmlFilter.addRules( {
                elements: {
                    img: function( el ) {
                        // Add an attribute.
                        if ( !el.attributes.alt )
                            el.attributes.alt = 'عکس بارگذاری نشده است';

                        // Add some class.
                        el.addClass( 'col-12' );
                    }
                }
            } );            
        }
    }
} );
        </script> 
     <!-- ckeditor -->    
      
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