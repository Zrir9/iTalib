

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

<body >
	
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
			
		<main class="main-area">
		<iframe name="hidden_iframe" id="hidden_iframe" style="display: none;"></iframe> 
<div class="search-container">
    <form method = "POST" class="search-form"  action = "">
        <label for = "search-input">Chercher un Emboche</label>
		<input type="text" id="search-input" name="search" placeholder="" />
        <!-- ... other form inputs ... -->
        <button type="submit" aria-label="Search">
            🔍
        </button>
        <!-- ... other form elements ... --

        <select id="category-select" name="category">
            <option value="all">Criteres</option>
            <!-- More options here -->
        

    </form>
	
</div>



		 <!--<div class = "slidesCountainer">
				<div class = "slideShow-countainer">
										<i class="fa-solid fa-chevron-left" id = "prev"></i>

					<div class="mySlides div1"><img src="famous.jpg"></img></div>
					<div class="mySlides div2"><img src="rock.jpg"></div>
					<div class="mySlides div3"><img src="lghiwan.jpg"></div>
				
						<i class="fa-solid fa-chevron-right" id = "next"></i>
				</div>
			</div>-->
        <div class="centered">
				<h2>Emboches</h2>			
            <section id = 'cards' class="cards">
       <!--
			 <article class="card">
                    <a href="#">
             <img src="path-to-company-logo.jpg" alt="Company Logo"> 
                        
                        <div class="card-content">
                            <h2 class = "cardHeader">Casablanca</h2>
                            <p class = "cardText">Créer des designs centrés sur utilisateur pour nos produits numériques.</p>
                        </div>
                    </a>					
                </article><!-- .card -->
				
            </section><!-- .cards -->
        </div><!-- .centered -->		
	</main>
	<script type="text/javascript">		
	</script>
	<script src = "script.js"></script>
</body>

<?php
error_reporting(0);
	

	if (isset($_POST['search'])) {
		include 'config.php';
		//session_start();
		$inputValue = $_POST['search'];
		$sql = "SELECT * FROM `job` ";
		$sql .= "WHERE `job_title` LIKE '%" . $inputValue . "%' ";
		$sql .= "OR `location` LIKE '%" . $inputValue . "%' ";
		$sql .= "OR `description` LIKE '%" . $inputValue . "%'";

		
		$result = mysqli_query($connection,$sql);
		
		$count = mysqli_num_rows($result);
		for($i=0;$i<$count;$i++){
			$subject = mysqli_fetch_assoc($result);
				echo "<script>
						var cards = document.getElementById('cards');
						var card = document.createElement('article');
						card.setAttribute('class', 'card');
						cards.appendChild(card);
						var a = document.createElement('a');
						a.setAttribute('href', '#');
						card.appendChild(a);
						var cardContent = document.createElement('div');
						cardContent.setAttribute('class', 'card-content');
						a.appendChild(cardContent);
						var cardHead = document.createElement('h2');
						cardHead.setAttribute('class', 'cardHeader');
						cardContent.appendChild(cardHead);
						var cardText = document.createElement('p');
						cardText.setAttribute('class', 'cardText');
						cardContent.appendChild(cardText);
						// cardText.setAttribute('class', 'long-text');
						// cardText.textContent = '". $subject['description'] ."';
						cardHead.textContent = '". $subject['job_title'] ."';
						// var para = document.getElementsByClassName('long-text')[0];
						var text = '". $subject['description'] ."';
						var head = '". $subject['job_title'] ."';
						cardText.innerHTML = '';
						//cardHead.innerHTML = '';
						var words = text.split(' ');
						for (i = 0; i < 15; i++) {
							if(words[i]!=null)
							cardText.innerHTML += words[i] + ' ';
						}
						cardText.innerHTML += '...';
					</script>";

					}
	}
?>

