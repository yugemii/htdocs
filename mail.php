<!-- <?
    include('src/Exception.php');
    include('src/PHPMailer.php');
    include('src/SMTP.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    include "lib.php";

    $email = $_GET['email'];
    $hash = $_GET['hash'];

    $reg_msg = 'True';
    
    $mail = new PHPMailer(true);
    $mail->IsSMTP();

        // $random = rand (1000000000,9999999999);
        // $date = $time = date("YmdHis");
        // $verify_code = $date.$time.$username;
        // $is_verify = 0;

        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";
        // $mail->Username   = "MYEMAIL";
        // $mail->Password   = "MYPASSWORD";


        $mail->SetFrom($email, 'email verify');
        $mail->AddAddress($email, $hash);

        $mail->Subject = 'Email verify!';        // 메일 제목
        $mail->MsgHTML("Email verify! http://127.0.0.1/verify_email.php?email=".$email."&hash=".$hash);

        $mail->SMTPKeepAlive = true;
        $mail->Send();
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>이메일 인증 페이지</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/board.css">
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
<div id="board_write">
    <h1>이메일 인증</h1>
    <div id="write_area">
        <form action="verify_email.php" method="POST">
            <div id="in_title">
            <input type="email" name="form_user" placeholder="test@example.com" maxlength="100" required>
            </div>
            <?php
                $to = trim($_POST['form_user']); // 받는사람 메일주소 
                $ptn = "'/^[a-zA-Z]{1}[a-zA-Z0-9.\-_]+@[a-z0-9]{1}[a-z0-9\-]+[a-z0-9]{1}\.(([a-z]{1}[a-z.]+[a-z]{1})|([a-z]+))$/'"; //정규표현식
                if(!preg_match_all($ptn, $to)){
                    // Return Error - Invalid Email
                    echo "이메일 형식이 올바르지 않습니다.";
                }
            ?>
            <div class="bt_se">
            <button type="submit">이메일 인증</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>