<?php
    $conn = mysqli_connect("localhost", "root", "990820", "web");
    //보안적으로 모든 권한을 가지고 있는 관리자 계정으로 접속하기보다는 사용자 계정 접속 권장
    //추후 업데이트 예정
    $sql = "INSERT INTO topics
    (title, description, created)
    VALUES(
    '{$_POST['title']}',
    '{$_POST['description']}',
    NOW()
    ";

    mysqli_query($conn, $sql);

    echo $sql;
?>