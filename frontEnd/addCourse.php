<?php

$Cname = $_POST['CourseName'];      // class name
$Cnum  = $_POST['CourseNum'];       // class number
$Dname = $_POST['DepartmentName'];  // department name
$Prof  = $_POST['ProfID'];          // prof IDNUMBER
$Room = $_POST['RoomID'];           // Room Number

//echo "<h2>" .$Cname. " ".$Cnum. " " .$Dname. " " .$Prof. " " .$Room."</h2>"; // test echo

 //connection
 $con = new mysqli("localhost","root","navjesdel123","finalproject");
 if($con->connect_error){
     die("Failed connection".$con->connect_error );
 }else{
    $exist = $con->query("SELECT * FROM course WHERE Number=$Cnum");
    if( ($exist->num_rows ==0) and $Dname !="none" and $Prof !="none" and $Room !="none"){
        $stmt = $con->prepare("INSERT INTO course (Number, Name , DeptName , ProfessorUID , ClassroomNum) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issii", $Cnum ,$Cname ,$Dname ,$Prof ,$Room);
        $stmt->execute();
        $stmt->close();
        $con->close();
        ?>
         <style type="text/css">
            #greentext{
                display:block;
            }
         </style>
         <?php
     }
     else{
         ?>
         <style type="text/css">
            #redtext{
                display:block;
            }
         </style>
         <?php
    }
 }
include('Administrator.php');
?>