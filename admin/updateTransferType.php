<?php

include 'connect.php';
error_reporting(0);
$returnResult = "success";
$transferType = $_POST['transferType'];

if($transferType == 1){
    $transferType = "cash";
}elseif($transferType == 2){
    $transferType = "transfer";
}
$id = json_decode($_POST['elementId']);
$query = "update customers set
                     payment_way ='".$transferType."'
                     where
                     id = ".$id;
$result = $conn->query($query);
if($result-> error){
    $returnResult = "failed";
}
echo $returnResult;
