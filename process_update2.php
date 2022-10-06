<?php
    include "lib.php";
    $bno = $_GET['idx'];
    $sql = "UPDATE menu2
    SET
        name = '{$_POST['name']}',
        title = '{$_POST['title']}',
        content = '{$_POST['content']}',
        pw = '{$_POST['pw']}'
    WHERE
        idx = $bno;
    ";

    $result = mysqli_query($conn, $sql);

    if($result == true){
        echo ('게시글이 정상적으로 수정되었습니다. <a href="menu2.php">목록으로 돌아가기</a>');
    } else {
        echo ("게시글이 수정 되지 않았습니다.");
        error_log(mysqli_error($conn));
    }
?>