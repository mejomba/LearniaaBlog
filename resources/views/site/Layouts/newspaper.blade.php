  <!-- Banner -- section -->
  <div class="row" style="padding-top:15px;padding-bottom:15px;;font-size:15px;margin-right:10px;margin-left:10px;">

<div class="col-md-12 col-12">
<div class="container-fluid banner">

<div class="row">
<div class="col-md-1 col-12">
 </div>
         <div class="col-md-5 text-center" style=""> 
        <p style="margin-top: 10px;font-size: 19px;font-weight: 800;"> 
        برای آگاهی از تخفیف ها و جشنواره ها پست الکترونیکی خود را وارد نمایید
        </p>
        
        </div> 

        <div class="col-md-5 col-12">
            <div class="row">
            <div class="col-md-8 col-12">         
            <form class="form" method="POST" action="{{route('message.newspaper')}}">
            @csrf

            <input name="name" id="name" value="ناشناس" type="hidden" class="form-control"> 
            <input name="message" id="message" value="درخواست خبرنامه" type="hidden" class="form-control">

                         <div class="form-group focused" style="background: white;height:50px">
                        <div class="input-group input-group-alternative" >
                        <div class="input-group-prepend">
                        <img class="img-raised  img-fluid" 
                        src="{{ asset('images/Template/user_email.svg')}}" 
                        alt="Thumbnail Image" height="40px" width="40px">
                        </div>
                        <input name="email" id="email" type="text" class="form-control" 
                        placeholder="پست الکترونیکی">
                        </div>
                        </div>

                    </div>
                    <div class="col-md-4 col-12">
                        <button type="submit" class="btn btn-warning btn-round">ثبت</button>
                    </div>
                    
        </div> 
        </div>
        
        </form>
         

<div class="col-md-1 col-12">
 </div>


</div>                                      


</div>
</div>    



</div>




<!-- Banner -- section -->

