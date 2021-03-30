<?php
session_start();
    $UniID = $_POST['UniversityID'];
    $pass = $_POST['password'];
    $type = $_POST['priority'];


    //connection
    $con = new mysqli("localhost","root","navjesdel123","finalproject");
    if($con->connect_error){
    	die("Failed connection".$con->connect_error );
    }else{
    	$stmt=$con->prepare("select * from person where UniversityID=?");
    	$stmt->bind_param("i", $UniID);
    	$stmt->execute();
    	$stmt_result = $stmt->get_result();
    	$roleS =$con->prepare("select * from student where UniversityID=?");
    	$roleS->bind_param("i", $UniID);
    	$roleS->execute();
    	$roleS_result = $roleS->get_result();
    	$roleA =$con->prepare("select * from professor where UniversityID=?");
    	$roleA->bind_param("i", $UniID);
    	$roleA->execute();
    	$roleA_result = $roleA->get_result();
    	if($stmt_result->num_rows >0){
    		$data = $stmt_result->fetch_assoc();
    		if($data['Password']===$pass){
    			
    			if( $type == "0" and ($roleS_result->num_rows >0) ){
    				$_SESSION['Fname'] = $data['Fname'];
    				$_SESSION['Lname'] = $data['Lname'];
    				header("Location: http://localhost/471-final/frontEnd/Student.php");
    				exit();
    			}
    			else if($type=="1" and $roleA_result->num_rows >0){
    				$_SESSION['Fname'] = $data['Fname'];
    				$_SESSION['Lname'] = $data['Lname'];
    				header("Location: http://localhost/471-final/frontEnd/Administrator.php");
    				exit();
    			}
    		}
    		else{
    			header("Location: http://localhost/471-final/frontEnd/index.php");
    			exit();
    		}
    	}
    	// if info not found
    	else{
    		header("Location: http://localhost/471-final/frontEnd/index.php");
    		exit();
    	}
    }
    include('index.php');

?>