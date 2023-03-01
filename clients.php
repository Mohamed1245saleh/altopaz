<?php
error_reporting(0);
include('../connect.php');
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
session_start();
$wname = $_SESSION['logged'];
?>
<?php if( !isset($_SESSION['logged']) || !$_SESSION['logged']  || empty($_SESSION['logged'])  ){
    header("Location:index.php");
}

$sql_u="select * from users where username ='$wname' ";
$result_u=$conn->query($sql_u);
while($row_u = $result_u->fetch_assoc()) {

    $userview_=$row_u['userview'];

}

if(  $userview_ != 'on' ){
    header("Location:home.php");
}
?>

<?php include ('file/header.php');?>
    <title>العملاء</title>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> العملاء
        </h1>
        <ol class="breadcrumb" >
            <li><a href="home.php"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
            <li class="active">العملاء</li>
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
        <h3 class="box-title">العملاء</h3>
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


        <div class="alert alert-danger" id="errordoubl" style="margin-top: 10px; display: none">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>خطأ !</strong>  هذا العميل مسجل مسبقا
        </div>
        <div class="box-header with-border">
            <div class="box-header with-border">
                <form action="products.php" method="get">

                    <div class="row">
                        <div class="col-md-4">
                            <?php if ($useradd_u == 'on' ) :?>
                                <a data-toggle="modal"
                                   data-target="#add" class="btn btn-primary"><i class="fa fa-plus"></i>  اضف عميل</a>
                                <a href="upload.php" class="btn btn-success"><i class="fa fa-file-excel-o"></i> رفع من ملف اكسيل</a>
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
                    <th>الجوال</th>
                    <th>الدور</th>
                    <th>الشقه</th>
                    <th> رقم القطعه</th>
                    <th>المخطط </th>
                    <th>رقم العماره </th>
                    <th>المشروع </th>
                    <th>المسوق</th>
                    <th>الحاله</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $counts =0;
                $sql="select * from customers";
                $result=$conn->query($sql);

                while($row = $result->fetch_assoc()) {
                $cid=$row['id'];
                $counts = $counts+1;


                ?>
                <tr>
                    <th class=""><?php echo $counts ?></th>
                    <td>
                        <a target ="_blanck" href="../?c=<?php echo $row['token']; ?>&p=<?php echo $row['project']?>&b=<?php echo $row['bulding']?>"><?php echo $row['name']; ?></a>
                    </td>

                    <td class="text-center">
                        <a target="_blank" href="https://api.whatsapp.com/send?phone=00966<?php echo $row['phone']; ?>&text=http://localhost/project/?c=<?php echo $row['token']; ?>&app_absent=0"> <?php echo $row['phone']; ?></a>
                    </td>
                    <td class="text-center">
                        <?php echo $row['floor']; ?>
                    </td>
                    <td>
                        <?php echo $row['flat']; ?>
                    </td>
                    <td>
                        <?php echo $row['stock']; ?>
                    </td>

                    <td>
                        <?php echo $row['adress']; ?>
                    </td>
                    <td>

                        <?php echo $row['bulding']; ?>

                    </td>
                    <td>
                        <?php echo $row['project']; ?>
                    </td>
                    <td>
                        <?php echo $row['sales_name']; ?>
                    </td>
                    <td>
                        <?php echo $row['status']; ?>
                    </td>

                    <td class="text-center">
                        <?php if ($useredit_u == 'on' ) :?>
                            <a title="تعديل"  href='#' class="btn btn-info" data-toggle="modal" data-target="#edit<?php echo $row["id"]; ?>">
                                <i class="fa fa-edit"></i></span> تعديل</a>
                        <?php endif ?>
                    </td>


                    <td class="text-center">
                        <?php if ($userdelete_u == 'on' ) :?>
                            <a title="حذف" class="btn btn-danger" data-toggle='modal' data-target='#confirm-delete<?php echo $row["id"]; ?>' href='#'>
                                <i class="fa fa-trash-o"></i> حذف</a>
                        <?php endif ?>
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
                                            <label> الهاتف</label>
                                            <input type="tel" class="form-control" name="phone"  value="<?php echo $row["phone"]; ?>" >
                                        </div></div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>المخطط</label>
                                            <input type="text" class="form-control" name="adress"  value="<?php echo $row["adress"]; ?>" >
                                        </div></div>
                                    <!-- /.form-group -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>* المشروع</label>
                                            <input type="text" name="project" value="<?php echo $row["project"]; ?>"   class="form-control" required>
                                        </div></div>
                                    <!-- /.form-group -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>* عمارة</label>
                                            <input type="text" name="bulding"  value="<?php echo $row["bulding"]; ?>"  class="form-control" required>
                                        </div></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>* قطعة </label>
                                            <input type="text"  name="stock"   value="<?php echo $row["stock"]; ?>" class="form-control" required>
                                        </div></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>* شقة</label>
                                            <input type="text" name="flat"  value="<?php echo $row["flat"]; ?>"  class="form-control" required>
                                        </div></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>* الدور </label>
                                            <input type="text" name="floor"  value="<?php echo $row["floor"]; ?>"  class="form-control" required>
                                        </div></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>* المسوق </label>
                                            <input type="text" name="sales_name"  value="<?php echo $row["sales_name"]; ?>"  class="form-control" required>
                                        </div></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>* الحاله </label>
                                            <input type="text" name="status"  value="<?php echo $row["status"]; ?>"  class="form-control" required>
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
                    </form>
                </div>

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
                                    <input type="text" class="form-control" name="name"   required>
                                </div></div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> الجوال</label>
                                    <input type="phone" class="form-control" name="phone"  >
                                </div></div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> المخطط</label>
                                    <input type="text" class="form-control" name="adress"   >
                                </div></div>
                            <!-- /.form-group -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>* المشروع</label>
                                    <input type="text" name="project"    class="form-control" required>
                                </div></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>* عمارة</label>
                                    <input type="text" name="bulding"    class="form-control" required>
                                </div></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>* قطعة </label>
                                    <input type="text" name="stock"    class="form-control" required>
                                </div></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>* شقة</label>
                                    <input type="text" name="flat"    class="form-control" required>
                                </div></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>* الدور </label>
                                    <input type="text" name="floor"    class="form-control" required>
                                </div></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>* المسوق</label>
                                    <input type="text" name="sales_name"    class="form-control" required>
                                </div></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>* الحاله</label>
                                    <input type="text" name="status"    class="form-control" required>
                                </div></div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">تراجع</button>
                                <button type="submit" name="add" class="btn btn-primary">حفظ</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>



<?php
if(isset($_POST["add"]))
{
    $phone=htmlspecialchars($_POST['phone']);
    $name=htmlspecialchars($_POST['name']);
    $adress=htmlspecialchars($_POST['adress']);
    $project=htmlspecialchars($_POST['project']);
    $bulding=htmlspecialchars($_POST['bulding']);
    $stock=htmlspecialchars($_POST['stock']);
    $flat=htmlspecialchars($_POST['flat']);
    $floor=htmlspecialchars($_POST['floor']);
    $salesMan = htmlspecialchars($_POST['sales_name']);
    $status = htmlspecialchars($_POST['status']);

    $length=random_bytes('6');
    $token = (bin2hex($length));

    $sql1="select * from customers where name = '$name' ";
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

    $sql="insert into customers (token,name,phone,adress,project,bulding,stock,flat,floor , sales_name , status)
          values 
        ('$token','$name','$phone','$adress','$project','$bulding','$stock','$flat','$floor' , '$salesMan' , '$status')";

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
    if(isset($_SESSION["customersProjectBuildingDataForSession"])){
        unset($_SESSION["customersProjectBuildingDataForSession"]);
    }
}
?>


<?php
if(isset($_POST["update"]))
{
    $phone=htmlspecialchars($_POST['phone']);
    $name=htmlspecialchars($_POST['name']);
    $adress=htmlspecialchars($_POST['adress']);
    $project=htmlspecialchars($_POST['project']);
    $bulding=htmlspecialchars($_POST['bulding']);
    $stock=htmlspecialchars($_POST['stock']);
    $flat=htmlspecialchars($_POST['flat']);
    $floor=htmlspecialchars($_POST['floor']);
    $salesMan = htmlspecialchars($_POST['sales_name']);
    $status = htmlspecialchars($_POST['status']);
    $ids=htmlspecialchars($_POST['id']);
//
//    $sql1="select * from customers where name = '$name'  and id != '$ids'";
//    $result1=$conn->query($sql1);
//    $count1 = $result1->num_rows;
//    if ($count1 > 0){
//        ?>
<!--        <script type="text/javascript">-->
<!--            document.getElementById("errordoubl").style.display="block";-->
<!--            setTimeout(function(){-->
<!--                window.location.href=window.location.href;-->
<!--            }, 3000);-->
<!--        </script>-->
<!--    --><?php
//    }else{
    $sql="update customers set
phone	='$phone',
name = '$name',
adress = '$adress',
project = '$project',
bulding = '$bulding',
stock = '$stock',
flat = '$flat',
floor = '$floor',
status = '$status',
sales_name = '$salesMan'

where id = '$ids'
";
  
    $result=$conn->query($sql);
    if ($result == true){
    ?>
        <script type="text/javascript">
            document.getElementById("successupdate").style.display="block";
            setTimeout(function(){
                window.location.href=window.location.href;
            }, 3000);
        </script>
        <?php
    }

    if(isset($_SESSION["customersProjectBuildingDataForSession"])){
        unset($_SESSION["customersProjectBuildingDataForSession"]);
    }
}
?>


<?php
if(isset($_POST["updatem"]))
{
    $phone=htmlspecialchars($_POST['phone']);
    $name=htmlspecialchars($_POST['name']);
    $adress=htmlspecialchars($_POST['adress']);
    $project=htmlspecialchars($_POST['project']);
    $bulding=htmlspecialchars($_POST['bulding']);
    $stock=htmlspecialchars($_POST['stock']);
    $flat=htmlspecialchars($_POST['flat']);
    $floor=htmlspecialchars($_POST['floor']);
    $salesMan = htmlspecialchars($_POST['sales_name']);
    $status = htmlspecialchars($_POST['status']);

    $id=htmlspecialchars($_POST['id']);

    $sql="update customers set
name	='$name',
phone = '$phone',
adress='$adress',
project = '$project',
bulding = '$bulding',
flat = '$flat',
floor = '$floor',
sales_name = '$salesMan',
status= '$status',
stock= '$stock'
where id = '$id'
";
    $result=$conn->query($sql);

    if ($result == true){
        ?>
        <script type="text/javascript">
            document.getElementById("successupdate").style.display="block";
            setTimeout(function(){
                window.location.href=window.location.href;
            }, 3000);
        </script>
        <?php
    }
    if(isset($_SESSION["customersProjectBuildingDataForSession"])){
        unset($_SESSION["customersProjectBuildingDataForSession"]);
    }
}
?>

<?php
if(isset($_POST["addimg"]))
{
    $id=htmlspecialchars($_POST['id']);
    $imgetype=htmlspecialchars($_POST['imgetype']);


    // Count total files
    $countfiles = count($_FILES['img']['name']);

    // Looping all files
    for($i=0;$i<$countfiles;$i++){
        $img = $_FILES['img']['name'][$i];
        // Upload file
        move_uploaded_file($_FILES['img']['tmp_name'][$i],'../img/'.$img);

        $sql_img="insert into imgs (cid,imgetype,img) values ('$id','$imgetype','$img')";
        $result=$conn->query($sql_img);
    }

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
    if(isset($_SESSION["customersProjectBuildingDataForSession"])){
        unset($_SESSION["customersProjectBuildingDataForSession"]);
    }
}
?>

<?php
error_reporting(0);
if(isset($_POST["delete"]))
{

    $sql="delete  from customers  where id ='$_POST[id]'";
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
    }
    if(isset($_SESSION["customersProjectBuildingDataForSession"])){
        unset($_SESSION["customersProjectBuildingDataForSession"]);
    }
}
?>
<?php
include "file/footer.php";





