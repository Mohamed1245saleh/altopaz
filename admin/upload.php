<?php
error_reporting(0);
include('../connect.php');
session_start();
?>
<?php if( !isset($_SESSION['logged']) || !$_SESSION['logged']  || empty($_SESSION['logged'])  ){
    header("Location:index.php");
}
?>

<?php include ('file/header.php');?>
<title>العملاء</title>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> العملاء
        </h1>
        <ol class="breadcrumb" >
            <li><a href="home.php"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
            <li><a href="clients.php"><i class="fa fa-users"></i> العملاء </a></li>
            <li class="active">رفع من ملف اكسيل</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">

            <!-- Section General -->
            <section class="col-lg-12 connectedSortable">



                <div class="box box-primary">
                    <div class="box-header  with-border">
                        <h3 class="box-title">العملاء</h3>

                        <div class="box-header with-border">
                            <div class="box-header with-border">
                                <form action="products.php" method="get">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <h3 class="box-title" style="margin-bottom: 15px">رفع من اكسيل </h3>
                                            <a href="Upload/Templat/customers.xlsx" download="العملاء.xlsx"><i class="fa fa-file-excel-o"></i> Template</a>

                                        </div>
                                    </div>
                                </form><!-- end of form -->

                            </div><!-- end of box header -->

                            <div class="box-tools pull-left">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body table-responsive">


                            <?php


                            if ( isset($_POST['submit'])) {
                                if ( isset($_FILES['uploadFile']['name']) && $_FILES['uploadFile']['name'] != "" ) {
                                    $allowedExtensions = array("xls","xlsx");
// Return the extension of the file
                                    $ext = pathinfo( $_FILES['uploadFile']['name'] , PATHINFO_EXTENSION );
                                    if ( in_array ($ext, $allowedExtensions)){
                                        $isUploaded = $_FILES['uploadFile']['tmp_name'];
                                        if ($isUploaded) {
                                           include "Upload/Classes/PHPExcel/IOFactory.php";
                                            try {
                                                $objPHPExcel = PHPExcel_IOFactory::load($isUploaded);
                                            } catch (Exception $e) {
                                                die ( 'Error loading file "' . pathinfo($isUploaded, PATHINFO_BASENAME ) . '": ' . $e->getMessage());
                                            }
// An ecel file may contains many sheets so you have to specify which one you need to read or work with.
                                            $sheet = $objPHPExcel->getSheet(0);
// It returns the highest number of rows.
                                            $total_rows = $sheet->getHighestRow();
// It returns the highest number of columns.
                                            $highest_column = $sheet->getHighestColumn();
//Table used to display the contents of the file
                                            echo '<table class="responsive" cellpadding="5" cellspacing="1" border="1">';
// Loop through each row of the worksheet in turn
                                            for ($row = 2 ; $row <= $total_rows; $row++) {
// Read a row of data into an array
                                                $rowData = $sheet-> rangeToArray ('A' . $row . ':' . $highest_column . $row, NULL, TRUE, FALSE);
                                                $length=random_bytes('6');
                                                $token = (bin2hex($length));
                                                $name=$rowData[0][0];
                                                $phone=$rowData[0][1];
                                                $email=$rowData[0][2];
                                                $customerId=$rowData[0][3];
                                                $customerAddress=$rowData[0][4];
                                                $adress=$rowData[0][5];
                                                $project=$rowData[0][6];
                                                $bulding=$rowData[0][7];
                                                $stock=$rowData[0][8];
                                                $flat=$rowData[0][9];
                                                $floor=$rowData[0][10];
                                                $status=$rowData[0][11];
                                                $salesName=$rowData[0][12];
                                                $investment=$rowData[0][13];
                                                $bonus=$rowData[0][14];
                                                $paymentWay=$rowData[0][15];

if($paymentWay == "تحويل"){
    $paymentWay = "transfer";
}elseif($paymentWay == "نقدا"){
    $paymentWay = "cash";
}


                                                if ( $name != '' || $project !='' ){
                                                    mysqli_query($conn,"insert into customers 
    (token,name,phone,floor,flat,stock,adress,bulding,project,sales_name , status,
     email,customer_identity,customer_address,investment_amount,bonus,payment_way) 
values 
    ('$token','$name','$phone','$floor','$flat','$stock','$adress','$bulding','$project','$salesName','$status'
    ,'$email','$customerId','$customerAddress','$investment','$bonus','$paymentWay')");
                                                }

                                                if ( $name == '' || $project =='' ){
                                                    echo '<label class="alert alert-danger">'.$row.' </label>';
                                                }}
                                            if ( $name == '' || $project =='' ){
                                                echo '<label class="alert alert-danger"><span></span>لم يتم رفع الاسطر السابقة</label>';
                                            }
                                            echo '<br>';


                                            if (mysqli_query == true){

                                                echo '<label class="alert alert-success">تم رفع الملف بنجاح!</label> <br>';
                                            }else {
                                                echo "ERROR: " . mysqli_error($conn);
                                            }
                                            echo '</table>';
                                        } else {
                                            echo '<label class="alert alert-danger">لم يتم رفع الملف!</label> <br>';
                                        }
                                    } else {
                                        echo '<label class="alert alert-danger">هذا النوع من الملفات غير مسموح به!</label> <br> ';
                                    }
                                }
                                else { echo '<label class="alert alert-danger">أختر الملف أولا!</label> <br> ';
                                }
                            }
                            ?>

                            <form enctype="multipart/form-data" method="POST" role="form">
                                <input type="file" name="uploadFile" value="">
                                <p class="help-block"> Only .xls/.xlxs extension File format. </p>
                                <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-upload"></i> رفع</button>
                            </form>


                        </div>
                    </div>
                    <?php include ('file/footer.php');?>
