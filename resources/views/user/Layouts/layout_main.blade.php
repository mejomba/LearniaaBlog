
<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

@include('user.Layouts.head')

</head>

<body class="">
<div class="wrapper">

@include('user.Layouts.sidebar')



<div class="main-panel">

@include('user.Layouts.nav')

<div class="content">
<div class="container-fluid">

@include('user.Layouts.error')

@yield('content')

</div>




</div>
@include('user.Layouts.footer')
</div>


    <script src="{{ asset('js/Dashboard_js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/Dashboard_js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/Dashboard_js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/Dashboard_js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!-- Chartist JS -->
    <script src="{{ asset('js/Dashboard_js/plugins/chartist.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('js/Dashboard_js/plugins/bootstrap-notify.js') }}"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('js/Dashboard_js/material-dashboard.js') }}" type="text/javascript"></script>




</div>
</body>
</html>


