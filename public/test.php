
<input class="" type="text" id="num">
<button class="" onclick="f1()" value="click">Click</button>

<p>Form Area</p>

<div name="frm" id="frm" ></div>

<script src="jquery.min.js"></script>
<script>

    function f1()
    {
       var num =  $('#num').val();

        $.ajax({
                                url:  'http://localhost/data.php/' ,
                                data: {
                                      num: num
                                     },
                                 success: function(data)
                                {
                                   // alert(data);
                                    data = data + "<p> </p>";
                                    data = data + "<hr> </hr>";
                                    $('#frm').append(data);
                                },
                                 error: function(error)
                                {
                                   alert('Error' + error.status);
                                },
                                type: 'GET',
                            });



    }



 </script>



<script>

    function f2(element)
    {
        console.log(element);
    }
</script>
