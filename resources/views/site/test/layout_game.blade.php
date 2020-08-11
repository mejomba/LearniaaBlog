<!DOCTYPE html>
<html lang="fa">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

@include('site.Layouts.head')

<script src="{{ asset('js/core/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{asset('js/core/slick.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/wow.js')}}"></script>
<script src="{{asset('js/core/wow.animate.js')}}"></script>
<script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/core/tooltip.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/core/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- Video Player -->
<script src="{{ asset('js/videoplayer/afterglow.min.js') }}" type="text/javascript"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-155041698-1"></script>
<script>window.dataLayer = window.dataLayer || [];function gtag() {dataLayer.push(arguments);}
gtag('js', new Date());gtag('config', 'UA-155041698-1');
</script>
</head>

<body>
@include('site.Layouts.nav')

<div class="container-fluid">
@include('site.Layouts.error')
</div>

<div>
@yield('content')
</div>

@include('site.Layouts.footer')

</body>
</html>
