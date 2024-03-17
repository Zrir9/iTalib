<?php
	include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['reg_name'];
    $user_name = $_POST['reg_uname'];
    $email_id = $_POST['reg_email'];
    $password = $_POST['reg_passwd'];
    $user_type = $_POST['check-type'];

    try {

        $query = "INSERT INTO user(name,user_name,email_id,password, user_type) VALUES(:full_name,:user_name,:email_id,:password,:user_type)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':user_name', $user_name);
        $stmt->bindParam(':email_id', $email_id);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':user_type', $user_type);
        $stmt->execute();

        $db = null; // Close the connection

        $_SESSION['login_user'] = $_POST['reg_uname'];
        header("location: compte.php?user=" . $_SESSION['login_user']); // Redirecting To Other Page
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
