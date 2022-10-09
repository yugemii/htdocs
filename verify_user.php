<?php
    include "lib,php";
    $uid = $_GET('uid');
    $search = mysqli_query($conn, "SELECT * FROM users WHERE uid=$uid AND active='1'");
    $match  = mysqli_fetch_array($search);
    if($match > 0){
        echo "<script>location.href='menu1.php';</script>";
    }else{
        echo '<script>alert("계정이 활성화되지 않았습니다. 이메일 인증을 진행해주세요.");
        location.href="board.php";</script>';
    }
?>