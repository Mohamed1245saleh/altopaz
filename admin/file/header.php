<?php
error_reporting(0);
 include('../connect.php');
session_start();
 $wname = $_SESSION['logged'];
 $sql_u="select * from users where username ='$wname' ";
      $result_u=$conn->query($sql_u);
			while($row_u = $result_u->fetch_assoc()) {
        $name =  $row_u['name'];
        $note =  $row_u['note'];
        $useradd_u =  $row_u['useradd'];
        $useredit_u =  $row_u['useredit'];
        $userdelete_u=  $row_u['userdelete'];
        $userview_u=$row_u['userview'];

        $useradd2_u =  $row_u['useradd2'];
        $useredit2_u =  $row_u['useredit2'];
        $userdelete2_u=  $row_u['userdelete2'];
        $userview2_u=$row_u['userview2'];

        $useradd3_u =  $row_u['useradd3'];
        $useredit3_u =  $row_u['useredit3'];
        $userdelete3_u=  $row_u['userdelete3'];
        $userview3_u=$row_u['userview3'];

        $useredit4_u    =  $row_u['useredit4'];
        $userdelete4_u  =  $row_u['userdelete4'];
        $userview4_u    =  $row_u['userview4'];

        $commissionAvailability = $row_u["commission_availability"];
      }

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Favicon -->
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="dist/css/bootstrap.min.css">
<link rel="stylesheet" href="dist/css/bootstrap-rtl.css">
  <!-- DataTables -->
<link rel="stylesheet" href="dist/css/dataTables.bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="dist/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="dist/css/ionicons.min.css">
<!-- Select -->
<link rel="stylesheet" href="dist/css/select.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/AdminScript.min.css">
<!-- AdminScript Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="dist/css/all-skins.min.css">
<!-- Styles General. -->
<link rel="stylesheet" href="dist/css/styles.css">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="dist/css/bootstrap3-wysihtml5.min.css">
<link rel="icon" href="../../img/logo_title.png" type="image/icon type">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<link rel="stylesheet" type="text/css" href="dist/css/btn-xlsx.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="dist/css/project_build.css">


<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo:300,400,600,700,300italic,400italic,600italic">

 <style>
   div.dropdown-menu {
  height: 350px;
  width: 350px;
  overflow: auto;
}

.dropdown{
 font-size: 25px
}
.navbar-badge{
 font-size: 12px;
 color: red;
 background-color:white ;
}
.dropdown-header{
color: #25b035;
    text-decoration: none;
    background-color: #f8f9fa;
    text-align: center;

}
.text{
    padding: 20px;
    border-top: 1px solid #e8eaed;
}
.text-md{
 text-indent: 50px;
  line-height: 2;
  font-size: 14px;
}
.allnoty{
display: block;
    padding: 20px;
    border-top: 1px solid #e8eaed;
    color: #484848;
    font-family: Noto Kufi Arabic,Helvetica,Arial,sans-serif;
    font-size: 18px;
    text-decoration: none;
      background-color: #f8f9fa;

}

.allnoty:hover{
 color: #25b035;
}
  </style>

</head>


<body class="hold-transition skin-blue sidebar-mini">





<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="home.php" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"></span>
    <!-- logo for regular state and mobile devices -->
   <span class="logo-lg" > التوباز </span> </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"> <span class="sr-only">Toggle navigation</span> </a>
      <div class="navbar-custom-menu">
          <!-- Right navbar links -->



        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="setting/pics/avatar.png" class="user-image" alt="User Image"> <span class="hidden-xs">
   <span class="hidden-xs">
						<?php echo $note ?>
</span>
    </a>

            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header"> <img src="setting/pics/avatar.png" class="img-circle" alt="User Image">
                 <p> <?php echo $name ?> <small><?php echo $note; ?></small> </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">

                <div class="pull-right"> <a href="profile.php?edit=pf" class="btn btn-default btn-flat">الملف الشخصي</a> </div>
                <div class="pull-left"> <a href="logout.php" class="btn btn-default btn-flat">خروج</a> </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li> <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> </li>
        </ul>

      </div>

    </nav>
  </header>

	<?php include ('menu.php');?>

