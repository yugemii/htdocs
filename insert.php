<?php
$conn = mysqli_connect("localhost", "root", "990820", "web");//아주 나쁜 방법
$sql = "
INSER INTO topics
(title, description, created)
VALUE (
    'MYSQL',
    'MYSQL is...',
    NOW()
    )";
mysqli_query($conn, $sql);

echo mysqli_error($conn);


?>