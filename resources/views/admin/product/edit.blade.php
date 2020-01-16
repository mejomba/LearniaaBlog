@extends('admin.Layouts.layout_main')

@section('Head')
<title> ویرایش محصول | لرنیا </title>
  <meta  name="description" content=" ویرایش محصول | لرنیا">
@endsection

@section('content')




<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center">
                <h1>ویرایش محصول</h1>
                </div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="POST" action="{{route('admin.product.update', $product['pk_product'])}}" enctype="multipart/form-data" style="min-height:270px;">
        @csrf

     <div class="row">   

        <div class="col-md-4">

        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        
                      </div>
                      <input class="form-control" name="title" value="{{ $product['title'] }}" placeholder="عنوان " type="text">
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
                                  <option value="{{ $category->pk_categories }}" 
                                  @if($product->pk_category == $category->pk_categories )
                                  selected="selected"
                                  @endif>{{ $category->name }}</option>
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
                                        @if($product->pk_learner == $learner->pk_learner )
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
                              name="pk_tags[]" type="checkbox" value="{{ $tag->pk_tags }}" 
                              @if( in_array($tag->pk_tags , $objects ))
                              {
                                checked="checked"
                              }
                              @else
                              {

                              }
                              @endif>                             
                              <label class="custom-control-label" for="{{ $tag->pk_tags ?? '' }}"> {{ $tag->fa_name ?? '' }} |</label>
                            </div>
                            @endforeach 
                                  

                                  </div>
                                </div>
                     </div>
            
   
        </div>
        </div>
         <!-- Check Box -->
           

        

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
                                  <option value="انتشار" @if($product->status == "انتشار" )
                                  selected="selected"
                                  @endif>انتشار</option>
                                  <option value="پیش نویس" @if($product->status == "پیش نویس" )
                                  selected="selected"
                                  @endif
                                  >پیش نویس</option>
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
                                    <input  type="file" id="pic" name="pic">
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
                      <input name="price" value="{{ $product['price'] }}" class="form-control" placeholder="قیمت " type="text">
                    </div>
                  </div>

        </div>

     
        <div class="col-md-4">
            <div class="form-group">
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                          </div>
                          <input name="time" value="{{ $product['time'] }}" class="form-control" placeholder="مدت زمان " type="text">
                        </div>
                      </div>

        </div>


        <div class="col-md-4">
            <div class="form-group">
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                          </div>
                          <input name="count" value="{{ $product['count'] }}" class="form-control" placeholder="تعداد قسمت ها" type="text">
                        </div>
                     

         </div>   
        </div>

        <div class="col-md-4">
            <div class="form-group">
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                          </div>
                          <input name="language" value="{{ $product['language'] }}" class="form-control" placeholder="زبان دوره" type="text">
                        </div>
                      

          </div>  
        </div>

        <div class="col-md-4">
            <div class="form-group">
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                          </div>
                          <input name="subtitle" value="{{ $product['subtitle'] }}" class="form-control" placeholder="زبان زیرنویس" type="text">
                        </div>
                      </div>

            </div>
        


        
            <div class="col-md-4">
            <div class="form-group">
                  
            <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                          </div>
                          <textarea name="file" id="file" type="text" class="form-control" placeholder="ادرس فایل">{{ $product['file'] }}</textarea>
                        </div>
           

            </div>
        </div>



        <div class="col-md-4">
            <div class="form-group">      
            <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                          </div>
                          <textarea name="preview" id="preview" type="text" class="form-control" placeholder="ادرس پیش نمایش">{{ $product['preview'] }}</textarea>
                        </div>
             </div>
        </div>
       


        <div class="col-md-4">
            <div class="form-group">      
            <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                          </div>
                          <textarea name="download_link" id="download_link" type="text" class="form-control" placeholder="ادرس دریافت فایل">{{ $product['download_link'] }}</textarea>
                        </div>
             </div>
        </div>
       

        <div class="col-md-12">
               <span> محتوا</span>  
                            <!-- ckeditor -->
                            <textarea name="desc" class="form-control" id="article-ckeditor">{{ $product['desc'] }}</textarea>
                          
                            <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
                            <script>
                                CKEDITOR.replace( 'article-ckeditor' , {
   language:'fa',
   filebrowserUploadMethod: 'form',
    contentsLangDirection: 'rtl',
    filebrowserUploadUrl: "{{route('admin.product.upload', ['_token' => csrf_token() ])}}",
    filebrowserImageUploadUrl: "{{route('admin.product.upload', ['_token' => csrf_token() ])}}",



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