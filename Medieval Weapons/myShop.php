
<?php
require 'DbConn.php';
require 'aShopCart.php';  include 'header.php';
// session_start();


$serializedArray = serialize ( $_SESSION ['cart'] );

if (isset ( $_GET ['id'] ) && !isset($_POST['update'])) {
  $processQuery = 'SELECT * FROM tbl_products WHERE productID=' . $_GET ['id'];
	$product = mysqli_fetch_object (mysqli_query ( $Connection, $processQuery) );
	
	// ShoppingCart class object
	$shoping = new ShoppingCart ();
	
	
	//assigning ShoppingCart class variables to values in tbl_products
	
	$shoping->id = $product->productID;
	$shoping->name = $product->PName;
	$shoping->price = $product->Price;
	$shoping->quantity = 1;
	
	
	// Check if the product  exists in the cart
	$compValue = - 1;
	if (isset ( $_SESSION ['cart'] )) {
		$cart = unserialize ( $serializedArray );


		for($i = 0; $i < count ( $cart ); $i ++)
		if ($cart [$i]->id == $_GET ['id']) {
			$compValue = $i;
		
		}
	}


	if ($compValue == - 1)
	$_SESSION ['cart'] [] = $shoping;
	else {
		$cart [$compValue]->quantity ++;
		$_SESSION ['cart'] = $cart;
	}
}




// Delete product in cart
if (isset ( $_GET ['index'] ) && !isset($_POST['update'])) {
	$cart = unserialize ( $serializedArray );
	unset ( $cart [$_GET ['index']] );
	$cart = array_values ( $cart );
	$_SESSION ['cart'] = $cart;
}

// Update quantity in cart
if(isset($_POST['update'])) {
	$arrQuantity = $_POST['quantity'];

	// Check validate quantity
	$valid = 1;
	for($i=0; $i<count($arrQuantity); $i++)
	if(!is_numeric($arrQuantity[$i]) || $arrQuantity[$i] < 1){
		$valid = 0;
	
	}
	if($valid==1){
		$cart = unserialize ( $serializedArray );
		for($i = 0; $i < count ( $cart ); $i ++) {
			$cart[$i]->quantity = $arrQuantity[$i];
		}
		$_SESSION ['cart'] = $cart;
	}
	else
		$error = 'the quantity selected  is not valid';
}

?>
<?php echo isset($error) ? $error : ''; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
      /* designing appearanc eof the elements in this page */
        p{
            position: relative;
            top:100px;
            font-size:10px;
            color:#925829;
            font-weight:bolder;
            letter-spacing:.2rem;
            text-transform:uppercase;
            
        }
        .cartBody h1{
           
            font-size:10rem;
            color:rgba(0, 0, 0, 0.1); 
            font-style: oblique;
        }
        h5{
            position: relative;
            top:60px;
            font-size:10rem; 
            color:rgba(0, 0, 0, 0.5);
            font-style: italic;
            font-weight:600;
        }
		.continueShoping{
			position: relative;
			right:500px;
			width: 10vw;
			height: 10vh;
			border-radius: 10px;
			border:2px solid #c7b8b8;
			color: #c5b3b3;
			text-transform: uppercase;
			font-weight: 700;
			letter-spacing: .2em;
			font-size: 11px;
			align-items: center;
			justify-content: center;
			background: none;
			outline: none;

		}
		.checkOut{
			position: relative;
			top:-10px;
			right:500px;
			width: 10vw;
			height: 10vh;
			border-radius: 10px;
			border:2px solid #c7b8b8;
			color: #c5b3b3;
			text-transform: uppercase;
			font-weight: 700;
			letter-spacing: .2em;
			font-size: 11px;
			align-items: center;
			justify-content: center;
			background: none;
			outline: none;
		}

 .checkOut:hover{
	background: rgba(0, 0, 0, 0.5);
	transition: ease-in-out .1s;
	color: whitesmoke;
}
.continueShoping:hover{
	background: rgba(0, 0, 0, 0.5);
	transition: ease-in-out .1s;
	color: whitesmoke;
}

		.table-hover input{
			box-sizing:border-box;
			background: none;
			border-radius: 5px; 
			justify-content: center;
            align-items: center;
			border:2px solid black;
			position: relative;
			left:50px;
			width: 50%;
		}
      }
  </style>
</head>
<body class="cartBody" style="background:rgba(0, 0, 0, 0.1);">
<center>
<button class="continueShoping"><a href="displayItems.php">Continue Shopping</a></button>
 <button class="checkOut"><a href="toCheckOut.php">proceed to checkout</a></button>
<div class="container">
<form method="post">
<h1>Stuff in my Cart</h1>
<div class="col-sm-6" >
	<table class="table table-hover" width="1000px"  >
		<tr>
			<th>Option</th>
			<th>product name</th>
			<th>product price</th>
			<th>Quantity in cart<input
				type="hidden" name="update">
			</th>
			<th>Sub Total</th>
		</tr>
		
		
		<?php
		$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
		$s = 0;
		$compValue = 0;
		for($i = 0; $i < count ( $cart ); $i ++) {
			$s += $cart [$i]->price * $cart [$i]->quantity;
			?>
			
			
		<tr>
			<td>
			<a href="myShop.php?index=<?php print $compValue; ?>"
				onclick="return confirm('really wanna delete this?')">
										<i class="fa fa-trash" ></i></a></td>
			<td>
			    <?php print $cart[$i]->name; ?>
			</td>
			<td>
			   <?php echo "R ".$cart[$i]->price; ?>
			   </td>
			<td>
			<input type="number" value="<?php echo $cart[$i]->quantity; ?>"
				 name="quantity">
				 </td>
			<td><?php echo "R ".$cart[$i]->price * $cart[$i]->quantity; ?></td>
		</tr>
		<?php
		$compValue ++;
		}
		?>
		<tr>
			<td colspan="4"><b>Grand Total</b>
      
      </td>
			<td ><?php echo "<b>R $s</b>"; ?></td>
		</tr>
	</table>
</form>
</body>
</div>


</center>
</html>