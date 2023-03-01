<?php
// Count total files
error_reporting(0);
include "connect.php";
function filterData(&$str){
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}



if(isset($_GET['project']) && isset($_GET['bulding']) ){
    $projectId = $_GET['project'];
    $buildingId = $_GET['bulding'];
    $fileName = "customerDate_" . date('Y-m-d') . ".xls";

// Column names
    $excelData = "<html><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'></head><table style='width:100%; border=1'>";
    $excelData .= "<tr>
 <th>name</th>
 <th>phone</th>
 <th>link</th>
</tr>";

    $query = "SELECT name ,token, phone FROM customers WHERE project = '$projectId' AND bulding ='$buildingId'";
    $result = $conn->query($query);
    if($result->num_rows > 0){

        while($row = $result->fetch_assoc()){
            $excelData .="<tr>";
            $link = "https://altopaz.floteksa.com/page/".$row['token'];
            $excelData .= "<td>".$row["name"]."</td>";
            $excelData .= "<td>".$row["phone"]."</td>";
            $excelData .= "<td>".$link."</td>";
            $excelData .= "</tr>";
        }
    }else{
        $excelData .= 'No records found...';
    }

    $excelData .= "</table>
</html>";
    ob_clean();
    header("Content-Type: application/vnd.ms-excel; charset=utf-8-sig");
    header("Content-Disposition: attachment; filename=\"$fileName\"");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    echo $excelData;


}else{
    $type =$_POST["type"];
    $projectId = $_POST["project"];
    $buildingId = $_POST["buliding"];
    $insertImagesFlag = false;
    $sql = "select id from project_building
 where project_number = '".$projectId."' AND building_number= "."'$buildingId'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        $project_building_id =  $row["id"];
    }
    $countfiles = count($_FILES['files']['name']);
// Upload Location
    $upload_location = "../Upload/";
// To store uploaded files path
    $files_arr = array();
    $bytes = random_bytes(20);
    $randomToken = bin2hex($bytes);
// Loop all files
    $insertImages = "insert into imgs(`project_building_id`,`imgetype`,`img`,`image_url_token` ,`upload_date`) values ";
    $uploadDate = date("Y-m-d H:i:s");
    $failedUploadFlag = false;
    for($index = 0;$index < $countfiles;$index++){

        if(isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != ''){
            // File name
            $filename = $project_building_id.$_FILES['files']['name'][$index];

            // Get extension
            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

            // Valid image extension
            $valid_ext = array("png","jpeg","jpg");

            // Check extension
            if(in_array($ext, $valid_ext)){
                $insertImagesFlag = true;
                $insertImages .=
                    "(".$project_building_id." ,". $type[$index] ." ,'".$filename."' ,'".
                    $randomToken."' ,'".
                    $uploadDate."'),";

                // File path
                $path = $upload_location.$filename;

                // Upload file
                if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
                    $files_arr[] = $path;
                    $failedUploadFlag = true;
                }
            }else{
                return "The ". $valid_ext ." Not Supported";
            }
        }
    }


    if($insertImagesFlag){
        $conn->query(substr($insertImages , 0 , -1));

        $result = str_replace(".." , "" , $upload_location);
    }

}




// Excel file name for download
if($failedUploadFlag){
    echo "success";
}else{
    echo "Failed";
}



