<?php

require('../../connect.php');

if ( isset($_POST['submit'])) {
    if ( isset($_FILES['uploadFile']['name']) && $_FILES['uploadFile']['name'] != "" ) {
        $allowedExtensions = array("xls","xlsx");
// Return the extension of the file
        $ext = pathinfo( $_FILES['uploadFile']['name'] , PATHINFO_EXTENSION );
        if ( in_array ($ext, $allowedExtensions)){
            $isUploaded = $_FILES['uploadFile']['tmp_name'];
            if ($isUploaded) {
                include "Classes/PHPExcel/IOFactory.php";

                try {
                    $objPHPExcel = PHPExcel_IOFactory::load($isUploaded);
                } catch (Exception $e) {
                    die ( 'Error loading file "' . pathinfo($isUploaded, PATHINFO_BASENAME ) . '": ' . $e->getMessage());
                }
                // An excel file may contains many sheets so you have to specify which one you need to read or work with.
                $sheet = $objPHPExcel->getSheet(0);
                // It returns the highest number of rows.
                $total_rows = $sheet->getHighestRow();
                // It returns the highest number of columns.
                $highest_column = $sheet->getHighestColumn();
                //Table used to display the contents of the file
                echo '<table class=" table responsive" cellpadding="5" cellspacing="0" border="1">';
                // Loop through each row of the worksheet in turn
                for ($row = 2 ; $row <= $total_rows; $row++) {
                    // Read a row of data into an array
                    $rowData = $sheet-> rangeToArray ('A' . $row . ':' . $highest_column . $row, NULL, TRUE, FALSE);
                    $sub_code = $rowData[0][0];
                    $sub_name = $rowData[0][1];
                    $sql = " INSERT INTO subject ( sub_code, sub_name ) VALUES ( '".$sub_code."', '".$sub_name."' ) " ;
                    $result = mysqli_query($con,$sql);
                }
                if ( $result) {
                    echo "<script type=\"text/javascript\"> 
                        alert(\"File is uploaded Successfully.\"); 
                        </script>";
                    for ($row = 1 ; $row <= $total_rows; $row++) {
                        // Read a row of data into an array
                        $rowData = $sheet-> rangeToArray ('A' . $row . ':' . $highest_column . $row, NULL, TRUE, FALSE);
                        $sub_code = $rowData[0][0];
                        $sub_name = $rowData[0][1];
                        echo '<tr>';
                        echo '<td>'.$sub_code.'</td>';
                        echo '<td>'.$sub_name.'</td>';
                        echo '</tr>';
                    }
                }else {
                    echo "ERROR: " . mysqli_error($con);
                }
                echo '</table>';
            } else {
                echo '<span class="msg">File not uploaded!</span>';
            }
        } else {
            echo '<span class="msg">This type of file not allowed!</span>';
        }
    }
    else { echo '<span class="msg">Select an excel file first!</span>';
    }
}
?>