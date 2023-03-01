<?php
 include('../connect.php');
 

 if(isset($_GET['id']))
 {
    $sql_image="select * from imgs where id = '$_GET[id]' ";
                  $result_imge=$conn->query($sql_image);
               while($row_imge = $result_imge->fetch_assoc()) {
                $img = $row_imge['img'];
               }
      unlink("../img/$img");
    $sql = "delete from imgs where id='".$_GET['id']."'";
     $result=$conn->query($sql);
    header("Location: clients.php");
}
