<?php
    include "lib.php";
    //보안적으로 모든 권한을 가지고 있는 관리자 계정으로 접속하기보다는 사용자 계정 접속 권장
    $sql = "INSERT INTO menu1
    (name, pw, title, content, date)
    VALUES(
    '{$_POST['name']}',
    '{$_POST['password']}',
    '{$_POST['title']}',
    '{$_POST['content']}',
    NOW()
    )";
    //순수하게 사용자가 입력한 title, description 정보를 대입하면 공격 당할 수 있음. -> 필터링 기능 필요.

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