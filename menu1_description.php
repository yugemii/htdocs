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
    //방문자 조회수 무한 F5 방지 - 쿠키값 이용함.
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
    <body>
        <header>
            <h1><a href="index.php">환영해요, 보안의 숲</a></h1>
        </header>
        <div id="board_read">
        <h2><?=$board['title']?></h2>
            <div id="user_info">
			<?=$board['name']?> <?=$board['date']?> 조회수: <?=$board['hit']?> 추천수:<?=$board['likes_count']?>
			<div id="bo_line"></div>
			</div>
            <div>
            <button>파일</button> <a href="./upload/<?=$board['file']?>" download = "<?=$board['file']?>"><?=$board['file']?></a>
            </div>
			<div id="bo_content">
                <?=$board['content']?>
			</div>
                <button onclick="location.href='process_up.php?idx=<?=$bno?>'">추천하기</button>
                <a href="menu1.php"><button>목록</button></a>
                <a href="update.php?idx='<?=$bno?>'"><button>수정</button></a>
                <a href="delete.php?idx='<?=$bno?>'"><button>삭제</button></a>
            </div>

        <div class="comment_view">
            <h3>댓글목록</h3>
                <?php
                    $comment_sql = mysqli_query($conn, "select * from comment1 where idx='".$bno."' order by idx desc");
                    while($reply = $comment_sql->fetch_array()){ 
                ?>
                <ul class="comment_list">
                    <li><?=$reply['comment']?> 작성자 : <?=$reply['uid']?></li>
                </ul>
        <?php } ?>
        <div class="dap_ins">
            <form action="process_comment1.php?idx=<?=$bno?>" method="post">
                <div style="margin-top:10px; ">
                    <textarea name="comment" rows="5" cols="55" placeholder="댓글을 입력하세요." maxlength="300" required></textarea>
                    <button type="submit">등록</button>
                </div>
            </form>
            </div>
        </div>
    </body>
</html>