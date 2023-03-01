<?php
error_reporting(0);
//include('../connect.php');
ini_set("display_errors" , true);
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
$wname = $_SESSION['logged'];
if( !isset($_SESSION['logged']) || !$_SESSION['logged']  || empty($_SESSION['logged'])  ){
    header("Location:index.php");
}

include "html_components/html_groups_functions.php";
$htmlCompnents = new html_groups_functions();
?>
<?php include ('file/header.php');?>
<title>المجموعات</title>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php $htmlCompnents->headPreview();?>

    <!--Main Content-->
    <section class="content">
        <!-- Main row -->
        <div class="row">

            <!-- Section General -->
            <section class="col-lg-12 connectedSortable">



                <div class="box box-primary">
                    <br class="box-header  with-border">
                    <h3 class="box-title">مجموعات العملاء</h3>
                    <div class="alert alert-success" id="successadd" style="margin-top: 10px; display: none">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>نجاح العملية !</strong> تم الاضافة بنجاح
                    </div>
                    <div class="alert alert-danger" id="successcancel" style="margin-top: 10px; display: none">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>نجاح العملية !</strong> تم الحذف بنجاح
                    </div>
                    <div class="alert alert-info" id="successupdate" style="margin-top: 10px; display: none">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>نجاح العملية !</strong> تم التعديل بنجاح
                    </div>
                    </br>
                    </br>
                    </br>


                    <?php

                    $htmlCompnents->searchSection();



                     if($_POST["building"] && $_POST["project"]){
                         $project = $_POST["project"];
                         $building = $_POST["building"];
                         $htmlCompnents->getAllProjectBuildingDetails($project , $building);
                         $htmlCompnents->tableHeader($useredit4_u , $userdelete4_u );
                         $htmlCompnents->tableRowContent();
                         $htmlCompnents->endOfTableEditDeleteButtons($useredit4_u , $userdelete4_u);
                         $htmlCompnents->editButton();
                         $htmlCompnents->deleteButton();

                        //$htmlCompnents->addModalButton();
                        echo '<div class="col-md-12">';

                        $htmlCompnents->ulploadingImages('انقر هنا لرفع صور الانشاءات' , 'first_step_image');
                        $htmlCompnents->ulploadingImages('انقر هنا لرفع صور التشطيبات الداخليه' , 'second_step_image');
                        $htmlCompnents->ulploadingImages('انقر هنا لرفع صور التشطيبات الخارجيه' , 'third_step_image');
                        echo '
                               </div>
                               <div class="col-md-12">
                               <button class="build_project_button"  id="build_project_button_submit">
                               ارفع الصور
                               </button>
                               </div>';
                    }


                    ?>






                </div>

        </div>




        <?php
        if(isset($_POST["update"]))
        {
            $id =  $_POST["id"];
            $project=htmlspecialchars($_POST['projectNumber']);
            $building=htmlspecialchars($_POST['buildingNumber']);
            $project_date=htmlspecialchars($_POST['projectDate']);
            // $project_delivery_date = date('Y-m-d', strtotime('+1 year', strtotime($project_date)));
            $project_delivery_date = htmlspecialchars($_POST['projectDeliveryDate']);
            $step1=htmlspecialchars($_POST['firstStep']);
            $step2=htmlspecialchars($_POST['secondStep']);
            $step3=htmlspecialchars($_POST['thirdStep']);
            $step4=htmlspecialchars($_POST['fourthStep']);
            $step5=htmlspecialchars($_POST['fifthStep']);
            $step6=htmlspecialchars($_POST['sixthStep']);
            $step7=htmlspecialchars($_POST['seventhStep']);

            $sql="update project_building 
set
       project_number='$project',building_number='$building',project_date='$project_date',project_delivery_date='$project_delivery_date',step1='$step1',
       step2='$step2',step3='$step3',step4='$step4',step5='$step5',step6='$step6',
       step7='$step7'
where id = $id
";

            $result=$conn->query($sql);
            if ($result == true){
                ?>
                <script type="text/javascript">
                    document.getElementById("successadd").style.display="block";
                    setTimeout(function(){
                        window.location.href=window.location.href;
                    }, 3000);
                </script>
                <?php
            }
        }
        ?>

        <?php
        error_reporting(0);
        if(isset($_POST["delete"]))
        {

        $sql="select project_number , building_number  from project_building  where id ='$_POST[id]'";
        $result=$conn->query($sql);
        while($row = $result->fetch_assoc()){
            $project_number = $row["project_number"];
            $building_number = $row["building_number"];
        }
        //Delete images of project form the server
        $sql="select img  from imgs  where project_building_id ='$_POST[id]'";
        $result=$conn->query($sql);
        $uploadLocation = "../Upload";
        while($row = $result->fetch_assoc()){
            unlink($uploadLocation."/".$row["img"]);
        }
        //End of delete images of project form the server
        $sql="delete  from customers  where project ='$project_number' AND bulding= '$building_number'";
        $result=$conn->query($sql);

            $sql="delete  from imgs  where project_building_id ='$_POST[id]'";
            $result=$conn->query($sql);

            $sql="delete  from project_building  where id ='$_POST[id]'";
            $result=$conn->query($sql);
            if ($result == true){
                ?>
                <script type="text/javascript">
                    document.getElementById("successcancel").style.display="block";
                    setTimeout(function(){
                        window.location.href=window.location.href;
                    }, 3000);
                </script>
                <?php
            }}
        ?>






        <?php include ('file/footer.php');?>

