<?php
    include "lib.php";
    $sql = "SELECT * FROM menu1";
    $result = mysqli_query($conn, $sql);
    $list = '';
    while($row = mysqli_fetch_array($result)) {
        $list = $list."<li><a href=\"menu1_description.php?id={$row['id']}\">{$row['title']}</a></li>";
}
    $sql = "SELECT * FROM menu1 WHERE idx={$_GET['idx']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article = array(
        'title'=>$row['title'],
        'content'=>$row['content']
    );

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
                <h2><?=$article['title']?></h2>
                <p><?=$article['content']?></p>
                <a href="menu1.php"><button>목록</button></a>
                <a href="update.php?idx=<?=$_GET['idx']?>"><button>수정</button></a>
                <a href="delete.php?idx=<?=$_GET['idx']?>"><button>삭제</button></a>
                <form action="process_comment" method="POST">
                    <input type="text" name="comment">
                    <input type="button" value="등록">
                </form>
            </div>
        </session>
    </body>
</html>