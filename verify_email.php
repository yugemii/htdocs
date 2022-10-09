<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/board.css">
</head>
<body>
<?php
    $uid = $_SESSION['username'];
    $email = $_SESSION['useremail'];
?>
<div class="board_menu">
    <a href="process_verify.php?uid=<?=$uid?>&email=<?=$email?>" class="menu2_btn">이메일 인증하기</a>
</div>
</body>
</html>