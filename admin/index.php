<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>لوحة التحكم</title>
	<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
	<meta charset="utf-8">
    <link rel="icon" type="image/png" href="dist/img/favicon.png" />

<link rel="stylesheet" href="dist/css/login.css">
<!-- jQuery 3 -->
<script src="dist/js/jquery.min.js"></script>
<!-- AdminScript App -->
<script src="dist/js/AdminScript.min.js"></script>
<!-- AdminScript for skins purposes -->
<script src="dist/js/skins.js"></script>

<!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo:300,400,600,700,300italic,400italic,600italic">-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Reem Kufi' rel='stylesheet'>
    <style>

.alert-danger {
    color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
        padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}

</style>
</head>
<body>
	<div id="Authentication">

      <div class="Authright">
<!--				-->
			<h2><img  src="../img/Logo.png"/>  </h2>
          <h1>لوحة التحكم</h1>
  		</div>
  		<div class="Authleft">
            <h1>تسجيل الدخول </h1>

            <form role="form" method="post" action="">
                      <div class="alert alert-danger" id="error" style="margin-top: 10px; display: none">

                    </div>
                			<div class="form-control">
              					<input type="text" placeholder="إسم المستخدم" required autofocus name="login">
              				</div>
              				<div class="form-control">
              					<input type="password" placeholder="كلمة المرور" required name="pwd">
              				</div>
              					<div class="form-control">
              					<input style="cursor: pointer" type="submit" value="دخول" name="submit">
              				</div>
              			</form>
            <img class="floteksa"  src="../img/flotek-logo.png"/>
        </div>
        <template id="my-template">
            <swal-title >
                <strong style="color:red">خطأ !</strong> بيانات الدخول غير صحيحة
            </swal-title>
            <swal-icon type="warning" color="red"></swal-icon>

            <swal-param name="allowEscapeKey" value="false" />
            <swal-param
                    name="customClass"
                    value='{ "popup": "my-popup" }' />
        </template>
  </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
if (isset($_POST['submit'])){

include('../connect.php');
$wname=$_POST['login'];
$pass=$_POST['pwd'];
$password = md5($pass);
$sql="select * from users where username ='$wname' and password='$password' ";
$result=$conn->query($sql);
$count = $result->num_rows;
if ($count>0){

    $_SESSION['logged']=$wname;
  header('location:home.php');


}
else{
   ?>
   <script type="text/javascript">
      // document.getElementById("error").style.display="block";
      Swal.fire({
          template: '#my-template'
      })
    </script>
    <?php
}}
?>

</body>
</html>







