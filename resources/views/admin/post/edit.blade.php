@extends('admin.Layouts.layout_main')

@section('Head')
<title> ویرایش پست | لرنیا </title>
  <meta  name="description" content=" ویرایش پست | لرنیا">
@endsection

@section('content')



<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center">
                <h1>ویرایش پست</h1>
                </div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="POST"  action="{{ route('admin.post.update', $post['pk_post']) }}" enctype="multipart/form-data" style="min-height:270px;">
        @csrf

     <div class="row">   

        <div class="col-md-4">

        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        
                      </div>
                      <input class="form-control" value="{{ $post['title'] }}" name="title" placeholder="عنوان " type="text">
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
                                      <select name="pk_categories" class="form-control">
                                      @foreach ($categories as $category)
                                      <option value="{{ $category->pk_categories }}"
                                      @if($post->pk_categories == $category->pk_categories )
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







            @php
        $user =  Auth::user() ;
        @endphp

        
        @if($user->type == 'مدیر')
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
                                  <option value="{{ $user->pk_users }}"  
                                  @if($user->pk_users == $post->pk_writers )
                                  selected="selected"
                                  @endif>{{ $user->name }}</option>
                                  @endforeach 
                                  </select>
                                  </div>
                                </div>
                     </div>
            
   
        </div>
        </div>
         <!-- Select Box -->
         @endif






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
                              <input class="custom-control-input" id="{{ $tag->pk_tags ?? '' }}" 
                              name="pk_tags[]" type="checkbox" value="{{ $tag->pk_tags ?? '' }}"
                              @if( in_array($tag->pk_tags , $Search ))
                                 
                              {
                                checked="checked"
                              }
                              @else
                              {

                              }
                              @endif>                            
                              <label class="custom-control-label" for="{{ $tag->pk_tags ?? ''  }}"> {{ $tag->fa_name ?? '' }} |</label>
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
                                  <option value="انتشار" @if($post->status == "انتشار" )
                                  selected="selected"
                                  @endif
                                   >انتشار</option>
                                  <option value="پیش نویس"  @if($post->status == "پیش نویس" )
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

         
             <!-- Select Box -->
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
         <!-- Select Box -->
         <div class="col-md-4">

        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        
                      </div>
                      <input class="form-control" name="alt" placeholder="alt pic " type="text" value="{{ $post['alt'] }}">
                    </div>
                  </div>

        </div>  
           

          <!--                json process            -->  
          @php  $json = json_decode($post->extras,false)  @endphp                       



        <div class="col-md-4">

        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      </div>
                      <input name="readtime" value="{{$json->readtime ?? '' }}" class="form-control" placeholder="مدت زمان مطالعه " type="text">
                    </div>
                  </div>

        </div>

     
        <div class="col-md-4">
            <div class="form-group">
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                          </div>
                          <input name="create_at" value="{{$json->create_at ?? '' }}" class="form-control" placeholder="تاریخ ایجاد " type="text">
                        </div>
                      </div>

        </div>


        <div class="col-md-4">
            <div class="form-group">
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                          </div>
                          <input name="desc_short" value="{{$json->desc_short ?? '' }}" class="form-control" placeholder="توضیح کوتاه" type="text">
                        </div>
                      </div>

            </div>
        


       


          <!-- Picture Box -->
          <div class="col-md-4">
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
        </div>
         <!-- Picture Box -->


       

        <div class="col-md-12">
               <span> محتوا</span>  
                            <!-- ckeditor -->
                            <textarea name="content" class="form-control" id="article-ckeditor">{{$post->content}}</textarea>
                          
                            <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
                            <script>
                                CKEDITOR.replace( 'article-ckeditor' , {
                                  language:'fa',
   filebrowserUploadMethod: 'form',
    contentsLangDirection: 'rtl',
    filebrowserUploadUrl: "{{route('admin.post.upload', ['_token' => csrf_token() ])}}",
    filebrowserImageUploadUrl: "{{route('admin.post.upload', ['_token' => csrf_token() ])}}",



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
                            <h2 class="text-center">meta tags</h2>

<div class="row">   
                                          
  <div class="col-md-4">
<div class="form-group">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                
              </div>
              <input class="form-control" name="keywords"  placeholder=" keywords" type="text" value ="{{ $meta->htmlmeta->keywords ?? '' }}" >
            </div>
          </div>
</div>

<div class="col-md-4">
<div class="form-group">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                
              </div>
              <input class="form-control" name="description"  placeholder=" description" type="text" value ="{{$meta->htmlmeta->description ?? ''}}">
            </div>
          </div>
</div>

<div class="col-md-4">
<div class="form-group">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                
              </div>
              <input class="form-control" name="author"  placeholder=" author" type="text" value ="{{$meta->htmlmeta->author  ?? ''}}">
            </div>
          </div>
</div>

<div class="col-md-4">
<div class="form-group">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                
              </div>
              <input class="form-control" name="refresh"  placeholder=" refresh" type="text" value ="{{$meta->htmlmeta->refresh  ?? ''}}">
            </div>
          </div>
</div>

<div class="col-md-4">
<div class="form-group">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                
              </div>
              <input class="form-control" name="viewport"  placeholder=" viewport" type="text" value ="{{$meta->htmlmeta->viewport  ?? ''}}">
            </div>
          </div>
</div>

</div>




<h2 class="text-center">Open Graph tags</h2>

<div class="row">   
                                
<div class="col-md-4">
<div class="form-group">
    <div class="input-group input-group-alternative">
      <div class="input-group-prepend">
        
      </div>
      <input class="form-control" name="og_title "  placeholder=" og:title " type="text" value ="{{$meta->opengraph->og_title  ?? ''}}">
    </div>
  </div>
</div>

<div class="col-md-4">
<div class="form-group">
    <div class="input-group input-group-alternative">
      <div class="input-group-prepend">
        
      </div>
      <input class="form-control" name="og_image"  placeholder=" og:image" type="text" value ="{{$meta->opengraph->og_image  ?? ''}}">
    </div>
  </div>
</div>

<div class="col-md-4">
<div class="form-group">
    <div class="input-group input-group-alternative">
      <div class="input-group-prepend">
        
      </div>
      <input class="form-control" name="og_description"  placeholder=" og:description" type="text" value ="{{$meta->opengraph->og_description  ?? ''}}">
    </div>
  </div>
</div>

<div class="col-md-4">
<div class="form-group">
    <div class="input-group input-group-alternative">
      <div class="input-group-prepend">
        
      </div>
      <input class="form-control" name="og_type"  placeholder=" og:type" type="text" value ="{{$meta->opengraph->og_type  ?? ''}}">
    </div>
  </div>
</div>

<div class="col-md-4">
<div class="form-group">
    <div class="input-group input-group-alternative">
      <div class="input-group-prepend">
        
      </div>
      <input class="form-control" name="og_article"  placeholder=" og:article" type="text" value ="{{$meta->opengraph->og_article  ?? ''}}">
    </div>
  </div>
</div>

</div>


<h2 class="text-center">twitter tags</h2>

<div class="row">   
                                
<div class="col-md-4">
<div class="form-group">
    <div class="input-group input-group-alternative">
      <div class="input-group-prepend">
        
      </div>
      <input class="form-control" name="twitter_card"  placeholder=" twitter:card " type="text" value ="{{$meta->twitter->twitter_card  ?? ''}}">
    </div>
  </div>
</div>

<div class="col-md-4">
<div class="form-group">
    <div class="input-group input-group-alternative">
      <div class="input-group-prepend">
        
      </div>
      <input class="form-control" name="twitter_site"  placeholder=" twitter:site" type="text" value ="{{$meta->twitter->twitter_site  ?? ''}}">
    </div>
  </div>
</div>

<div class="col-md-4">
<div class="form-group">
    <div class="input-group input-group-alternative">
      <div class="input-group-prepend">
        
      </div>
      <input class="form-control" name="twitter_description"  placeholder=" twitter:description" type="text" value ="{{$meta->twitter->twitter_description  ?? ''}}">
    </div>
  </div>
</div>

<div class="col-md-4">
<div class="form-group">
    <div class="input-group input-group-alternative">
      <div class="input-group-prepend">
        
      </div>
      <input class="form-control" name="twitter_title"  placeholder="twitter:title" type="text" value ="{{$meta->twitter->twitter_title  ?? ''}}">
    </div>
  </div>
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