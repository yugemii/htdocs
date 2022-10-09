<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "990820", "web");

    if(mysqli_connect_error()){
        echo "접속 중 오류가 발생했습니다.";
        echo mysqli_connect_error();
    }
?>