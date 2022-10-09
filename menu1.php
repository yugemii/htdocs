<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '990820', 'web');
    $sql = "SELECT * FROM menu1";
    $result = mysqli_query($conn, $sql);
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
        <div id="board_area"> 
        <h1>웹 해킹 게시판</h1>
        <h4>환영해요, 웹 해킹의 숲</h4>
        <table class="list-table">
        <thead>
            <tr>
            <th width="70">번호</th>
            <th width="500">제목</th>
            <th width="120">글쓴이</th>
            <th width="100">작성일</th>
            <th width="100">조회수</th>
            <th width="100">추천수</th>
            </tr>
        </thead>
            <?php
            // board테이블에서 idx를 기준으로 내림차순해서 5개까지 표시
            $sql = "SELECT * FROM menu1 ORDER BY idx DESC LIMIT 0,10";
            $result = mysqli_query($conn, $sql);
            while($board = $result->fetch_array())
            {
            //title변수에 DB에서 가져온 title을 선택
            $title = $board["title"]; 
            if(strlen($title)>30)
            { 
            //title이 30을 넘어서면 ...표시
                $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
            }
            ?>
        <tbody>
            <tr>
            <td width="70"><?=$board['idx']?></td>
            <td width="500"><a href="/menu1_description.php?idx=<?=$board["idx"]?>"><?=$title?></a></td>
            <td width="120"><?=$board['name']?></td>
            <td width="100"><?=$board['date']?></td>
            <td width="100"><?=$board['hit']?></td>
            <td width="100"><?=$board['likes_count']?></td>
            </tr>
        </tbody>
        <?php } ?>
        </table>
        <div id="write_btn">
            <a href="create.php"><button>글쓰기</button></a>
        </div>
        </div>
    </body>
</html>