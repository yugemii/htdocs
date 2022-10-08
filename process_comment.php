<?php
    include "lib.php";
    $bno = $_GET['idx'];
    $comment_uid = $_SESSION['username'];
    $comment = $_POST['comment'];

    if($bno!=NULL && $comment_uid!=NULL && $comment!=NULL) {
        $sql = "INSERT INTO comment (idx, uid, comment) VALUES ('".$bno."', '".$comment_uid."', '".$comment."');";
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('댓글이 작성되었습니다.'); 
        location.href='menu1_description.php?idx=$bno';</script>";
    } else {
        echo "<script>alert('댓글 작성에 실패했습니다.'); 
        history.back();</script>";
    }
    
?>