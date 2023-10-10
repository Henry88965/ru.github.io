<?php
    $cons=mysqli_connect(
        'localhost',
        'henry',
        'Hh7016979'
    ) or die("Fail to connect ! <br>");

    $db="BUYBUY";

    if(!mysqli_select_db($cons, $db)){
        echo "DB connect fail<br>";
    }
    else{
        echo "Connect DB Succes<br>";
    }




?>