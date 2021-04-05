<?php

 include('Administrator.php');
$CnumRem = $_POST['Courses'];

//echo "<h2>" .$Cnum. "</h2>";

$con3 = new mysqli("localhost","root","navjesdel123","finalproject");
 if($con3->connect_error){
     die("Failed connection".$con3->connect_error );
 }
 // if we connect succesfully
 else{
     if($CnumRem != "none"){
        $exist3 = $con3->query("SELECT * FROM course WHERE Number=$CnumRem");
        if($exist3->num_rows>0){
            $stmt3 = $con3->prepare("DELETE FROM course WHERE Number=?");
            $stmt3->bind_param("i", $CnumRem);
            $stmt3->execute();
            $stmt3->close();
            $con3->close();
        ?>
        <style type="text/css">
            #greentext2{
                display:block;
            }
            #redtext2{
                display:none;
            }
        </style>
        <?php
        } 
    }
    else{
        ?>
        <style type="text/css">
            #redtext2{
                display:block;
            }
            #greentext2{
                display:none;
            }
        </style>
        <?php
    }   
}
 ?>