<?php 
 session_start();
 //including these php files will include the side navigation and prompts the database and tables to be created
 include_once 'sideNav.php';
 include_once "createTables.php";
 ?>
 
<!DOCTYPE html>
<html>
<head>
	<title>Medieval Weapons</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">

</head>
<body>

<h1>Medieval weapons</h1>
<!-- buttons to prompt user to either log in or sugn up -->
<center>
<div class="stuff">
<a href="signUp.php" class="register">Sign up</a>
</div>
<div class="stuff">
<a href="login.php"  class="user" >Log in</a>
</div>
</center>
</body>

</html>
