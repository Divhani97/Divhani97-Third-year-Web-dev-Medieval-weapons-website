<?php 
 include_once 'sideNav.php';
 
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!-- <div class="navBack">
	

</div> -->

<section class="skewedBox">
<div class="contentIn">

</div>
</section>

<section class="skewedBox2">
<!-- <i class="fa fa-mail-reply" aria-hidden="true"></i>
	<button id="back">BACK</button> -->
  <form class="credentials" action="login.inc.php" method="post">
     	<h2>LOGIN</h2>
		 <div class="logo"></div>
   <!-- error reporting if user gets their credentials wrong -->
     	<?php if (isset($_GET['error'])) { ?>
				<p class="error"><?php echo $_GET['error']; ?></p>
					<?php } ?>
					<input type="text" 
					name="username" 
					placeholder="Email" 
					required>
					<br>

     	<input type="password"
		  name="password"
		   placeholder="Password"><br>

     		<button class="btnCredentials" type="submit">Login</button>
          	<a href="signup.php" class="ca">Create an account</a>

     </form> 
	
</section>
    


</body>
</html>
<?php



?>