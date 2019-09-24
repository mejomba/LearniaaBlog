<@extends('admin.Layouts.layout_main')


@section('content')

<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">ایجاد پست </h4>
                  <p class="card-category"> </p>
                </div>

                 <!-- form Section -->

         <div class="card-body">

        <form method="POST" action="{{route('admin.post.store')}}" enctype="multipart/form-data" >
        @csrf
             <div class="row">

                      <div class="col-md-4">
                          <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">عنوان</label>
                            <input type="text" name="title" class="form-control">
                          
                           </div>
                      </div>

                   <div class="col-md-4">
                   <div class="container-fluid">    
                        <div class="form-group bmd-form-group">

                        <div class="row">
                        <label class="bmd-label-floating">تگ ها</label>
                        </div>  


                            <div class="row" style="padding-top:30px">

                            @foreach($tags as $tag)
                                <div class="col-md-1">
                                <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" 
                                  name="pk_tags[]" type="checkbox" 
                                  value="{{ $tag->pk_tags }}" checked="">
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                                </div>

                                <div class="col-md-2">

                                {{ $tag->fa_name }}
                                
                                </div>
                                @endforeach   
                          

                          </div>

                        </div>
                     </div>
                </div>


                 <div class="col-md-4">
                     <div class="container-fluid">    
                        <div class="form-group bmd-form-group">

                            <div class="row">

                                <div class="col-md-4">
                                <label class="bmd-label-floating">دسته بندی</label>
                                </div>

                                <div class="col-md-8">

                                  <select name="pk_categories" class="dropdown-toggle btn btn-primary btn-round btn-block">
                                  @foreach ($categories as $category)
                                  <option class="" value="{{ $category->pk_categories }}">{{ $category->name }}</option>
                                 
                                  @endforeach
                                  </select>
                                
                                </div>

                           </div>

                        </div>
                     </div>
                </div>



                <div class="col-md-3">
                     <div class="container-fluid">    
                        <div class="form-group bmd-form-group">

                            <div class="row">

                                <div class="col-md-4">
                                <label class="bmd-label-floating">وضعیت </label>
                                </div>

                                <div class="col-md-8">

                                  <select name="status" class="dropdown-toggle btn btn-primary btn-round btn-block">
                                  
                                  <option class="" value="انتشار">انتشار</option>
                                  <option class="" value="پیش نویس">پیش نویس</option>
                                 
                                  </select>
                                
                                </div>

                           </div>

                        </div>
                     </div>
                </div>


                <div class="col-md-3">
                <div class="container-fluid">    
                          <div class="form-group bmd-form-group">
                          <div class="row">

                          <div class="col-md-6">
                                <label class="bmd-label-floating">تصویر شاخص </label>
                                </div>

                                <div class="col-md-6">
                            <span  class="btn btn-primary btn-round btn-file btn-block">
                            <input  type="file" id="pic_content" name="pic_content">
                            </span>
                           </div>
                           </div>
                           </div>
                           </div>
               </div>
               <div class="col-md-6">
               <div class="form-group bmd-form-group">

               </div>
               </div>


               <div class="col-md-3">
               
               <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">مدت زمان مطالعه</label>
                            <input type="text" name="readtime" class="form-control">
                          
                           </div>

               </div>

               <div class="col-md-3">
               
               <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">تاریخ ایجاد</label>
                            <input type="text" name="create_at" class="form-control">
                          
                           </div>

               </div>

               <div class="col-md-3">

               <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">توضیح کوتاه</label>
                            <input type="text" name="desc_short" class="form-control">
                          
                           </div>
               
               </div>

               <div class="col-md-3">
               
               </div>



               <div class="col-md-12">
                          <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating" style="padding-right:10px">محتوا </label>

                            <!-- ckeditor -->
                            <textarea name="content" class="form-control" id="article-ckeditor"></textarea>
                          
                          
                    <!--      
                            <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script> 
                            <script src="https://cdn.ckeditor.com/ckfinder/ckfinder.js"></script>
                            <script>
                          import CKFinder from '@ckeditor/ckeditor5-ckfinder/src/ckfinder';

                            ClassicEditor
                                .create( document.querySelector( '#article-ckeditor' ), {
                                language: {
                                    // The UI will be English.
                                    ui: 'en',

                                    // But the content will be edited in Arabic.
                                    content: 'ar'
                                }
                                ckfinder: {
                                    uploadUrl: "{{route('admin.post.upload', ['_token' => csrf_token() ])}}"
                                }
                            } )
                                .catch( error => {
                                    console.error( error );
                                } );
                        </script>

                        -->

                            <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
                            <script>
                                CKEDITOR.replace( 'article-ckeditor' , {
    contentsLangDirection: 'rtl',
    filebrowserUploadUrl: "{{route('admin.post.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
} );
                            </script> 
                            <!-- ckeditor -->

                           </div>
               </div>


              




                </div>


                  <!-- End data Section Form ; Below is blank row--> 
                    <div class="row text-center" style="padding-top:50px">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                         

                    <div class="clearfix">

                    <button type="submit" class="btn btn-primary pull-right">ثبت درخواست</button>
                    </div>



                        </div>
                      </div>
                    </div>

                    <!-- section operation form -->
                
                  </form>
                <!-- End Tag Form Section -->

                </div>
              </div>
            </div>
            
          </div>
        </div>
        </div>


@endsection