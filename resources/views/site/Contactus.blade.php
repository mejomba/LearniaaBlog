@extends('site.Layouts.layout_main')

@section('Head')
<title> ارتباط با ما | لرنیا  </title>
  <meta  name="description" content="ارتباط با ما | لرنیا ">
  <meta  name="keywords"    content="تماس با ما,ارتباط با ما,لرنیا" > 
@endsection

@section('content')
 <!-- Section -->
    <div class="row">

    <div class="col-md-2">
</div>
<div class="col-md-4" >   
              <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center"><h4>ارتباط با ما</h4></div>
                
              </div>
              <div class="card-body px-lg-5 py-lg-5"> 
                <form role="form" method="POST" action="{{route('message.store')}}" style="height: 270px; ">
                @csrf
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        
                      </div>
                      <input name="name" id="name" class="form-control" placeholder="نام و نام خانوادگی" type="text">
                    </div>
                  </div>
  
                 <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        
                      </div>
                      <input name="email" id="email" class="form-control" placeholder="ایمیل" type="text">
                    </div>
                  </div>
  
              <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        
                      </div>
                      <textarea name="message" style="max-height:100px" id="message" type="text" class="form-control" placeholder="متن پیام"></textarea>
                    </div>
                  </div>
                
                  <div class="text-center" style="padding-top:20px">
                    <button type="submit" class="btn btn-primary">ارسال پیام</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
  </div>

<div class="col-md-4">
<img src="{{ asset('images/Template/customer_service.svg') }}" style=""  width="500px" height="600px" alt="Learniaa">
 
</div>


            </div>

           <!-- Form -->
           <div class="col-md-12 text-center" dir="rtl" style="margin-top:15px">
<p>
</p>

</div>
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
 <!-- Section -->
@endsection
