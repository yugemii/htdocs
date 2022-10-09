<!-- <?php
// menu1_likes 에 데이터를 삽입, menu1 의 idx 에 해당하는 likes_count 값 추가함.
// 이미 값이 있는 경우 이미 추천하였다고 알람 띄우기
// idx, username, date
include "lib.php";
$bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
$uid = $_SESSION['username'];

$sql = "SELECT * FROM menu1_likes WHERE idx='.$bno.' AND username='.$uid.';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if (isset($row['idx']) && isset($row['username'])){
    echo "<script>alert('이미 추천한 게시글입니다.');
    history.back();</script>";
} else {
    $sql1 = "INSERT INTO menu1_likes (idx, username) VALUES ('".$bno."', '".$uid."');";
    $sql2 = "UPDATE menu1 SET likes_count = likes_count + 1 WHERE idx='.$bno.';";
    echo "<script>alert('게시글을 추천했습니다.');
    history.back();</script>";
}
$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);
mysqli_close($conn);
?> -->
