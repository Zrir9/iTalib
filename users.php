<?php
	session_start();
	if (empty($_SESSION['login_user'])){
		header("location: index.php");
		exit();
	}
	error_reporting(0);
	include 'config.php';
	$keyword = $_GET['keyword'].'%';
	$users = "select name from user where (name like ?)";
	$sql = $db->prepare($users);
	$sql->execute([$keyword]);
	try{
		
		while($row = $sql->fetch(PDO::FETCH_ASSOC)){
			$name = $row['name'];
			echo "<option value='$name'></option>";
		}
		
	}catch(PDOException $e){
		$error = $e->getMessage();
	}
?>