<?php
   	define('DB_SERVER', 'localhost');
   	define('DB_USERNAME', 'root');
   	define('DB_PASSWORD', '');
   	define('DB_DATABASE', 'studentportal');
   	$dsn = "host:".DB_SERVER."dbname=".DB_DATABASE."";
	try {
		$connection = new PDO($dsn,DB_USERNAME);
	}catch(PDOException $e){
		$error = $e->getMessage();
	}
?>



