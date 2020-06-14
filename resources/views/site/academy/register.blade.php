@extends('site.Layouts.layout_main')

@section('Head')
<title> تکمیل پروفایل | لرنیا  </title>
  <meta  name="description" content="تکمیل پروفایل | لرنیا ">
  <meta  name="keywords"    content="تکمیل پروفایل,لرنیا" >
@endsection

@section('content')
 <!-- Section -->
    <div class="row">

<div class="col-lg-8 col-md-7 col-sm-9 col-10 offset-1" >
              <div class="col-lg-7" style="margin-top: 120px!important">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center"><h4>تکمیل پروفایل</h4></div>

              </div>
              <div class="card-body px-5 py-5">
              <form method="POST" action="{{ route('academy.saveprofile',$profile['pk_profiles']) }}"
                    enctype="multipart/form-data" >
                    
               @csrf

                      @php $month_birthday =  substr($profile->birthday,5,2)  @endphp
                      @php $year_birthday =  substr($profile->birthday,0,4)  @endphp
                      @php $day_birthday =  substr($profile->birthday,8,2)  @endphp
       <div class="row">

       <div class="col-md-6">           
          <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      </div>
                      <input value="{{$year_birthday}}" name="year_birthday" class="form-control" placeholder="سال تولد" type="text">
                    </div>
                  </div>
              </div>



   <!-- Select Box -->
   <div class="col-md-6">
        <div class="row">


                        <div class="col-md-3">
                        <span>ماه</span>
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                    </div>
                                  <select name="month_birthday" class="form-control">

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
                                  @if($month_birthday == "11" )
                                  selected="selected"
                                  @endif >بهمن </option>


                                  <option class="" value="12"
                                  @if($month_birthday == "12" )
                                  selected="selected"
                                  @endif >اسفند </option>



                                  </select>
                                  </div>
                                </div>
                     </div>


        </div>
        </div>
         <!-- Select Box -->
         

              <div class="col-md-6">           
          <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">

                      </div>
                      <input class="form-control"  value="{{$day_birthday}}" name="day_birthday" placeholder="روز تولد " type="text">
                    </div>
                  </div>
                  </div>



       <!-- Select Box -->
       <div class="col-md-6">
        <div class="row">


                        <div class="col-md-3">
                        <span>استان</span>
                        </div>
                        <div class="col-md-9">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                    </div>
                                  <select name="state" class="form-control">

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
         <!-- Select Box -->


       <div class="col-md-6">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      </div>
                      <input value="{{ $profile['job'] }}" name="job" class="form-control" placeholder=" شغل" type="text">
                    </div>
                  </div>
             </div>


             <div class="col-md-6">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      </div>
                      <input value="{{ $profile['email'] }}" name="email" class="form-control" placeholder=" پست الکترونیکی" type="text">
                    </div>
                  </div>
             </div>

              
         <div class="col-md-12">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      </div>
                      <textarea  name="address" class="form-control" placeholder="آدرس" type="text">{{ $profile['address'] }}</textarea> 
                    </div>
  
         </div>
        </div>


       <!-- Select Box -->

   <div class="col-md-12">
        <div class="row">


                        <div class="col-md-3">
                        <span>علاقه مندی</span>
                        </div>
                        <div class="col-md-8">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                    </div>
                                  <select name="favourite" class="form-control">

                                  <option class="" value="ورزش"
                                  @if($profile->favourite == "ورزش" )
                                  selected="selected"
                                  @endif >ورزش </option>

                                  </select>
                                  </div>
                                </div>
                     </div>


        </div>
        </div>
         <!-- Select Box -->




  <!-- Select Box -->

  <div class="col-md-12">
        <div class="row">


                        <div class="col-md-7">
                        <span>چقدر در روز میخوای وقت بزاری</span> 
                        </div>
                        <div class="col-md-5">
                      <div class="form-group focused">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">  
                                    </div>
                                  <select name="favourite" class="form-control">
                                 
                                  <option class="" value="0.5" 
                                  @if( $profile->amount_time == "0.5" )
                                  selected="selected"
                                  @endif >نیم ساعت</option>
                                  <option class="" value="1"
                                  @if($profile->amount_time == "1" )
                                  selected="selected"
                                  @endif >یک ساعت</option>
                                  <option class="" value="2" 
                                  @if($profile->amount_time == "2" )
                                  selected="selected"
                                  @endif >دو ساعت</option>
                                  <option class="" value="3" 
                                  @if($profile->amount_time == "3" )
                                  selected="selected"
                                  @endif >سه ساعت</option>
                                  <option class="" value="4" 
                                  @if($profile->amount_time == "4")
                                  selected="selected"
                                  @endif >چهار ساعت</option>
                                  <option class="" value="5" 
                                  @if($profile->amount_time == "5" )
                                  selected="selected"
                                  @endif >پنج ساعت</option>
                                  <option class="" value="6" 
                                  @if($profile->amount_time == "6" )
                                  selected="selected"
                                  @endif >شش ساعت</option>
                                  <option class="" value="7" 
                                  @if($profile->amount_time == "7" )
                                  selected="selected"
                                  @endif >هفت ساعت</option>
                                  <option class="" value="8" 
                                  @if($profile->amount_time == "8" )
                                  selected="selected"
                                  @endif >هشت ساعت</option>
                                  <option class="" value="9" 
                                  @if($profile->amount_time == "9" )
                                  selected="selected"
                                  @endif >نه ساعت</option>
                                  <option class="" value="10" 
                                  @if($profile->amount_time == "10" )
                                  selected="selected"
                                  @endif >ده ساعت</option>

                                  </select>
                                  </div>
                                </div>
                     </div>
            
   
        </div>
        </div>
         <!-- Select Box -->



    <!-- Picture Box -->
    <div class="col-md-12">
                <div class="row">
                  <div class="col-md-12 text-center">
                  <span  style="font-size:15px">وارد کردن تصویر الزامی نمی باشد  </span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                  <span>  </span> 
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








                  <div class="col-md-12 text-center" >
                    <button type="submit" class="btn btn-primary">ثبت اطلاعات</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
  </div>



 </div>

 <!-- Form -->


 <!-- Section -->
@endsection
