<?php

class html_groups_functions
{
    public $dataQuery;
    private $insertToProjectBuildTableFlag = false;
    private $isBuildingDeliveryChecked;

    function headPreview ()
    {
        echo '<section class="content-header">
        <h1> العملاء
        </h1>
        <ol class="breadcrumb" >
            <li><a href="home.php"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
            <li class="active">العملاء</li>
        </ol>
    </section>
    ';

    }


    function searchSection ()
    {
        $data = $this->getAllProectsAndBuildingsFromCustomers();
        $duplicatedProjectArray = array();
        echo "
         <select class='selectProjectsOption' id='projectOptionsSelect' style='margin-right:10px;'>
         <option id='-1' value='-1'>اختر مشروع</option>> ";
        for ($x = 0; $x < count($data); $x++) {
            if (!in_array($data[$x]["project"], $duplicatedProjectArray)) {
                array_push($duplicatedProjectArray, $data[$x]["project"]);
                echo '<option id="' . $data[$x]["project"] . '" value="' . $data[$x]["project"] . '">' . $data[$x]["project"] . '</option>';
            }

        }
        echo '</select>';
        echo "
        <select  class='selectProjectsOption' id='buildingOptionsSelect' style='margin-right:30px;'>
        <option id='-1' value='-1'>اختر عماره</option>>";
        for ($x = 0; $x < count($data); $x++) {
            echo '<option id="' . $data[$x]["project"] . '" value="' . $data[$x]["bulding"] . '" style="display:none;">' . $data[$x]["bulding"] . '</option>';
        }
        echo '</select>';
        echo '<button  class="btn btn-primary primary" style="margin-right: 40px;" id="projectBuildButton">
           <i class="fa fa-search"></i></button>
         </br></br></br>
         ';

    }

    function editButton ()
    {
        $content = '  <div class="modal fade" id="editrowId"  role="dialog" aria-labelledby="exampleModalLabel"
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
                                            <input type="hidden" name="id" value="rowId"   class="form-control" >

                                            <div class="modal-body">
                                                <p>تعديل ؟</p>

                                                <br>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>رقم المشروع</label>
                                                        <input type="text" name="projectNumber" class="form-control" value="project_number" required/>
                                                    </div></div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>رقم العمار</label>
                                                        <input type="text" name="buildingNumber" class="form-control" value="building_number" required>
                                                    </div></div>
                                                    
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>تاريخ إصدار رخصة البناء</label>
                                                        <input id="projectDateid" type="date" name="projectDate" class="form-control" value="project_date"/>
                                                    </div></div>

                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>تاريخ التسليم</label>
                                                        <input id="projectDeliveryDateid" type="date" name="projectDeliveryDate" class="form-control" value="project_delivery_date" />
                                                    </div></div>

                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>إصدار رخصة البناء</label>
                                                        <input type="number" name="firstStep" class="form-control" value="step1"/>
                                                    </div></div>
                                                    
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>الأعمال الإنشائية</label>
                                                        <input type="number" name="secondStep" class="form-control" value="step2"/>
                                                    </div></div>
                                                    
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>التشطيبات الداخلية</label>
                                                        <input type="number" name="thirdStep" class="form-control" value="step3"/>
                                                    </div></div>
                                                    
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>التشطيبات الخارجية</label>
                                                        <input type="number" name="fourthStep" class="form-control" value="step4"/>
                                                    </div></div>
                                                    
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>استلام اتحاد الملاك</label>
                                                        <input type="number" name="fifthStep" class="form-control" value="step5"/>
                                                    </div></div>
                                                    
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>فرز الصكوك</label>
                                                        <input type="number" name="sixthStep" class="form-control" value="step6"/>
                                                    </div></div>
                                                    
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>شهادة الأشغال</label>
                                                        <input type="number" name="seventhStep" class="form-control" value="step7"/>
                                                    </div></div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">تراجع</button>
                                                    <button type="submit" name="update" class="btn btn-primary">حفظ</button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>';
        $this->displayData($content);


    }

    function deleteButton ()
    {
        $content = '                    <div class="modal fade" id="confirm-deleterowId" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">تأكيد الحذف</h4>
                                    <form action="" method="post">
                                        <input type="hidden" name="id" id="id" value="rowId">
                                </div>

                                <div class="modal-body">
                                    <p style="color:red;font-size:20px;">الرجاء الانتباه اذا قمت بحذف هذا المشروع سوف يتم حذف كل العملاء والصور التابعين لهذا المشروع</p>
                                    <p class="debug-url"></p>
                                    <div class="col-md-6">
                                        <input type="text" name="project_number" class="form-control" value="project_number" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="building_number" class="form-control" 
                                        value="building_number"
                                        readonly></input>
                                    </div>
                                    <br /><br />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">تراجع</button>
                                    <button type="submit" name="delete" class="btn btn-danger danger">تأكيد</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    </tbody>
                    </table>
                    </div>
';
         $this->displayData($content);

    }


    function tableHeader ()
    {

        echo '

      <div class="box-body table" >
             <div class="col-md-12">
                        <table id="projectBuildTable">
                            <thead>
                            <tr>
                                
                                <th>رقم المشروع</th>
                                <th>رقم العماره</th>
                                <th>تاريخ إصدار رخصة البناء</th>
                                <th>تاريخ التسليم</th>
                                <th>إصدار رخصة البناء</th>
                                <th>الأعمال الإنشائية</th>
                                <th>التشطيبات الداخلية</th>
                                <th>التشطيبات الخارجية</th>
                                <th>استلام اتحاد الملاك</th>
                                <th>فرز الصكوك</th>
                                <th>شهادة الأشغال</th>
                                <th>تسليم المبني</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                                

                            </tr>
                            </thead>
                            <tbody>';
    }

    function tableRowContent ()
    {
        $content = '<tr>
                                
                                
                                <td>
                                    project_number
                                </td>
                                <td>
                                    building_number
                                </td>
                                <td>
                                    project_date
                                </td>
                                <td>
                                    project_delivery_date
                                </td>
                                <td>
                                    step1
                                </td>
                                <td>
                                    step2
                                </td>
                                <td>
                                    step3
                                </td>
                                <td>
                                    step4
                                </td>
                                <td>
                                    step5
                                </td>
                                <td>
                                    step6
                                </td>
                                <td>
                                    step7
                                </td>
                                <td>
                                    <input id="delivery_building_check" type="checkbox" value="rowId" name="delivery_building_check" 
                                       delivery_building_check_replacement>
                                </td>

                                ';
        $content = $this->displayData($content);
        echo $content;
    }

    public function ulploadingImages ( $context, $id )
    {
        echo '<div class="col-md-4">
<form action="" method="POST" class="build_project" >
            <input type="file" id="' . $id . '" multiple>
            <p>' . $context . '</p>
          </form>
          </div>';
    }

    public function getAllProjectBuildingDetails ( $project_number, $building_number )
    {
        include "../connect.php";
        $count = 0;
        $data = array();
        $sql = "select * from project_building where project_number = '$project_number' And building_number='$building_number'";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
            if($row["building_delivery_check"]){
                $this->isBuildingDeliveryChecked = "checked";
            }else{
                $this->isBuildingDeliveryChecked = "";
            }
        }

        $this->dataQuery = $data;
    }

    private function displayData ( $content )
    {
        $data = $this->dataQuery;
        $result = "";
        for ($x = 0; $x < count($data); $x++) {
            $content = str_replace(
                array("rowId", "project_number", "building_number", "project_date", "project_delivery_date"
                , "step1", "step2", "step3", "step4", "step5", "step6", "step7", "row_number" , "delivery_building_check_replacement")
                ,
                array($data[$x]["id"], $data[$x]["project_number"], $data[$x]["building_number"], $data[$x]["project_date"],
                    $data[$x]["project_delivery_date"], $data[$x]["step1"], $data[$x]["step2"], $data[$x]["step3"], $data[$x]["step4"],
                    $data[$x]["step5"], $data[$x]["step6"], $data[$x]["step7"], ($x + 1) , $this->isBuildingDeliveryChecked),
                $content);
            $result .= $content;

        }
        echo $result;




    }

    private function getAllProectsAndBuildingsFromCustomers ()
    {
        include "../connect.php";
        $count = 0;
        $data = array();
        $sql = "select distinct project , bulding from customers";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;

        }
        $this->insertProjectsFromCustomersToProjects($data);
        return $data;
    }

    public function endOfTableEditDeleteButtons ()
    {
        $content =  '<td class="text-center">
                                    <?php if ($useredit3_u == "on" ) :?>
                                        <a title="تعديل"  href="#" class="btn btn-info" data-toggle="modal" data-target="#editrowId">
                                            <i class="fa fa-edit"></i></span> تعديل</a>
                                    <?php endif ?>
                                </td>

                                <td class="text-center">
                                    <?php if ($userdelete3_u == "on" ) :?>
                                        <a title="حذف" class="btn btn-danger" data-toggle="modal" data-target="#confirm-deleterowId" href="#">
                                            <i class="fa fa-trash-o"></i> حذف</a>
                                    <?php endif ?>
                                </td>
                            </tr>';
        $this->displayData($content);
    }

    public function insertProjectsFromCustomersToProjects($data){
    include "../connect.php";
        $sql = "insert into project_building
        (project_number , building_number)
        values";
    if(!isset($_SESSION["customersProjectBuildingDataForSession"])){


        $finalResult = array();
        $query = "SELECT `project` ,`bulding` FROM customers except SELECT `project_number` , `building_number` from project_building";

        $query =  $conn->query($query);
           if($query->num_rows > 0){
               $this->insertToProjectBuildTableFlag = true;
               while ($row = $query->fetch_assoc()) {
                   if(! in_array( array($row['project'] , $row['bulding']) , $finalResult)){
                       array_push($finalResult , array($row['project'] , $row['bulding']));
                       $sql .= "('" .$row['project'] ."' , '" .$row["bulding"] ."'),";
                   }
               }
           }

            $sql = substr($sql , 0 , -1);

       $_SESSION["customersProjectBuildingDataForSession"] = $finalResult;
    }
        if($this->insertToProjectBuildTableFlag){
            $conn->query($sql);
            $this->insertToProjectBuildTableFlag = false;
        }
}



}
