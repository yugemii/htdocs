<?php
    $conn = mysqli_connect('localhost', 'root', '990820', 'web');
    $sql = "SELECT * FROM topics";
    $result = mysqli_query($conn, $sql);

    $sql = "SELECT * FROM topics WHERE id={$_GET['id']}";
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
                    <li><a href="#">메뉴1</a></li>
                    <li><a href="#">메뉴2</a></li>
                    <li><a href="#">메뉴3</a></li>
                    <li><a href="#">메뉴4</a></li>
                    <li><a href="#">메뉴5</a></li>
                </ul>
            </nav>
            <div class = "board">
                 <form action="process_update.php" method="POST">
                    <p><input type="text" name="title" placeholder="title" value="<?=$article['title']?>"></p>
                    <p><textarea name="description" 
                    placeholder="description" value="<?=$article['description']?>"></textarea></p>
                    <p><input type="submit"></p>
                 </form>
            </div>
        </session>

        <footer>
            <address>광주광역시 동구 필문대로</address>
        </footer>

    </body>
</html>