@extends('admin.Layouts.layout_main')

@section('Head')
<title> گزارش نظرسنجی | لرنیا </title>
  <meta  name="description" content=" گزارش نظرسنجی | لرنیا">
@endsection

@section('content')


<!-- Body Card ( Main) -->

<div class="container-fluid">
          <div class="row">


          <div class="col-md-12">
            <div class="card shadow border-0">
              <div class="card-header" style="background-color:#20C5BA ">
                <div class="text-center"><h1>گزارش نظرسنجی</h1></div>
                
              </div>

              <div class="card-body px-lg-5 py-lg-5">
                
              
   <form method="POST" action="" enctype="multipart/form-data" style="min-height:270px;">
        @csrf

     <div class="row">   

     <div class="col-md-4">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">    
                      </div>
                      <label>گزینه1 </label>
                      <input class="form-control" id="Option1" value="{{ $ResultOption1 }}" name="ResultOption1" placeholder="گزینه1" type="text">
                    </div>
                  </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">    
                      </div>
                      <label>گزینه2 </label>
                      <input class="form-control" id="Option2" value="{{ $ResultOption2 }}" name="ResultOption2" placeholder="گزینه2" type="text">
                    </div>
                  </div>
        </div>


 <!--                json process            -->  
 
        <div class="col-md-4">
        <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      </div>
                      <label>گزینه3 </label>
                      <input name="ResultOption3" id="Option3" value="{{$ResultOption3}}" class="form-control" placeholder="گزینه3 " type="text">
                    </div>
                  </div>
        </div>


        <div class="col-md-4">
<div class="form-group">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">     
              </div>
              <label>گزینه4 </label>
              <input class="form-control" id="Option4" value="{{$ResultOption4}}" name="ResultOption4" placeholder=" گزینه4 " type="text">
            </div>
          </div>
</div>


                
                  <div class="text-center" style="padding-top:20px">
                  <!--  <button type="submit" class="btn btn-primary">ثبت درخواست</button> -->
                  </div>
                </form>
              </div>
            </div>
          </div>
  </div>

     <!-- Body Card ( Main) -->
     </div>






     <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>



     <canvas id="myChart"></canvas>

     <script>

     var ctx = document.getElementById('myChart').getContext('2d');

     var Option1 = document.getElementById("Option1");
     var Option2 = document.getElementById("Option2");
     var Option3 = document.getElementById("Option3");
     var Option4 = document.getElementById("Option4");

var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['گزینه یک', 'گزینه دو', 'گزینه سه', 'گزینه چهار'],
        datasets: [{
            label: 'نمودار نظرسنجی کاربران  ',
            backgroundColor: 'rgb(32, 197, 178)',
            borderColor: 'rgb(255, 99, 132)',
            data: [Option1.value, Option2.value,Option3.value, Option4.value]
        }]
    },

    // Configuration options go here
    options: {}
});

</script>




                </div>
              </div>
            </div>
            
          </div>
        </div>
        </div>



@endsection