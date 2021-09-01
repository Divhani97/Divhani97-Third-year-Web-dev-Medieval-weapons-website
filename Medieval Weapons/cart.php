<?php 
 include_once 'sideNav.php';
 ?>

<!DOCTYPE html>
<html>
<head> 
<title>shoping cart</title> 
</head>

<body style="background-image:url(images/bg5.jpg);" >
 <div class="container" style="width: 100%; height:100vh">
 <!-- <h2>shopping cart </h2>  -->
<center>

<form class="cartDirect" action="displayItems.php" method="post">
     <?php
     if (isset($_SESSION['customerID']) && isset($_SESSION['Email'])) {
    
          ?>
          <h1>Hello <?php echo $_SESSION['Email']; ?></h1>
           
         <?php 
         }else{
              header("Location: login.php");
              exit();
         }
     ?>
     <p>Medievieal weapons was inspired by our love for old fashioned weapons that are still as relevent in this centurary as they were many ago
           We specifically chose the archery mode of weapons, our store has a combination of modern day 
           crosbows, old fashioned ones, and accesories that will impress your bow and arrow squad.</p>
           <!-- <h4>press the button below to land in our eshop,SHOOT</h4> -->
<button type="submit" id="DisplayItems" name="DisplayItems">Go To Cart</button>

</form>
</center>
  
</body>
</html>
