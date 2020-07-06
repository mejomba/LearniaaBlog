@extends('admin.Layouts.layout_main')

@section('Head')
<title> ایجاد برگه  | لرنیا  </title>
  <meta  name="description" content=" ایجاد برگه| لرنیا">
@endsection

@section('content')



<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center">
                <h1>ایجاد برگه</h1>
                </div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="POST" action="{{route('admin.pages.store')}}" enctype="multipart/form-data" style="min-height:270px;">
        @csrf
        <div class="row">   

       <!-- input Box -->

      <!-- input Box -->
      
       
       
        <!-- Select Box -->
 
                 <!-- Select Box -->

        <div class="col-md-4">
          <div class="form-group">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                          
                        </div>
                        <input class="form-control" name="id_page"  placeholder=" آیدی برگه" type="text" >
                      </div>
                    </div>
          </div>

          <div class="col-md-4">
          <div class="form-group">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                          
                        </div>
                        <input class="form-control" name="eng_name"  placeholder=" نام انگلیسی" type="text" >
                      </div>
                    </div>
          </div>

          <div class="col-md-4">
          <div class="form-group">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                          
                        </div>
                        <input class="form-control" name="farsi_name"  placeholder=" نام فارسی" type="text" >
                      </div>
                    </div>
          </div>


          <div class="col-md-12">
               <span> محتوا</span>  
                            <!-- ckeditor -->
                            <textarea name="data" class="form-control" id="article-ckeditor"></textarea>
                          
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
                            
                            <h2 class="text-center">meta tags</h2>

              <div class="row">   
                                                        
                <div class="col-md-4">
              <div class="form-group">
                          <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                              
                            </div>
                            <input class="form-control" name="keywords"  placeholder=" keywords" type="text" >
                          </div>
                        </div>
              </div>

              <div class="col-md-4">
              <div class="form-group">
                          <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                              
                            </div>
                            <input class="form-control" name="description"  placeholder=" description" type="text" >
                          </div>
                        </div>
              </div>

              <div class="col-md-4">
              <div class="form-group">
                          <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                              
                            </div>
                            <input class="form-control" name="author"  placeholder=" author" type="text" >
                          </div>
                        </div>
              </div>

              <div class="col-md-4">
              <div class="form-group">
                          <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                              
                            </div>
                            <input class="form-control" name="refresh"  placeholder=" refresh" type="text" >
                          </div>
                        </div>
              </div>

              <div class="col-md-4">
              <div class="form-group">
                          <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                              
                            </div>
                            <input class="form-control" name="viewport"  placeholder=" viewport" type="text" >
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
                    <input class="form-control" name="og_title "  placeholder=" og:title " type="text" >
                  </div>
                </div>
              </div>

              <div class="col-md-4">
              <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      
                    </div>
                    <input class="form-control" name="og_image"  placeholder=" og:image" type="text" >
                  </div>
                </div>
              </div>

              <div class="col-md-4">
              <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      
                    </div>
                    <input class="form-control" name="og_description"  placeholder=" og:description" type="text" >
                  </div>
                </div>
              </div>

              <div class="col-md-4">
              <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      
                    </div>
                    <input class="form-control" name="og_type"  placeholder=" og:type" type="text" >
                  </div>
                </div>
              </div>

              <div class="col-md-4">
              <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      
                    </div>
                    <input class="form-control" name="og_article"  placeholder=" og:article" type="text" >
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
                    <input class="form-control" name="twitter_card"  placeholder=" twitter:card " type="text" >
                  </div>
                </div>
              </div>

              <div class="col-md-4">
              <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      
                    </div>
                    <input class="form-control" name="twitter_site"  placeholder=" twitter:site" type="text" >
                  </div>
                </div>
              </div>

              <div class="col-md-4">
              <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      
                    </div>
                    <input class="form-control" name="twitter_description"  placeholder=" twitter:description" type="text" >
                  </div>
                </div>
              </div>

              <div class="col-md-4">
              <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      
                    </div>
                    <input class="form-control" name="twitter_title"  placeholder="twitter:title" type="text" >
                  </div>
                </div>
              </div>

              </div>



           <!-- Picture Box -->
       
         <!-- Picture Box -->
         </div>         
  
                  <div class="text-center" style="padding-top:20px">
                    <button type="submit" class="btn btn-primary">ثبت برگه</button>
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