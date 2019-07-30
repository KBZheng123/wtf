<?php 
	function getDB(){
		$dsn = "mysql:host=localhost;dbname=shoestore";
		$username = "root";
		$password = '';
		$options=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
		
		try {
			$db = new PDO($dsn, $username, $password,$options);
			return $db;					
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "Error connecting to database".$error_message; 
		}
	}

	function get_categories(){
		$db = getDB();// Connect to database
		$query ="SELECT * FROM categories ORDER BY categoryID";
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
		$query ="INSERT INTO categories(categoryName, description)
				VALUES (?,?)";
		try {
			$statement = $db->prepare($query);
			$statement->bindParam(1,$categoryName);
			$statement->bindParam(2,$description);
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