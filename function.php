<?php 
	function getDB(){
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
	}
	?>

	<?php

	function get_categories(){
		$db = getDB();// Connect to database
		$query ="SELECT * FROM public.categories ORDER BY 1";
		try {
			$statement = $db->prepare($query);
			$statement->execute();
			$result = $statement->fetchAll();
			$statement->closeCursor();
			return $result;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "Error execute query statement:".$error_message; 
		}
	}

	function add_category($categoryName, $description){
		$db = getDB();// Connect to database
		$query ="INSERT INTO public.categories("categoryID", "categoryName", "description")
				VALUES ('?', '?', '?')";
		try {
			$statement = $db->prepare($query);
			$statement->bindParam(1,$categoryID);
			$statement->bindParam(2,$categoryName);
			$statement->bindParam(3,$description);
			$statement->execute();
			$statement->closeCursor();			
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "Error execute query statement:".$error_message; 
		}
	}

	function get_category_by_id($categoryID){
		$db = getDB();// Connect to database
		$query ="SELECT * FROM categories 
				WHERE categoryID=? 
				ORDER BY categoryID";
		try {
			$statement = $db->prepare($query);
			$statement->bindParam(1,$categoryID);
			$statement->execute();
			$result = $statement->fetch();
			$statement->closeCursor();
			return $result;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "Error execute query statement:".$error_message; 
		}
	}

	function delete_category_by_id($categoryID){
		$db = getDB();// Connect to database
		$query ="DELETE  FROM categories 
				WHERE categoryID=?";
		try {
			$statement = $db->prepare($query);
			$statement->bindParam(1,$categoryID);
			$statement->execute();			
			$statement->closeCursor();		
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "Error execute query statement:".$error_message; 
		}
	}

	function update_category($categoryID,$categoryName,$description){
		$db = getDB();// Connect to database
		$query ="UPDATE categories
				SET  categoryName =?,
					 description=?					 
				WHERE categoryID=?";
		try {
			$statement = $db->prepare($query);			
			$statement->bindParam(1,$categoryName);
			$statement->bindParam(2,$description);			
			$statement->bindParam(3,$categoryID);
			$statement->execute();			
			$statement->closeCursor();		
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "Error execute query statement:".$error_message; 
		}


	}

 ?>