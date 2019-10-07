@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger text-center">
                <div class="container">

                 

                <img src="{{ asset('images/Template/error.svg') }}" alt="Thumbnail Image" height="20px" width="20px">
                    
                    
                   
                    <b>پیام خطا:</b>    {{ $error }}       
                   
                </div>
        </div>
      
        @endforeach             
@endif


@if(Session::has('success'))

<div class="alert alert-success text-center">
                <div class="container">
                   
                    <img src="{{ asset('images/Template/error.svg') }}" alt="Thumbnail Image" height="20px" width="20px">
                   
                    
                    
                   
                    <b>پیام موفقیت:</b>    {{ Session::get('success') }}       
                   
                    </div>
        </div>

@endif


@if(Session::has('report'))

<div class="alert alert-danger text-center">
                <div class="container">
                   
                    <img src="{{ asset('images/Template/error.svg') }}" alt="Thumbnail Image" height="20px" width="20px">
                   
                    
                    
                   
                    <b>پیام خطا:</b>   {{ Session::get('report') }}       
                   
                    </div>
        </div>

@endif




        