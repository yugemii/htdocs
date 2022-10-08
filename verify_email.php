<?php
    include "already_verify.php";

    $username = $_SESSTION['username'];

    $sql = "SELECT * FROM users WHERE uid='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if($row){
        $email = $row['email'];
        $hash = $row['hash'];
        $to = $email; // 받는사람 메일주소
        $subject = '메일 인증';
        $message = '해당 링크를 눌러서 인증을 완료하세요. http://127.0.0.1/process_email.php?email=".$email."&hash=".$hash';
        // $ptn = "'/^[a-zA-Z]{1}[a-zA-Z0-9.\-_]+@[a-z0-9]{1}[a-z0-9\-]+[a-z0-9]{1}\.(([a-z]{1}[a-z.]+[a-z]{1})|([a-z]+))$/'"; //정규표현식
    
        // html 메일을 보낼 때 꼭 이헤더가 붙어야한다.
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=utf-8';
    
        // Additional headers
        $headers[] = 'To: Kim<"uksohun1@gmail.com">';
        $headers[] = 'From: webmaster<uksohun1@gmail.com>';
        //$headers[] = 'Cc: Kim1<참조인1@naver.com>,Kim2<참조인2@gmail.com>';
        //$headers[] = 'Bcc: 숨은참조인3@gmail.com';
    
        mail($to, $subject, $message, implode("\r\n", $headers));
        echo "<script language=javascript> alert('메일의 링크를 눌러주세요!'); location.href='index.php'; </script>";
        // if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
        //     // Verify data
        //     $email = $_GET['email']; // Set email variable
        //     $hash = $_GET['hash']; // Set hash variable
        //     $search = mysqli_query($conn, "SELECT email, hash, active FROM users WHERE email='".$email."' AND hash='".$hash."' AND active='0'"); 
        //     $match  = mysqli_num_rows($search);
        //     if($match > 0){
        //         // We have a match, activate the account
        //         mysqli_query($conn, "UPDATE users SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'");
        //         echo '<div class="statusmsg">Your account has been activated, you can now login</div>'; 
        //     }else{
        //         echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
        //     }
        // }else{
        //     // Invalid approach
        //     echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
        // }

    }
?>