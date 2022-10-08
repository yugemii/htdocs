<?php
    include "lib.php";
    $bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
    $hit = mysqli_fetch_array(mysqli_query($conn, "select * from menu2 where idx ='".$bno."'"));
    $hit = $hit['hit'] + 1;
    $fet = mysqli_query($conn, "update menu2 set hit = '".$hit."' where idx = '".$bno."'");
    $sql = mysqli_query($conn, "select * from menu2 where idx='".$bno."'"); /* 받아온 idx값을 선택 */
    $board = $sql->fetch_array();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/board.css">
        <title>환영해요, 유개미의 숲</title>
    </head>
    <body>
        <header>
            <h1><a href="index.php">환영해요, 보안의 숲</a></h1>
        </header>
        <div id="board_read">
        <h2><?php echo $board['title']; ?></h2>
            <div id="user_info">
			<?php echo $board['name']; ?> <?php echo $board['date']; ?> 조회:<?php echo $board['hit']; ?>
			<div id="bo_line"></div>
			</div>
            <div>
            파일 : <a href="./upload/<?=$board['file']?>" download = "<?=$$board['file']?>"><?=$board['file']?></a>
            </div>
			<div id="bo_content">
                <?php echo $board['content']; ?>
				<!-- <?php echo nl2br($board['content']); ?> -->
			</div>
	<!-- 목록, 수정, 삭제 -->
                <a href="menu2.php"><button>목록</button></a>
                <a href="update2.php?idx=<?=$_GET['idx']?>"><button>수정</button></a>
                <a href="delete2.php?idx=<?=$_GET['idx']?>"><button>삭제</button></a>
        </div>
    </body>
</html>