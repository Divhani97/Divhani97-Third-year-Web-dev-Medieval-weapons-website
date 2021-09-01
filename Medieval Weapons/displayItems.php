
<!DOCTYPE html>
 <!-- this session is index -->
<html lang="en">
<head>
  <title>Shoping cart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

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
            position: relative;
            top:60px;
            font-size:10rem;
            color:rgba(0, 0, 0, 0.1);; 
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
      }
  </style>
</head>
<body  class="cartBody" style="background:rgba(0, 0, 0, 0.8); ">

<?php include 'header.php';?>
<h1>Medieval Weapons</h1>
<h5> shopping </h5>
<!-- showing whis user is currently logged in -->
<p><b><?php echo $_SESSION['Email']; ?></b></p> 
<div class="container"> 
            
               <div class="col-sm-6" >
               <table class="table table-hover">
                   <thead>
                   <tr>
                   
                       <td>product</td>
                       <td>Name</td>
                       <td>Buy this item</td> 
                   </tr>
                   </thead>
                </tbody>
     <?php 
            $serverName="localhost";
            $dbUserName="root";
            $dbPassword="";
            $dbName="19007127_POE";
            
            $Connect = mysqli_connect($serverName,$dbUserName,$dbPassword,$dbName);


        //    sql query to lselect all data from the table products
            $sql = 'SELECT * FROM tbl_products'; 
            $query = mysqli_query($Connect,$sql); 
            //creating the sequence of the data 
    		$i = 1;                             

    		while($product = mysqli_fetch_object($query)) 
    		{
    	?>
        	<!-- retriving image,image name from table products -->

            <tr>
			
			<td><img src="<?php echo $product->image; ?>"  width="300px" height="300px" /></td>
            <td><?php echo $product->PName; ?></td>
			<td><?php echo "R ".$product->Price; ?></td>
			<td><a href="myShop.php?id=<?php echo $product->productID; ?>">
            <button type="button" class="btn btn-info btn-sm">AddtoCart</button></a></td>
		</tr>


	<?php 
    		// $i++;
    	    }
    	?>
    </tbody>
</table>
               </div>
            </div>
    </div>
 
</body>