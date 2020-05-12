@extends('site.Layouts.layout_landing')
@section('Head')
    <title> لرنیا | وب سایت آموزش آنلاین </title>
    <meta name="description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد">
    <meta name="keywords" content="آموزش آنلاین,آموزش مبتدی کامپیوتر,یادگیری,لرنیا">
@endsection
@section('text_landing')
@endsection
@section('pic_landing')
@endsection
@section('content')
    <div class="container mt-5">
        <div class="text-center">
            <h1 class="font-weight-bold">Check Out The Video</h1>
        </div>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/afterglowplayer@1.x"></script>
        <div class="row mt-5">
            <div class="col-lg-12">
                <video class="afterglow" id="my-video" width="500" height="270"
                       data-overscale="false" poster="{{ Storage::url('tree/Poster_Intro_Academy.jpg') }}"
                       src="{{ Storage::url('Videos_Beginner_Tree/Video_IntroAcademy.mp4') }}">
                </video>
            </div>
        </div>
    </div>
    @include('site.Layouts.newspaper')

@endsection
