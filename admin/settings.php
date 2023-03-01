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
        $userview3_=$row_u['userview3'];
      }
if(  $userview3_ != 'on' ){
	header("Location:home.php");
} 
?>

<?php include ('file/header.php');?>
    <title>المقدمة</title>        
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> المقدمة
	  </h1>
	  <ol class="breadcrumb" >
        <li><a href="home.php"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        <li class="active">المقدمة</li>
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
              <h3 class="box-title">المقدمة</h3>
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
   
                <div class="box-header with-border">
       <div class="box-header with-border">
                     <form action="">

                        <div class="row">
                            <div class="col-md-4">
                             <?php if ($useradd3_u == 'on' ) :?>
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
     <th>النص</th>
					<th>تعديل</th>
     					<th>حذف</th>

                </tr>
            </thead>
			<tbody>
       <?php
			 $count =0;
			$sql="select * from setting  ";
      $result=$conn->query($sql);
			while($row = $result->fetch_assoc()) {
				$count = $count+1;
			?>
            <tr>
					<th class=""><?php echo $count ?></th>
    
                    <td>
                    <?php echo $row['comment']; ?>
                    </td>
          
				<td class="text-center">
     <?php if ($useredit3_u == 'on' ) :?>
						<a title="تعديل"  href='#' class="btn btn-info" data-toggle="modal" data-target="#edit<?php echo $row["id"]; ?>">
						<i class="fa fa-edit"></i></span> تعديل</a>
       <?php endif ?>
					</td>
                   
			<td class="text-center">
      <?php if ($userdelete3_u == 'on' ) :?>
						<a title="حذف" class="btn btn-danger" data-toggle='modal' data-target='#confirm-delete<?php echo $row["id"]; ?>' href='#'>
						<i class="fa fa-trash-o"></i> حذف</a>
       <?php endif ?>
                    </td>
            </tr>
						
		<!-- تعديل -->
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
                               <label>المقدمة</label>
                               <textarea rows="10" cols="4" name="comment" class="form-control" required><?php echo $row["comment"]; ?></textarea>
                               </div></div>
                            
                                

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
       <textarea rows="10" cols="4" name="comment" class="form-control" readonly><?php echo $row["comment"]; ?></textarea>
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
                               <label>المقدمة</label>
                               <textarea rows="10" cols="4" name="comment" class="form-control" required></textarea>
                               </div></div>
                                

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
$comment=htmlspecialchars($_POST['comment']);

$sql="insert into setting (comment) values ('$comment')";
$result1=$conn->query($sql);
if ($result == true){
 ?>
  <script type="text/javascript">
      document.getElementById("successadd").style.display="block";
         setTimeout(function(){
             //window.location.href=window.location.href;
               }, 3000);
    </script>
  <?php
}
}
?>

<?php
if(isset($_POST["update"]))
{
$comment=htmlspecialchars($_POST['comment']);
$ids=htmlspecialchars($_POST['id']);

$sql="update setting set
comment='$comment'
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
}
?>

<?php
error_reporting(0);
if(isset($_POST["delete"]))
{
  
  $sql="delete  from setting  where id ='$_POST[id]'";
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
