@extends('site.Layouts.layout_main')
@section('Head')
    <title> لرنیا آکادمی | لرنیا </title>
    <meta name="description" content="لرنیا آکادمی  | لرنیا ">
    <meta name="keywords" content="نقشه راه لرنیا,چارت آموزشی لرنیا ,لرنیا آاکادمی">
@endsection
@section('content')
<div class="startpage">
    <input type="button" class="btn btn-primary" value="start" id="start" onclick="GoToEnterNamePage()">
</div>

<section class="enterName">
    <div class="enterNameContent">
        <div class="enterNameBody">
            <div class="inputName m-5">
                <input type="text" class="form-control w-100" placeholder="نام خود را وارد کنید..." id="inputName">
            </div>
            <div class="row btnStart">
                <input type="button" class="btn btn-info col-4 offset-4 mb-4" id="btnStart" onclick="GoToRoadMap()" value="start">
            </div>

        </div>
    </div>
</section>


<script>
    let id ;

function GoToEnterNamePage() {
    $.ajax({
        url: 'http://127.0.0.1:8000/api/GenerateNewUuid',
        data: {},
        error: function() {
            console.log('error')
        },
        dataType: 'jsonp',
        success: function(data) {
            JSON.parse(data);
           conole.log(data) ;
        },
        type: 'GET'
    });
    $('.startpage').css('display','none');
    $('.enterName').css('display','block');
}

function GoToRoadMap() {
    window.open("roadmap.blade.php",'_blank');
}
</script>
@endsection
