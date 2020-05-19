<!-- Footer -->
<footer id="footer" class="footer-area pt-120 mt-5 " style="margin-top: 12.0rem !important">
<div class="container mt-5">
        <div class="subscribe-area wow fadeIn">
            <div class="row">
            <div class="col-lg-6" style="margin-top:20px">
                    <div class="subscribe-form mt-50">
                        <form method="POST" action="{{route('message.newspaper')}}">
                            @csrf
                            <input  type="hidden" name="name" id="name" value="ناشناس"class="form-control">
                            <input type="hidden" name="message" id="message" value="درخواست خبرنامه"  class="form-control">

                            <input type="text" name="email" placeholder="ایمیل خود را وارد نمایید">
                            <button class="main-btn">ثبت نام</button>
                        </form>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="subscribe-content mt-3">
                        <h6 style="font-size:24px;text-align:center" class="">برای آگاهی از تخفیف ها و جشنواره ها پست الکترونیکی خود را وارد نمایید</h6>
                    </div>
                </div>

            </div>
          
        </div> 
        <!-- End subscribe area -->

       
        <div class="container" style="margin-top: 350px; direction: rtl">
            <div class="row ml-4">
                <div class="col-md-4 mx-auto" style="margin-top: -55px">
                    <a class="" style=""
                       href="{{route('index')}}">
                        <img src="{{ asset('images/Template/Circlelogo.svg') }}" alt="Thumbnail Image"
                             style="height: 200px;width: 150px;margin: 10px 35px;">
                    </a>
                    <div class="mt-5">
                        <p class="text text-white" style="text-align:justify">در لرنیا جمع شده ایم تا مسیر یادگیری شما را هر چه راحت تر و سریع تر مشخص کرده و با کمک شما پیش بریم</p>
                    </div>
                    <div class="mt-5">

                      <a href="https://t.me/learniaa_group" target="_blank">
                      <img class="ml-3" style="height: 35px; width: 35px; color: white"
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
                <div class="col-md-2 mx-auto">
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4" style="color: white">دسترسی سریع</h5>
                    <ul class="list-unstyled mt-5">
                        <li>
                            <a href="{{route('academy.index')}}" style="text-decoration: none; color: white">صفحه اصلی</a>
                        </li>
                        <li class="">
                            <a href="#!"></a>
                        </li>
                        <li>
                            <a href="{{route('academy.detail')}}" style="text-decoration: none; color:white">آکادمی آموزش</a>
                        </li>
                        <li class="">
                            <a href="#!"></a>
                        </li>
                        <li>
                            <a href="{{route('Aboutus')}}" style="text-decoration: none; color: white">درباره ما</a>
                        </li>
                        <li class="">
                            <a href="#!"></a>
                        </li>
                        <li>
                            <a href="{{route('Contactus')}}" style="text-decoration: none; color: white">تماس با ما</a>
                        </li>
                    </ul>
                </div>
                <hr class="clearfix w-100 d-md-none">
                <div class="col-md-2 mx-auto ml-5">
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4" style="color: white">صفحات متداول</h5>
                   <!-- <ul class="list-unstyled mt-5" > --> 
                   <ul class="list-unstyled " >
                        <li class="">
                            <a href="#!"></a>
                        </li>
                        <li>
                            <a href="{{route('TermsOfService')}}" style="text-decoration: none; color: white">قوانین استفاده</a>
                        </li>
                        <li class="">
                            <a href="#!"></a>
                        </li>
                        <li>
                            <a href="{{route('PrivacyPolicy')}}" style="text-decoration: none; color: white">حریم خصوصی</a>
                        </li>
                        <li class="">
                            <a href="#!"></a>
                        </li>
                        {{--  <li> --}}
                        {{--  <a href="#!" style="text-decoration: none; color: white">همکاری با ما</a> --}}
                         {{--   </li>  --}}
                        {{--  <li> --}}
                         {{--  <a href="#!" style="text-decoration: none; color: white">هیات علمی</a> --}}
                         {{--</li> --}}
                    </ul>
                </div>
                <div class="col-md-2 mx-auto">
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4" style="color: white">ارتباط‌ با ما
                    </h5>
                    <ul class="list-unstyled mt-5">
                        <li class="">
                            <a href="#!" style="text-decoration: none; color:white">learniaa@gmail.com</a>
                        </li>
                        <li class="">
                            <a href="#!"></a>
                        </li>
                        <li>
                            <a href="#!" style="text-decoration: none; color:white">021-33195733</a>
                        </li>
                        <li class="">
                            <a href="#!"></a>
                        </li>
                        <li>
                            <a href="https://t.me/learniaa_support" target="_blank" style="text-decoration: none; color:white">
                                <span class="d-flex">
                                     learniaa_support@
                                    <img class="ml-1 mr-1" style="height: 25px; width: 25px; color: white"
                                         src="{{asset('images/footer_telegram.svg')}}" alt="">
                                </span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#!"></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2 mx-auto ml-5">
                  <div class="float-left" >
                  <!--  <img class="position-absolute" style="height: 200px; width: 200px; color: white"
                        src="{{asset('images/nemad.png')}}" alt="">  -->

                        <div class="row" style="padding-bottom:10px">

                                <style>#zarinpal{margin:auto} #zarinpal img {width:90px; height:90px}</style>

                                <div class="col-md-12 col-8" id="zarinpal">
                                <script src="https://cdn.zarinpal.com/trustlogo/v1/trustlogo.js" type="text/javascript"></script>

                                <img id = 'jxlzfukzjzpeesgtesgtapfu' style = 'cursor:pointer;width:90px !important' 
                                onclick = 'window.open("https://logo.samandehi.ir/Verify.aspx?id=167005&p=rfthgvkajyoeobpdobpddshw", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=230, top=30")' alt = 'logo-samandehi'
                                    src = 'https://logo.samandehi.ir/logo.aspx?id=167005&p=nbpdwlbqyndtlymalymaujyn' />
                        </div>

                     </div>
                  </div>

            </div>
        </div>
    </div>
    <hr class="mt-5 bg-white container">
    <div style="height: 100px;"></div>
</footer>
<!--End Footer -->
