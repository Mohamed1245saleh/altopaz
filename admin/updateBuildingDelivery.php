<?php
error_reporting(0);
include "connect.php";

$rowId =$_POST["rowId"];
$isChecked = $_POST["isChecked"];
$sql = "update  project_building set building_delivery_check = ".$isChecked." where id = ".$rowId;
$result = $conn->query($sql);
if($result->error){
    echo "false";
}else{
    echo "true";
}


