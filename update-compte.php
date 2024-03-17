<?php
include 'config.php';
session_start();

if (empty($_SESSION['login_user'])) {
    header("location: index.php");
    exit();
}

$user = $_SESSION['login_user'];

if (isset($_GET['institute'], $_GET['degree'], $_GET['from_year'], $_GET['to_year'])) {
    $inst = $_GET['institute'];
    $deg = $_GET['degree'];
    $from = $_GET['from_year'];
    $to = $_GET['to_year'];
    $query = "INSERT INTO has_degree(student_id, degree_id, verified, from_year, to_year, institute_id) VALUES (:user, :deg, 0, :from, :to, :inst)";
    
    $stmt = $db->prepare($query);
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':deg', $deg);
    $stmt->bindParam(':from', $from);
    $stmt->bindParam(':to', $to);
    $stmt->bindParam(':inst', $inst);
    $stmt->execute();
}

if (!empty($_GET['skill'])) {
    $skill = $_GET['skill'];
    $query = "INSERT INTO has_skill(student_id, skill) VALUES (:user, :skill)";
    
    $stmt = $db->prepare($query);
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':skill', $skill);
    $stmt->execute();
}

if (!empty($_GET['interest'])) {
    $interest = $_GET['interest'];
    $query = "INSERT INTO has_interest(student_id, interest) VALUES (:user, :interest)";
    
    $stmt = $db->prepare($query);
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':interest', $interest);
    $stmt->execute();
}

if(!empty($_GET['job_title']) && !empty($_GET['location']) && !empty($_GET['description']) && !empty($_GET['salary']) && !empty($_GET['job_type'])){
    $job_id = uniqid();
    $job_title = $_GET['job_title'];
    $location = $_GET['location'];
    $description = $_GET['description'];
    $salary = $_GET['salary'];
    $job_type = $_GET['job_type'];
    $query = "INSERT INTO job(job_id, job_title, location, description, salary, job_type, company_id) VALUES (:job_id, :job_title, :location, :description, :salary, :job_type, :user)";
    
    $stmt = $db->prepare($query);
    $stmt->bindParam(':job_id', $job_id);
    $stmt->bindParam(':job_title', $job_title);
    $stmt->bindParam(':location', $location);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':salary', $salary);
    $stmt->bindParam(':job_type', $job_type);
    $stmt->execute();
}
header("location: compte.php?user=" . $_SESSION['login_user']);
?>
