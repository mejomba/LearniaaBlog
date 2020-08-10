@extends('admin.Layouts.layout_main')

@section('Head')
<title> ویرایش پکیج | لرنیا </title>
  <meta  name="description" content=" ویرایش پکیج | لرنیا">
@endsection

@section('content')




<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center">
                <h1>ویرایش پکیج</h1>
                </div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="POST" action="{{route('admin.package.update', $package['pk_package'])}}" enctype="multipart/form-data" style="min-height:270px;">
        @csrf

     <div class="row">   


    <!-- Select Box -->
     <div class="col-md-4">
        <div class="row">
                        <div class="col-md-3">
                        <span>انتخاب درخت</span> 
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                  <select name="pk_tree" class="form-control">
                                  @foreach ($trees as $tree)
                                  <option value="{{ $tree->pk_tree }}"
                                  @if($package->pk_tree == $tree->pk_tree )
                                  selected="selected"
                                  @endif>{{ $tree->name }}</option>
                                  @endforeach
                                  <option value="0"  
                                  @if($package->pk_tree == "0")
                                  selected="selected"
                                  @endif>دوره های کوئیک لرن</option>
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
                        <span>دسته بندی موضوعی</span> 
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                  <select name="pk_category" class="form-control">
                                  @foreach ($categories as $category)
                                  <option value="{{ $category->pk_category }}" 
                                  @if($package->pk_category == $category->pk_category )
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
                        <span>شماره اولویت درخت</span> 
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                  <select name="sort_tree" class="form-control">
                                  <option value="1"  
                                  @if($package->sort_tree == "1")
                                  selected="selected"
                                  @endif>1</option>
                                  <option value="2"  
                                  @if($package->sort_tree == "2")
                                  selected="selected"
                                  @endif>2</option>
                                  <option value="3"  
                                  @if($package->sort_tree == "3")
                                  selected="selected"
                                  @endif>3</option>
                                  <option value="4"  
                                  @if($package->sort_tree == "4")
                                  selected="selected"
                                  @endif>4</option>
                                  <option value="5"  
                                  @if($package->sort_tree == "5")
                                  selected="selected"
                                  @endif>5</option>
                                  <option value="6"  
                                  @if($package->sort_tree == "6")
                                  selected="selected"
                                  @endif>6</option>
                                  <option value="7"  
                                  @if($package->sort_tree == "7")
                                  selected="selected"
                                  @endif>7</option>
                                  <option value="8"  
                                  @if($package->sort_tree == "8")
                                  selected="selected"
                                  @endif>8</option>
                                  <option value="9"  
                                  @if($package->sort_tree == "9")
                                  selected="selected"
                                  @endif>9</option>
                                  <option value="10"  
                                  @if($package->sort_tree == "10")
                                  selected="selected"
                                  @endif>10</option>
                                  </select>
                                  </div>
                                </div>
                         </div>
                 </div>
            </div>
    <!-- Select Box -->


   
   <!-- Text Box -->
   <div class="col-md-4">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend"> 
                      </div>
                      <input class="form-control"  name="fa_name" placeholder="نام فارسی پکیج" value="{{ $package['fa_name'] }}" type="text">
                    </div>
              </div>
        </div>
      <!-- Text Box -->

     <!-- Text Box -->
     <div class="col-md-4">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend"> 
                      </div>
                      <input class="form-control" name="en_name" placeholder="نام انگلیسی پکیج" value="{{ $package['en_name'] }}" type="text">
                    </div>
              </div>
        </div>
      <!-- Text Box -->

      
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
                                @if( in_array($tag->pk_tags , $Search ))
                                 
                                 {
                                   checked="checked"
                                 }
                                 @else
                                 {
   
                                 }
                                 @endif>   
                                <label class="custom-control-label" for="{{ $tag->pk_tags ?? '' }}">
                                {{ $tag->fa_name ?? '' }} |</label>
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
                                  <option value="انتشار" @if($package->status == "انتشار" )
                                  selected="selected"
                                  @endif>انتشار</option>
                                  <option value="پیش نویس" @if($package->status == "پیش نویس" )
                                  selected="selected"
                                  @endif >پیش نویس</option>
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
                        <span>نوع انتشار</span> 
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                <select name="isFree" class="form-control">
                                  <option value="Yes" @if($package->isFree == "Yes" )
                                  selected="selected"
                                  @endif>رایگان</option>
                                  <option value="No" @if($package->isFree == "No" )
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
                      <input name="price" class="form-control" placeholder="قیمت به تومان" value="{{ $package['price'] }}" type="text">
                    </div>
                  </div>
          </div>

     
        <div class="col-md-4">
            <div class="form-group">
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                          </div>
                          <input name="time" class="form-control" placeholder="مدت زمان کل" value="{{ $package['time'] }}" type="text">
                        </div>
                 </div>
          </div>


        <div class="col-md-4">
            <div class="form-group">
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                          </div>
                          <input name="count" class="form-control" placeholder="تعداد کل قسمت ها" value="{{ $package['count'] }}" type="text">
                  </div>
            </div>   
        </div>


        <div class="col-md-4">
           <div class="form-group">        
             <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                          </div>
                          <textarea name="preview" id="preview" type="text" class="form-control" placeholder="ادرس پیش نمایش">{{ $package['preview'] }}</textarea>
                        </div>
                  </div>
            </div>

             <!-- Picture Box -->
        <div class="col-md-4">
        <div class="row">

                        <div class="col-md-3">
                        <span>تصویر شاخص پکیج </span> 
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
                          <input name="folder" class="form-control" value="{{ $package['folder'] }}" placeholder="پوشه تصاویر سرورفایل" type="text">
                        </div>
                 </div>
          </div>


       
 <!-- ckeditor -->
     <div class="col-md-12">
        <span> توضیحات درباره پکیج </span>              
                 <textarea name="desc" class="form-control" id="article-ckeditor">{{ $package['desc'] }}</textarea>

     <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
                                CKEDITOR.replace( 'article-ckeditor' , {
   language:'fa',
   filebrowserUploadMethod: 'form',
    contentsLangDirection: 'rtl',
    filebrowserUploadUrl: "{{route('admin.package.upload', ['_token' => csrf_token() ])}}",
    filebrowserImageUploadUrl: "{{route('admin.package.upload', ['_token' => csrf_token() ])}}",

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