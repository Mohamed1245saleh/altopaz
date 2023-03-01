<?php
include 'connect.php';
error_reporting(0);
$returnResult = "success";
$commissionValue =  json_decode($_POST['commissionValue']);
$query = "SELECT * from comission";
$result = $conn->query($query);

if($result->num_rows == 0){

    $insertQuery = "insert into comission (commission) values (".$commissionValue.")";
    $result = $conn->query($insertQuery);
    if($result->error){
        $returnResult = "failed";
    }

}else{
    $updateQuery = "update  comission set commission = ".$commissionValue;
    $result = $conn->query($updateQuery);
    if($result->error){
        $returnResult  = "failed";
    }
}
echo $returnResult;
