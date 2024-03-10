<?php
$db_server="localhost";
$db_user ="root";
$db_pass="";
$db_name="recrutement";
$conn="";

try{
    $conn= mysqli_connect($db_server,$db_user,$db_pass,$db_name);
}
catch( mysqli_sql_exception)
{
    echo"error connecting to database";
}
?>
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
									<li><a href="welcomepage.php" >Hme</a></li>
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
			<div class="containerfiltersforms">
		<div class="formdiv">

	<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
			<h1>Chercher un CV</h1>
			<input class="serchinput" type="text" required="required" name="chercher" placeholder="Chercher?">
			<input type="submit" value="Chercher" name="submit">
	</form>
	<div class="centered">
				<h2>Emboches</h2>			
            <section id = 'cards' class="cards">
       <!--
			 <article class="card">
                    <a href="#">
             <img src="path-to-company-logo.jpg" alt="Company Logo"> 
                        
                        <div class="card-content">
                            <h2 id = "cardHeader"></h2>
                            <p id = "cardText"></p>
                        </div>
                    </a>					
                .card -->
				
        
     <div class="llm">
	 <?php
 
 if(isset($_POST['submit'])) {
$chercher =filter_input(INPUT_POST, 'chercher', FILTER_SANITIZE_SPECIAL_CHARS);
$sql=" SELECT * FROM cv WHERE competences like '%$chercher%' ";
$result=mysqli_query($conn,$sql);

  
	if(mysqli_num_rows($result)>0){
	 
	  while( $row = mysqli_fetch_assoc($result))
	  { 
		echo "<button class='result'>" . $row["name"] ."<br>".$row["id"]."<br>".$row["competences"]. "</button>";  
	    
  }
  }
  else{
	echo "<div class='noresult'>0 result found here</div>";
  }

mysqli_close($conn);
 }
?>
<style>

	/* Style for the search result container */
	.llm {
    margin-top: 20px;
	display: flex;
	flex-direction: column;
	/* justify-content: space-between; */
	/* flex-wrap: wrap; */
	text-align: start;
	width: 75%;
	margin-right:20px ;
	margin-left: 20px;
}

/* Style for each individual search result */
.llm .result {
    background-color: #f5f5f5;
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 5px;
	margin-bottom: 20px;
	border-radius: 20px;

}
.llm .result:hover
 {
  box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px,
    rgba(6, 24, 44, 0.65) 0px 4px 6px -1px,
    rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
}

.noresult {
    background-image:url(./no-results.png) ;
	background-position: center;
	background-size: cover;
  
    padding: 10px;
    margin-bottom: 5px;
	width: 100vh;
	height: 100vh;
	margin: 30px 100px;
	text-align: center;
	background-repeat: no-repeat;

	
}
</style>
	 </div>
	
		</div>

<div class="filters-options">
		<div class="filters-body">
			<ul class="filters">
			<h5>Date de publication</h5>
				<li>
				<input type="radio" id="date-0" class="check" name="date"
					   checked
		
				onclick="onSelectDictionaryItem()"
				>
				<label for="date-0">Toutes</label>
			</li>
				<li>
				<input type="radio" id="date-1" class="check" name="date"
					   
		
				onclick="onSelectDictionaryItem()"
				>
				<label for="date-1">Aujourd&#039;hui</label>
			</li>
				<li>
				<input type="radio" id="date-3" class="check" name="date"
					   
		
				onclick="onSelectDictionaryItem()"
				>
				<label for="date-3">3 jours</label>
			</li>
		
				<li>
				<input type="radio" id="date-30" class="check" name="date"
					   
		
				onclick="onSelectDictionaryItem()"
				>
				<label for="date-30">1 mois</label>
			</li>
			</ul>
		
		<ul class="filters">
			<h5>Villes </h5>
		
				<li>
				<input type="checkbox" id="city-416" class="check" name="city"
					   
		
				onclick="onSelectDictionaryItem()"
				/>
				<label for="city-416">
					--
				</label>
			</li>
				<li>
				<input type="checkbox" id="city-101" class="check" name="city"
					   
		
				onclick="onSelectDictionaryItem()"
				/>
				<label for="city-101">
					Agadir
				</label>
			</li>
				<li>
				<input type="checkbox" id="city-74" class="check" name="city"
					   
		
				onclick="onSelectDictionaryItem()"
				/>
				<label for="city-74">
					Marrakech
				</label>
			</li>
				<li>
				<input type="checkbox" id="city-103" class="check" name="city"
					   
		
				onclick="onSelectDictionaryItem()"
				/>
				<label for="city-103">
					Casablanca
				</label>
			</li>
				<li>
				<input type="checkbox" id="city-91" class="check" name="city"
					   
		
				onclick="onSelectDictionaryItem()"
				/>
				<label for="city-91">
					Settat
				</label>
			</li>
				<li>
				<input type="checkbox" id="city-37" class="check" name="city"
					   
		
				onclick="onSelectDictionaryItem()"
				/>
				<label for="city-37">
					Fes
				</label>
			</li>
				
							</ul>
		
		<ul class="filters">
			<h5>Salaires (MAD)</h5>
				<li>
				<input type="checkbox" id="salaires-181" class="check" name="dictionary"
					   
				onclick="onSelectDictionaryItem()"
				>
				<label for="salaires-181"> de 2000 dh à 4000 dh </label>
			</li>
				<li>
				<input type="checkbox" id="salaires-182" class="check" name="dictionary"
					   
				onclick="onSelectDictionaryItem()"
				>
				<label for="salaires-182"> de 4000 dh à 6000 dh </label>
			</li>
				<li>
				<input type="checkbox" id="salaires-183" class="check" name="dictionary"
					   
				onclick="onSelectDictionaryItem()"
				>
				<label for="salaires-183"> de 6000 dh à 8000 dh </label>
			</li>
				<li>
				<input type="checkbox" id="salaires-184" class="check" name="dictionary"
					   
				onclick="onSelectDictionaryItem()"
				>
				<label for="salaires-184"> de 8000 dh à 10 000 dh </label>
			</li>
				<li>
				<input type="checkbox" id="salaires-185" class="check" name="dictionary"
					   
				onclick="onSelectDictionaryItem()"
				>
				<label for="salaires-185"> de 10 000 dh à 15 000 dh </label>
			</li>
			
			
			</ul>
		<ul class="filters">
			<h5>Types des contrats </h5>
				<li>
				<input type="checkbox" id="contrats-125" class="check" name="dictionary"
					   
				onclick="onSelectDictionaryItem()"
				>
				<label for="contrats-125"> CDI </label>
			</li>
				<li>
				<input type="checkbox" id="contrats-126" class="check" name="dictionary"
					   
				onclick="onSelectDictionaryItem()"
				>
				<label for="contrats-126"> CDD </label>
			</li>
				<li>
				<input type="checkbox" id="contrats-127" class="check" name="dictionary"
					   
				onclick="onSelectDictionaryItem()"
				>
				<label for="contrats-127"> Free Lance </label>
			</li>
				<li>
				<input type="checkbox" id="contrats-128" class="check" name="dictionary"
					   
				onclick="onSelectDictionaryItem()"
				>
				<label for="contrats-128"> Intérim </label>
			</li>
				<li>
				<input type="checkbox" id="contrats-129" class="check" name="dictionary"
					   
				onclick="onSelectDictionaryItem()"
				>
				<label for="contrats-129"> Lettre d&#039;Engagement </label>
			</li>
			
			</ul>
		<ul class="filters">
			<h5>Langues </h5>
				<li>
				<input type="checkbox" id="langues-130" class="check" name="dictionary"
					   
				onclick="onSelectDictionaryItem()"
				>
				<label for="langues-130"> Arabe </label>
			</li>
				<li>
				<input type="checkbox" id="langues-131" class="check" name="dictionary"
					   
				onclick="onSelectDictionaryItem()"
				>
				<label for="langues-131"> Français </label>
			</li>
				<li>
				<input type="checkbox" id="langues-132" class="check" name="dictionary"
					   
				onclick="onSelectDictionaryItem()"
				>
				<label for="langues-132"> Anglais </label>
			</li>
				<li>
				<input type="checkbox" id="langues-133" class="check" name="dictionary"
					   
				onclick="onSelectDictionaryItem()"
				>
				<label for="langues-133"> Espagnol </label>
			</li>
				<li>
				<input type="checkbox" id="langues-230" class="check" name="dictionary"
					   
				onclick="onSelectDictionaryItem()"
				>
				<label for="langues-230"> Néerlandais </label>
			</li>
			
		
			</ul>
		<ul class="filters">
			<h5>Niveau des études </h5>
				<li>
				<input type="checkbox" id="etudes-222" class="check" name="dictionary"
					   
				onclick="onSelectDictionaryItem()"
				>
				<label for="etudes-222"> NIV BAC ET MOINS </label>
			</li>
				<li>
				<input type="checkbox" id="etudes-223" class="check" name="dictionary"
					   
				onclick="onSelectDictionaryItem()"
				>
				<label for="etudes-223"> BAC </label>
			</li>
				<li>
				<input type="checkbox" id="etudes-224" class="check" name="dictionary"
					   
				onclick="onSelectDictionaryItem()"
				>
				<label for="etudes-224"> BAC+1 </label>
			</li>
				<li>
				<input type="checkbox" id="etudes-225" class="check" name="dictionary"
					   
				onclick="onSelectDictionaryItem()"
				>
				<label for="etudes-225"> BAC+2 </label>
			</li>
				<li>
				<input type="checkbox" id="etudes-226" class="check" name="dictionary"
					   
				onclick="onSelectDictionaryItem()"
				>
				<label for="etudes-226"> BAC+3 </label>
			</li>
			
		
		</ul>
		<ul class="filters">
			<h5>Expériences </h5>
				<li>
				<input type="checkbox" id="experience-134" class="check" name="dictionary"
					   
				onclick="onSelectDictionaryItem()"
				>
				<label for="experience-134"> Fraichement diplômé </label>
			</li>
				<li>
				<input type="checkbox" id="experience-135" class="check" name="dictionary"
					   
				onclick="onSelectDictionaryItem()"
				>
				<label for="experience-135"> Débutant (de 1 à 3 ans) </label>
			</li>
				<li>
				<input type="checkbox" id="experience-136" class="check" name="dictionary"
					   
				onclick="onSelectDictionaryItem()"
				>
				<label for="experience-136"> Junior (de 3 à 5 ans) </label>
			</li>
				<li>
				<input type="checkbox" id="experience-137" class="check" name="dictionary"
					   
				onclick="onSelectDictionaryItem()"
				>
				<label for="experience-137"> Senior (de 5 à 7 ans) </label>
			</li>
				<li>
				<input type="checkbox" id="experience-138" class="check" name="dictionary"
					   
				onclick="onSelectDictionaryItem()"
				>
				<label for="experience-138"> Confirmé (de 7 à 10 ans) </label>
			</li>
			
			
			</ul>
</div>
	
</div>
</section><!-- .cards -->
        </div><!-- .centered -->
</div>






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

