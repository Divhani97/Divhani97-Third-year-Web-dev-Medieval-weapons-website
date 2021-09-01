<?php 
session_start(); 
// asking permission for the database file to access the parameters of the database host
include_once "DbConn.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

	//fucntion to validsate the data user will input
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
//validating both username and password,to see if they are correct or valid
	$userName = validate($_POST['username']);
	$password = validate($_POST['password']);


//if username is empty error report must show up
	if (empty($userName)) {
		header("Location: login.php?error=Username is required");
	    exit();
		
//if Password is empty error report must show up
	}else if(empty($password)){
        header("Location: login.php?error=Password is required");
	    exit();
	}
	//authenticationncredentials for the admin---set
	if($userName == "admin@admin.com" && $password == "admin") {
   				header('location:AdminCRUD.php');  
  }
	
	else{
		// hashing the password
        $password = md5($password);

        //accdesing database table customers to assign Email to '$userName' AND Password to'$password'"
		$sql = "SELECT * FROM tbl_customers WHERE Email='$userName' AND Password='$password'";
		
		$result = mysqli_query($Conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['Email'] === $userName && $row['Password'] === $password) {
            	$_SESSION['Email'] = $row['Email'];
            	// $_SESSION['FName'] = $row['FName'];
				//  $_SESSION['LName'] = $row['LName'];
            	$_SESSION['customerID'] = $row['customerID'];
            	header("Location: cart.php");
		        exit();
            }else{
				header("Location: login.php?error=Incorect Username or password");
		        exit();
			}
		}else{
			header("Location: login.php?error=Incorect Username or password");
	        exit();
		}
	}
	
}else{
	//else tale user back to the home page where they will be propted log in/sign in
	header("Location: index.php");
	exit();
}




?>
