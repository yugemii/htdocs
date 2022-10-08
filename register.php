<?php 
    include "lib.php";
    $username = $_POST['userid'];
    $password = $_POST['userpw'];
    $password_confirm = $_POST['confirm_pwd'];
    // 이메일 인증
    $email = $_POST['email'];
    $hash = md5( rand(0,1000) );
    $ptn = "'/^[a-zA-Z]{1}[a-zA-Z0-9.\-_]+@[a-z0-9]{1}[a-z0-9\-]+[a-z0-9]{1}\.(([a-z]{1}[a-z.]+[a-z]{1})|([a-z]+))$/'"; //정규표현식
    
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
            $add_user = "INSERT INTO users (uid, pwd, email, hash) VALUES ('$username', '$hashed_pwd', '$email', '$hash')";
            mysqli_query($conn, $add_user);
            // include "mail.php?email='.$email.'&hash='.$hash.'";           
            // $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);
            // $add_user = "INSERT INTO users (uid, pwd, email, hash) VALUES ('$username', '$hashed_pwd', '$email', '$hash')";
            // mysqli_query($conn, $add_user);
            echo "<script>alert('회원가입이 완료되었습니다. 로그인 후 이메일 인증을 해주세요.');
            location.href='login.php';</script>";
            }
    }
?>
<!-- <script>
function check() {
	form = document.sendmail;
	if ( form.form_user.value == '' ) {
		alert('받는사람의 메일 주소를 입력해주세요.');
		form.form_user.focus();
		return false;
	}
	/*if ( form.subject.value == '' ) {
		alert('메일 제목을 입력해주세요.');
		form.subject.focus();
		return false;
	}*/

	form.submit();
}
</script> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 페이지</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/board.css">
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
<div id="board_write">
    <h1>회원 가입</h1>
    <div id="write_area">
        <form action="register.php" method="POST">
            <input type="hidden" name="hash" value='<?=$hash?>'>
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
            <input type="email" name="email" placeholder="test@example.com" maxlength="100" required>
            </div>
            <div class="in_title">
            <button type="submit">회원가입</button>
            </div>
            <?php
                if(!preg_match_all($ptn, $email)){
                    // Return Error - Invalid Email
                    echo "이메일 형식이 올바르지 않습니다.";
                }
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