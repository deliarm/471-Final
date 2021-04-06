<?php
include('Administrator.php');

$studentNumber = $_POST['studentList'];

//connection
 $con = new mysqli("localhost","root","navjesdel123","finalproject");
 if($con->connect_error){
     die("Failed connection".$con->connect_error );
 }else{
    if($studentNumber != "none"){
        $delete = $con->prepare("DELETE FROM person WHERE UniversityID=?");
        $delete->bind_param("i",$studentNumber);
        $delete->execute();
        $delete->close();
        $con->close();
        ?>
        <style type="text/css">
            #greentext4{
                display:block;
            }
            #redtext4{
                display:none;
            }
        </style>
        <?php
    }
    else{
        ?>
        <style type="text/css">
            #redtext4{
                display:block;
            }
            #greentext4{
                display:none;
            }
        </style>
        <?php
    }
 }

?>