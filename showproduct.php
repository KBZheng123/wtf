<!DOCTYPE html>
<html>
<body>

<center><h1>THE PRODUCTS FROM ATN STORE DATABASE</h1></center>
<a href="insertproductdata.php">Click here to edit products<br /></a>
<a href="updateproductdata.php">Click here to edit products<br /></a>
<a href="deleteproductdata.php">Click here to delete products<br /></a>

<?php
ini_set('display_errors', 1);
echo "This is where we can see the company's products from the database. The page is currently simplistic, but it works.";
?>

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

$sql = "SELECT * FROM public.products";
$stmt = $pdo->prepare($sql);
//Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$resultSet = $stmt->fetchAll();
echo '<p>Product information:</p>';

?>
<div id="container">
<table class="table table-bordered table-condensed">
    <thead>
      <tr>
        <th>productid</th>
        <th>productname</th>
        <th>price</th>
        <th>description</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // tạo vòng lặp 
         //while($r = mysql_fetch_array($result)){
             foreach ($resultSet as $row) {
      ?>
   
      <tr>
        <td scope="row"><?php echo $row['productid'] ?></td>
        <td><?php echo $row['productname'] ?></td>
        <td><?php echo $row['price'] ?></td>
        <td><?php echo $row['description'] ?></td>
        
      </tr>
     
      <?php
        }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
