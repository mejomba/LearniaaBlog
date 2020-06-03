@extends('admin.Layouts.layout_main')

@section('Head')
<title> ویرایش درخت  | لرنیا  </title>
  <meta  name="description" content=" ویرایش درخت| لرنیا">
@endsection

@section('content')



<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center">
                <h1>ویرایش درخت</h1>
                </div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="POST" action="{{route('admin.tree.update',$tree['pk_tree'])}}" 
   enctype="multipart/form-data" style="min-height:270px;">
        @csrf

     <div class="row">   

     <div class="col-md-4">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        
                      </div>
                      <input class="form-control" value="{{ $tree['name'] }}" name="name" placeholder="نام " type="text">
                    </div>
                  </div>
        </div>


     <div class="col-md-4">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        
                      </div>
                      <input class="form-control" value="{{ $tree['sort'] }}" name="sort" placeholder="ترتیب " type="text">
                    </div>
                  </div>
        </div>

      <!-- Content Box -->

      <div class="col-md-12">
      <span> توضیحات</span>  
                            <!-- ckeditor -->
                            <textarea name="description" class="form-control" id="article-ckeditor">{{ $tree['description'] }}</textarea>
                          
                            <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
                            <script>
                                CKEDITOR.replace( 'article-ckeditor' , {
                                  language:'fa',
   filebrowserUploadMethod: 'form',
    contentsLangDirection: 'rtl',
    filebrowserUploadUrl: "{{route('admin.tree.upload', ['_token' => csrf_token() ])}}",
    filebrowserImageUploadUrl: "{{route('admin.tree.upload', ['_token' => csrf_token() ])}}",


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
      <!-- Content Box -->
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