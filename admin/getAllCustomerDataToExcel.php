<?php
include "connect.php";
    $fileName = "customerData_" . date('Y-m-d') . ".xls";
$defaultCommission = 0;
// Column names
    $excelData = "<html><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'></head><table style='width:100%; border=1'>";
    $excelData .= "<tr>
 <th style='text-align: right'>تسلسل</th>
 <th style='text-align: right'>الأسم</th>
 <th style='text-align: right'>الهاتف</th>
 <th style='text-align: right'>البريد الألكتروني</th>
 <th style='text-align: right'>المخطط</th>
 <th style='text-align: right'>رقم الهوية</th>
 <th style='text-align: right'>عنوان العميل</th>
 <th style='text-align: right'>رقم المشروع</th>
 <th style='text-align: right'>رقم العماره</th>
 <th style='text-align: right'>المبني</th>
 <th style='text-align: right'>رقم الشقة</th>
 <th style='text-align: right'>رقم الدور</th>
 <th style='text-align: right'>المسوق</th>
 <th style='text-align: right'>الحالة</th>
 <th style='text-align: right'>حجم الاستثمار</th>
 <th style='text-align: right'>العلاوة</th>
 <th style='text-align: right'>طريقة الدفع</th>
 <th style='text-align: right'>أجمالي العمولة</th>
</tr>";

$commissionQuery = "select * from  comission ";
$commission = $conn->query($commissionQuery);
if($commission->num_rows > 0){
    while($commissionRow = $commission->fetch_assoc()){
        $defaultCommission = $commissionRow["commission"];
    }
}

    $query = "SELECT * FROM customers";
    $result = $conn->query($query);
    if($result->num_rows > 0){

        while($row = $result->fetch_assoc()){
            $totalCommission = calculateTotalCommission($defaultCommission , $row["investment_amount"] , $row["bonus"]);
            $excelData .="<tr>";
            $excelData .= "<td style='text-align: right;line-height: 35px'>".$row["id"]."</td>";
            $excelData .= "<td style='text-align: right;line-height: 35px'>".$row["name"]."</td>";
            $excelData .= "<td style='text-align: right;line-height: 35px'>".$row["phone"]."</td>";
            $excelData .= "<td style='text-align: right;line-height: 35px'>".$row["email"]."</td>";
            $excelData .= "<td style='text-align: right;line-height: 35px'>".$row["adress"]."</td>";
            $excelData .= "<td style='text-align: right;line-height: 35px'>".$row["customer_identity"]."</td>";
            $excelData .= "<td style='text-align: right;line-height: 35px'>".$row["customer_address"]."</td>";
            $excelData .= "<td style='text-align: right;line-height: 35px'>".$row["project"]."</td>";
            $excelData .= "<td style='text-align: right;line-height: 35px'>".$row["bulding"]."</td>";
            $excelData .= "<td style='text-align: right;line-height: 35px'>".$row["stock"]."</td>";
            $excelData .= "<td style='text-align: right;line-height: 35px'>".$row["flat"]."</td>";
            $excelData .= "<td style='text-align: right;line-height: 35px'>".$row["floor"]."</td>";
            $excelData .= "<td style='text-align: right;line-height: 35px'>".$row["sales_name"]."</td>";
            $excelData .= "<td style='text-align: right;line-height: 35px'>".$row["status"]."</td>";
            $excelData .= "<td style='text-align: right;line-height: 35px'>".$row["investment_amount"]."</td>";
            $excelData .= "<td style='text-align: right;line-height: 35px'>".$row["bonus"]."</td>";
            $excelData .= "<td style='text-align: right;line-height: 35px'>".$row["payment_way"]."</td>";
            $excelData .= "<td style='text-align: right;line-height: 35px'>".$totalCommission."</td>";
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

function calculateTotalCommission($defaultBonus , $investmentAmount , $bonus){
    $totalComission = $defaultBonus + $bonus ;
    $totalComission = ($totalComission * $investmentAmount) / 100;
    return $totalComission;
}

