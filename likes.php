<?php
    include "lib.php";
    if(isset($_GET['idx']) && isset($_GET['heart']) && isset($_GET['uid'])){
        $idx = $_GET['idx'];
        $heart = $_GET['heart'];
        $uid = $_GET['uid'];

        // $search_sql = "SELECT * FROM menu1_up WHERE idx='$idx' AND uid='$uid'";
        // $search_result = mysqli_query($conn, $search_sql);
        // $search_row = mysqli_fetch_array($search_result);

        // if($search_row){
        //     echo "<script>이미 추천한 게시글입니다.</script>";
        // }
        
        if ($heart){
            $likes_count = "UPDATE menu1 SET likes_count = likes_count + 1 WHERE idx='$idx'";
            $likes = "INSERT INTO menu1_up (idx, uid) VALUES ('$idx', '$uid');";
        } else{
            $likes_count = "UPDATE menu1 SET likes_count = likes_count - 1 WHERE idx='$idx'";
            $likes = "DELETE FROM menu1_up WHERE idx = $idx";
        }
        mysqli_query($conn, $likes_count);
        mysqli_query($conn, $likes);
        mysqli_close($conn);
        //$heart가 1이 넘어왔다면 게시물의 카운트를 늘리고, menu1_up 테이블에 idx, uid 를 삽입한다.
        // 0이 넘어왔다면 게시물의 카운트를 줄이고, menu1_up 테이블에 idx, uid 를 삭제한다.
    }
?>