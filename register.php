<?php
$conn = mysqli_connect('localhost', 'root', '990820', 'register');

$memberID = $_POST['id'];
$memberPW = $_POST['pw'];
$memberRPW = $_POST['re_pw'];
$memeberEmail = $_POST['email'];

if($memberID == "" || $memberPW == "" || $memberRPW == "" || $memberEmail == ""){

    echo '<script> alert("모든 정보를 입력해주세요."); history.back(); </script>';

} else {

    echo $memberID;

    if($memberPW != $memberRPW){
        echo '<script> alert("패스워드가 일치하지 않습니다."); history.back(); </script>';

    } else {

        $sql = mysqli_query($conn, "SELECT EXISTS (SELECT * from tb_user WHERE userid='".$memberID."') as success");
        $usernamecount = $sql->fetch_array();

        if($usernamecount['success']==1) {

            echo ("<script>alert('중복된 아이디입니다!'); history.back();</script>");

        } else {

            $memberPW = password_hash($memberPW, PASSWORD_DEFAULT);
            $signup = "INSERT INTO tb_user (userid, userpw, useremail)
            VALUES ('$memberID', '$memberPW', '$memeberEmail')";
            $result = mysqli_query($conn, $signup);

            if($result) {
                echo "회원가입에 성공했습니다!</br>";
                echo "<a href=login.html>로그인 페이지로 이동</a>";
            }
            else {
                echo "회원가입에 실패했습니다.";
            }

            mysqli_close($conn);

        }
    }
}

?>