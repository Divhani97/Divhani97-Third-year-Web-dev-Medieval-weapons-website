<!-- <?php 
 session_start();
 ?> -->
 
<!DOCTYPE html>
<html>
<head>
	<title>Medievial weapons</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="main-menu">
	<ul>
		<li class="menu-item"><a href="index.php" ><i class="fa fa-home" ></i><span id="cart-item" class="badge badge-danger">home</span></a></li>
		<li class="menu-item"><a href="myShop.php" >
		<i class="fa fa-cart-arrow-down"></i><span id="cart-item" class="badge badge-danger">cart</span></a></li>
		<br>
		<!-- if the user is loged in the logout button must appear on the side navigation -->
		<?php
		if (isset($_SESSION["Email"])) {
		echo "<li class=menu-item><a href=logout.php ><i class='fa fa-power-off'></i><span class='badge badge-danger'>Logout</span></a></li>";
		}
		?>
	</ul>
</div>
</body>

</html>

