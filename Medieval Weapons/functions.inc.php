<?php
function readCustomerFromFile(){
    $dsn='mysql:dbname=19007127_POE;host=127.0.0.1';
    try {
        $dbh= new PDO($dsn,'root','');
    
    
    } catch (PDOException $e) {
      // print'failed connection: ' .$e->getMessage();
    }
    
     $file = new splFileObject('customer.txt');
     while (!$file ->eof()) {
        $line=$file ->fgets();

   list($name,$surname,$email,$password)=explode(',',$line);
    // print $name."<br>";
    $PDOquery='INSERT INTO tbl_customers VALUES(NULL,?,?,?,?)';
    $sth=$dbh->prepare($PDOquery);
    $sth->bindValue(1,$name,PDO::PARAM_STR);
    $sth->bindValue(2,$surname,PDO::PARAM_STR);
    $sth->bindValue(3,$email,PDO::PARAM_STR);
    $sth->bindValue(4,$password,PDO::PARAM_STR);
    $sth->execute();
     }
     
}


function readProductsFromFile(){
    $dsn='mysql:dbname=19007127_POE;host=127.0.0.1';
   try {
       $dbh= new PDO($dsn,'root','');
   
   } catch (PDOException $e) {
    //  print'failed connection: ' .$e->getMessage();
   }
  //  print"<br>";
    $file = new splFileObject('product.txt');
    while (!$file ->eof()) {
       $line=$file ->fgets();
     
   list($PName,$Price,$image,$quantity)=explode(',',$line);
  //  print $image."<br>";
  $PDOquery='INSERT INTO tbl_products VALUES(NULL,?,?,?,?)';
   $sth=$dbh->prepare($PDOquery);
   $sth->bindValue(1,$PName,PDO::PARAM_STR);
   $sth->bindValue(2,$Price,PDO::PARAM_STR);
   $sth->bindValue(3,$image,PDO::PARAM_STR);
   $sth->bindValue(4,$quantity,PDO::PARAM_STR);
   $sth->execute();
    }
   }


?>