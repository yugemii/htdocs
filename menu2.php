<?php
    include "lib.php";
    $sql = "SELECT * FROM menu2";
    $result = mysqli_query($conn, $sql);
    $list = '';
    while($row = mysqli_fetch_array($result)) {
        $list = $list."<li><a href=\"menu2_description.php?id={$row['id']}\">{$row['title']}</a></li>";
}
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
            </tr>
        </thead>
            <?php
            $sql = "select * from menu2 order by idx desc limit 0,10"; 
            $result = mysqli_query($conn, $sql);
            while($board = $result->fetch_array())
            {
            $title = $board["title"]; 
            if(strlen($title)>30)
            { 
                $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
            }
            ?>
        <tbody>
            <tr>
            <td width="70"><?php echo $board['idx']; ?></td>
            <td width="500"><a href=""><?php echo $title;?></a></td>
            <td width="120"><?php echo $board['name']?></td>
            <td width="100"><?php echo $board['date']?></td>
            <td width="100"><?php echo $board['hit']; ?></td>
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