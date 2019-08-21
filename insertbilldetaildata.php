<!DOCTYPE html>
<html>
    <head>
<title>Insert data to PostgreSQL with php - creating a simple web application</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
li {
list-style: none;
}
</style>
</head>
<body>
<a href="showbill.php">Click here to return to bill database<br /></a>
<h1>INSERT DATA TO DATABASE</h1>
<h2>Enter data into product table</h2>
<ul>
    <form name="insertbilldata" action="insertbilldata.php" method="POST" >
<li>Bill ID:</li><li><input type="text" name="billid" /></li>
<li>Product ID:</li><li><input type="text" name="productid" /></li>
<li>Quantity:</li><li><input type="text" name="quantity" /></li>
<li>Total price:</li><li><input type="text" name="totalprice" /></li>
<li><input type="submit" /></li>
</form>
</ul>

<?php

if (empty(getenv("DATABASE_URL"))){
    echo '<p>The DB does not exist</p>';
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
}  else {
     echo '<p>The DB exists</p>';
     echo getenv("dbname");
   $db = parse_url(getenv("DATABASE_URL"));
   $pdo = new PDO("pgsql:" . sprintf(
        "host=ec2-54-227-251-33.compute-1.amazonaws.com;port=5432;user=vnkmjonwfpwbuo;password=cd185cb699a7b564675f0c0c86de18da272c5125cb6c0b13fd8e806f34861a89;dbname=dd80n3h55g0rvh",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
   ));
}  

if($pdo === false){
     echo "ERROR: Could not connect Database";
}

//Khởi tạo Prepared Statement
//$stmt = $pdo->prepare('INSERT INTO student (stuid, fname, email, classname) values (:id, :name, :email, :class)');

//$stmt->bindParam(':id','SV03');
//$stmt->bindParam(':name','Ho Hong Linh');
//$stmt->bindParam(':email', 'Linhhh@fpt.edu.vn');
//$stmt->bindParam(':class', 'GCD018');
//$stmt->execute();
//$sql = "INSERT INTO student(stuid, fname, email, classname) VALUES('SV02', 'Hong Thanh','thanhh@fpt.edu.vn','GCD018')";
$sql = "INSERT INTO billdetail "
        . " VALUES($_POST[billid],$_POST[productid]),'$_POST[quantity]','$_POST[totalprice]'";
        

$stmt = $pdo->prepare($sql);
//$stmt->execute();
 if (is_null($_POST[billid])) {
   echo "Bill ID must be not null";
 }
 else
 {
    if($stmt->execute() == TRUE){
        echo "Record inserted successfully.";
    } else {
        echo "Error inserting record: ";
    }
 }
?>
</body>
</html>
