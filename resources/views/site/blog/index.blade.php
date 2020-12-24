@extends('Layouts.layout_landing_site')
@section('Head')
<title>بلاگ |لرنیا</title>
<meta  name="description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد">
<meta  name="keywords"    content="مقاله لرنیا,اخبار,لرنیا بلاگ,بلاگ,بلاگ لرنیا" >
<meta property="og:title" content="بلاگ|لرنیا"/>
<meta property="og:url" content="{{Request::url()}}"/>
<meta property="og:image" content="{{ asset('images/Template/Circlelogo.svg') }}">
<meta property="og:type" content="website"/>
<meta name="description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد">
<meta property="og:locale" content="fa_IR"/>
<meta name="twitter:card" content="article" /> 
<meta name="twitter:site" content="{{Request::url()}}" /> 
<meta name="twitter:title" content="بلاگ|لرنیا" /> 
<meta name="twitter:description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد" /> 
<meta name="twitter:image" content="{{ asset('images/Template/Circlelogo.svg') }}">
@endsection

@section('text_landing')
<h1 class="font-weight-bolder text-center font-weight-bolder text-landing" >
 <span class="text-info main-color-blue">وبلاگ</span>
 <span class="text-warning mr-3 main-color-yellow">لـرنیا</span>
</h1>

<h2 class="text-justify p-lg-1 p-md-4 p-sm-4 p-4 m-lg-4 text-center text-landing-quick">
تخصصی ترین مقالات با لرنیا
</h2>
@endsection

@section('pic_landing')
<img  class="learn-bg d-lg-block d-md-block d-sm-none d-none" src="{{asset('images/Template/blogNew.svg')}}"  style="margin-top: -15px">
@endsection

@section('content')

<!-- Category Posts -->
{{-- <section class="MainTopics"> --}}
{{--<div class="d-flex justify-content-around flex-wrap mt-5" id="topics_Of_novels"> --}}
{{--<div class="m-2"><a href="{{route('category.show','توسعه مهارت های شخصی')}}" class="btn  btn-round btnblog btn-1">توسعه مهارت های شخصی </a></div> --}}
{{--<div class="m-2"><a href="{{route('category.show','دنیای دیجیتال')}}" class="btn  btn-round btnblog btn-2">دنیای دیجیتال </a></div> --}}
{{--<div class="m-2"><a href="{{route('category.show','برنامه نویسی')}}" class="btn  btn-round btnblog btn-3"> برنامه نویسی</a></div> --}}
{{--<div class="m-2"><a href="{{route('category.show','وب')}}" class="btn  btn-round btnblog btn-4">وب</a></div> --}}
{{--<div class="m-2"><a href="{{route('category.show','هک و امنیت')}}" class="btn  btn-round btnblog btn-5"> هک و امنیت </a></div> --}}
{{--</div> --}}
{{--</section> --}}
<!-- Category Posts -->

<!-- Terms -->
<div class="row">
    <div class="col-lg-9 col-md-10 col-sm-11 col-12 mx-auto mt-5" >
        <div class="card-body">
             <div class="row">
                <div class="col-md-7 col-12 col-lg-7 col-sm-12 mx-auto  text-center Terms ">
                وبلاگ لرنیا جایی است برای علاقه مندان به مطالعه ی
                مقالات و آگاه شدن از تکنولوژی و  فناوری های جدید
                زبان های برنامه نویسی روز دنیا
                </div>
            </div>
          </div>
      </div>
 </div>
<!-- Terms -->


<div class="container-fluid">
<div class="row">
<div class="col-12 mx-auto text-center">
</div>
</div>
    <div class="row p-2" id="ListOfData" style="font-size:15px">
        <div class="card-group">
            @foreach($recent_post as $one_post)
                @php  $json = json_decode($one_post['extras'],false) @endphp
                <div class="col-lg-3 col-md-6 col-12 d-flex p-1">
                    <div class="card imageBlog my-4">
                         <img class="card-img-top w-100 post-image" src="{{  Storage::url('post/'.$one_post['pic_content']) }}" alt="{{ $one_post['title'] }}" >
                         <div class="card-body">
                            <h5 class="card-title py-3 px-2">
                                <a href="{{route('blog.show', ['en_title' =>  $one_post['en_title'] ]  )}}" class="">
                                    <h2 class="mt-5" style="direction:rtl;font-size:16px">{{ $one_post['title'] }}</h2>
                                </a>                           
                            </h5>
                            <p class="card-text post-summray text-justify px-2 ">
                            @php echo substr($one_post['desc_short'],0,300) . '...' @endphp
                            </p>

                      
                            
                        </div>
                            <div class="my-4 mx-3 rtl-dir">
                                <span class="text-danger"> نویسنده: </span>    
                                <span> <a href="#">نام نویسنده</a> </span>
                            </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{route('blog.show', ['en_title' =>  $one_post['en_title'] ]  )}}" class="btn main-btn">مطالعه</a>
                            <div>
                                <small class="mt-1">زمان مطالعه:  {{ $one_post['readtime'] }} دقیقه</small>
                                <img src="{{ asset('images/icons/Time.svg') }}" alt="Thumbnail Image" height="20px" width="20px">
                            </div>
                        </div>
                            
                            
                        <!-- </div> -->
                        <!-- <a href="#" class="card-footer btn main-btn">مطالعه</a> -->
                    </div>
                </div>
            @endforeach
        </div>
    </div>
<section class="Pagination">
<div class="row mx-auto">
<div class="col-lg-2 col-md-2 col-sm-12 col-12 mx-auto mt-3 d-flex justify-content-center">
<ul class="pagination px-1 py-1 text-secondary">
{{$recent_post->links()}}
</a>
</li>
</ul>
</div>
</div>
</section>
</div>
@endsection
