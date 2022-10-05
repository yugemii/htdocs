<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/login.css">
        <title>이유경의 웹 사이트</title>
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Gugi&family=Noto+Sans+KR:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <h1 class="site_name"><a href="index.php">이유경의 웹 사이트</a></h1>
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
                <div id="login_wrap">
                    <div>
                        <h1>로그인 페이지</h1>
                        <form action="process_login.php" method="post" id="login_form">
                            <p><input type="text" name="id" id="userid" placeholder="ID"></p>
                            <p><input type="password" name="pw" id="userpw" placeholder="Password"></p>
                            <p><input type="submit" value="Login" class="login_btn"></p>
                        </form>
                        <p class="regist_btn">회원이 아니신가요?&nbsp;<a href="register.html">회원가입</a></p>
                    </div>
                </div>
            </div>
        </session>
        <footer>
            <address>광주광역시 동구 필문대로 309 조선대학교 컴퓨터공학과 재학</address>
        </footer>
        <script src="js/login.js"></script>
    </body>
</html>