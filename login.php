<?php
    include "already_login.php";
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
         $useremail = $row['email'];
         if(password_verify($password, $db_pwd)) {
            $search = mysqli_query($conn, "SELECT * FROM users WHERE uid='".$username."' AND pwd='".$password."' AND active='1'"); 
            $match  = mysqli_fetch_array($search);
            if($match==true){
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['useremail'] = $useremail;
                echo "<script>location.href='board.php';</script>";
            }else{
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['useremail'] = $useremail;
                echo '<script>
                alert("계정이 활성화되지 않았습니다. 이메일 인증을 진행해주세요.");
                location.href="verify_email.php";</script>';
            }
         } else {
            $wp = 1;
         }
    } else {
       $wu = 1;
    }
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
        <a href="register.php">회원이 아니신가요?</a><br>
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