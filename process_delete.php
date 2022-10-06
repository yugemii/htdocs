<?php
    include "lib.php";
    $bno = $_POST['idx'];
    $sql = "DELETE
    FROM menu1
    WHERE
        idx = $bno
    ";

    $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/main.css">
        <title>환영해요, 보안의 숲</title>
    </head>
    <body>
    <header>
        <h1><a href="index.php">환영해요, 보안의 숲</a></h1>
        <div class="button">
            <button>로그인</button>
            <button>회원가입</button>
        </div>
    </header>
    <session id = "main">
        <div class = "board">
        <?php
            if($result == true){
                echo ('게시글이 정상적으로 삭제되었습니다. <a href="menu1.php">목록으로 돌아가기</a>');
            } else {
                echo ("게시글이 삭제되지 않았습니다.");
                error_log(mysqli_error($conn));
            }?>
        </div>
    </session>
    </body>
</html>