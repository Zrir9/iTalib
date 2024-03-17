<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'studentportal');
$dsn = "mysql:host=" . DB_SERVER . ";dbname=" . DB_DATABASE;
try {
    $db = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
} catch(PDOException $e) {
    echo "Connection error: " . $e->getMessage();
}
?>
