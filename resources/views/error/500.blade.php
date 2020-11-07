@extends('Layouts.layout_main_site')
@section('Head')
<title>حریم خصوصی|لرنیا</title>
<meta  name="description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد">
<meta  name="keywords"    content="حریم خصوصی" >
<meta property="og:title" content="حریم خصوصی|لرنیا"/>
<meta property="og:url" content="{{Request::url()}}"/>
<meta property="og:image" content="{{ asset('images/Template/Circlelogo.svg') }}">
<meta property="og:type" content="website"/>
<meta name="description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد">
<meta property="og:locale" content="fa_IR"/>
<meta name="twitter:card" content="summary" /> 
<meta name="twitter:site" content="{{Request::url()}}" /> 
<meta name="twitter:title" content="حریم خصوصی|لرنیا" /> 
<meta name="twitter:description" content="لرنیا مسیر یادگیری شما را مشخص می کند و به آن سرعت می بخشد" /> 
<meta name="twitter:image" content="{{ asset('images/Template/Circlelogo.svg') }}"> 
@endsection
@section('content')
<div class="container-fluid" >
<div class="row text-center">
<div class="col-md-12">
<div class="row text-center">
<img  src="{{ asset('images/Template/Page500.png') }}" alt="Error Image" height="100%" width="100%">
@if(Session::has('report'))
<input type="hidden" name="errors[]" value ="{{ Session::get('report') }}" id="errors">
<b style="color:red">پیام خطا: {{ Session::get('report') }} </b>
@endif

</div>
</div>
</div>
</div>
@endsection

