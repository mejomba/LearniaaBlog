<style> .nav-fill .nav-item {text-align : center !important ;flex :  none !important ;}</style>

<ul class="nav nav-pills nav-fill flex-column flex-sm-row" id="tabs-text" role="tablist" style="background-color :ghostwhite">
  <li class="nav-item">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-1-tab"  href="{{route('admin.home')}}" 
     role="tab" aria-controls="tabs-text-1" aria-selected="true">
     <img src="{{ asset('images/Template/icon_dashboard.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
     داشبورد</a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-3-tab"  href="{{route('admin.blog.index')}}" 
     role="tab" aria-controls="tabs-text-3" aria-selected="false">
    <img src="{{ asset('images/Template/icon_blog.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    بلاگ</a>
  </li>

  <li class="nav-item">
    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-2-tab"  href="{{route('admin.tag.index')}}" 
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/icon_tag.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    تگ</a>
  </li>

<li class="nav-item">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-1-tab"  href="{{route('admin.category.index')}}"
     role="tab" aria-controls="tabs-text-1" aria-selected="true">
     <img src="{{ asset('images/Template/icon_category.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
     دسته بندی</a>
  </li>

  <li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('admin.package.index')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/icon_package.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    پکیج</a>
  </li>

  <li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="#"  onclick="OpenPopup()"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/icon_course.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    درس</a>
  </li>

  <li class="nav-item">
    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-3-tab"  href="{{route('admin.section.index')}}" 
     role="tab" aria-controls="tabs-text-3" aria-selected="false">
    <img src="{{ asset('images/Template/icon_package.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    سکشن</a>
  </li>

  <li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('admin.order.index')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/icon_basket.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
     سفارش</a>
  </li>

  <li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('admin.tree.index')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/icon_tree.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    درخت</a>
  </li>

  <li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('admin.pages.index')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/icon_page.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    برگه</a>
  </li>

  <li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-2-tab"   href="{{route('admin.user.index')}}" 
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/icon_user.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    کاربر</a>
  </li>
 
  <li class="nav-item">
    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-3-tab"  href="{{route('admin.behavior.index')}}"
     role="tab" aria-controls="tabs-text-3" aria-selected="false">
    <img src="{{ asset('images/Template/icon_behavior.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    رفتار</a>
  </li>

<li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('admin.profile.edit')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/icon_profile.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    پروفایل</a>
  </li>

  <li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('admin.transaction.create')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/icon_wallet.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    کیف پول</a>
  </li>

<li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('admin.transaction.index')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/icon_transaction.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    تراکنش </a>
  </li>

  <li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('admin.transaction.packagelist')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/icon_productlist.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    خریداری شده</a>
  </li>

  <li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('admin.vote.index')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/icon_politics.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
     نظرسنجی</a>
  </li>

  <li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('admin.routing.index')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/icon_routing.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
     مسیرها</a>
  </li>

  <li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('admin.roadmaplog.index')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/icon_routing.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    کاربران مسیریاب</a>
  </li>

  <li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('admin.errors.index')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/icon_error.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
     اررور ها</a>
  </li>

  <li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('admin.learner.index')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/icon_learner.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    مدرس</a>
  </li>

<li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('admin.assist.index')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/icon_help.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
     همکاری با ما</a>
  </li>

<li class="nav-item primary">
    <a class="nav-link mb-sm-3 mb-md-0"
     id="tabs-text-2-tab"   href="{{route('admin.discount.index')}}"
     role="tab" aria-controls="tabs-text-2" aria-selected="false">
    <img src="{{ asset('images/Template/icon_discount.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
    بن تخفیف</a>
  </li>

</ul>

<div class="modal fade" dir="rtl" id="ModalData" tabindex="-1" role="dialog"  aria-labelledby="ModalLabelModalData" aria-hidden="true">  
      <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:none"> 
         <div class="modal-content" style="width:90%">
           <div class="modal-header"> 
           <h5 class="modal-title" id="ModalLabelData">اطلاعات تابلو</h5> 
            </div>  
                                       
            <div class="modal-body" id="ModalDataBody">                      
                <!-- Form &  Body -->
                 <div class="card-body px-lg-1 py-lg-1">
                   <div class="row">  
                       <div id="content" class="col-12 col-md-12 col-lg-12">
                      <!-- <select id="pk_package" class="form-control">
                                  
                                  <option value="0"></option>
                                  <option value="0">همه موارد </option>

                                  </select>-->
                      </div>
                      <button type="button" onclick="redirect()" class="btn btn-primary"  
                      style="background-color:brown;border-color:brown" data-dismiss="modal">نمایش</button>
                 </div>
              </div>
                <!-- Form &  Body -->
                             </div>
                                  <div class="modal-footer">
                                        <button type="button" onclick="ClosePopup()" class="btn btn-primary"  
                                        style="background-color:brown;border-color:brown" data-dismiss="modal">بستن</button>
                                    </div>
                                   </div>
                                </div>
                              </div>
<!-- ModalData Box --> 
<script>
function OpenPopup() 
{
    document.getElementById("ModalData").setAttribute("style","display:block;opacity:100;");
    $('#ModalData').animate({ scrollTop: 0 }, 'fast');
    getdata();
   
}
function ClosePopup()
 {
     document.getElementById("ModalData").setAttribute("style","");
 }

 function getdata()
{
  $.ajax({
                url: '/api/courselist',
                data:
                {
                   
                },
                error: function(err)
                {
                },
                dataType: 'json',
                success: function(data)
                {
                  if (!document.getElementById("pk_package")) 
                  {
                  let Name = document.createElement("select");
                        Name.setAttribute('type','select');
                        Name.setAttribute('id','pk_package');
                        Name.setAttribute('class', "form-control");
                        document.getElementById("content").append(Name); 
                  data.packages.forEach(function(item, index) 
                    {
                      let Name = document.createElement("option");
                        Name.setAttribute('type','option');
                        Name.setAttribute('id',item.pk_package);
                        Name.textContent =item.fa_name  ;
                        document.getElementById("pk_package").append(Name); 
                  });
                  }
                },
                type: 'GET'
            });

}

function redirect()
 {
   var x =  $('#pk_package').val();
  window.location.href = "/admin/course/index/"+x;
 }
</script>