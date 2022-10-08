<?php
    include "lib.php";
    $bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
    $heart = $_GET['heart'];
    if ($heart){
        $likes_count = "UPDATE menu1 SET likes_count = likes_count + 1 WHERE idx='$bno'";
    }
?>