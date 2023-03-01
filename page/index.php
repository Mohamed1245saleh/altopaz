<?php
error_reporting(0);
include('../connect.php');

if(! isset($_GET['c']) ){
    header('location: invalidLink.php');
    exit;
}
if( isset($_GET['c']) ){
    $TOKEN = filter_var($_GET['c'], FILTER_SANITIZE_STRING);
    $projectNumber = filter_var($_GET['p'] , FILTER_SANITIZE_STRING);
    $buildingNumber = filter_var($_GET['b'] , FILTER_SANITIZE_STRING);
}
$whatsAppAvaliabilty = 0;
$query = "select whatsapp , whatsappAvaliability from users where whatsappAvaliability = '1'";
$resultQuery=$conn->query($query);
if($resultQuery->num_rows > 0){
    while($row = $resultQuery->fetch_assoc()) {
        $whatsAppAvaliabilty = $row["whatsappAvaliability"];
        $whatsAppNumber = $row["whatsapp"];
    }
}


$query = "select name ,stock , flat, floor ,project , bulding from customers where token = '$TOKEN'";
$resultQuery=$conn->query($query);
while($row = $resultQuery->fetch_assoc()) {
    $projectName = $row["project"];
    $buildingName = $row["bulding"];
    $name = $row['name'];
    $stock=($row['stock']);
    $flat=($row['flat']);
    $floor=($row['floor']);
}

$count =0;
$sql="select * from project_building WHERE project_number = '$projectName' 
                  AND building_number ='$buildingName' ";
$result=$conn->query($sql);
$count = $result->num_rows;
while($row = $result->fetch_assoc()) {
    $count = $count+1;
    $cid=$row['id'];
    $step1 = $row['step1'];
    $step2 = $row['step2'];
    $step3 = $row['step3'];
    $step4 = $row['step4'];
    $step5 = $row['step5'];
    $step6 = $row['step6'];
    $step7 = $row['step7'];
    $projectdate = $row['project_date'];
    $deliveryDate = $row['project_delivery_date'];
    $buildingDeliveryCheck = $row['building_delivery_check'];
    $project =($row['project_number']);
    $bulding=($row['building_number']);


}

$comments = [];
$sql = "select * from setting  ";
$result = $conn->query($sql);
$count = $result->num_rows;
while ($row = $result->fetch_assoc()) {
    $comments[] = $row['comment'];
}
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="description" content="<?php echo $comments[0]; ?>"/>
    <title>شركة التوباز العقارية</title>

    <!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" />
    <!-- css -->
    <link rel="stylesheet" href="../vendor/bootstrap-4.2.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../vendor/owl-carousel-2.3.4/assets/owl.carousel.min.css" />

    <!-- js -->


    <!-- font - fontawesome -->
    <link rel="stylesheet" href="../vendor/fontawesome-5.6.1/css/all.min.css" />
    <!-- font - stroyka -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@500&display=swap" rel="stylesheet">
    <link rel="icon" href="https://altopaz.floteksa.com/img/logo_title.png" type="image/icon type">
    <link rel="stylesheet" href="../assets/css/style.css" />
</head>
<body>



<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../img/Logo.png" style="height: 70px;">
            </a>

            <?php
            if($whatsAppAvaliabilty){

             echo '<span class="navbar-text">
 <a href="https://api.whatsapp.com/send?phone=+966'.$whatsAppNumber.'&amp;text=السلام عليكم&amp;app_absent=0" style="text-decoration-line: none">
                        <div class="d-flex text-light">
                               <p class="mx-2"> '.$whatsAppNumber.'</p>
                               <img src="../img/whatsapp-icon.svg" style="height: 20px;">
                           
                        </div>
                        </a>
                    </span>';
            }

            ?>

        </div>
    </nav>
    <!-- End nav bar -->
</div>
<!-- start new div -->
<div class="flowers w-100">
    <img src="../img/flowers.png" class="w-100 mt-5">
</div>
<!-- Start center page -->
<div class="container">
    <div class="contant-center    container">
        <h1 class="text-center broun py-5">مراحل المشروع</h1>

        <div class="row container mb-3">

            <div class="name-box text-center col-md-1">

            </div>

            <div class="name-box text-center col-md-2">
                <p class="text-secondary font-weight-bold">مشروع</p>

                <input type="text"  class="box-border w-100" value="<?php echo $project;?>">
            </div>
            <!-- end box -->
            <div class="name-box text-center col-md-2">
                <p class="text-secondary font-weight-bold">عمارة</p>

                <input type="text" class="box-border w-100" value="<?php echo $bulding;?>">
            </div>
            <!-- end box -->
            <div class="name-box text-center col-md-2">
                <p class="text-secondary font-weight-bold">قطعة</p>

                <input type="text" class="box-border w-100" value="<?php echo $stock;?>">
            </div>
            <!-- end box -->
            <div class="name-box text-center col-md-2">
                <p class="text-secondary font-weight-bold">شقة</p>

                <input type="text" class="box-border w-100" value="<?php echo $flat;?>">
            </div>
            <!-- end box -->
            <div class="name-box text-center col-md-2">
                <p class="text-secondary font-weight-bold">الدور</p>

                <input type="text" class="box-border w-100" value="<?php echo $floor;?>">
            </div>
            <!-- end box -->
            <div class="name-box text-center col-md-1">

            </div>
        </div>

        <!-- End section one -->
        <!-- start section 2 -->
        <div class="d-flex mt-5 ">
            <div class="row w-100">
                <div class="col-md-3">
                    <h4 class="text-secondary text-center">عزيزي العميل</h4>
                </div>
                <div class="col-md-9">
                    <input type="text" class="box-border w-100 p-2" value="<?php echo $name;?>">
                </div>
            </div>
        </div>
        <!-- start section 3 -->
        <div class="container my-5">
            <div class="box-about text-right broun ">
                <p class="text-about text-secondary text-center" style="font-family:Tajawal">
                    <?php
                    echo $comments[0];
                    ?>
                </p>
            </div>
            <p class="broun my-3 font-weight-bold">التوباز العقارية</p>
        </div>
        <!-- start section 4 -->
        <div class="container my-5">
            <h5 class="broun text-right">مراحل المشروع</h5>
            <div class="box-about text-right text-secondary border-0">
                <p class="text-about text-center">
                    <?php
                    echo $comments[1];
                    ?>
                </p>
            </div>
        </div>
        <!-- start section 5 Timer-->
        <div class="container my-5">

             <!-- countDown Area-->
            <?php
            include "../project/components/countdown.php";
            $countDown = new countdown();
            $currentData = date("Y-m-d");

            if($buildingDeliveryCheck && $deliveryDate != ""){
            $countDown->BuildingDelivered();
            }
            elseif(strtotime(date("Y-m-d H:i:s")) < strtotime($deliveryDate) && $deliveryDate != ""){
            $countDown->htmlCountDownClockId(strtotime($deliveryDate) , strtotime($projectdate));

            }elseif(strtotime(date("Y-m-d H:i:s")) > strtotime($deliveryDate) && $deliveryDate != ""){
            $countDown->htmlCountDownClockAlertId(strtotime($deliveryDate) , strtotime($projectdate));
            }else{
            $countDown->emptyDeliveryDate();
            }

            ?>
            <!-- end of countdown Area -->
        </div>
        <!-- start section 6 activites -->
        <div class="container my-5 activites">
            <div class="row">
                <div class="col-md-3 text-center">
                    <h6 class="broun font-weight-bold my-3">إصدار رخصة البناء</h6>
                    <div class="progress0 d-flex justify-content-center broun">
                        <div class="progress organge">
                                    <span class="progress-left">
                                        <span id="progressLeftBar1" class="progress-bar"></span>
                                    </span>
                            <span class="progress-right">
                                        <span id="progressRightBar1" class="progress-bar"></span>
                                    </span>
                            <div id="progressBar1" class="progress-value"><?php echo $step1; ?>%</div>
                        </div>
                    </div>
                </div>
                <!-- end box one -->
                <div class="col-md-3 text-center">
                    <h6 class="broun font-weight-bold my-3">الأعمال الإنشائية </h6>
                    <div class="progress0 d-flex justify-content-center broun">
                        <div class="progress black">
                                    <span class="progress-left">
                                        <span id="progressLeftBar2" class="progress-bar"></span>
                                    </span>
                            <span class="progress-right">
                                        <span id="progressRightBar2" class="progress-bar"></span>
                                    </span>
                            <div id="progressBar2" class="progress-value"><?php echo $step2;?>%</div>
                        </div>
                    </div>
                </div>
                <!-- end box one -->
                <div class="col-md-3 text-center">
                    <h6 class="broun font-weight-bold my-3">التشطيبات الداخلية </h6>
                    <div class="progress0 d-flex justify-content-center broun">
                        <div class="progress gray">
                                    <span class="progress-left">
                                        <span id="progressLeftBar3" class="progress-bar"></span>
                                    </span>
                            <span class="progress-right">
                                        <span id="progressRightBar3" class="progress-bar"></span>
                                    </span>
                            <div id="progressBar3" class="progress-value"><?php echo $step3;?>%</div>
                        </div>
                    </div>
                </div>
                <!-- end box one -->
                <div class="col-md-3 text-center">
                    <h6 class="broun font-weight-bold my-3">التشطيبات الخارجية</h6>
                    <div class="progress0 d-flex justify-content-center broun">
                        <div class="progress bink">
                                    <span class="progress-left">
                                        <span id="progressLeftBar4" class="progress-bar"></span>
                                    </span>
                            <span class="progress-right">
                                        <span  id="progressRightBar4" class="progress-bar"></span>
                                    </span>
                            <div id="progressBar4" class="progress-value"><?php echo $step4;?>%</div>
                        </div>
                    </div>
                </div>
                <!-- end box one -->
                <!-- end box one -->
                <div class="col-md-4 text-center mt-3">
                    <h6 class="broun font-weight-bold my-3">استلام اتحاد الملاك</h6>
                    <div class="progress0 d-flex justify-content-center broun">
                        <div class="progress green">
                                    <span class="progress-left">
                                        <span id="progressLeftBar5" class="progress-bar"></span>
                                    </span>
                            <span class="progress-right">
                                        <span id="progressRightBar5" class="progress-bar"></span>
                                    </span>
                            <div id="progressBar5" class="progress-value"><?php echo $step5;?>%</div>
                        </div>
                    </div>
                </div>
                <!-- end box one -->
                <!-- end box one -->
                <div class="col-md-4 text-center mt-3">
                    <h6 class="broun font-weight-bold my-3">فرز الصكوك</h6>
                    <div class="progress0 d-flex justify-content-center broun">
                        <div class="progress red">
                                    <span class="progress-left">
                                        <span id="progressLeftBar6" class="progress-bar"></span>
                                    </span>
                            <span class="progress-right">
                                        <span id="progressRightBar6" class="progress-bar"></span>
                                    </span>
                            <div id="progressBar6" class="progress-value"><?php echo $step6;?>%</div>
                        </div>
                    </div>
                </div>
                <!-- end box one -->
                <!-- end box one -->
                <div class="col-md-4 text-center mt-3">
                    <h6 class="broun font-weight-bold my-3"> شهادة الأشغال</h6>
                    <div class="progress0 d-flex justify-content-center broun">
                        <div id="progressBarAnimation" class="progress blue">
                                    <span class="progress-left">
                                        <span  id="progressLeftBar7" class="progress-bar"></span>
                                    </span>
                            <span class="progress-right">
                                        <span id="progressRightBar7" class="progress-bar"></span>
                                    </span>
                            <div id="progressBar7" class="progress-value"><?php echo $step7;?>%</div>
                        </div>
                    </div>
                </div>
                <!-- end box one -->
            </div>
        </div>

        <!-- start section 7 images -->
        <div class="container img-box my-5">
            <h3 class="text-center  my-5 broun">صور المشروع</h3>
            <div class="row">
                <div class="col-md-4 my-2 my-sm-2">
                    <div class="box">
                        <div class="img-enter1">

                        </div>
                        <!-- end img-enter -->
                        <div class="title">
                            <h5 class="broun my-3">الإنشاءات</h5>
                            <a target="_blank" href="../album/<?php echo $TOKEN?>/1">
                            <button class="btn-box my-3 px-5 py-2" href="../album/<?php echo $TOKEN?>/1">عرض الصور</button>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Box 1 -->

                <div class="col-md-4 my-2 my-sm-2">
                    <div class="box">
                        <div class="img-enter2">

                        </div>
                        <!-- end img-enter -->
                        <div class="title">
                            <h5 class="broun my-3">التشطيبات الداخلية</h5>
                            <a target="_blank" href="../album/<?php echo $TOKEN?>/2">
                                <button class="btn-box my-3 px-5 py-2" href="../album/<?php echo $TOKEN?>/2">عرض الصور</button>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Box2 -->


                <div class="col-md-4 my-2 my-sm-2">
                    <div class="box">
                        <div class="img-enter3">

                        </div>
                        <!-- end img-enter -->
                        <div class="title">
                            <h5 class="broun my-3">التشطيبات الخارجية                                </h5>
                            <a target="_blank" href="../album/<?php echo $TOKEN?>/3">
                                <button class="btn-box my-3 px-5 py-2" href="../album/<?php echo $TOKEN?>/3">عرض الصور</button>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Box 3 -->
            </div>
        </div>

        <!-- scroll btn -->
<!--        <a href="#"><button  id="myBtn" title="Go to top"></button></a>-->
        <!-- end scroll btn -->
        <!-- Footer -->
        <footer class="my-5">
            <div class="container">
                <div class="row py-5">

                    <div class="col-md-2"></div>
                    <div class="col-md-6 text-center">
                        <p class="broun pt-3 text-center">جميع الحقوق محفوظة لشركة التوباز العقارية</p>
                    </div>
                    <div class="col-md-4 text-md-left text-sm-center">
                        <img src="../img/logo2.png" style="height: 70px;">
                    </div>
                </div>
            </div>
        </footer>
    </div>


</body>

<script>
    // Get the button
    let mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
<script src="../vendor/jquery-3.3.1/jquery.min.js"></script>
<script src="../vendor/bootstrap-4.2.1/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/owl-carousel-2.3.4/owl.carousel.min.js"></script>
<script src="../vendor/nouislider-12.1.0/nouislider.min.js"></script>
<script src="../assets/js/number.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/timer.js"></script>
<script src="../assets/js/timer.js"></script>
<script src="../assets/js/progressBarAnimate.js"></script>

</html>
