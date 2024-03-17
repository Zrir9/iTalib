<?php
error_reporting(0);
include 'config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IStudent</title>
    <meta name="description" content="Flexible box card-based layout demo from Morten Rand-Hendriksen, staff author at lynda.com" />

    <link rel="stylesheet" href="stylish.css" type="text/css" media="all">
    <link href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css rel="stylesheet" type='text/css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@200;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Secular+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>

    <header class="masthead clear">
    </header>

    <section class="menu-section">
        <div class="logo-container">
            <img src="coin.png" id="logo"></img>
            <a class="hamburger" href="#!" aria-label="Open main menu">
                <i class="fa-solid fa-bars" aria-hidden="true"></i>
                <span class="sr-only">Open main menu</span>
            </a>
            <nav id="nav1" class="nav menu" role="navigation">
                <ul>
                    <li><a href="#">Acceuil</a></li>
                    <li><a href="#">Chercher Travail</a></li>
                    <li><a href="#">Chercher Cv</a></li>
                    <li><a href="compte.php">Compte</a></li> <!-- Modified link -->
                </ul>
            </nav>
        </div>
        <div class="centered">
            <nav id="nav" class="nav menu" role="navigation">
                <ul>
                    <li><a href="#" class='active'>Acceuil</a></li>
                    <li><a href="#">Chercher Travail</a></li>
                    <li><a href="#">Chercher Cv</a></li>
                    <li><a href="#" onclick="openLoginForm()">Se Connecter</a></li>
                    <li><a href="compte.php">Compte</a></li> <!-- Modified link -->
                </ul>
            </nav>
        </div>
    </section>

    <main class="main-area">
        <!-- Your existing code goes here -->
        <button onclick="openLoginForm()">Login</button>
        <button onclick="openSignupForm()">Sign Up</button>
    </main>

<div id="loginForm" class="popup-form" >
    <h2>Login</h2>
    <form method ="POST" action="login.php">
        <input type="text" placeholder="Username" name ="log_email">
        <input type="password" placeholder="Password" name ="log_passwd">
        <button type="submit">Login</button>
    </form>
</div>

<!-- Sign Up Form -->
<div id="signupForm" class="popup-form">
    <h2>Sign Up</h2>
        <form method="POST" action="signup.php">
            <input type="text" placeholder="Full Name" name="reg_name">
            <input type="text" placeholder="Username" name="reg_uname">
            <input type="email" placeholder="Email" name="reg_email">
            <input type="password" placeholder="Password" name="reg_passwd">
            <div>
                <input type="radio" id="signup_student" name="check-type" value="Student">
                <label for="signup_student">Student</label>
                <input type="radio" id="signup_institute" name="check-type" value="Institute">
                <label for="signup_institute">Institute</label>
            </div>
            <button type="submit">Sign Up</button>
        </form>
    </form>
</div>

<script>
    function openLoginForm() {
        document.getElementById("loginForm").style.display = "block";
    }

    function openSignupForm() {
        document.getElementById("signupForm").style.display = "block";
    }

    function showInstituteFields() {
        document.getElementById("instituteFields").style.display = "block";
    }

    function hideInstituteFields() {
        document.getElementById("instituteFields").style.display = "none";
    }
</script>


</body>

</html>
            
		<script src = "script.js"></script>
</body>
</html>