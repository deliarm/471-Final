<?php
include('Student.php');

$CourseNum = $_POST['dropped'];
$studentNum = $_SESSION['ID'];


 //connection
 $con = new mysqli("localhost","root","navjesdel123","finalproject");
 if($con->connect_error){
     die("Failed connection".$con->connect_error );
 }else{
     if($CourseNum != "none"){
        $stmt=$con->prepare("DELETE FROM enrolled WHERE StudentUID=? AND CourseNum=?");
        $stmt->bind_param("ii", $studentNum,$CourseNum);
        $stmt->execute();
        $stmt->close();
        $con->close();

        ?>
        <style type="text/css">
            #greentext6{
                display:block;
            }
            #redtext6{
                display:none;
            }
        </style>
        <?php
     }
     else{
        ?>
        <style type="text/css">
            #redtext6{
                display:block;
            }
            #greentext6{
                display:none;
            }
        </style>
        <?php
     }
 }

?>