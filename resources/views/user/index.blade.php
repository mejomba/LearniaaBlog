@extends('Layouts.layout_main_user')

@section('Head')
<title> سامانه کاربری | لرنیا </title>
  <meta  name="description" content=" سامانه کاربری | لرنیا">
@endsection

@section('content')

<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                <h1 class="card-title text-center">
                <img src="{{ asset('images/Template/icon_dashboard.svg') }}" alt="Thumbnail Image" height="60px" width="60px">
                داشبورد</h1>
                  <p class="card-category text-center">
                 </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                    <thead class=" text-primary">
                    </thead>
                      <tbody>  
                    </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection