<?php
$servername = 'localhost';
$username = 'u191962684_topaz';
$password = 'QnTOR7zDOk8mgJ1!';
$dbname = 'u191962684_topaz';
$conn=new mysqli($servername ,$username ,$password ,$dbname );
if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}
$conn->set_charset('utf8');
?>
