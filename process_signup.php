<?php
$conn = mysqli_connect('localhost', 'root', '990820', 'register');
$hashedPassword = password_hash($_POST['userpw'], PASSWORD_DEFAULT);
echo $hashedPassword;
$sql = "
    INSERT INTO tb_user
    (userid, userpw, useremail)
    VALUES('{$_POST['userid']}', '{$hashedPassword}', '{$_POST['email']}'
    )";
echo $sql;
$result = mysqli_query($conn, $sql);

if ($result === false) {
    echo "저장에 문제가 생겼습니다. 관리자에게 문의해주세요.";
    echo mysqli_error($conn);
} else {
?>
    <script>
        alert("회원가입이 완료되었습니다");
        location.href = "index.php";
    </script>
<?php
}
?>