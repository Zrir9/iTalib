<?php
error_reporting(0);
include 'config.php';
session_start();
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['log_email']) || empty($_POST['log_passwd'])) {
        $error = "Username or Password is empty";
    } else {
        $email = $_POST['log_email'];
        $passwd = $_POST['log_passwd'];

        $query = "CALL Login(:email, :passwd)";

        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':passwd', $passwd, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['login_user'] = $row['id'];
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email_id'] = $row['email_id'];
            $_SESSION['user_type'] = $row['user_type'];
            $_SESSION['company_name'] = $row['company_name'];
            $_SESSION['institute_name'] = $row['institute_name'];
            $_SESSION['contact'] = $row['contact_no'];
            $_SESSION['dp_url'] = $row['img_url'];
            setcookie("dp_url", $_SESSION['dp_url'], 0, "/");
            setcookie("user_name", $_SESSION['user_name'], 0, "/");
            header("location: compte.php?user=" . $_SESSION['login_user']);
            exit();
        } else {
            $error = "Username or Password is invalid";
        }
    }
    header("location: index.php?error=" . urlencode($error));
  
}
?>
