<?php
error_reporting(E_ALL);
include "connect.php";
$id = filter_var($_POST["id"] , FILTER_SANITIZE_NUMBER_INT);
$currentUser = 0;
$query = "SELECT id  FROM users WHERE is_admin  = 'on'";
$result = $conn->query($query);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $currentUser = $row["id"];
    }
}

if($currentUser > 0){
    $query = "Update users set is_admin = 'off' where id = '$currentUser'";
    $result = $conn->query($query);
}

$query = "Update users set is_admin = 'on' where id = '$id'";
$result = $conn->query($query);

