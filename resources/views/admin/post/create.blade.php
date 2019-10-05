@extends('admin.Layouts.layout_main')

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
                
              
   <form method="POST" action="{{route('admin.post.store')}}" enctype="multipart/form-data" style="min-height:270px;">
        @csrf

     <div class="row">   

        <div class="col-md-4">

        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        
                      </div>
                      <input class="form-control" name="title" placeholder="عنوان " type="text">
                    </div>
                  </div>

        </div>


      
        <!-- Check Box -->
        <div class="col-md-4">
        <div class="row">


                        <div class="col-md-3">
                        <span>تگ ها</span> 
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                    @foreach($tags as $tag)                                
                                <div style="margin-right:8px" class="custom-control custom-checkbox mb-3">
                              <input class="custom-control-input" id="{{ $tag->pk_tags }}" 
                              name="pk_tags[]" type="checkbox" value="{{ $tag->pk_tags }}" checked="">                            
                              <label class="custom-control-label" for="{{ $tag->pk_tags }}"> {{ $tag->fa_name }}</label>
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
                        <span>دسته بندی</span> 
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                  <select name="pk_categories" class="form-control">
                                  @foreach ($categories as $category)
                                  <option value="{{ $category->pk_categories }}">{{ $category->name }}</option>
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
                                  <option value="انتشار">انتشار</option>
                                  <option value="پیش نویس">پیش نویس</option>
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
                      <input name="readtime" class="form-control" placeholder="مدت زمان مطالعه " type="text">
                    </div>
                  </div>

        </div>

     
        <div class="col-md-4">
            <div class="form-group">
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                          </div>
                          <input name="create_at" class="form-control" placeholder="تاریخ ایجاد " type="text">
                        </div>
                      </div>

        </div>


        <div class="col-md-4">
            <div class="form-group">
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                          </div>
                          <input name="desc_short" class="form-control" placeholder="توضیح کوتاه" type="text">
                        </div>
                      </div>

            </div>
        </div>


        
        <div class="col-md-4">
            <div class="form-group">
                  

            </div>
        </div>
       
       

        <div class="col-md-12">
               <span> محتوا</span>  
                            <!-- ckeditor -->
                            <textarea name="content" class="form-control" id="article-ckeditor"></textarea>
                          
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


<!--      Modal      -->  

<!-- Show Modal Button -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  افزودن دسته بندی
</button>
<!-- Show Modal Button -->
 
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:1200px">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ایجاد دسته بندی</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <!-- Form &  Body -->
       
       <div class="card-body px-lg-5 py-lg-5">
                
              
                <form method="POST" action="" enctype="multipart/form-data" style="min-height:270px;">
                     @csrf
             
                  <div class="row">   
             
                     <div class="col-md-4">
             
                     <div class="form-group">
                                 <div class="input-group input-group-alternative">
                                   <div class="input-group-prepend">
                                     
                                   </div>
                                   <input id="name_category" class="form-control" name="name_category" placeholder="نام " type="text">
                                 </div>
                               </div>
             
                     </div>
             
                    <!-- input Box -->
                     <div class="col-md-4">
                     <div class="form-group">
                                 <div class="input-group input-group-alternative">
                                   <div class="input-group-prepend">
                                   </div>
                                   <input id="desc_category" name="desc_category" class="form-control" placeholder="توضیحات " type="text">
                                 </div>
                               </div>
             
                     </div>
                   <!-- input Box -->
                   
                    
                    
                     <!-- Select Box -->
                     <div class="col-md-4">
                     <div class="row">
             
             
                                     <div class="col-md-3">
                                     <span>نوع</span> 
                                     </div>
                                     <div class="col-md-9">
                                   <div class="form-group focused">
                                               <div class="input-group input-group-alternative">
                                                 <div class="input-group-prepend">  
                                                 </div>
                                               <select id="type_category" name="type_category" class="form-control">
                                               <option value="محصول">محصول </option>
                                               <option value="پست">پست </option>
                                               </select>
                                               </div>
                                             </div>
                                  </div>
                         
                
                     </div>
                     </div>
                      <!-- Select Box -->
                        
             
                             
               
                             
                               <div class="text-center" style="padding-top:20px">
                                 <button type="button" onclick="add_category()" class="btn btn-primary">ثبت درخواست</button>
                               </div>
                             </form>
                           </div>
                           </div>
        <!-- Form &  Body -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
      </div>
    </div>
  </div>
</div>


<!-- Java Script -->
<script>
function add_category()
{
  var name =  $('#name_category').val() ;
  var desc =  $('#desc_category').val() ;
  var type =  $('#type_category').val() ;

  console.log(name+'-'+desc+'-'+type);

    $.ajax('{{route('admin.category.store')}}', 
  {
        headers : { 'Accept':'application/json', 'Authorization' : 'Bearer '.$accessToken,},
      dataType: 'json', 
      timeout: 500, 
      type:'GET',    
      data: { 'name': name , 'desc' : desc , 'type' : type , '_token' : "{{ csrf_token() }}" },
      success: function (data) 
      {   
        console.log('add Complete');
      },
      error: function (data) 
      { 
        console.log('error');
      }
  });

}
</script>
<!-- Java Script -->

<!--      Modal      -->                
  
                
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