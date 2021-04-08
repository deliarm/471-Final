<?php
include('Student.php');

$CourseID = $_POST['course'];
$SID = $_SESSION['ID'];
$semester = $_POST['semester'];


 //connection
 $con = new mysqli("localhost","root","navjesdel123","finalproject");
 if($con->connect_error){
     die("Failed connection".$con->connect_error );
 }else{
    if($CourseID != "none"){
        $duplicate =$con->query("SELECT * FROM enrolled WHERE StudentUID=$SID AND CourseNum=$CourseID");
        if($duplicate->num_rows ==0){
            $exist3 = $con->query("SELECT * FROM course WHERE Number=$CourseID");
            $row = mysqli_fetch_array($exist3);
            $Cname = $row['Name'];

            $stmt=$con->prepare("INSERT INTO enrolled (StudentUID, CourseName, CourseNum, Semester) VALUES (?,?,?,?)");
            $stmt->bind_param("isis", $SID , $Cname ,$CourseID ,$semester);
            $stmt->execute();
            $stmt->close();
            $con->close();
            ?>
            <style type="text/css">
                #greentext5{
                    display:block;
                }
                #redtext5{
                    display:none;
                }
            </style>
            <?php
        }
        else{
            ?>
            <style type="text/css">
                #redtext5{
                    display:block;
                }
                #greentext5{
                    display:none;
                }
            </style>
            <?php
        }
    }
    else{
        ?>
        <style type="text/css">
            #redtext5{
                display:block;
            }
            #greentext5{
                display:none;
            }
        </style>
        <?php
    }
 }


?>