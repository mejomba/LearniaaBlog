

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

    $.ajax('{{route('admin.api.category.store')}}', 
  {
      dataType: 'json', 
      timeout: 500, 
      type:'GET',    
      data: { 'name': name , 'desc' : desc , 'type' : type },
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
  
