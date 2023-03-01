<?php
     error_reporting(0);
  include('../connect.php');
session_start();
 $wname = $_SESSION['logged'];
    ?>
<?php if( !isset($_SESSION['logged']) || !$_SESSION['logged']  || empty($_SESSION['logged'])  ){
	header("Location:logout.php");
}

?>


<?php include ('file/header.php');?>
    <title>الرئيسية</title>
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> الرئيسية
	  </h1>

    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">

        <!-- Section General -->
        <section class="col-lg-12 connectedSortable">
			<?php if(  $userview_u == 'on' ){ ?>
            <div class="row">
 <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-blue">
                        <div class="inner">
                           <?php
                              error_reporting(0);

  $sql="select * from customers ";
$result=$conn->query($sql);
$count = $result->num_rows;
  ?>

                            <h3><?php  echo $count; ?></h3>

                            <p>العملاء</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="clients.php" class="small-box-footer">عرض <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                 <?php }
    if(  $userview2_u == 'on' ){ ?>

<div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                           <?php

  $sql="select * from users ";
$result=$conn->query($sql);
$count = $result->num_rows;
  ?>

                            <h3><?php  echo $count; ?></h3>

                            <p>المستخدمين</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <a href="users.php" class="small-box-footer">عرض <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                   <?php }
  if(  $userview3_u == 'on' ){ ?>
<div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                           <?php

  $sql="select * from setting ";
$result=$conn->query($sql);
$count = $result->num_rows;
  ?>

                            <h3><?php  echo $count; ?></h3>

                            <p>الاعدادت</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-sticky-note-o"></i>
                        </div>
                        <a href="settings.php" class="small-box-footer">عرض <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
<?php
  }
  ?>


               <?php
  if(  $userview4_u == 'on' ){ ?>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <?php

                            $sql="select id from project_building";
                            $result=$conn->query($sql);
                            $count = $result->num_rows;
                            ?>

                            <h3><?php  echo $count; ?></h3>

                            <p>المجموعات</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-object-group"></i>
                        </div>
                        <a href="groups.php" class="small-box-footer">عرض <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <?php
                }
                ?>
            </div><!-- end of row -->



<?php include ('file/footer.php');?>

