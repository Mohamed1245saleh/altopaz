<?php

include 'connect.php';
error_reporting(0);
$returnResult = "success";
$newInvestmentValue = json_decode($_POST['investmentAmount']);
$id = json_decode($_POST['id']);
$query = "update customers set
                     bonus =".$newInvestmentValue."
                     where
                     id = ".$id;
$result = $conn->query($query);
if($result-> error){
    $returnResult = "failed";
}
echo $returnResult;


