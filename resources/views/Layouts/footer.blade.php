<footer id="footer" class="footer-area pt-120 " style="margin-top:180px;z-index:auto;direction:rtl">
<div class="container-fluid">
        <div class="subscribe-area wow fadeIn container mx-auto">
            <div class="row">
                <div class="col-lg-6"> <br>
                    <div class="subscribe-content" style="margin-top:-1rem !important">
                        <h6 style="font-size:24px;text-align:center;dircetion:rtl" class=""> مشاوره رایگان میخوای تا بهتر تصمیم بگیری <br>  شماره موبایلت رو وارد کن</h6>
                    </div>
                </div>
            <div class="col-lg-6" style="margin-top:20px">
                    <div class="subscribe-form mt-50" style="direction:ltr">
                        <form method="POST" action="{{route('message.newspaper')}}">
                            @csrf
                            <input  type="hidden" name="name" id="name" value="ناشناس" class="form-control">
                            <input type="hidden" name="message" id="message" value="درخواست مشاوره"  class="form-control">
                            <input type="text" class="ml-lg-5 ml-md-5 text-sm-center text-center" name="username" placeholder="شماره موبایل خود را وارد نمایید">
                            <button class="main-btn" style="z-index:auto">ثبت </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid footer-List" style="margin-top: 350px; direction: rtl">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 col-12 mt-md-4">
                    <a class="d-flex justify-content-center" href="{{route('index')}}">
                        <img src="{{ asset('images/Template/Circlelogo.svg') }}" alt="Logo_Of_Learniaa" width="120px" height="120px">
                    </a>
                    <div class="mt-3">
                    <span class="text-center offset-1 text-white text-justify w-75" style="display: inline-block;">در لرنیا جمع شده ایم تا مسیر یادگیری شما را هر چه راحت تر و سریع تر مشخص کرده و با شما پیش بریم</span>
                    </div>
                    <div class="mt-3 d-flex justify-content-center">
                            <a href="https://t.me/learniaa_group" target="_blank">
                            <img class="" style="height: 35px; width: 35px; color: white"
                            src="{{asset('images/footer_telegram.svg')}}" alt="">
                            </a>
                             <a href="https://www.instagram.com/learniaa/" target="_blank">
                             <img class="ml-3" style="height: 35px; width: 35px; "
                             src="{{asset('images/footer_instagram.svg')}}" alt="">
                             </a>
                              <a href="https://linkedin.com/in/وب-سایت-آموزشی-لرنیا-3500b51a4" target="_blank">
                              <img class="ml-3" style="height: 35px; width: 35px; color: white"
                             src="{{asset('images/footer_linkden.svg')}}" alt="">
                             </a>
                             <a href="https://twitter.com/pfima8t3lU7P28a" target="_blank">
                             <img class="ml-3" style="height: 35px; width: 35px; color: white"
                             src="{{asset('images/footer_twitter.svg')}}" alt="">
                             </a>
                       </div>
                 </div>
                <hr class="clearfix w-100 d-md-none">
                <div class="col-lg-2 col-md-6 col-sm-12 col-12 text-center d-inline-block">
                    <h5 class="font-weight-bold text-uppercase mt-md-4 mb-3 text-white">دسترسی سریع</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{route('index')}}" >صفحه اصلی</a></li>
                        <li> <a href="{{route('academy.detail')}}" >آکادمی آموزش</a></li>
                        <li><a href="{{route('Aboutus')}}" >درباره ما</a></li>
                        <li><a href="{{route('Contactus')}}" >تماس با ما</a></li> 
                    </ul>
                </div>
                <hr class="clearfix w-100 d-md-none">
                <div class="col-lg-2 col-md-6 col-sm-12 col-12 text-center d-inline-block">
                    <h5 class="font-weight-bold text-uppercase mt-md-4 text-white text-center">صفحات متداول</h5>
                   <ul class="list-unstyled mt-2" >
                        <li><a href="{{route('TermsOfService')}}" class="text-center">قوانین استفاده</a></li>
                        <li><a href="{{route('PrivacyPolicy')}}" class="text-center">حریم خصوصی</a></li>  
                    </ul>
                </div>
                <hr class="clearfix w-100 d-md-none">
                <div class="col-lg-2 col-md-6 col-sm-12 col-12 text-center d-inline-block">
                    <h5 class="font-weight-bold text-uppercase mt-md-3 text-center text-white">ارتباط‌ با ما
                    </h5>
                    <ul class="list-unstyled mt-2">
                        <li class=""><a href="#!">learniaa@gmail.com</a></li>
                        <li><a href="#!">021-33195733</a></li>
                        <li><a href="https://t.me/learniaaSupport" target="_blank"><span class="d-flex">learniaa_support@ <img class="ml-1 mr-1" style="height: 25px; width: 25px; color: white" src="{{asset('images/footer_telegram.svg')}}" alt=""></span></a></li>
                    </ul>
                </div>
                <hr class="clearfix w-100 d-md-none">
                <div class="col-lg-2 col-md-4 col-sm-4 col-12 text-center mt-md-4 mt-sm-4 mx-sm-auto mx-auto">
                  <div class="" >
                        <div class="row" style="padding-bottom:10px">
                                <style>#zarinpal{margin:auto} #zarinpal img {width:90px; height:90px}</style>
                                <div class="col-md-12 col-12" id="zarinpal">
                                <script src="https://cdn.zarinpal.com/trustlogo/v1/trustlogo.js" type="text/javascript"></script>
                                <img id = 'jxlzfukzjzpeesgtesgtapfu' class="text-center mx-auto mt-4" style = ' cursor:pointer;width:90px !important ; display: block!important;'
                                onclick = 'window.open("https://logo.samandehi.ir/Verify.aspx?id=167005&p=rfthgvkajyoeobpdobpddshw", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=230, top=30")' alt = 'logo-samandehi'
                                    src = 'https://logo.samandehi.ir/logo.aspx?id=167005&p=nbpdwlbqyndtlymalymaujyn' />
                        
                                    <script> !function (e, t, a) { "use strict"; var s = t.head || t.getElementsByTagName("head")[0], p = t.createElement("script"); e.certificateBadge = a, p.async = true, p.src = "https://cdn.iwmf.ir/js/certificates/certificate.js", s.appendChild(p) }(window, document, "light"); </script>
<div id="iwmf-certificate"></div>
                        
                        
                        </div>
                     </div>
                  </div>
            </div>
        </div>
    </div>
    <hr class="mt-sm-1 mt-md-1 mt-lg-5 mt-1 bg-white container mx-auto">
    <div style="height:50px;"></div>
</div>
 </footer>
<!--End Footer -->
