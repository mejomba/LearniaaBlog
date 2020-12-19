@extends('Layouts.layout_main_user')

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
                
              
   <form method="GET" action="{{route('user.vote.store',$votes->pk_vote)}}" enctype="multipart/form-data" style="min-height:270px;">
        @csrf

        <div class="text-center"><h3>{{$votes->question}}</h3></div>
                
                @php $answers = json_decode($votes->extras,false) @endphp
                                    
              
              @foreach($answers[0] as $answer => $value)
     <div class="col-md-4">
        <div class="form-group">
                   
                      
                      <input class="form-check-input" type="radio" name="answer" id="exampleRadios1" value="{{$value}}">
                      <label class="form-check-label" for="exampleRadios1">
                      {{$value}}
                    </div>
                  </div>
               @endforeach



 <!--                json process            -->  
 
      
                
                  <div class="text-center" style="padding-top:20px">
                   <button type="submit" class="btn btn-primary">ثبت درخواست</button> 
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