<?php 
    include "lib.php";
    $username = $_POST['userid'];
    $password = $_POST['userpw'];
    $password_confirm = $_POST['confirm_pwd'];

    if (isset($username)) {
        $sql = "SELECT * FROM users WHERE uid='".$username."'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        if(isset($row)) {
            $db_uid = $row['uid'];
        }
        
        if ( $username == $db_uid ) {
            $wu = 1;
        } elseif ( $password != $password_confirm ) {
            $wp = 1;
        } else {
            $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);
            $add_user = "INSERT INTO users (uid, pwd) VALUES ('$username', '$hashed_pwd')";
            mysqli_query($conn, $add_user);
            echo "<script>alert('회원가입이 완료되었습니다. 다시 로그인 해주세요.');
            location.href='login.php';</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 페이지</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/board.css">
</head>
<body>
<div id="board_write">
    <h1>회원 가입</h1>
    <div id="write_area">
        <form action="register.php" method="POST">
            <div id="in_title">
            <input type="username" name="userid" placeholder="아이디" maxlength="100" required>
            </div>
            <div id="in_title">
            <input type="password" name="userpw" placeholder="비밀번호" maxlength="100" required>
            </div>
            <div id="in_title">
            <input type="password" name="confirm_pwd" placeholder="비밀번호 확인" required>
            </div>
            <div id="in_title">
            <a href="verify_email.php" target="_blank"><button>이메일 인증</button></a> 
            </div>
            <div class="bt_se">
            <button type="submit">회원가입</button>
            </div>
            <?php
                if ($wu == 1) {
                    echo "이미 존재하는 아이디입니다.";
                }
                if ($wp == 1) {
                    echo "비밀번호가 일치하지 않습니다.";
                }
            ?>
        </form>
    </div>
</div>
</body>
</html>