@extends('admin.Layouts.layout_main')

@section('Head')
<title> ایجاد مسیر | لرنیا </title>
  <meta  name="description" content=" ایجاد مسیر | لرنیا">
@endsection

@section('content')




<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center">
                <h1>ایجاد مسیر</h1>
                </div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="POST" action="{{route('admin.routing.store')}}" enctype="multipart/form-data" style="min-height:270px;">
        @csrf

     <div class="row">   

        <div class="col-md-4">

        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        
                      </div>
                      <input class="form-control" name="location_id" placeholder="ایدی مکان " type="text">
                    </div>
                  </div>

        </div>


         <div class="col-md-4">

        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        
                      </div>
                      <input class="form-control" name="type_question" placeholder="نوع سوال " type="text">
                    </div>
                  </div>

        </div>  
           





        <div class="col-md-4">

        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      </div>
                      <input name="question" class="form-control" placeholder="متن سوال " type="text">
                    </div>
                  </div>

        </div>

     
        <div class="col-md-4">
            <div class="form-group">
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                          </div>
                          <input name="feedkey[]" class="form-control" placeholder="کلید جواب " type="text">
                        </div>           
                      </div>
                          <INPUT type="button" class="form-control" value="+" onclick="add()"/>

        </div>

        <div class="col-md-4">
            <div class="form-group">
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                          </div>
                          <input name="feedback[]" class="form-control" placeholder="جواب " type="text">
                        </div>           
                      </div>

        </div>

        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        
                      </div>
                      <input class="form-control" name="feedradepa[]" placeholder="آیدی رد پا " type="text">
                    </div>
                  </div>

        </div>  

        <span id="fooBar">&nbsp; </span>


       
           
   





          <!-- Select Box -->
         
         <!-- Select Box -->

            <!-- Select Box -->
 
         <!-- Select Box -->
        

        




      
        <!-- Check Box -->
        
         <!-- Check Box -->
           

          

             <!-- Select Box -->
       
         <!-- Select Box -->

         
             <!-- Picture Box -->
       
         <!-- Picture Box -->
        



          <!-- Picture Box -->
          
         <!-- Picture Box -->
           

       
       

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
    filebrowserUploadUrl: "{{route('admin.routing.upload', ['_token' => csrf_token() ])}}",
    filebrowserImageUploadUrl: "{{route('admin.routing.upload', ['_token' => csrf_token() ])}}",
   


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


<script language="javascript">
function add() {

	//Create an input type dynamically.
	var key = document.createElement("input");

	//Assign different attributes to the element.
	key.setAttribute("type", "text");
	key.setAttribute("name", "feedkey[]");
	key.setAttribute("class", "form-control");
	key.setAttribute("placeholder", "کلید جواب");

  var element = document.createElement("input");

//Assign different attributes to the element.
  element.setAttribute("type", "text");
  element.setAttribute("name", "feedback[]");
  element.setAttribute("class", "form-control");
  element.setAttribute("placeholder", "جواب");


  var feedradepa = document.createElement("input");

//Assign different attributes to the element.
feedradepa.setAttribute("type", "text");
feedradepa.setAttribute("name", "feedradepa[]");
feedradepa.setAttribute("class", "form-control");
feedradepa.setAttribute("placeholder", "آیدی رد پا");

	var foo = document.getElementById("fooBar");

	//Append the element in page (in span).
	foo.appendChild(key);
  foo.appendChild(element);
  foo.appendChild(feedradepa);


}</script>


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