<?php 

include 'DbConn.php';

		// initializing the variables
        $pname = "";
        $price = "";
        $productID = 0;
        $update = false;

        if (isset($_POST['save'])) {
            $pname = $_POST['name'];//placeholder from the text field name form
            $price = $_POST['price'];//placeholder from the text field price form
            $imageURL = "../images/new.jpg"; 
            $qnty = 20;
            mysqli_query($Connection, "INSERT INTO tbl_products (PName, Price, image, quantity) VALUES ('$pname','$price', '$imageURL',$qnty)");
			//alert user by displaying message
            $_SESSION['message']="Record saved"; 
			$_SESSION['msg_type']="success";
            header('location: AdminCRUD.php');	
        }

		//to edit the record name and price
        if (isset($_GET['edit'])) {
            $productID = $_GET['edit'];
            $update = true;
            $record = mysqli_query($Connection, "SELECT * FROM tbl_products WHERE productID=$productID");

            if (mysqli_num_rows($record) == 1 ) {
                $processReq = mysqli_fetch_array($record);
                $pname = $processReq['PName'];
                $price = $processReq['Price'];
            }
        }
	//to update the record upon editing
	if (isset($_POST['update'])) {
		$productID = $_POST['id'];
		$name = $_POST['name'];
		$price = $_POST['price'];

		mysqli_query($Connection, "UPDATE tbl_products SET  PName='$name', Price = '$price' WHERE productID=$productID");
		$_SESSION['message'] = "Product updated!"; 
		$_SESSION['msg_type']="success";
		header('location: AdminCRUD.php');
	}
	//to dlete a product record
		if (isset($_GET['delete'])) {
		$id = $_GET['delete'];
		mysqli_query($Connection, "DELETE FROM tbl_products WHERE productID=$id");
		$_SESSION['message']="Record has been deleted"; 
		$_SESSION['msg_type']="danger";
		header('location: AdminCRUD.php');
	}
?>

 <!-- start handling message alert upon admin action -->
 <?php if (isset($_SESSION['message'])): ?>
	<div class="alert alert-<?=$_SESSION['msg_type']?>">
		<?php 
			print $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
<!-- end handling message alert upon admin action -->

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
  <style>
		h1{
				color: #ecf0f3;
				font-size: 60px;
				
			}
			th{
				color: #3a4941;
				font-style:inherit;
				font-weight: bolder;
			}

			td{
				color:#925829;
				font-style:inherit;
				font-weight: bolder;
			}
			
			h2{
        text-align: center; 
        padding: 5px;
        position: relative;
        top: -20px;
        color: #3a4941;
        letter-spacing: .6em;
        font-size: 20px;
    }

	label {
	color: #3a4941;
	font-size: 11px;
	text-transform:uppercase;
	

}

#edit{
	background: #89CFF0;
	width:70px;
}

#delete{
	background: #C70039;
	width:70px;
	color:white;
}

  </style>
</head>
<body  style="background:rgba(0, 0, 0, 0.8); ">
<center>
  
  	<h1>Admin Privilages</h1>

	  
  </div>
  </div>





<br>

	<table width="700px">
		<thead>
			
				<th>Product name</th>
				<th>product price</th>
				<th colspan="2">Perform</th>
		
		</thead>


<?php $results = mysqli_query($Connection, "SELECT * FROM tbl_products"); ?>
<?php while ($row = mysqli_fetch_array($results)) { ?>
	<tr><td><?php echo $row['PName']; ?></td>
	<td><?php echo "<b>R </b>".$row['Price']; ?></td>
	<td><button type="button" id="edit"><a href="AdminCRUD.php?edit=<?php echo $row['productID']; ?>" ><i class="fa fa-pencil-square-o"></i></a></button></td>
	<td><button type="button" id="delete" ><a href="AdminCRUD.php?delete=<?php echo $row['productID']; ?>"><i class=" fa fa-trash"></i></a></button></td>
			</tr>
		<?php } ?> 

		
	
	</table>
	<br>
	<form class="cartDirect" action="" method="post">
	<br> <br>
	<h2> Add Product </h2>
	<input type="hidden" name="id" value="<?php print $pid; ?>">
		
        <div class="form-group">
        <label>product name</label>
			<td><input type="text" name="name" value="<?php print $pname; ?>"></td>
            </div>
		
        <div class="form-group">
        <label>product price</label>
			<td><input type="text" name="price" value="<?php print $price; ?>"></td>
            </div>
		<tr>
			<td>
			<?php if ($update == true): ?>
				<button class="btn btn-info" type="submit" name="update"  >update</button>
			<?php else: ?>
				<button class="btn btn-info" type="submit" name="save" >Save</button>
			<?php endif ?>
			</td>
			
		</tr>
		
	</form>
</div>
</div>
</div>
 
  </div>

</center>
</body>
</html>