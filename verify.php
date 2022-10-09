<?php
    include "lib.php";
             
    if(isset($_GET['email']) AND isset($_GET['hash'])){
    // Verify data
    $email = $_GET['email'];
    $hash = $_GET['hash'];
    $search = mysqli_query($conn, "SELECT email, active, hash FROM users WHERE email='".$email."' AND hash='".$hash."' AND active='0'");
    $match  = mysqli_fetch_array($search);

    if($match > 0){
        // We have a match, activate the account
        mysqli_query($conn, "UPDATE users SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'");
        echo "<script>
        alert('이메일 인증이 완료되었습니다.');
        location.href='board.php';
        </script>";
    }else{
        echo "<script>
        alert('이메일 인증이 되지 않았습니다.');
        location.href='board.php';
        </script>";
    }
                 
}else{
    // Invalid approach
    echo "<script>
    alert('잘못된 접근입니다.');
    location.href='index.php';
    </script>";
}
?>