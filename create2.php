<!-- <?
    include "lib.php";

    $isLogin = $_SESSION['isLogin'];
    if(!$isLogin){
        ?>
        로그인 후 이용해주세요.</br>
        <a href="login.php"><input type="button" value="로그인"></a>
    <?}?> -->

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
            <h1><a href="/menu2.php">시스템 해킹 게시판</a></h1>
        <div id="write_area">
            <form action="process_create2.php" method="POST">
                <div id="in_title">
                <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
                </div>
                <div class="wi_line"></div>
                <div id="in_name">
                <textarea name="name" id="uname" rows="1" cols="55" placeholder="글쓴이" maxlength="100" required></textarea>
                </div>
                <div class="wi_line"></div>
                <div id="in_content">
                <textarea name="content" id="ucontent" placeholder="내용" required></textarea>
                </div>
                <div id="in_pw">
                <input type="password" name="pw" id="upw"  placeholder="비밀번호" required />  
                </div>
                <div class="bt_se">
                <button type="submit">글 작성</button>
                </div>
                <!-- <p><input type="text" name="title" placeholder="title"></p>
                <p><textarea name="description" placeholder="description"></textarea></p>
                <p><input type="submit"></p> -->
            </form>
        </div>
        </div>
    </body>
</html>