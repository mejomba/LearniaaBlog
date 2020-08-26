@extends('site.Layouts.layout_landing')
@section('Head')
<title> بلاگ | لرنیا  </title>
<meta  name="description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد">
<meta  name="keywords"    content="اخبار,مقالات,بلاگ,لرنیا" >
@endsection
@section('text_landing')
<h1 class="font-weight-bolder text-center font-weight-bolder" style="font-size:9vw;margin-top: -30px"><span class="text-warning mr-3">لرنیا</span><span class="text-info">بلاگ</span></h1>
<h3 class="text-justify p-lg-1 p-md-4 p-sm-4 p-4 m-lg-2 text-center">لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد</h3>
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
<span style="font-size: 20px ; font-weight: 900">
<img src="{{ asset('images/Template/blog.svg') }}" alt="Learniaa" height="25px" width="25px">
بخوانید ، بدانید ، لذت ببرید
<img src="{{ asset('images/Template/blog.svg') }}" alt="Learniaa" height="25px" width="25px">
</span>
</div>
</div>
    <div class="row p-2" id="ListOfData" style="font-size:15px">
            @foreach($packages as $package)
                <div class="col-lg-4 col-md-6 col-sm-11 col-12 mx-auto mt-3">
                    <div class="card border-none mt-4" style="border-radius: 20px;box-shadow: 0px 0px 20px black;border-style: none">
                        <div class="card-header p-0 overflow-hidden" style="border-top-left-radius: 20px;border-top-right-radius: 20px;border-style: none">
                            <a href="{{route('academy.course', ['pk_tree' =>  $package['pk_tree'],'pk_package' =>$package['pk_package'] ]  )}}">
                                <img src="{{  Storage::url('package/'.$package['pic']) }}" alt="{{ $package['fa_name'] }}"
                                 class="w-100 imageBlog" style="border-top-left-radius: 20px;border-top-right-radius: 20px;height:30vh">
                            </a>
                        </div>
                        <div class="card-body px-4">
                            <a href="{{route('academy.course', ['pk_tree' =>  $package['pk_tree'],'pk_package' =>$package['pk_package'] ]  )}}" class="">
                            <h2 class="mt-2" style="direction:rtl;font-size:16px">{{ $package['fa_name'] }}</h2>
                            </a>
                          
                        </div>
                        <div class="card-end px-4 mt-3 py-2">
                            <br>
                            <span class="mt-1">قیمت :  {{ $package['price'] }} </span><i class="fa fa-circle mr-2 text-warning  "></i>
                            <br>
                            <span class="mt-1">مدت زمان  :  {{ $package['time'] }} ساعت </span><i class="fa fa-circle mr-2 text-info  "></i>
                            <a class="btn btn-primary float-right px-4 py-2" 
                            href="{{route('academy.course', ['pk_tree' =>  $package['pk_tree'],'pk_package' =>$package['pk_package'] ]  )}}">
                            مشاهده</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
<section class="Pagination">
<div class="row mx-auto">
<div class="col-lg-2 col-md-6 col-sm-11 col-6 mx-auto mt-3">
<ul class="pagination px-1 py-1 text-secondary" style="background-color: transparent">
{{$packages->links()}}
</a>
</li>
</ul>
</div>
</div>
</section>
</div>
@endsection


