<?php
	include "lib.php";
	$bno = $_GET['idx'];
    $query = "SELECT * FROM menu2 WHERE idx=$bno";
    $likes = "UPDATE menu2 SET likes_count = likes_count + 1 WHERE idx=$bno";
    $conn->query($likes);
?>
    <script type="text/javascript">alert("게시글을 추천했습니다.");</script>
    <meta http-equiv="refresh" content="0 url=./menu2.php">