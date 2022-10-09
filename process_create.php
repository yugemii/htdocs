<?php
    include "lib.php";
    
    if($_FILES['upload_file'] != NULL){
        $tmp_name = $_FILES['upload_file']['tmp_name'];
        $name = $_FILES['upload_file']['name'];
        $up = move_uploaded_file($tmp_name, "./upload/$name");
        
    }

    $sql = "INSERT INTO menu1
    (name, title, content, date, file)
    VALUES(
    '{$_SESSION['username']}',
    '{$_POST['title']}',
    '{$_POST['content']}',
    NOW(),
    '$name'
    )";

    $result = mysqli_query($conn, $sql);

    if($result == true){
        echo ('게시글이 정상적으로 게시되었습니다. <a href="menu1.php">돌아가기</a>');
    } else {
        echo ("게시글 게시가 되지 않았습니다.");
        error_log(mysqli_error($conn));
        //아팟치 서버의 에러 로그에 기록됨.
        //절대로 사용자에게 어디서 에러가 났는지 보여주면 안됨.
    }
?>