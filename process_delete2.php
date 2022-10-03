<?php
    $conn = mysqli_connect('localhost', 'root', '990820', 'web');
    settype($_POST['id'], 'integer');
    $sql = "DELETE
    FROM menu2
    WHERE
        id = {$_POST['id']}
    ";

    $result = mysqli_query($conn, $sql);

    if($result == true){
        echo ('게시글이 정상적으로 삭제되었습니다. <a href="menu1.php">목록으로 돌아가기</a>');
    } else {
        echo ("게시글이 삭제되지 않았습니다.");
        error_log(mysqli_error($conn));
    }
?>