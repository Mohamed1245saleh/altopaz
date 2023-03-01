<!DOCTYPE html>
<html  dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
    <title>client page altopaz</title>
    <link rel="icon" type="image/png" href="img/favicon.png" />
    <!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" />
    <!-- css -->
    <link rel="stylesheet" href="vendor/bootstrap-4.2.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="vendor/owl-carousel-2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- js -->
    <script src="vendor/jquery-3.3.1/jquery.min.js"></script>
    <script src="vendor/bootstrap-4.2.1/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/owl-carousel-2.3.4/owl.carousel.min.js"></script>
    <script src="vendor/nouislider-12.1.0/nouislider.min.js"></script>
    <script src="assets/js/number.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- font - fontawesome -->
    <link rel="stylesheet" href="vendor/fontawesome-5.6.1/css/all.min.css" />
    <!-- font - stroyka -->
    <!-- font - stroyka -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" href="img/logo_title.png" type="image/icon type">
</head>
<body>



<div class="container" >
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/Logo.png" style="height: 70px;">
            </a>


        </div>
    </nav>
    <!-- End nav bar -->
</div>
<!-- start new div -->
<div class="flowers w-100">
    <img src="img/flowers.png" class="w-100 mt-5">
</div>
<!-- Start center page -->


<div class="container" dir="ltr">

    <div class="contant-center container">
        <h1 class="text-center broun py-5"></h1>
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

                            <img src="img/invalid.svg"  style="width: 20%;margin: 0% 0 -12% 40%;""/>
                            <h1 class="text-center broun py-5" style="margin-top:18%;">
                                عفوا الرابط الذي استخدمته غير صحيح
                            </h1>
                        </div>

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
                        <img src="img/logo2.png" style="height: 70px;">
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
