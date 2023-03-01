<?php
     error_reporting(0);
  include('../connect.php');
 session_start();
  $wname = $_SESSION['logged'];

    ?>
<?php if( !isset($_SESSION['logged']) || !$_SESSION['logged']  || empty($_SESSION['logged'])  ){
	header("Location:index.php");
}
$sql_u="select * from users where username ='$wname' ";
      $result_u=$conn->query($sql_u);
			while($row_u = $result_u->fetch_assoc()) {

        $userview_2_=$row_u['userview2'];
        $isAdmin  = $row_u["is_admin"];
      }

if(  $userview_2_ != 'on' ){
	header("Location:home.php");
}
$currentUser = 0;
$fireAdminNotSelectedFlag = false;
$fireAdminExists = false;
$query = "SELECT id  FROM users WHERE is_admin  = 'on'";
$result = $conn->query($query);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $currentUser = $row["id"];
    }
}

if($currentUser == 0){
$fireAdminNotSelectedFlag = true;
}elseif($currentUser > 0 && $currentUser == $_SESSION["userId"]){
    $fireAdminExists = true;
}
?>

<?php include ('file/header.php');?>
    <title>مستخدمى لوحة التحكم</title>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> مستخدمى لوحة التحكم
	  </h1>
	  <ol class="breadcrumb" >
        <li><a href="home.php"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        <li class="active">مستخدمى لوحة التحكم</li>
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
              <h3 class="box-title">مستخدمى لوحة التحكم</h3>
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

    <div class="alert alert-danger" id="error" style="margin-top: 10px; display: none">
      <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>خطأ !</strong> كلمتي المرور غير متطابقتين
        </div>
     <div class="alert alert-danger" id="errordoubl" style="margin-top: 10px; display: none">
       <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>خطأ !</strong>  اسم المستخدم موجود مسبقا
        </div>
                <div class="box-header with-border">
       <div class="box-header with-border">
                    <form action="products.php" method="get">

                        <div class="row">
                            <div class="col-md-4">
                               <?php if ($useradd2_u == 'on' ) :?>
                             <a data-toggle="modal"
                               data-target="#add" class="btn btn-primary"><i class="fa fa-plus"></i>  اضف</a>
                             <?php endif ?>

                            </div>


                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

			  <div class="box-tools pull-left">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body table-responsive">

		<table id="TableForm" class="table table-bordered table-striped">
            <thead>
                <tr>
					<th class="">#</th>
     <th>الاسم الكامل</th>
     	<th>اسم الدخول</th>
        <th>رقم واتساب</th>
					<th>تعديل</th>
					<th>حذف</th>
                </tr>
            </thead>
			<tbody>
       <?php
			 $count =0;
			$sql="select * from users  ";
      $result=$conn->query($sql);
			while($row = $result->fetch_assoc()) {
				$count = $count+1;
			?>
            <tr>
					<th class=""><?php echo $count ?></th>

                    <td>
                        <?php
                           if($fireAdminNotSelectedFlag){

                               if ($isAdmin == 'on')
                               {
                                   echo '<input class="whatsappUserNumber" style="float: right" type="radio" 
                          name="is_admin" id="isAdmin" value="'.$row["id"].'" checked>';
                               }elseif ($row["is_admin"] == 'off'){
                                   echo '<input class="whatsappUserNumber" style="float: right" type="radio" 
                           name="is_admin" id="isAdmin" value="'.$row["id"].'">';
                               }

                           }elseif($fireAdminExists){
                               if ($row["is_admin"] == 'on')
                               {
                                   echo '<input class="whatsappUserNumber" style="float: right" type="radio" 
                          name="is_admin" id="isAdmin" value="'.$row["id"].'" checked>';
                               }elseif ($row["is_admin"] == 'off'){
                                   echo '<input class="whatsappUserNumber" style="float: right" type="radio" 
                           name="is_admin" id="isAdmin" value="'.$row["id"].'">';
                               }
                           }



                        ?>
                    <?php echo $row['name']; ?>

                    </td>
          <td>
           <?php echo $row['username']; ?>
         </td>
                <td>
                    <?php
                    if($row['whatsapp'] != ""){
                        if ($row["whatsappAvaliability"] == 1)
                        {
                            echo '<input class="whatsappUserNumber" style="float: right" type="radio" aria-label="Checkbox for following text input"
                          name="whatsappCheck" id="whatsappUserNumberCheck" value="'.$row["id"].'" checked>';
                        }else{
                            echo '<input class="whatsappUserNumber" style="float: right" type="radio" aria-label="Checkbox for following text input"
                           name="whatsappCheck" id="whatsappUserNumberCheck" value="'.$row["id"].'">';
                        }
                    }

                    ?>


                    <a target="_blank" href="https://api.whatsapp.com/send?phone=00966<?php echo $row['whatsapp']; ?>" >
                    <?php echo $row['whatsapp']; ?>
                    </a>
                </td>
				<td class="text-center">
     <?php if ($useredit2_u == 'on' ) :?>
						<a title="تعديل"  href='#' class="btn btn-info" data-toggle="modal" data-target="#edit<?php echo $row["id"]; ?>">
						<i class="fa fa-edit"></i></span> تعديل</a>
       <?php endif ?>
					</td>

					<td class="text-center">
       <?php if ($row['type'] == '1' ) :?>
        <?php if ($userdelete2_u == 'on' ) :?>
						<a title="حذف" class="btn btn-danger" data-toggle='modal' data-target='#confirm-delete<?php echo $row["id"]; ?>' href='#'>
						<i class="fa fa-trash-o"></i> حذف</a>
      <?php endif ?>
       <?php endif ?>
      <br>
                    </td>
            </tr>

		<!-- اضافة -->
        <div class="modal fade" id="edit<?php echo $row["id"]; ?>"  role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">تعديل</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post" >
                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>"   class="form-control" >

                        <div class="modal-body">
                            <p>تعديل ؟</p>

                            <br>

                            <div class="col-md-12">
                                <div class="form-group">
                             <label>* الاسم الكامل</label>
                               <input type="text" class="form-control" name="name"  value="<?php echo $row["name"]; ?>" required>
                                </div></div>
                                 <div class="col-md-12">
                                <div class="form-group">
                             <label>* البريد الالكتروني</label>
                               <input type="email" class="form-control" name="mail" value="<?php echo $row["mail"]; ?>" >
                                </div></div>
                                <!-- /.form-group -->
                                <div class="col-md-12">
                               <div class="form-group">
                               <label>إسم الدخول</label>
                               <input type="text" name="username" value="<?php echo $row["username"]; ?>"   class="form-control" required>
                               </div></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>رقم الواتساب</label>
                                    <input type="tel" name="whatsapp" pattern="^([0-9]|[0-9]{9})$"  title="من فضلك ادخل رقم الواتساب من دون صفر في البدايه وتأكد ان عدد الارقام المدخله 9 ارقام فقط" value="<?php echo $row["whatsapp"]; ?>"   class="form-control">
                                </div></div>
                               <!-- /.form-group -->
                               <div class="col-md-6">
                               <div class="form-group">
                               <label>كلمة المرور </label>
                               <input  type="text" name="pw"  value='' class="form-control">
                               </div></div>
                               <div class="col-md-6">
                               <div class="form-group">
                               <label>تأكيد كلمة المرور</label>
                               <input type="text" name="pwd"  value='' class="form-control">
                               </div></div>
                               <!-- /.form-group -->

                                  <div class="col-md-12">

                               <?php if($isAdmin == 'on'):?>
                                   <div class="form-group">
                                       <label>الصلاحيات</label>
                                   </div>
                               <div class="form-group">
                                 <label style="padding-left: 53px;color: green">العملاء</label>
                                 <label>عرض</label>
                                <input type="checkbox" name="userview"  <?php echo ($row["userview"] =='on' ? 'checked' : '');?>  >
                              &nbsp;&nbsp;
                               <label>اضافة</label>
                                <input type="checkbox" name="useradd"  <?php echo ($row["useradd"] =='on' ? 'checked' : '');?>  >
                              &nbsp;&nbsp;
                                <label>تعديل</label>
                               <input type="checkbox" name="useredit"  <?php echo ($row["useredit"] =='on' ? 'checked' : '');?>  >
                                &nbsp;&nbsp;
                                <label>حذف</label>
                               <input type="checkbox" name="userdelete"  <?php echo ($row["userdelete"] =='on' ? 'checked' : '');?> >
                               <label>العمولة</label>
                                   <input type="checkbox" name="commission"  <?php echo ($row["commission_availability"] =='on' ? 'checked' : '');?> >
                               </div>
                               <div class="form-group">
                                 <label style="padding-left: 15px;color: green">المستخدمين</label>&nbsp;&nbsp;
                                 <label>عرض</label>
                               <input type="checkbox" name="userview2"  <?php echo ($row["userview2"] =='on' ? 'checked' : '');?> >
                              &nbsp;&nbsp;
                               <label>اضافة</label>
                               <input type="checkbox" name="useradd2"  <?php echo ($row["useradd2"] =='on' ? 'checked' : '');?> >
                                 &nbsp;&nbsp;
                                <label>تعديل</label>
                               <input type="checkbox" name="useredit2" <?php echo ($row["useredit2"] =='on' ? 'checked' : '');?>  >
                               &nbsp;&nbsp;
                                <label>حذف</label>
                               <input type="checkbox" name="userdelete2" <?php echo ($row["userdelete2"] =='on' ? 'checked' : '');?> >
                               </div>
                               <div class="form-group">
                                 <label style="padding-left: 35px;color: green">الاعدادات</label>&nbsp;&nbsp;
                                 <label>عرض</label>
                               <input type="checkbox" name="userview3"  <?php echo ($row["userview3"] =='on' ? 'checked' : '');?> >
                              &nbsp;&nbsp;
                               <label>اضافة</label>
                               <input type="checkbox" name="useradd3"  <?php echo ($row["useradd3"] =='on' ? 'checked' : '');?> >
                               &nbsp;&nbsp;
                                <label>تعديل</label>
                               <input type="checkbox" name="useredit3" <?php echo ($row["useredit3"] =='on' ? 'checked' : '');?>  >
                               &nbsp;&nbsp;
                                <label>حذف</label>
                               <input type="checkbox" name="userdelete3" <?php echo ($row["userdelete3"] =='on' ? 'checked' : '');?> >
                               </div>
                               <div class="form-group">
                                          <label style="padding-left: 22px;color: green">المجموعات</label>&nbsp;&nbsp;
                                          <label>عرض</label>
                                          <input type="checkbox" name="userview4"  <?php echo ($row["userview4"] =='on' ? 'checked' : '');?> >
                                          &nbsp;&nbsp;

                                          <label>تعديل</label>
                                          <input type="checkbox" name="useredit4" <?php echo ($row["useredit4"] =='on' ? 'checked' : '');?>  >
                                          &nbsp;&nbsp;
                                          <label>حذف</label>
                                          <input type="checkbox" name="userdelete4" <?php echo ($row["userdelete4"] =='on' ? 'checked' : '');?> >
                                      </div>
                               <?php endif?>
                                  </div>
                               <!-- /.form-group -->


                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">تراجع</button>
                            <button type="submit" name="update" class="btn btn-primary">حفظ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>


				<!--حذف-->
				<div class="modal fade" id="confirm-delete<?php echo $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">تأكيد الحذف</h4>
					<form action="" method="post">
				 <input type="hidden" name="id" id="id" value="<?php echo $row["id"]; ?>">
      </div>

      <div class="modal-body">
        <p>أنت على وشك حذف بيانات, هذا الإجراء لا رجعة فيه. هل تريد تفعيله؟</p>
        <p class="debug-url"></p>
				 <div class="col-md-12">
      <input type="text" class="form-control" value="<?php echo $row["name"]; ?>" readonly>
				 </div><br /><br />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">تراجع</button>
				 <button type="submit" name="delete" class="btn btn-danger danger">تأكيد</button>
	  </div>
    </div>
		 </form>
  </div>
</div>
           <?php } ?>
		</tbody>
			</table>

				<!-- اضافة -->
        <div class="modal fade" id="add"  role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">إضافة</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post" >

                        <div class="modal-body">
                            <p>اضافة  جديد ؟</p>

                            <br>

                            <div class="col-md-12">
                                <div class="form-group">
                             <label>* الاسم الكامل</label>
                               <input type="text" class="form-control" name="name"  value="" required>
                                </div></div>
                             <div class="col-md-12">
                                <div class="form-group">
                             <label>* البريد الالكتروني</label>
                               <input type="email" class="form-control" name="mail"  value="" required>
                                </div></div>

                                <!-- /.form-group -->
                                <div class="col-md-12">
                               <div class="form-group">
                               <label>إسم الدخول</label>
                               <input type="text" name="username"   class="form-control" required>

                               </div></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>رقم الواتساب</label>
                                    <input placeholder="من فضلك ادخل رقم الواتساب من دون صفر في البدايه" type="text" name="whatsapp"  pattern="^([0-9]|[0-9]{9})$"  title="من فضلك ادخل رقم الواتساب من دون صفر في البدايه" class="form-control" required>
                                </div></div>
                               <!-- /.form-group -->
                               <div class="col-md-6">
                               <div class="form-group">
                               <label>كلمة المرور </label>
                               <input  type="text" name="pw"  value='' class="form-control"  required>
                               </div></div>
                               <div class="col-md-6">
                               <div class="form-group">
                               <label>تأكيد كلمة المرور</label>
                               <input type="text" name="pwd"  value='' class="form-control" required>
                               </div></div>
                               <!-- /.form-group -->
                                  <div class="col-md-12">
                                      <?php if($isAdmin == 'on'):?>
                                      <div class="form-group">
                               <label>الصلاحيات</label>
                                </div>
                               <div class="form-group">
                                 <label style="padding-left: 53px;color: green">العملاء</label>
                                   <label>عرض</label>
                               <input type="checkbox" name="userview"   >
                              &nbsp;&nbsp;
                               <label>اضافة</label>
                               <input type="checkbox" name="useradd"   >
                              &nbsp;&nbsp;
                                <label>تعديل</label>
                               <input type="checkbox" name="useredit"   >
                                &nbsp;&nbsp;
                                <label>حذف</label>
                               <input type="checkbox" name="userdelete"  >

                                   <label>العمولة</label>
                                   <input type="checkbox" name="commission" >
                               </div>

                               <div class="form-group">
                                 <label style="padding-left: 15px;color: green">المستخدمين</label>&nbsp;&nbsp;
                                 <label>عرض</label>
                               <input type="checkbox" name="userview2"   >
                              &nbsp;&nbsp;
                               <label>اضافة</label>
                               <input type="checkbox" name="useradd2"   >
                                 &nbsp;&nbsp;
                                <label>تعديل</label>
                               <input type="checkbox" name="useredit2"   >
                               &nbsp;&nbsp;
                                <label>حذف</label>
                               <input type="checkbox" name="userdelete2"  >
                               </div>
                               <div class="form-group">
                                 <label style="padding-left: 35px;color: green">الاعدادات</label>&nbsp;&nbsp;
                                 <label>عرض</label>
                               <input type="checkbox" name="userview3"   >
                              &nbsp;&nbsp;
                               <label>اضافة</label>
                               <input type="checkbox" name="useradd3"   >
                               &nbsp;&nbsp;
                                <label>تعديل</label>
                               <input type="checkbox" name="useredit3"   >
                               &nbsp;&nbsp;
                                <label>حذف</label>
                               <input type="checkbox" name="userdelete3"  >
                               </div>
                               <div class="form-group">
                                          <label style="padding-left: 22px;color: green">المجموعات</label>&nbsp;&nbsp;
                                          <label>عرض</label>
                                          <input type="checkbox" name="userview4">
                                          &nbsp;&nbsp;

                                          &nbsp;&nbsp;
                                          <label>تعديل</label>
                                          <input type="checkbox" name="useredit4">
                                          &nbsp;&nbsp;
                                          <label>حذف</label>
                                          <input type="checkbox" name="userdelete4">
                                      </div>
                                     <?php endif?>
                                  </div>
                               <!-- /.form-group -->



                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">تراجع</button>
                            <button type="submit" name="add" class="btn btn-primary">حفظ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>

		</div>
		</div>

	<?php
if(isset($_POST["add"]))
{
$username=htmlspecialchars($_POST['username']);
$name=htmlspecialchars($_POST['name']);
$password=htmlspecialchars($_POST['pw']);
$mail=htmlspecialchars($_POST['mail']);
$whatsAppNumber = htmlspecialchars($_POST['whatsapp']);

$userview=htmlspecialchars($_POST['userview']);
$useradd=htmlspecialchars($_POST['useradd']);
$useredit=htmlspecialchars($_POST['useredit']);
$userdelete=htmlspecialchars($_POST['userdelete']);

$userview2=htmlspecialchars($_POST['userview2']);
$useradd2=htmlspecialchars($_POST['useradd2']);
$useredit2=htmlspecialchars($_POST['useredit2']);
$userdelete2=htmlspecialchars($_POST['userdelete2']);

$userview3=htmlspecialchars($_POST['userview3']);
$useradd3=htmlspecialchars($_POST['useradd3']);
$useredit3=htmlspecialchars($_POST['useredit3']);
$userdelete3=htmlspecialchars($_POST['userdelete3']);

$userview4=htmlspecialchars($_POST['userview4']);
$useredit4=htmlspecialchars($_POST['useredit4']);
$userdelete4=htmlspecialchars($_POST['userdelete4']);

$commission = htmlspecialchars($_POST['commission']);

$password= $password;
$password_confirmation=htmlspecialchars($_POST['pwd']);
$password_confirmation= $password_confirmation;
if ($password!==$password_confirmation){
 ?>
   <script type="text/javascript">
      document.getElementById("error").style.display="block";
    </script>
    <?php
}else{
$sql1="select * from users where username = '$username' ";
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
       $passordsDB = md5($password);
$sql="insert into users (username,name,password,mail,whatsapp,userview,useradd,useredit,userdelete,userview2,useradd2,useredit2,userdelete2,userview3,useradd3,useredit3,userdelete3,userview4,useredit4,userdelete4 , commission_availability) values
('$username','$name','$passordsDB','$mail','$whatsAppNumber','$userview', '$useradd','$useredit','$userdelete','$userview2','$useradd2','$useredit2','$userdelete2','$userview3','$useradd3','$useredit3','$userdelete3','$userview4','$useredit4','$userdelete4' , '$commission')";
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
}}}
?>


<?php
if(isset($_POST["update"]))
{
$username=htmlspecialchars($_POST['username']);
$name=htmlspecialchars($_POST['name']);
$password=htmlspecialchars($_POST['pw']);
$ids=htmlspecialchars($_POST['id']);
$mail=htmlspecialchars($_POST['mail']);
$whatsAppNumber = htmlspecialchars($_POST['whatsapp']);
$userview=htmlspecialchars($_POST['userview']);
$useradd=htmlspecialchars($_POST['useradd']);
$useredit=htmlspecialchars($_POST['useredit']);
$userdelete=htmlspecialchars($_POST['userdelete']);

$userview2=htmlspecialchars($_POST['userview2']);
$useradd2=htmlspecialchars($_POST['useradd2']);
$useredit2=htmlspecialchars($_POST['useredit2']);
$userdelete2=htmlspecialchars($_POST['userdelete2']);

$userview3=htmlspecialchars($_POST['userview3']);
$useradd3=htmlspecialchars($_POST['useradd3']);
$useredit3=htmlspecialchars($_POST['useredit3']);
$userdelete3=htmlspecialchars($_POST['userdelete3']);

$userview4=htmlspecialchars($_POST['userview4']);
$useredit4=htmlspecialchars($_POST['useredit4']);
$userdelete4=htmlspecialchars($_POST['userdelete4']);

$commission = htmlspecialchars($_POST['commission']);

$password= $password;
$password_confirmation=htmlspecialchars($_POST['pwd']);
$password_confirmation= $password_confirmation;
if ($password!==$password_confirmation){
 ?>
   <script type="text/javascript">
      document.getElementById("error").style.display="block";
    </script>
    <?php
}else{
$sql1="select * from users where username = '$username' and id != '$ids' ";
$result1=$conn->query($sql1);
$count1 = $result1->num_rows;
if ($count1 > 0){
    ?>
<script type="text/javascript">
      document.getElementById("errordoubl").style.display="block";
         setTimeout(function(){
             window.location.href=window.location.href;
               }, 3000);
    </script>
    <?php
   }else{
    if($password == ""){
        $passwordUpdateStatement = "";
    }else{
        $passwordUpdate = md5($password);
        $passwordUpdateStatement = "password='$passwordUpdate',";

    }

    if($whatsAppNumber == ""){
        $whatsAppNumberUpdateStatement = "";
    }else{
        $whatsAppNumberUpdateStatement = "whatsapp='$whatsAppNumber',";
    }

    if($mail == ""){
        $mailUpdateStatement = "";
    }else{
        $mailUpdateStatement = "mail = '$mail',";
    }

$sql="update users set
username='$username',
name = '$name',
$passwordUpdateStatement
$mailUpdateStatement
$whatsAppNumberUpdateStatement
useradd='$useradd',
useredit='$useredit',
userdelete='$userdelete',
useradd2='$useradd2',
useredit2='$useredit2',
userdelete2='$userdelete2',
useradd3='$useradd3',
useredit3='$useredit3',
userdelete3='$userdelete3',
userview='$userview',
userview2='$userview2',
userview3='$userview3',
userview4 = '$userview4',
useredit4='$useredit4',
userdelete4='$userdelete4',
commission_availability = '$commission'
where id = '$ids'
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
}}}
?>



<?php
error_reporting(0);
if(isset($_POST["delete"]))
{

  $sql="delete  from users  where id ='$_POST[id]'";
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


	</body>
</html>



<?php include ('file/footer.php');?>
<?php
if($fireAdminNotSelectedFlag){
    ?>
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: "من فضلك قم باختيار مدير للنظام من خلال تحديد الدائره المتواجده علي يمين الاسم",
            showConfirmButton: true,

        })
    </script>
  <?php
}

?>
