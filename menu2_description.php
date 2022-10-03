<?php
    $conn = mysqli_connect('localhost', 'root', '990820', 'web');
    $sql = "SELECT * FROM menu2";
    $result = mysqli_query($conn, $sql);
    $list = '';
    while($row = mysqli_fetch_array($result)) {
        $list = $list."<li><a href=\"menu2_description.php?id={$row['id']}\">{$row['title']}</a></li>";
}
    $sql = "SELECT * FROM menu2 WHERE id={$_GET['id']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article = array(
        'title'=>$row['title'],
        'description'=>$row['description']
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
                <p><?=$article['description']?></p>
                <a href="menu2.php"><button>목록</button></a>
                <a href="update2.php?id=<?=$_GET['id']?>"><button>수정</button></a>
                <a href="delete2.php?id=<?=$_GET['id']?>"><button>삭제</button></a>
            </div>
        </session>

        <footer>
            <address>광주광역시 동구 필문대로 309 조선대학교 컴퓨터공학과 재학</address>
        </footer>

    </body>
</html>