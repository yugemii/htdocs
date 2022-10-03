<?php
    $conn = mysqli_connect('localhost', 'root', '990820', 'web');
    settype($_POST['id'], 'integer');
    $sql = "DELETE
    FROM menu1
    WHERE
        id = {$_POST['id']}
    ";

    $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/main.css">
        <title>이유경의 웹 사이트</title>
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Gugi&family=Noto+Sans+KR:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <h1 class="site_name"><a href="index.php">환영해요, 보안의 숲</a></h1>
            <div class="right-top">
                <a href="login.html"><button class="login">로그인</button></a>
                <a href="signup"><button class="signup" href="/signup.html">회원가입</button></a>
            </div>
        </header>
        <session id = "main">
            <nav class = "menu">
                <ul class="list">
                    <li><h2>메뉴</h2></li>
                    <li><a href="menu1.php">웹 해킹</a></li>
                    <li><a href="menu2.php">시스템 해킹</a></li>
                </ul>
            </nav>
            <div class = "board">
                 <?php
                    if($result == true){
                        echo ('게시글이 정상적으로 삭제되었습니다. <a href="menu1.php">목록으로 돌아가기</a>');
                    } else {
                        echo ("게시글이 삭제되지 않았습니다.");
                        error_log(mysqli_error($conn));
                    }
                 ?>
            </div>
        </session>

        <footer>
            <address>광주광역시 동구 필문대로</address>
        </footer>

    </body>
</html>