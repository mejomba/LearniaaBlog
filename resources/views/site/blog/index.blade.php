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
<h1 class="font-weight-bolder text-center font-weight-bolder" style="font-size:9vw;margin-top: -30px">
<span style="color: #ffe735 !important;" class="text-info">وبلاگ</span>
<span style="color: #20c5ba !important;" class="text-warning mr-3">لــرنیا</span>
</h1>
<h3  style="font-size:20px;background-color:#20c5ba;color:white;border-radius:95px" class="text-justify p-lg-1 p-md-4 p-sm-4 p-5 text-center">
وبلاگ لرنیا جایی است برای علاقه مندان به مطالعه ی  <br> مقالات و آگاه شدن از تکنولوژی و  فناوری های جدید  <br>زبان های برنامه نویسی روز دنیا</h3>
@endsection
@section('pic_landing')
<img  class="learn-bg d-lg-block d-md-block d-sm-none d-none" src="{{asset('images/Template/blogNew.svg')}}" alt="" style="margin-top: -15px">
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
<div class="container-fluid">
<div class="row mt-5 mb-4" style="padding-top:20px;">
<div class="col-12 mx-auto text-center">
</div>
</div>
    <div class="row p-2" id="ListOfData" style="font-size:15px">
            @foreach($recent_post as $one_post)
                @php  $json = json_decode($one_post['extras'],false) @endphp
                <div class="col-lg-3 col-md-6 col-sm-11 col-12 mx-auto mt-3">
                    <div class="card border-none mt-4" style="border-radius: 20px;box-shadow: 0px 0px 20px black;border-style: none;max-height:400px;height:400px">
                        <div class="card-header p-0 overflow-hidden" style="border-top-left-radius: 20px;border-top-right-radius: 20px;border-style: none">
                            <a href="{{route('blog.show', ['en_title' =>  $one_post['en_title'] ]  )}}">
                                <img src="{{  Storage::url('post/'.$one_post['pic_content']) }}" alt="{{ $one_post['title'] }}"
                                 class="w-100 imageBlog" style="border-top-left-radius: 20px;border-top-right-radius: 20px;height:20vh">
                            </a>
                        </div>
                        <div class="card-body px-4">
                            <a href="{{route('blog.show', ['en_title' =>  $one_post['en_title'] ]  )}}" class="">
                            <h2 class="mt-2" style="direction:rtl;font-size:16px">{{ $one_post['title'] }}</h2>
                            </a>
                            <p class="mt-2 text-secondary" style="line-height:25px !important;font-size:14px;direction:rtl">
                            @php echo substr($one_post['desc_short'],0,300) . '...' @endphp
                            </p>
                        </div>
                        <div class="card-end px-4 py-4" style="line-height:30px">
                            <span class="mt-1">زمان مطالعه:  {{ $one_post['readtime'] }} دقیقه</span>
                            <img src="{{ asset('images/icons/Time.svg') }}" alt="Thumbnail Image" height="20px" width="20px">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
<section class="Pagination">
<div class="row mx-auto">
<div class="col-lg-2 col-md-6 col-sm-11 col-6 mx-auto mt-3">
<ul class="pagination px-1 py-1 text-secondary" style="background-color: transparent">
{{$recent_post->links()}}
</a>
</li>
</ul>
</div>
</div>
</section>
</div>
@endsection


