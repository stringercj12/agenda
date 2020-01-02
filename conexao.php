<?php 
    $localhost = "sql104.byetcluster.com";
    $name = "epiz_24573178";
    $pass = "p7EKGFX3Dpm";
    $banco = "epiz_24573178_agenda";

    $con = mysqli_connect($localhost,$name,$pass,$banco);
    mysqli_set_charset($con, "utf8");

?>