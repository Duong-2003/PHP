<?php
    $dbHost = "localHost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "tbl_shop_vpp";

    $connect = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);

    if($connect){
        $setLang = mysqli_query($connect, "SET NAMES 'utf8'");
        // echo"kết nối thành công";
    }
    else{
        die("Kết nối thất bại" . mysqli_connect_error());
    }
?>