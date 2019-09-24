
<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

@include('admin.Layouts.head')

</head>

<body class="">
<div class="wrapper">

@include('admin.Layouts.sidebar')



<div class="main-panel">

@include('admin.Layouts.nav')

<div class="content">
<div class="container-fluid">

@include('admin.Layouts.error')

@yield('content')

</div>




</div>
@include('admin.Layouts.footer')
</div>


<script src="{{ asset('js/core/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/core/tooltip.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/core/bootstrap.min.js') }}" type="text/javascript"></script>
 
  <script src="{{ asset('js/site/argon.js') }}" type="text/javascript"></script>


  <!--
  <script src="{{ asset('js/core/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/site/headroom.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/site/onscreen.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/site/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
-->


</div>
</body>
</html>


