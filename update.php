<?php
    include "lib.php";
    $sql = "SELECT * FROM menu1 WHERE idx={$_GET['idx']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $board = array(
        'title'=>$row['title'],
        'name'=>$row['name'],
        'content'=>$row['content']
    );
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
        <header>
            <h1><a href="index.php">환영해요, 보안의 숲</a></h1>
            <div class="button">
                <button>로그인</button>
                <button>회원가입</button>
            </div>
        </header>
        <div id="board_write">
        <h1><a href="menu1.php">웹 해킹 게시판</a></h1>
            <div id="write_area">
                <form action="process_update.php?idx=<?php echo $_GET['idx']; ?>" method="post">
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required><?php echo $board['title']; ?></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_name">
                        <textarea name="name" id="uname" rows="1" cols="55" placeholder="글쓴이" maxlength="100" required><?php echo $board['name']; ?></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="내용" required><?php echo $board['content']; ?></textarea>
                    </div>
                    <div id="in_pw">
                        <input type="password" name="pw" id="upw"  placeholder="비밀번호" required />  
                    </div>
                    <div class="bt_se">
                        <button type="submit">글 작성</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- <session id = "main">
            <div class = "board">
                 <form action="process_update.php" method="POST">
                    <input type ="hidden" name="idx" value="<?=$_GET['idx']?>">
                    <p><input type="text" name="title" placeholder="title" value="<?=$article['title']?>"></p>
                    <p><textarea name="description" 
                    placeholder="description" value="<?=$article['description']?>"></textarea></p>
                    <p><input type="submit"></p>
                 </form>
            </div>
        </session> -->
    </body>
</html>