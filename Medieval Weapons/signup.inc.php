<?php 
session_start(); 
include "DbConn.php";

if (isset($_POST['username']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	//validating user input data,to see if they are correct or valid
	$name = validate($_POST['name']);
	$surname= validate($_POST['surname']);
	$userName = validate($_POST['username']);
	$password = validate($_POST['password']);
	$confirm_password = validate($_POST['re_password']);
	
	// user data
	$user_data = 'username='. $userName. '&name='. $name;

		//if username is empty errot report must show up
	if (empty($userName)) {
		header("Location: signup.php?error=Username/Email is required&$user_data");
	    exit();
	}
		//if password is empty error report must show up
	else if(empty($password)){
        header("Location: signup.php?error=Password is required&$user_data");
	    exit();
	}
		//if surname is empty error report must show up
	else if(empty($surname)){
        header("Location: signup.php?error=surname is required&$user_data");
	    exit();
	}
	else if(empty($confirm_password)){
        header("Location: signup.php?error=Re Password is required&$user_data");
	    exit();
	}
		//if name is empty error report must show up

	else if(empty($name)){
        header("Location: signup.php?error=Name is required&$user_data");
	    exit();
	}
//if confirm_password and password dont match error report must show up
	else if($password !== $confirm_password){
        header("Location: signup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}
	
	else{

		// hashing the password
        $password = md5($password);

	    $sql = "SELECT * FROM tbl_customers WHERE Email='$userName' ";
		$result = mysqli_query($Conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The username is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO tbl_customers(Email, Password, FName,LName) VALUES('$userName', '$password', '$name','$surname')";
           $result2 = mysqli_query($Conn, $sql2);
           if ($result2) {
           	 header("Location: signup.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}
