<?php
error_reporting(0);
include('connect.php');
if( isset($_GET['c']) || $_GET['c'] ){
    $TOKEN = $_GET['c'];
}
include "inc/header.php";
$query = "select img , imgetype from imgs where image_url_token = '$TOKEN'";
$counter = 0;
$resultQuery=$conn->query($query);
while($row = $resultQuery->fetch_assoc()) {
    $data[$counter]["imageType"] = $row["imgetype"];
    $data[$counter]["image"] = $row["img"];
    $counter++;
}

$counter = count($data);
$firstType =  "<div class='col-md-12' style='display:inline-block'> <h1>صور الانشاءات</h1>";
$secondType =  "<div class='col-md-12' style='display:inline-block'> <h1>صور التشطيبات الداخليه</h1>";
$thirdType =  "<div class='col-md-12' style='display:inline-block'> <h1>صور التشطيبات الخارجيه</h1>";
for($x = 0 ; $x < $counter ; $x++){
    if($data[$x]["imageType"] == 1){
        $firstType .= "<div class='col-md-4' style='display:inline'>";
        $firstType .=  "<img src='Upload/".$data[$x]["image"]."' width='350' height='350' style='display:inline-block;margin:10px;'>";
        $firstType .= "</div>";
    }elseif ($data[$x]["imageType"] == 2){
        $secondType .= "<div class='col-md-4' style='display:inline'>";
        $secondType .=  "<img src='Upload/".$data[$x]["image"]."' width='350' height='350' style='display:inline-block;margin:10px;'>";
        $secondType .= "</div>";
    }elseif($data[$x]["imageType"] == 3){
        $thirdType .= "<div class='col-md-4' style='display:inline'>";
        $thirdType .=  "<img src='Upload/".$data[$x]["image"]."' width='350' height='350' style='display:inline-block;margin:10px;'>";
        $thirdType .= "</div>";

    }
}
echo $firstType."</div></br></br></br></br>";
echo $secondType."</div></br></br></br></br>";
echo $thirdType."</div>";
include "inc/footer.php";
