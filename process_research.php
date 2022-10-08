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
  /* 검색 변수 */
  $menu_sel = $_GET['menu_sel'];
  $catagory = $_GET['catgo'];
  $search_con = $_GET['search'];
?>
  <h1><?=$catagory?>에서 '<?=$search_con?>'검색결과</h1>

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
            if($catagory == 'all') {
              $sql2 = "select * from $menu_sel where name like '%$search_con%'
              OR content like '%$search_con%' order by idx desc";
              $result = mysqli_query($conn, $sql2);
              $row = mysqli_fetch_array($result);

              while($row){
                $bno=$row['idx'];
                $title=$row["title"];
                $name=$row['name'];
                $date=$row['date'];
                $hit=$row['hit'];
                $likes_count=$row['likes_count'];
                if(strlen($title)>30)
                  { 
                    $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
                  } //제목의 길이 조절해주는 역할.
              }
            } else {
              //제목 or 내용을 검색할 때 공통적인 것.
              $sql1 = "select * from $menu_sel where $catagory like '%$search_con%' order by idx desc";
              $result = mysqli_query($conn, $sql1);
              $row = mysqli_fetch_array($result);

              while($row){
                $bno=$row['idx'];
                $title=$row["title"];
                $name=$row['name'];
                $date=$row['date'];
                $hit=$row['hit'];
                $likes_count=$row['likes_count'];
                if(strlen($title)>30)
                  { 
                    $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
                  }
                }
            }
            ?>
      <tbody>
        <tr>
        <td width="70"><?=$bno?></td>
        <td width="500">
            <a href='<?=$menu_sel?>_description.php?idx=<?=$bno?>'><span style="background:#EFE66C;"><?=$title;?></span></a>
        </td>
        <td width="120"><?=$name?></td>
        <td width="100"><?=$date?></td>
        <td width="100"><?=$hit?></td>
        <td width="100"><?=$likes_count?></td>
        </tr>
      </tbody>
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
                <option value="all">제목+내용</option>
            </select>
            <input type="text" name="search" size="40" required="required"><button>검색</button>
        </form>
    </div>
</div>
</body>
</html>