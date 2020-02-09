@extends('admin.Layouts.layout_main')

@section('Head')
<title> ویرایش گره  | لرنیا  </title>
  <meta  name="description" content=" ویرایش گره| لرنیا">
@endsection

@section('content')



<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center">
                <h1>ویرایش گره</h1>
                </div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="POST" action="{{route('admin.node.update',$tree['pk_tree'])}}"  enctype="multipart/form-data" style="min-height:270px;">
        @csrf
        <input type="hidden"  name="tree_parent" value="{{ $tree['pk_parent'] }}" class="form-control" >  
                  

     <div class="row">   
     <div class="col-md-4">
     <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    
                  </div>
                  <input class="form-control" value="{{ $tree['sort'] }}" name="sort" placeholder="ترتیب " type="text">
                </div>
              </div>
     </div>


      <!-- Select Box -->
     <div class="col-md-4">
      <div class="row">


                        <div class="col-md-3">
                        <span>فرزند</span> 
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                  <select name="has_children" id="has_children" class="form-control">
                                  <option value="Yes"
                                  @if($tree->has_children == "Yes" )
                                  selected="selected"
                                  @endif>دارد</option>

                                  <option value="No"
                                  @if($tree->has_children == "No" )
                                  selected="selected"
                                  @endif>ندارد</option>

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
                        <span>محصول</span> 
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                  <select name="pk_product" id="pk_product" class="form-control">
                                  @foreach($products as $product)
                                  <option value="{{  $product['pk_product'] }}"
                                  @if($product->pk_product == $tree->pk_product )
                                  selected="selected"
                                  @endif>{{  $product['title'] }}</option>
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
         <!-- Select Box -->
         


        <div class="col-md-4">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        
                      </div>
                      <input class="form-control" name="name" value="{{ $tree['name'] }}" placeholder="نام " type="text">
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