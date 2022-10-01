<?php
    $conn = mysqli_connect('localhost', 'root', '990820', 'web');
    settype($_POST['id'], 'integer');
    $sql = "UPDATE topics
    SET 
        title = '{$_POST['title']}',
        description = '{$_POST['description']}'
    WHERE
        id = {$_POST['id']}
    ";

    $result = mysqli_query($conn, $sql);

    if($result == true){
        echo ('게시글이 정상적으로 수정되었습니다. <a href="menu1.php">목록으로 돌아가기</a>');
    } else {
        echo ("게시글이 수정 되지 않았습니다.");
        error_log(mysqli_error($conn));
    }
?>