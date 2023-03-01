<?php
     error_reporting(0);
  include('connect.php');
 session_start();
    ?>
<?php if( !isset($_SESSION['logged']) || !$_SESSION['logged']  || empty($_SESSION['logged'])  ){
	header("Location:index.php");
}
if (!isset($_SESSION['logged'])){
 	header("Location:home.php");
}
$wname =  $_SESSION['logged'];

?>

<?php include ('file/header.php');?>
    <title>ملفي الشخصي</title>    
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> ملفي الشخصي 
	  </h1>
	  <ol class="breadcrumb" >
        <li><a href="home.php"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        <li class="active">ملفي الشخصي</li>
      </ol>	
    </section>
    
    <!-- Main content -->
    <section class="content"> 
      <!-- Main row -->
      <div class="row"> 
     
        <!-- Section General -->
        <section class="col-lg-12 connectedSortable">
		 
   
<!-- Star -->
 <?php

			$sql="select * from users where username ='$wname'  ";
        $result=$conn->query($sql);
			while($row = $result->fetch_assoc()) {
    $name = $row['name'];
     $id = $row['id'];
    $type= $row['type'];
    $username = $row['username'];
    $password = $row['password'];
   }
			?>
	<!-----------------------Changer------------------------------>
	<div class="row">

	

		
	<div class="col-md-12">
          
		<div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">ملفي الشخصي</h3>
              
              <div class="box-tools pull-left">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<div class="alert alert-info" id="successadd" style="margin-top: 10px; display: none">
            <strong>نجاح العملية !</strong> تم التعديل بنجاح
        </div>
    <div class="alert alert-danger" id="error" style="margin-top: 10px; display: none">
            <strong>خطأ !</strong> كلمتي المرور غير متطابقتين
        </div>
     <div class="alert alert-danger" id="errordoubl" style="margin-top: 10px; display: none">
            <strong>خطأ !</strong>  اسم الدخول مستخدم من قبل
        </div>
                
                 
     <form method="POST" action="" role="form" >

                  <div class="form-group">
                    <label for="exampleInputEmail1">الإسم الكامل</label>
                    <input type="text" name="name" value="<?php echo $name ?>"   class="form-control" required>
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>إسم الدخول</label>
                    <input type="text" name="username" value="<?php echo $username ?>"    class="form-control" required>
                  </div>
                  <!-- /.form-group -->
				  
				  <div class="form-group">
                    <label>كلمة المرور </label>
                    <input  type="text" name="pw"   class="form-control"  required>
                  </div>
				
				  <div class="form-group">
                    <label>تأكيد كلمة المرور</label>
                    <input type="text" name="pwd"   class="form-control" required>
                  </div>
                  <!-- /.form-group -->
               
	<!-----------------------Fin Changer------------------------------>
<div class="clear"></div>
<div class="box-footer text-center">
	<input type="submit" name="add" class="btn btn-min btn-primary btn-lg" value="تعديل"/>
</div>
</form>

            </div>
            <!-- /.box-body --> 
          </div>
		  
	</div>
    <!-- /.col -->

	</div>


<?php
if(isset($_POST["add"]))
{
$username=htmlspecialchars($_POST['username']);
$name=htmlspecialchars($_POST['name']);
$password=htmlspecialchars($_POST['pw']);


$password= md5($password);
$password_confirmation=htmlspecialchars($_POST['pwd']);
$password_confirmation= md5($password_confirmation);
if ($password!==$password_confirmation){
 ?>
   <script type="text/javascript">
      document.getElementById("error").style.display="block";
    </script>
    <?php
}else{
$sql1="select * from users where username = '$username' and id != '$id' ";
$result1=$conn->query($sql1);
$count1 = $result1->num_rows;
if ($count1>0){
    ?>
<script type="text/javascript">
      document.getElementById("errordoubl").style.display="block";
         setTimeout(function(){
             window.location.href=window.location.href;
               }, 3000);
    </script>
    <?php
   }else{
$sql="update users set
username='$username',
name = '$name',
password='$password'
where id = '$id'
";
$result=$conn->query($sql);
if ($result == true){
 ?>
  <script type="text/javascript">
      document.getElementById("successadd").style.display="block";
         setTimeout(function(){
             window.location.href="logout.php";
               }, 3000);
    </script>
  <?php
}
}}}
?>


<?php include ('file/footer.php');?>
