<?php
    include "already_login.php";
    include "lib.php";

    if ( $login ) {
        header('Location: board.php');
    }

    $username = $_POST['uid'];
    $password = $_POST['pwd'];

    $sql = "SELECT * FROM users WHERE uid='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    
    if(isset($row)){
         $db_pwd = $row['pwd'];
         if(password_verify($password, $db_pwd)) {
            session_start();
            $_SESSION['username'] = $username;
            echo "<script>location.href='board.php';</script>";
         } else {
            $wp = 1;
         }
    } else {
       $wu = 1;
    }

    // if ( $username ) {
    //     $sql = "select * from users where uid='".$username."' ";
    //     $result = mysqli_query($conn, $sql);
    //     $row = mysqli_fetch_array($result);

    //     while( $row ) {
    //         $hash_password = $row['pwd'];
    //     }
    //     if ( !$hash_password ) {
    //         $wu = 1;
    //     } else {
    //         if ( password_verify($password, $hash_password) ) {
    //             session_start();
    //             $_SESSION['username'] = $username;
    //             echo "<script>location.href='board.php';</script>";
    //         } else {
    //             $wp = 1;
    //         }
    //     }
    // }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인 페이지</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/board.css">
</head>
<body>
    <div id="board_write">
    <div id="write_area">
        <form action="login.php" method="POST">
            <div id="in_title">
                <input type="text" name="uid" placeholder="아이디" required>
            </div>
            <div id="in_pw">
                <input type="password" name="pwd" placeholder="비밀번호" required>
            </div>
            <div class="bt_se_left">
                <button type="submit">로그인</button>
            </div>
        </form>
        <a href="register.php">회원이 아니신가요?</a>
        <?php 
                if ( $wu == 1 ){
                    echo "<p style='color:red;'>아이디가 입력되지 않았거나 아이디가 존재하지 않습니다.</p>";
                }
                if ( $wp == 1 ){
                    echo "<p style='color:red;'>비밀번호가 틀렸습니다.</p>";
                }
        ?>
    </div>
    </div>
</body>
</html>