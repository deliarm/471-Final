<?php
error_reporting(0);
include('Administrator.php');
$IDnum = $_POST['idNum'];
$Fname = $_POST['Fname'];     
$Lname = $_POST['Lname'];      
$dob   = strval($_POST['dob']);      
$address = $_POST['streetAdd']; 
$city  = $_POST['city'];          
$startDate  = strval($_POST['startDate']);
$gradDate  = substr(strval($_POST['gradDate']),0,4);
$major  = $_POST['major'];
$minor  = $_POST['minor'];
$pass  = $_POST['pass'];
$gender  = $_POST['gender'];


// echo "<h2>" .$IDnum. " ".$Fname. " " .$Lname. " " .$dob. " " .$address."</h2>"; 
// echo "<h2>" .$city. " ".$startDate. " " .$gradDate. " " .$major. " " .$minor."</h2>"; 
// echo "<h2>" .$pass. " ".$gender."</h2>"; 

//connection
$con = new mysqli("localhost","root","navjesdel123","finalproject");
if($con->connect_error){
    die("Failed connection".$con->connect_error );
}else{
    if(is_numeric($IDnum)){
        $exist = $con->query("SELECT * FROM person WHERE UniversityID=$IDnum");
        if($exist->num_rows ==0){
            $stmt0 = $con->prepare("INSERT INTO person (UniversityID, Fname , Lname , Gender , DOB , StreetAddress , City , StartDate , Password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt0->bind_param("issssssss", $IDnum ,$Fname ,$Lname ,$gender ,$dob ,$address ,$city ,$startDate ,$pass);
            $stmt0->execute();
            $stmt0->close();

            $stmt2=$con->prepare("INSERT INTO student (UniversityID,ExpGrad,Major,Minor) VALUES (?,?,?,?)");
            $stmt2->bind_param("isss",$IDnum,$gradDate,$major,$minor);
            $stmt2->execute();
            $stmt2->close();

            $con->close();
            ?>
            <style type="text/css">
                #greentext3{
                    display:block;
                }
                #redtext3{
                    display:none;
                }
            </style>
            <?php
        }
        else{
            ?>
            <style type="text/css">
                #redtext3{
                    display:block;
                }
                #greentext3{
                    display:none;
                }
            </style>
            <?php
        }
    }
    else{
        ?>
        <style type="text/css">
            #redtext3{
                display:block;
            }
            #greentext3{
                display:none;
            }
        </style>
        <?php
    }
}

?>