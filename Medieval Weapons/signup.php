<?php 
 include_once 'sideNav.php';

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<section class="skewedBoxSignIn">
<div class="contentIn">

</div>
</section>

<section class="skewedBox2">
     <form  class="credentials" action="signup.inc.php" method="post">
     	<h2>SIGN UP</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

         
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"
                      value="<?php echo $_GET['name']; ?>"
                      ><br>
          <?php }else{ ?>
               <input type="text" 
                      name="name" 
                      minlength="5"
                      maxlength="20"
                      placeholder="Name"
                      ><br>
          <?php }?>

         
          
          <?php if (isset($_GET['surname'])) { ?>
               <input type="text" 
                      name="surname" 
                      placeholder="Surname"
                      value="<?php echo $_GET['surname']; ?>
                      "><br>
          <?php }else{ ?>
               <input type="text" 
                      name="surname" 
                      minlength="5"
                      maxlength="20"
                      placeholder="Surname"><br>
          <?php }?>

          
          <?php if (isset($_GET['username'])) { ?>
               <input type="email" 
                      name="username" 
                      placeholder="Username/Email"
                      value="<?php echo $_GET['username']; ?>"><br>
          <?php }else{ ?>
               <input type="email" 
                      name="username" 
                      placeholder="Username/Email"><br>
          <?php }?>


     	
     	<input type="password" 
                 name="password" 
                 placeholder="Password"><br>

          
          <input type="password" 
                 name="re_password" 
                 placeholder="Confirm Password"><br>

     	<button class="btnCredentials" type="submit" >Sign Up</button>
          <a href="login.php" class="ca">Already have an account?</a>
     </form>
     </section>
</body>
</html>