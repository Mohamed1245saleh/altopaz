<?php
error_reporting(0);
include('connect.php');
if( isset($_GET['token']) || $_GET['token'] ){
    $TOKEN = filter_var($_GET['token'] , FILTER_SANITIZE_STRING);
    $ALBUM = filter_var($_GET['B'] , FILTER_SANITIZE_STRING);
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
$query = "select project , bulding from customers where token = '$TOKEN'";
$resultQuery=$conn->query($query);
while($row = $resultQuery->fetch_assoc()) {
    $projectNumber = $row["project"];
    $buildingNumber = $row["bulding"];
}

if(isset($_GET['B'])  && $_GET['B'] == "1" ){
    $titleName = "الإنشاءات";
}elseif(isset($_GET['B'])  && $_GET['B'] == "2"){
    $titleName = "التطشيبات الداخلية";
}elseif(isset($_GET['B'])  && $_GET['B'] == "3"){
    $titleName = "التشطيبات الخارجية";
}
?>
<!DOCTYPE html>
<html  dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
    <link rel="icon" type="image/png" href="img/favicon.png" />
    <meta name="description" content="عرض الصور لأخر التحديثات في مختلف المواقع التابع’ لشرك’ التوباز العقارية"/>
    <meta name="og:image" content="https://altopaz.floteksa.com/img/logo_title.png" />
    <title>شركة التوباز العقارية</title>
    <!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" />
    <!-- css -->
    <link rel="stylesheet" href="../../vendor/bootstrap-4.2.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../vendor/owl-carousel-2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <!-- js -->
    <script src="../../vendor/jquery-3.3.1/jquery.min.js"></script>
    <script src="../../vendor/bootstrap-4.2.1/js/bootstrap.bundle.min.js"></script>
    <script src="../../vendor/owl-carousel-2.3.4/owl.carousel.min.js"></script>
    <script src="../../vendor/nouislider-12.1.0/nouislider.min.js"></script>
    <script src="../../assets/js/number.js"></script>
    <script src="../../assets/js/main.js"></script>
    <!-- font - fontawesome -->
    <link rel="stylesheet" href="../../vendor/fontawesome-5.6.1/css/all.min.css" />
    <!-- font - stroyka -->
    <!-- font - stroyka -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" href="../../img/logo_title.png" type="image/icon type">
</head>
<body>



<div class="container" >
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../../img/Logo.png" style="height: 70px;">
            </a>

            <?php
            if($whatsAppAvaliabilty){

                echo '<span class="navbar-text">
 <a href="https://api.whatsapp.com/send?phone=+966'.$whatsAppNumber.'&amp;text=السلام عليكم&amp;app_absent=0" style="text-decoration-line: none">
                        <div class="d-flex text-light">
                               <p class="mx-2"> '.$whatsAppNumber. '</p>
                               <img src="../../img/whatsapp-icon.svg" style="height: 20px;">
                           
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
    <img src="../../img/flowers.png" class="w-100 mt-5">
</div>
<div><i id="backButton"  class="fas fa-arrow-circle-left position-relative" type="button" title="العودة الي الخلف" style="margin-left: 2%;font-size: 40px;color: #FFFFEA;"  onclick="location.href = document.referrer; return false;"></i></div>
<!-- Start center page -->


<div class="container" dir="ltr">

    <div class="contant-center container">
        <h1 class="text-center broun py-5"><?php echo $titleName; ?></h1>
        <!-- quickview-modal -->
        <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl"><div class="modal-content"></div></div>
        </div>

        <!-- desktop site__header / end --><!-- site__body -->
        <div class="site__body">
            <!-- .block-slideshow -->
            <div class="block-slideshow block-slideshow--layout--full block">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="block-slideshow__body">
                                <div class="owl-carousel owl-loaded owl-drag">



                                    <div class="owl-stage-outer">
                                        <div class="owl-stage" style="transform: translate3d(-1137px, 0px, 0px); transition: all 0s ease 0s; width: 3982px;">
                                            <?php

                                            $image_type = $_GET["B"];
                                            $sql="select * from project_building WHERE project_number = '$projectNumber' And 
                             building_number= '$buildingNumber'        ";
                                            $result=$conn->query($sql);
                                            while($row = $result->fetch_assoc()) {
                                            $cid=$row['id'];

                                           $sql_image="SELECT * FROM imgs AS a WHERE a.imgetype=".$image_type." AND `upload_date` = ( 
                              SELECT MAX(`upload_date`) FROM imgs AS b 
                              WHERE b.`imgetype` = ".$image_type." AND b.`project_building_id` = ".$cid." );";
                                            $result_imge=$conn->query($sql_image);
                                            $count = $result_imge->num_rows;
                                            if ($count == '0'){
                                                echo '<p style="float:right;">لا توجد صور حتى الان</p';
                                            }else{
                                            while($row_imge = $result_imge->fetch_assoc()) {
                                            $img = $row_imge['img'];
                                            $imgSource = '../../Upload/'.$img;

                                            ?>
                                             <?php
                                                if($count > 0){
                                                    echo '
                                                    <div class="owl-item active" style="width: 568.75px;"><a class="block-slideshow__slide" href="#">
                                                    <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style="background-image: url(' .$imgSource.');background-size: 100% 100%"></div>
                                                    <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" style="background-image: url(' .$imgSource.');background-size: 100% 100%"></div>

                                                </a></div>
                                                    ';
                                                }

                                                ?>

                                            <?php }}}?>


                                        </div>
                                    </div>
                                    <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>

                                    <div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button>
                                        <button role="button" class="owl-dot"><span></span></button>
                                        <button role="button" class="owl-dot"><span></span></button>
                                    </div>


                                </div>
                            </div>

                        </div>
                        <?php if($count == 0 ){
                            echo '<h1 class="text-center broun py-5" style="margin-top:-30%;">
                                      لم يتم رفع اي تحديثات حتي الأن....
                            </h1>';
                        }?>
                    </div>

                </div>
            </div>


            <!-- .block-categories / end --><!-- .block-products-carousel -->



        </div>


        <!-- scroll btn -->
<!--        <a href="#"><button  id="myBtn" title="Go to top"></button></a>-->
        <!-- end scroll btn -->
        <!-- Footer -->
        <footer class="my-5" dir="rtl">
            <div class="container">
                <div class="row py-5">

                    <div class="col-md-2"></div>
                    <div class="col-md-6 text-center">
                        <p class="broun pt-3 text-center">جميع الحقوق محفوظة لشركة التوباز العقارية</p>
                    </div>
                    <div class="col-md-4 text-left">
                        <img src="../../img/logo2.png" style="height: 70px;">
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

</html>
