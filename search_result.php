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
  <h1><?php echo $catagory; ?>에서 '<?php echo $search_con; ?>'검색결과</h1>
  <h4 style="margin-top:30px;"><a href="index.php">홈으로</a></h4>
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
            if($menu_sel==1) { //전체 게시판 검색 기능 구현 필요함.
              $sql2 = "(select * from menu1 where $catagory like '%$search_con%')
              UNION ALL (select * from menu2 where $catagory like '%$search_con%')";

              $row = mysqli_query($conn, $sql2);

              while($board = $row->fetch_array()){
                $bno=$board['idx'];
                $title=$board["title"];
                $name=$board['name'];
                $date=$board['date'];
                $hit=$board['hit'];
                if(strlen($title)>30)
                  { 
                    $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
                  }
            }
            } else {
              $sql1 = "select * from $menu_sel where $catagory like '%$search_con%' order by idx desc";
              // $sql2 = "select * from menu2 where $catagory like '%$search_con%' order by idx desc";
              $row = mysqli_query($conn, $sql1);
              // $row2 = mysqli_query($conn, $sql2);
    
              while($board = $row->fetch_array()){
                $bno=$board['idx'];
                $title=$board["title"];
                $name=$board['name'];
                $date=$board['date'];
                $hit=$board['hit'];
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
        </tr>
      </tbody>
    </table>
    <div id="search_box2">
      <form action="search_result.php" method="get">
      <select name="catgo">
        <option value="title">제목</option>
        <option value="name">글쓴이</option>
        <option value="content">내용</option>
      </select>
      <input type="text" name="search" size="40" required="required"/><button>검색</button>
    </form>
  </div>
</div>
</body>
</html>