<!DOCTYPE html>
<html>
    <head>
<title>ATN insert product</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
li {
list-style: none;
}
</style>
</head>
<body>
<a href="index.php">Click here to return to homepage<br /></a>
<a href="showproduct.php">Click here to return to database<br /></a>
<h1>INSERT PRODUCT</h1>
<h2>Enter data into product table</h2>
<ul>
    <form name="insertproductdata" action="insertproductdata.php" method="POST" >
<li>Product ID:</li><li><input type="text" name="productid" /></li>
<li>Product name:</li><li><input type="text" name="productname" /></li>
<li>price:</li><li><input type="text" name="price" /></li>
<li>description:</li><li><input type="text" name="description" /></li>
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
$sql = "INSERT INTO products "
        . " VALUES($_POST[productid],'$_POST[productname]',$_POST[price],'$_POST[description]')";
        

$stmt = $pdo->prepare($sql);
//$stmt->execute();
 if (is_null($_POST[productid])) {
   echo "StudentID must be not null";
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
