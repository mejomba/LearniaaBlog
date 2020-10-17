@extends('Layouts.layout_main_site')
@section('Head')
<title>درباره ما|لرنیا</title>
<meta  name="description" content="درباره ما|لرنیا">
<meta  name="keywords"    content="تاریخچه ما,درباره ما,لرنیا" >
<meta property="og:title" content="درباره ما|لرنیا"/>
<meta property="og:url" content="{{Request::url()}}"/>
<meta property="og:image" content="{{ asset('images/Template/Circlelogo.svg') }}">
<meta property="og:type" content="website"/>
<meta name="description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد">
<meta property="og:locale" content="fa_IR"/>
<meta name="twitter:card" content="summary" /> 
<meta name="twitter:site" content="{{Request::url()}}" /> 
<meta name="twitter:title" content="درباره ما|لرنیا" /> 
<meta name="twitter:description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد" /> 
<meta name="twitter:image" content="{{ asset('images/Template/Circlelogo.svg') }}"> 
@endsection
@section('content')
<div class="container-fluid" >
<div class="row text-center">
<div class="col-md-12">         
<div class="row text-center">
<div class="col-md-3">
</div>
<div class="col-md-6">
<img class="img-fluid rounded-circle " style="padding-top:40px;border-radius:20% !important;" src="{{ asset('images/Template/contactus.svg') }}" width="600px" height="200px" alt="Learniaa">               
</div>
<div class="col-md-3">
</div>
</div>
<h1 style="font-size:35px;color: #20c5ba !important;">درباره ی ما</h1>
</div>
</div>
</div>  
<div class="row">
<div class="col-md-3">
</div>
<div class="col-md-6" style="padding-top:30px;text-align: justify;margin-left:10px;margin-right:10px">
<div class="row" style="font-size:15px">
<div class="container-fluid" style="padding-left:5px;padding-right:5px">
<p style="font-size:18px;line-height: 1.1cm !important;color:black">
            سلام داستان ما از اون جایی شروع شد که یک نیاز مهم رو تو سیستم آموزشی کشف کردیم،این که خیلی ها نمیدونن باید چطور آموزش ببینن و خیلی ها حتی نمیدونن باید چی آموزش ببینن، بعد ها متوجه شدیم آموزش و یادگیری بخشی از یک زنجیره بزرگتر است شما قطعا با یک هدف خاص به دنبال آموزش یک مطلب هستین برای مثال اگر می خواهین یک زبان برنامه نویسی یاد بگیرین؛ یا هدفتون استخدام شدن هست یا جایی استخدام هستین و می خواهین مهارت هاتون رو افزایش بدین و... پس فقط آموزش دیدن به تنهایی اهمیت نداره این یک فرایند است که از قبل از یادگیری با مسیر یابی و هدایت و استعداد یابی شروع می شه و تا رسیدن به اون هدف خاص به طور مستمر ادامه پیدا می کنه ما اومدیم تا این فرایند رو برای شما یکپارچه کنیم تا دچار سردرگمی نباشین. لرنیا تمام تلاشش رو میکنه تا شما به هدفتون برسین. پس از اولش تا آخرش کنارتونیم                                        </P>
</div></div>
<div class="row" style="padding-top:35px">
<div class="col-md-4">
</div>  
<div class="col-md-4">
</div>  
<div class="col-md-4"> 
</div>  
</div>
</div>
<div class="col-md-3">
</div>
</div>
</div>
</div>




<!-- Writers -->
<section id="masters" class="pt-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="section-title text-center pb-40">
                  
                    <h3 class="title mt-5" style="font-size:35px;color: #20c5ba !important;">اعضای تیم لـرنیا</h3>
                </div> <!-- section title -->
            </div>
        </div>
        <!-- row -->

            <div class="row mt-2">

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{asset('images/learner/ShabnamShaygan.jpg')}}" alt="" 
                             width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">خانم شبنم شایگان </h4>
                        <p style="margin-top:0px;line-height: 25px !important;"> هم بنیانگذار و هیات مدیره و طراح ارشد </p>
                    </div>
                </div> 
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/learner/Mahdavi.jpg') }}" alt="" 
                             width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس محمدرضا مهدوی </h4>
                        <p style="margin-top:0px;line-height: 25px !important;"> هم بنیانگذار و هیات مدیره و مدیر مارکتینگ </p>
                    </div>
                </div> 
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/learner/Malek.jpg') }}" alt="" 
                             width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس محمد ملک</h4>
                        <p style="margin-top:0px;line-height: 25px !important;"> هم بنیانگذار و هیات مدیره و مدیریت محصول  </p>
                    </div>
                </div> 
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/learner/Alavian.jpg') }}" alt="" 
                             width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس مهدیه علویان</h4>
                        <p style="margin-top:0px;line-height: 25px !important;"> مدیریت محصول و هیات مدیره </p>
                    </div>
                </div> 
            </div>


            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/learner/Faghan.jpg') }}" alt="" 
                             width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس امیرحسین فغان </h4>
                        <p style="margin-top:0px;line-height: 25px !important;"> برنامه نویس بک اند </p>
                    </div>
                </div> 
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/learner/Setayesh.jpg') }}" alt="" 
                             width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">آقای ستایش </h4>
                        <p style="margin-top:0px;line-height: 25px !important;"> محتوا نویس و طراح و تدوین گر </p>
                    </div>
                </div> 
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/learner/Farokh.jpg') }}" alt=""
                              width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">آقای فرخ </h4>
                        <p style="margin-top:0px;line-height: 25px !important;">محتوا نویس و مشاور سوشال مارکتینگ </p>
                    </div>
                </div> 
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/learner/Jamali.jpg') }}" alt="" 
                             width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">آقای جمالی </h4>
                        <p style="margin-top:0px;line-height: 25px !important;">متخصص لینوکس و طراح سیستم عامل لرنیا </p>
                    </div>
                </div> 
            </div>

           
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/learner/AliMosavi.jpg') }}" alt="" 
                             width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">آقای موسوی </h4>
                        <p style="margin-top:0px;line-height: 25px !important;"> طراح و متخصص رابط کاربری </p>
                    </div>
                </div> 
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/learner/Gomar.jpg') }}" alt="" 
                             width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس گمار </h4>
                        <p style="margin-top:0px;line-height: 25px !important;"> برنامه نویس فرانت اند </p>
                    </div>
                </div> 
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/learner/RezaZadeh.jpg') }}" alt="" 
                             width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">مهندس رضازاده </h4>
                        <p style="margin-top:0px;line-height: 25px !important;"> برنامه نویس فرانت اند </p>
                    </div>
                </div> 
            </div>


            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{ asset('images/learner/DrDehghani.jpg') }}" alt="" 
                             width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">آقای دهقانی </h4>
                        <p style="margin-top:0px;line-height: 25px !important;"> دکترای حقوق و مشاور حقوقی </p>
                    </div>
                </div> 
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="mt-sm-5 mt-5">
                    <div class="master-img d-flex justify-content-center">
                        <span class="background_img rounded-circle">
                             <img src="{{  asset('images/learner/Nadaf.jpg') }}" 
                             alt="" width="150px" height="150px" class="rounded-circle" >
                        </span>
                    </div>
                    <div class="description mx-auto text-center">
                        <h4 class="">آقای ندّاف</h4>
                        <p style="margin-top:0px;line-height: 25px !important;"> مشاور مارکتینگ و رشد فردی  </p>
                    </div>
                </div> 
            </div>
        </div> 
    </div>

</section>
<!-- Writer -->





<div class="col-md-12 col-12 text-center" style="font-size:10px">
<h2> مجوزها و نماد </h2>
<div class="row" style="padding-bottom:10px">
<style>#zarinpal{margin:auto} #zarinpal img {width:90px; height:90px}</style>
<div class="col-md-12 col-8" id="zarinpal">
<script src="https://cdn.zarinpal.com/trustlogo/v1/trustlogo.js" type="text/javascript"></script>
<img id = 'jxlzfukzjzpeesgtesgtapfu' style = 'cursor:pointer;width:120px !important' 
onclick = 'window.open("https://logo.samandehi.ir/Verify.aspx?id=167005&p=rfthgvkajyoeobpdobpddshw", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=230, top=30")' alt = 'logo-samandehi'
src = 'https://logo.samandehi.ir/logo.aspx?id=167005&p=nbpdwlbqyndtlymalymaujyn' />
</div>
</div>
</div>
@endsection
