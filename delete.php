<?php
    include "lib.php";
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
            <form action="process_delete.php" method="POST">
            <p>정말로 삭제하시겠습니까?</p>
            <input type ="hidden" name="idx" value="<?=$_GET['idx']?>">
            <p><input type="submit" value="delete"></p>
            </form>
        </div>
    </session>
    </body>
</html>