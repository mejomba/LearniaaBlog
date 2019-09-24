<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

@include('site.Layouts.head')

</head>


<body class="landing-page sidebar-collapse">

@include('site.Layouts.nav')

<div class="card shadow border-21" 
  style="margin-left:15px;margin-right: 15px;margin-top:110px;padding-bottom: 150px;margin-bottom: 20px;">
  
              
              <div class="container-fluid" style="margin-top:15px">

                @include('site.Layouts.error')
                
              </div>

              <!-- Full Container Page Content -->

            <div class="container-fluid" style="margin-top:15px">
            <div class="row">
            <div class="col-md-12">  

                @yield('content')

            </div>
            </div>
            </div>

            <!-- Full Container Page Content -->


  </div>

@include('site.Layouts.footer')


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

</body>
</html>