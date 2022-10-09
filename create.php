<?php
    include "lib.php";
    if(isset($_SESSION['username']) == NULL){
        echo "<script>
        alert('로그인 후 이용해주세요.');
        location.href='login.php';
        </script>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/board.css">
        <title>환영해요, 보안의 숲</title>
    </head>
    <body>
        <div id="board_write">
            <h1><a href="/menu1.php">웹 해킹 게시판</a></h1>
        <div id="write_area">
            <form action="process_create.php" method="POST" enctype="multipart/form-data">
                <div id="in_title">
                <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
                </div>
                <div class="wi_line"></div>
                <div id="in_name">
                작성자 : <?=$_SESSION['username']?>
                </div>
                <div class="wi_line"></div>
                <div id="in_content">
                <textarea name="content" id="ucontent" placeholder="내용" required></textarea>
                </div>
                <div id="in_file">
                <input type="file" name="upload_file">
                </div>
                <div class="bt_se">
                <button type="submit">글 작성</button>
                </div>
            </form>
        </div>
        </div>
    </body>
</html>