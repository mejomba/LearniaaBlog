<?php

////$num = $_POST['num'];

$num = $_GET['num'];


$link = mysqli_connect("localhost", "root", "", "test");

if ($link == false) {
    die("ERROR: Could not connect. "
                .mysqli_connect_error());
}

$sql = 'SELECT * FROM table_1 WHERE id='. "'".$num ."'";
if ($res = mysqli_query($link, $sql))
{

        while ($row = mysqli_fetch_array($res))
        {
            echo$row['text'];

        }


    }

else
{
    echo "ERROR: Could not able to execute $sql. ".mysqli_error($link);
}

mysqli_close($link);

?>
