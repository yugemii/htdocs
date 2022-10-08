<?php
    include "lib.php";
    $bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
    $is_count = false;
    if(!isset($_COOKIE["menu1_{$bno}"])){
        setcookie("menu1_{$bno}", $bno, time() + 60 * 60 );
        $is_count = true;
    } else {
        $sql = "select * from menu1 where idx='$bno'";
        $result = mysqli_query($conn, $sql);
        $board = $result->fetch_array();
    }

    if($is_count){
    $sql = "UPDATE menu1 SET hit = hit + 1 WHERE idx = '$bno'";
    $result = mysqli_query($conn, $sql);
    $sql = mysqli_query($conn, "select * from menu1 where idx='".$bno."'"); /* 받아온 idx값을 선택 */
    $board = $sql->fetch_array();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/board.css">
        <title>환영해요, 유개미의 숲</title>
    </head>
    <script src="https://kit.fontawesome.com/6478f529f2.js" crossorigin="anonymous"></script>
    <body>
        <header>
            <h1><a href="index.php">환영해요, 보안의 숲</a></h1>
        </header>
        <div id="board_read">
        <h2><?=$board['title']?></h2>
            <div id="user_info">
			<?=$board['name']?> <?=$board['date']?> 조회:<?=$board['hit']?>
			<div id="bo_line"></div>
			</div>
            <div>
            <button>파일</button> <a href="./upload/<?=$board['file']?>" download = "<?=$board['file']?>"><?=$board['file']?></a>
            </div>
			<div id="bo_content">
                <?=$board['content']?>
			</div>
            <!--likes_count는 현재 게시글의 id로 구분해서 가져오고, likes는 현재 게시글을 보고 있는 (로그인 한) 사용자로 구분해서 가져와야 한다.-->
            <?php
                $menu1_uid = $_SESSION['username'];
                $likes_sql = "SELECT * FROM menu1_up where idx='$bno' AND uid='$menu1_uid'";
                $likes_result = mysqli_query($conn, $sql);
                $likes_row = mysqli_fetch_array($result);
            ?>
            <?php
                if($likes_row){     
            ?>
                <div class = "likes">
                <a href = 'likes.php?idx=<?=$bno?>&heart=0&uid=<?=$menu1_uid?>'><i class="fas fa-heart red fa-2x"></i></a>
                <span class = "likes_count"><?=$board['likes_count']?></span>
                </div>
            <?php
            } else{?>      
                <div class = "likes">
                <a href = 'likes.php?idx=<?=$bno?>&heart=1&uid=<?=$menu1_uid?>'><i class="far fa-heart white fa-2x"></i></a>
                <span class = "likes_count"><?=$board['likes_count']?></span>
                </div>
            <?php }?>
	<!-- 목록, 수정, 삭제 -->
                <a href="menu1.php"><button>목록</button></a>
                <a href="update.php?idx='<?=$bno?>'"><button>수정</button></a>
                <a href="delete.php?idx='<?=$bno?>'"><button>삭제</button></a>
        </div>
    </body>
</html>