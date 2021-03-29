<?php
session_start();
	//$errors = array('UniversityID'=>'','password'=>'');
    $UniID = $_POST['UniversityID'];
    $pass = $_POST['password'];

    



    //connection
    $con = new mysqli("localhost","root","navjesdel123","finalproject");
    if($con->connect_error){
    	die("Failed connection".$con->connect_error );
    }else{
    	$stmt=$con->prepare("select * from person where UniversityID=?");
    	$stmt->bind_param("i", $UniID);
    	$stmt->execute();
    	$stmt_result = $stmt->get_result();
    	if($stmt_result->num_rows >0){
    		$data = $stmt_result->fetch_assoc();
    		if($data['Password']===$pass){
    			$_SESSION['Fname'] = $data['Fname'];
    			$_SESSION['Lname'] = $data['Lname'];
    			header("Location: http://localhost/471-final/frontEnd/student.php");
    			exit();
    		}else{
    			header("Location: http://localhost/471-final/frontEnd/index.php");
    			exit();
    		}
    	}else{
    		header("Location: http://localhost/471-final/frontEnd/index.php");
    		exit();
    	}
    }
?>