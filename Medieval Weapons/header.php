<?php 
 session_start();
 include_once 'sideNav.php';
 ?>
 
<!DOCTYPE html>
<html>
<head>
	<title>Start</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="">
<ul>
<!-- <a href="home.php">Table Artifacts</a> -->
<!-- <li><a href="about.php">About</a></li> -->

<?php

if (isset($_SESSION["Email"])) {
    
    //  print "<li><a href='cart.php'> items</a></li>";
    // echo "<li class=menu-item><a href=logout.php ><i class='fa fa-power-off'></i>Logout</a></li>";
}

else {
    print "<li><a href='signup.php'>Sign up</a></li>";
    print "<li><a href='login.php'>Log in </a></li>";
  
}
?>


</ul>
</div>

    
</body>
</html>
