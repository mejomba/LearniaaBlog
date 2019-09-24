@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger text-center">
                <div class="container">
                    <div class="alert-icon">
                    
                    </div>
                    
                    
                   
                    <b>پیام خطا:</b>    {{ $error }}       
                   
                    </div>
        </div>
      
        @endforeach             
@endif

@if(Session::has('success'))

<div class="alert alert-success text-center">
                <div class="container">
                    <div class="alert-icon">
                    
                    </div>
                    
                    
                   
                    <b>پیام موفقیت:</b>    {{ Session::get('success') }}       
                   
                    </div>
        </div>

@endif
        