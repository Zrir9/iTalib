<!DOCTYPE html>
<html lang="en-US">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        
    <title>IStudent</title>
    <meta name="description" content="Flexible box card-based layout demo from Morten Rand-Hendriksen, staff author at lynda.com"/>
                
    <link rel="stylesheet" href="stylish.css" type="text/css" media="all">
	<link href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css 
	  rel="stylesheet"  type='text/css'>
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
	<script
	  src="https://code.jquery.com/jquery-3.6.0.js"
	  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
	  crossorigin="anonymous">
	 </script>


</head>

<body>
	
	<header class="masthead clear">
    </header>
	
		
			<section class= "menu-section">
					<div class ="logo-container">
						<img src="coin.png" id = "logo"></img>
						<a class = "hamburger" href= "#!" aria-label = "Open main menu">
								<i class="fa-solid fa-bars" aria-hidden="true"></i>
								<span class= "sr-only">Open main menu</span>
						</a>
						<nav id = "nav1" class= "nav menu" role = "navigation">
								<ul>
									<li><a href="#" >Acceuil</a></li>
									<li><a href="#">Chercher Travail</a></li>
									<li><a href="#">Chercher Cv</a></li>
									<li><a href="#">Compte</a></li>
							   </ul>
						</nav>
					</div>
					<div class= "centered">
							<nav id = "nav" class= "nav menu" role = "navigation">
								<ul>
									<li><a href="#" class='active' >Acceuil</a></li>
									<li><a href="#">Chercher Travail</a></li>
									<li><a href="#">Chercher Cv</a></li>
									<li><a href="#">Se Connecter</a></li>
									<li><a href="#">Compte</a></li>
							   </ul>
							</nav>
					</div>
				
			</section>
			
			<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: login.html");
    exit;
}

$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h2>Welcome, <?php echo $username; ?>!</h2>
    <p>You are now logged in.</p>
    <p><a href="logout.php">Logout</a></p><br>
	<p><a href="searchjob.php">search for a job</a></p>

</body>
</html>
<footer class="footer">
    <div class="container">
        <div class="footer-header">
           
            <ul class="social-media">
                                                <li>
                    <a href="https://www.facebook.com/Menara.job" target="_blank">
                        <img src="https://www.m-job.ma/themes/m-job/assets/images/facebook.png" alt="facebook">
                    </a>
                 </li>
                                                
                                                    <li>
                      <a href="https://www.linkedin.com/company/mjob-ma" target="_blank"><img src="https://www.m-job.ma/themes/m-job/assets/images/linkedin-16.png" alt="linkedin"></a>
                    </li>
                            </ul>
        </div>
     
        <div class="footer-links">
            <ul class="links">
                                <li><a href="#">À propos</a></li>
                                <li><a href="#">Publicité</a></li>
                                <li><a href="#">Qui sommes-nous?</a></li>
                                <li><a href="#">Contactez-nous</a></li>
                                <li><a href="#">Conditions d&#039;Utilisation</a></li>
                            </ul>
        </div>
    </div>
    <div class="copyright ">
        <p>Copyright &copy; <a href="#" target="_blank">Nothing</a> 2024. Tous droits
            réservés.</p>
    </div>
</footer>
	
	
	
	<script src = "new 1.js"></script>
</body>