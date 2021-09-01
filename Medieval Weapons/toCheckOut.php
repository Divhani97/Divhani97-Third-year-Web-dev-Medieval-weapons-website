<?php
require 'DbConn.php';
require 'aShopCart.php';
include 'header.php';

$customerId = $_SESSION['customerID'];
// $dateOfOeder = date('Y-m-d');

//Save the new  order
mysqli_query($Connection, "INSERT INTO tbl_orders(customerID)values($customerId)");
$myOrdersid = mysqli_insert_id($Connection);

// Save order details for new order
//$cart = unserialize (serialize ($_SESSION ['cart']));
if (isset ( $_SESSION ['cart'] )) {
for($i=0; $i<count(unserialize (serialize ($_SESSION ['cart']))); $i++) {
	mysqli_query($Connection, 'INSERT INTO tbl_orderproducts(orderID, productID)
values('.$myOrdersid.', '.(unserialize (serialize ($_SESSION ['cart'])))[$i]->id.' )');
}
}
// Clear all products in cart
unset($_SESSION['cart']);

?>
<html>
<head>
<title>Checkout</title>
<style>

.cartDirect{
	position: relative;
	top:10px; 
	border:none;
	width: 40vw;
	height: 10vh;
	align-items: center;
	justify-content: center;
	border-bottom-right-radius: 50px;
	border-top-left-radius: 50px;
	 background-color:#2c2525b3; 
}

.cartDirect > h1{
	position: absolute;
	top:50px;
	left: 130px;
	color: #e4d6d6;
	font-size: 45px;
	font-weight:lighter;
	letter-spacing: .2em;
	transform: translateX(150rem);
	animation: slideIn 1.5s forwards;
	 text-transform: uppercase; 
	}
.cartDirect > p {
	position: absolute;
	top:35px; 
	left:30px;
	align-items: center;
	justify-content: center;
	color: #ffc393;
	font-weight: bold;
	font-style: italic;
	font-size: 16px;
	letter-spacing: 0.01em;
}

.cartDirect > h4{
	position: absolute; 
	top:350px;	
	left:190px;
}
.cartDirect:hover{
	background-color:rgba(0, 0, 0, 0.1);
	border:1px solid rgb(87, 69, 69);
}

</style>
</head>
<body  style="background:rgba(0, 0, 0, 0.8); ">
<form class="cartDirect" action="" method="post">
<br>
<br>
<p>
Hey <b><?php echo $_SESSION['Email']; ?>, you checked out</b>  <a href="displayitems.php">, BUY MORE ?...</a>
</p>

</form>
</body>
</html>