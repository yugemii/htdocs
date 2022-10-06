<?php
    include "lib.php";
    $bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
    $hit = mysqli_fetch_array(mysqli_query($conn, "select * from menu1 where idx ='".$bno."'"));
    $hit = $hit['hit'] + 1;
    $fet = mysqli_query($conn, "update menu1 set hit = '".$hit."' where idx = '".$bno."'");
    $sql = mysqli_query($conn, "select * from menu1 where idx='".$bno."'"); /* 받아온 idx값을 선택 */
    $board = $sql->fetch_array();
    // include "lib.php";
    // $idx = $_GET['idx'];
    // $sql = "SELECT * FROM menu1 WHERE idx={$_GET['idx']}";
    // $result = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_array($result);
    // $article = array(
    //     'name'=>$row['name'],
    //     'title'=>$row['title'],
    //     'content'=>$row['content'],
    //     'date'=>$row['date'],
    //     'hit'=>$hit['hit']
    // );
    // $hit = $article['hit'] + 1;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/board.css">
        <title>이유경의 웹 사이트</title>
    </head>
    <body>
        <header>
            <h1><a href="index.php">환영해요, 보안의 숲</a></h1>
            <div class="button">
                <button>로그인</button>
                <button>회원가입</button>
            </div>
        </header>
        <div id="board_read">
        <h2><?php echo $board['title']; ?></h2>
            <div id="user_info">
			<?php echo $board['name']; ?> <?php echo $board['date']; ?> 조회:<?php echo $board['hit']; ?>
			<div id="bo_line"></div>
			</div>
			<div id="bo_content">
                <?php echo $board['content']; ?>
				<!-- <?php echo nl2br($board['content']); ?> -->
			</div>
	<!-- 목록, 수정, 삭제 -->
                <a href="menu1.php"><button>목록</button></a>
                <a href="update.php?idx=<?=$_GET['idx']?>"><button>수정</button></a>
                <a href="delete.php?idx=<?=$_GET['idx']?>"><button>삭제</button></a>
        </div>
        <!-- <session id = "main">
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
        </session> -->
    </body>
</html>