<?php
# declaring connection parameters
$serverName="localhost";
$dbUserName="root";
$dbPassword="";
$dbName="19007127_POE";
$Conn = mysqli_connect($serverName,$dbUserName,$dbPassword);

# Check connection
	if (!$Conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		// print "<br>Connected successfully<br>";

#
	$selectDB = mysqli_select_db($Conn,$dbName);
		if (!$selectDB) {
				$sql = "CREATE DATABASE ".$dbName."";
			      mysqli_query($Conn, $sql); 
					// print "<br>Database ".$dbName." succesfully created<br>";
				} 
				else {
				//    print "<br>Database ".$dbName." already exsist<br>";
		}
		
$Connection =mysqli_connect($serverName,$dbUserName,$dbPassword,$dbName);



?>