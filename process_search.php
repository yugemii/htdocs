<?php 
  include "lib.php";
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>환영해요, 유개미의 숲</title>
<link rel="stylesheet" type="text/css" href="/css/main.css">
<link rel="stylesheet" type="text/css" href="/css/board.css">
</head>
<body>
<div id="board_area"> 
<?php
    //검색 변수 초기화.
    $menu_sel = $_GET['menu_sel'];
    $catgo = $_GET['catgo'];
    $search = $_GET['search'];
?>
  <h1><?=$catgo?>에서 '<?=$search?>'검색결과</h1>

  <h4 style="margin-top:30px;"><a href="index.php">홈으로</a></h4>

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
        if($catgo == "all"){
            $sql = "SELECT * FROM $menu_sel WHERE (name like '%$search%') or (content like '%$search%') order by idx desc";
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
            <td width="500"><a href="<?=$menu_sel?>_description.php?idx=<?=$board["idx"]?>"><?=$title?></a></td>
            <td width="120"><?php echo $board['name']?></td>
            <td width="100"><?php echo $board['date']?></td>
            <td width="100"><?php echo $board['hit']?></td>
            <td width="100"><?php echo $board['likes_count']?></td>
            </tr>
        </tbody>
        <?php } 
      }
      ?>
        <?php
            $sql = "SELECT * FROM $menu_sel WHERE $catgo like '%$search%' order by idx desc";
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
            <td width="500"><a href="<?=$menu_sel?>_description.php?idx=<?=$board["idx"]?>"><?=$title?></a></td>
            <td width="120"><?php echo $board['name']?></td>
            <td width="100"><?php echo $board['date']?></td>
            <td width="100"><?php echo $board['hit']?></td>
            <td width="100"><?php echo $board['likes_count']?></td>
            </tr>
        </tbody>
        <?php } ?>
    </table>

    <div id="search_box2">
        <form action="process_research.php" method="get">
            <select name="menu_sel">
                <option value="menu1">웹 해킹</option>
                <option value="menu2">시스템 해킹</option>
            </select>
            <select name="catgo">
                <option value="title">제목</option>
                <option value="content">내용</option>
                <option value="all">제목 + 내용</option>
            </select>
            <input type="text" name="search" size="40" required="required"><button>검색</button>
        </form>
    </div>
</div>
</body>
</html>