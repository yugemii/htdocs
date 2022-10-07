<?php
    // session_start();

    // error_reporting(1);
    // ini_set("display_errors", 1);
   
    $conn = mysqli_connect("localhost", "root", "990820", "web");

    if(mysqli_connect_error()){
        echo "접속 중 오류가 발생했습니다.";
        echo mysqli_connect_error();
    }
?>