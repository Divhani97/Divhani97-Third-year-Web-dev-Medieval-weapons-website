<?php
include 'DbConn.php';
include 'functions.inc.php';

			$sqla = "CREATE TABLE `tbl_customers` (
				`customerID` int(10) NOT NULL AUTO_INCREMENT,
				`FName` varchar(50) NOT NULL,
				`LName` varchar(50)  NULL,
				`Email` varchar(50)  NULL,
				`Password` varchar(255)  NULL,
				PRIMARY KEY (`customerID`)
			) ENGINE=InnoDB DEFAULT CHARSET=latin1";

		$sqlb = "CREATE TABLE `tbl_products` (
			`productID` int(10) NOT NULL AUTO_INCREMENT,
			`PName` varchar(50) NOT NULL,
			`Price` decimal(10,2) NOT NULL,
			`image` varchar(50) NOT NULL,
			`quantity` int(10) NOT NULL,
			PRIMARY KEY (`productID`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";

		$sqlc = "CREATE TABLE `tbl_orders` (
			`orderID` int(10) NOT NULL AUTO_INCREMENT,
			`customerID` int(10) NOT NULL,
			`quantity` int(10) NOT NULL,
			PRIMARY KEY (`orderID`),
			KEY `customerID` (`customerID`),
			CONSTRAINT `tbl_orders_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `tbl_customers` (`customerID`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";

		$sqld = "CREATE TABLE `tbl_orderProducts` (
			`orderID` int(10) NOT NULL,
			`productID` int(10) NOT NULL,
			KEY `orderID` (`orderID`),
			KEY `productID` (`productID`),
			CONSTRAINT `tbl_orderProducts_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `tbl_products` (`productID`),
			CONSTRAINT `tbl_orderProducts_ibfk_2` FOREIGN KEY (`orderID`) REFERENCES `tbl_orders` (`orderID`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";

			
		$CreateTableA = mysqli_query($Connection, $sqla);
		$CreateTableB = mysqli_query($Connection, $sqlb);
		$CreateTableC = mysqli_query($Connection, $sqlc);
		$CreateTableD = mysqli_query($Connection, $sqld);
		

		if ($CreateTableA && $CreateTableB && $CreateTableC && $CreateTableD === TRUE) {
			
				// print "<br>Tables created<br>";
				
				
		} else {

			// print "<br>Tables exsist";
			
		}

		// print "<br>";
		
		//  readCustomerFromFile();
		 readProductsFromFile();
        



		
?>















