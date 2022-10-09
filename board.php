<?php 
    include "lib.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>환영해요, 유개미의 숲</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/board.css">

</head>
<body>
    <header>
        <h1 style="margin-top:30px;">안녕하세요. <?=$_SESSION['username']?> 님!</h1>
        <div class="button">
            <a href="logout.php"><button>로그아웃</button></a>
        </div>
    </header>
    <session id="main">
        <div class="board_menu">
            <a href="menu1.php" class="menu1_btn">웹 해킹 게시판</a>
            <a href="menu2.php" class="menu2_btn">시스템 해킹 게시판</a>
            <a href="process_verify.php?uid=<?=$_SESSION['username']?>" class="menu2_btn">이메일 인증하기</a>
        </div>
        <div id="search_box">
        <form action="process_search.php" method="get">
            <select name="menu_sel">
                <option value="menu1">웹 해킹</option>
                <option value="menu2">시스템 해킹</option>
            </select>
            <select name="catgo">
                <option value="title">제목</option>
                <option value="content">내용</option>
                <option value="all">제목 + 내용</option>
            </select>
            <input type="text" name="search" size="40" required="required"><button>검색</button>
        </form>
        </div>
    </session>
</body>
</html>