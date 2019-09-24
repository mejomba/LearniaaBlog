@extends('user.Layouts.layout_main')


@section('content')

<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">ویرایش پروفایل </h4>
                  <p class="card-category"> </p>
                </div>

                 <!-- form Section -->

         <div class="card-body">

        <form method="POST" action="{{ route('user.profile.update',$profile['pk_profiles']) }}" enctype="multipart/form-data" >
        
        @csrf

                      @php $month_birthday =  substr($profile->birthday,5,2)  @endphp
                      @php $year_birthday =  substr($profile->birthday,0,4)  @endphp
                      @php $day_birthday =  substr($profile->birthday,8,2)  @endphp
                      

             <div class="row">

                     

                   <div class="col-md-1">
                   <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating"> روز تولد</label>
                            <input value="{{$day_birthday}}" name="day_birthday" type="text" class="form-control">
                          
                    </div>
                    </div>



                    <div class="col-md-2">
                   <div class="form-group bmd-form-group">
                         
                   <div class="container-fluid">    
                        <div class="form-group bmd-form-group">

                            <div class="row">

                               

                                <div class="col-md-12">

                     

                                  <select name="month_birthday" class="dropdown-toggle btn btn-primary btn-round btn-block">
                                  
                                  <option class="" value="01" 
                                  @if($month_birthday == "01" )
                                  selected="selected"
                                  @endif >فروردین </option>

                                  <option class="" value="02" 
                                  @if($month_birthday == "02" )
                                  selected="selected"
                                  @endif >اردیبهشت </option>

                                  <option class="" value="03" 
                                  @if($month_birthday == "03" )
                                  selected="selected"
                                  @endif > خرداد </option>

                                  <option class="" value="04" 
                                  @if($month_birthday == "04" )
                                  selected="selected"
                                  @endif > تیر </option>

                                  <option class="" value="05" 
                                  @if($month_birthday == "05" )
                                  selected="selected"
                                  @endif >مرداد </option>

                                 
                                  <option class="" value="06" 
                                  @if($month_birthday == "06" )
                                  selected="selected"
                                  @endif >شهریور </option>

                                  <option class="" value="07" 
                                  @if($month_birthday == "07" )
                                  selected="selected"
                                  @endif > مهر </option>

                                  <option class="" value="08" 
                                  @if($month_birthday == "08" )
                                  selected="selected"
                                  @endif >آبان </option>

                                  
                                  <option class="" value="09" 
                                  @if($month_birthday == "09" )
                                  selected="selected"
                                  @endif >آذر </option>

                                  <option class="" value="10" 
                                  @if($month_birthday == "10" )
                                  selected="selected"
                                  @endif >دی </option>

                                  <option class="" value="11" 
                                  @if($month_birthday == "بهمن" )
                                  selected="selected"
                                  @endif >بهمن </option>

                                  <option class="" value="12" 
                                  @if($month_birthday == "اسفند" )
                                  selected="selected"
                                  @endif >اسفند </option>

                                  </select>
                                
                                </div>

                           </div>

                        </div>
                        </div>






                    </div>
                    </div>









                    <div class="col-md-1">
                   <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">سال تولد</label>
                            <input value="{{$year_birthday}}" name="year_birthday" type="text" class="form-control">
                          
                    </div>
                    </div>

                 <div class="col-md-4">
                     <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">پست الکترونیکی</label>
                            <input value="{{ $profile['email'] }}" name="email" type="text" class="form-control">
                          
                           </div>
                     </div>

                     <div class="col-md-4">



                     <div class="container-fluid">    
                        <div class="form-group bmd-form-group">

                            <div class="row">

                                <div class="col-md-4">
                                <label class="bmd-label-floating">استان </label>
                                </div>

                                <div class="col-md-8">

                                  <select name="state" class="dropdown-toggle btn btn-primary btn-round btn-block">
                                  
                                  <option class="" value="تهران" 
                                  @if($profile->state == "تهران" )
                                  selected="selected"
                                  @endif >تهران </option>

                                  <option class="" value="گیلان" 
                                  @if($profile->state == "گیلان" )
                                  selected="selected"
                                  @endif >گیلان </option>

                                  <option class="" value="آذربایجان شرقی" 
                                  @if($profile->state == "آذربایجان شرقی" )
                                  selected="selected"
                                  @endif >آذربایجان شرقی </option>

                                  <option class="" value="خوزستان" 
                                  @if($profile->state == "خوزستان" )
                                  selected="selected"
                                  @endif > خوزستان </option>

                                  <option class="" value="فارس" 
                                  @if($profile->state == "فارس" )
                                  selected="selected"
                                  @endif >فارس </option>

                                 
                                  <option class="" value="اصفهان" 
                                  @if($profile->state == "اصفهان" )
                                  selected="selected"
                                  @endif >اصفهان </option>

                                  <option class="" value="خراسان رضوی" 
                                  @if($profile->state == "خراسان رضوی" )
                                  selected="selected"
                                  @endif >خراسان رضوی </option>

                                  <option class="" value="قزوین" 
                                  @if($profile->state == "قزوین" )
                                  selected="selected"
                                  @endif >قزوین </option>

                                  
                                  <option class="" value="سمنان" 
                                  @if($profile->state == "سمنان" )
                                  selected="selected"
                                  @endif >سمنان </option>

                                  <option class="" value="قم" 
                                  @if($profile->state == "قم" )
                                  selected="selected"
                                  @endif >قم </option>

                                  <option class="" value="مرکزی" 
                                  @if($profile->state == "مرکزی" )
                                  selected="selected"
                                  @endif >مرکزی </option>

                                  <option class="" value="زنجان" 
                                  @if($profile->state == "زنجان" )
                                  selected="selected"
                                  @endif >زنجان </option>

                                  <option class="" value="مازندران" 
                                  @if($profile->state == "مازندران" )
                                  selected="selected"
                                  @endif >مازندران </option>

                                  <option class="" value="گلستان" 
                                  @if($profile->state == "گلستان" )
                                  selected="selected"
                                  @endif >گلستان </option>

                                  <option class="" value="اردبیل" 
                                  @if($profile->state == "اردبیل" )
                                  selected="selected"
                                  @endif >اردبیل </option>

                                  <option class="" value="آذربایجان غربی" 
                                  @if($profile->state == "آذربایجان غربی" )
                                  selected="selected"
                                  @endif >آذربایجان غربی </option>

                                  <option class="" value="همدان" 
                                  @if($profile->state == "همدان" )
                                  selected="selected"
                                  @endif >همدان </option>

                                  <option class="" value="کردستان" 
                                  @if($profile->state == "کردستان" )
                                  selected="selected"
                                  @endif >کردستان </option>

                                  <option class="" value="کرمانشاه" 
                                  @if($profile->state == "کرمانشاه" )
                                  selected="selected"
                                  @endif >کرمانشاه </option>
                                 
                                  <option class="" value="لرستان" 
                                  @if($profile->state == "لرستان" )
                                  selected="selected"
                                  @endif >لرستان </option>

                                  <option class="" value="بوشهر" 
                                  @if($profile->state == "بوشهر" )
                                  selected="selected"
                                  @endif >بوشهر </option>

                                  <option class="" value="هرمزگان" 
                                  @if($profile->state == "هرمزگان" )
                                  selected="selected"
                                  @endif >هرمزگان </option>

                                  <option class="" value="چهارمحال و بختیاری" 
                                  @if($profile->state == "چهارمحال و بختیاری" )
                                  selected="selected"
                                  @endif >چهارمحال و بختیاری </option>

                                  <option class="" value="یزد" 
                                  @if($profile->state == "یزد" )
                                  selected="selected"
                                  @endif >یزد </option>

                                  
                                  <option class="" value="سیستان و بلوچستان" 
                                  @if($profile->state == "سیستان و بلوچستان" )
                                  selected="selected"
                                  @endif >سیستان و بلوچستان </option>

                                  <option class="" value="ایلام" 
                                  @if($profile->state == "ایلام" )
                                  selected="selected"
                                  @endif >ایلام </option>

                                  <option class="" value="کهگلویه و بویراحمد" 
                                  @if($profile->state == "کهگلویه و بویراحمد" )
                                  selected="selected"
                                  @endif >کهگلویه و بویراحمد </option>

                                  
                                  <option class="" value="خراسان شمالی" 
                                  @if($profile->state == "خراسان شمالی" )
                                  selected="selected"
                                  @endif >خراسان شمالی </option>

                                  <option class="" value="خراسان جنوبی" 
                                  @if($profile->state == "خراسان جنوبی" )
                                  selected="selected"
                                  @endif >خراسان جنوبی </option>

                                  <option class="" value="البرز" 
                                  @if($profile->state == "البرز" )
                                  selected="selected"
                                  @endif >البرز</option>


                                  </select>
                                
                                </div>

                           </div>

                        </div>
                     </div>





                     </div>

          </div>


          <div class="row">

                     



<div class="col-md-8">
  <div class="form-group bmd-form-group">
         <label class="bmd-label-floating">آدرس </label>
         <input value="{{ $profile['address'] }}" name="address" type="text" class="form-control">
       
        </div>
  </div>

  <div class="col-md-4">
  <div class="form-group bmd-form-group">
         <label class="bmd-label-floating">رمز عبور </label>
         <input name="password" type="text" class="form-control">
       
        </div>
  </div>

</div>



          <!-- row -->

          <div class="row">

          
                  <!-- End data Section Form ; Below is blank row--> 
                  <div class="row text-center" style="padding-top:50px">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                         

                    <div class="clearfix">

                    <button type="submit" class="btn btn-primary pull-right">ثبت درخواست</button>
                    </div>



                        </div>
                      </div>
                    </div>

                    <!-- section operation form -->
                
                  </form>
                <!-- End Tag Form Section -->






     <!-- Body Card ( Main) -->
     </div>





                </div>
              </div>
            </div>
            
          </div>
        </div>
        </div>


@endsection