<?php
error_reporting(0);
session_start();
?>


<!DOCTYPE html>
<html lang="en-US">
    
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IStudent</title>
    <meta name="description" content="Flexible box card-based layout demo from Morten Rand-Hendriksen, staff author at lynda.com"/>
    <link rel="stylesheet" href="stylish.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/compte.css" type="text/css" media="all">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet" type='text/css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@200;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Secular+One&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>
    <header class="masthead clear">
        <!-- Header content here -->
    </header>

    <section class="menu-section">
        <div class="logo-container">
            <img src="coin.png" id="logo" alt="logo">
            <a class="hamburger" href="#!" aria-label="Open main menu">
                <i class="fa-solid fa-bars" aria-hidden="true"></i>
                <span class="sr-only">Open main menu</span>
            </a>
            <nav id="nav1" class="nav menu" role="navigation">
                <ul>
                    <li><a href="#">Acceuil</a></li>
                    <li><a href="#">Chercher Travail</a></li>
                    <li><a href="#">Chercher Cv</a></li>
					<li><a href="compte.php?user=<?php echo $_SESSION['login_user'];?>">Compte</a></li>
                </ul>
            </nav>
        </div>
        <div class="centered">
            <nav id="nav" class="nav menu" role="navigation">
                <ul>
                    <li><a href="#" class='active'>Acceuil</a></li>
                    <li><a href="#">Chercher Travail</a></li>
                    <li><a href="#">Chercher Cv</a></li>
                    <li><a href="#">Se Connecter</a></li>
                    <li><a href="compte.php?user=<?php echo $_SESSION['login_user'];?>">Compte</a></li>
                </ul>
            </nav>
        </div>
    </section>

    <main class="main-area">

        <div class="content-wrapper">
		<nav class="cd-side-nav">
			<ul>
				<li class="nav-dp"><a class="dp"><img src="<?php echo $_COOKIE['dp_url'];?>"></a></li>
				<li class="nav-name"><h1>@<?php echo $_COOKIE['user_name'];?></h1></li>
				<li class="cd-label">Main</li>
				<li class="profile active">
					<a href="compte.php?user=<?php echo $_SESSION['login_user'];?>">Compte</a>
				</li>

				<li class="messages">
					<a href="inbox.php">Messages<span class="count" id="msgcount"></span></a>
				</li>

				<li class="has-children documents">
					<a href="documents.php">Documents</a>
				</li>

			</ul>

			<ul>
				<li class="cd-label">Secondary</li>
				
				<li class="jobs">
					<a href="jobs.php">Jobs</a>
				</li>

				<li class="settings">
					<a href="settings.php">Settings</a>
				</li>
			</ul>

			<ul>
				<li class="cd-label">Action</li>
				<li class="action-btn"><a href="#">Report Bug</a></li>
			</ul><br/><br/>
			<ul>
				<center>
				<iframe width="100px" height="60px" scrolling="no" src="clock.html"></iframe>
				</center>
			</ul>
		</nav>
            <div class="content">
                <div class="search-container">
                    <form method="POST" class="search-form" action="">
                        <label for="search-input">Chercher un Emboche</label>
                        <input type="text" id="search-input" name="search" placeholder="" />
                        <button type="submit" aria-label="Search">🔍</button>
                    </form>
                </div>

                <div class="centered">
                    <h2>Emboches</h2>
                    <section id="cards" class="cards">
                        <!-- Cards go here -->
                    </section>
				</div>
            </div> <!-- /.content -->
        </div> <!-- /.content-wrapper -->
		
    </main> <!-- /.main-area -->

    <script src="script.js"></script>
</body>

</html>

<?php
	include 'config.php';
	if (empty($_SESSION['login_user'])){
		header("location: index.php");
		exit();
	}
	
	if (is_numeric($_GET['user'])){
		$query = "SELECT name, email_id, contact_no, img_url, user_type FROM user WHERE id = ?";
		$params = [$_GET['user']];
	} else {
		$query = "SELECT name, email_id, contact_no, img_url, user_type FROM user WHERE name = ?";
		$params = [$_GET['user']];
	}
	
	$stmt = $db->prepare($query);
	$stmt->execute($params);
	
	if($stmt && $stmt->rowCount() == 1){
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$dp = $row['img_url'];
		$fullname = $row['name'];
		$email = $row['email_id'];
		$contact = $row['contact_no'];
	}	
	if (isset($_POST['search'])) {

			$inputValue = $_POST['search'];
			$parts = explode(" ", $inputValue);
			
						$inputValue = $_POST['search']; // Make sure to validate and sanitize
						$parts = explode(" ", $inputValue);

						// Start with a base query
						$query = "SELECT * FROM `job` WHERE ";
						$query_conditions = [];

						// Placeholder array for binding parameters
						$params = [];

						// Generate conditions for each part
						foreach ($parts as $part) {
							$like_part = "%{$part}%";
							$query_conditions[] = "(`job_title` LIKE ? OR `location` LIKE ? OR `description` LIKE ?)";
							// Repeat the same part for each condition
							$params[] = $like_part;
							$params[] = $like_part;
							$params[] = $like_part;
						}

						// Join all conditions with OR
						$query .= implode(" OR ", $query_conditions);

						// Order by logic remains static since it cannot be parameterized
						$query .= " ORDER BY CASE 
									WHEN `job_title` LIKE ? THEN 1 
									WHEN `description` LIKE ? THEN 2 
									WHEN `location` LIKE ? THEN 3 
									ELSE 4 END, 
									`job_title`, `description`, `location`";

						// Add $inputValue for the ORDER BY conditions
						$params[] = "%{$inputValue}%";
						$params[] = "%{$inputValue}%";
						$params[] = "%{$inputValue}%";

						$stmt = $db->prepare($query);

						// Dynamic binding of parameters
						//$types = str_repeat('s', count($params)); // Types: all strings
						//$stmt->bind_param($types, ...$params);

						$stmt->execute($params);
						//$result = $stmt->get_result();

						// Process results
						while ($subject = $stmt->fetch(PDO::FETCH_ASSOC)) {
							// Your processing logic here
						echo "<script>
						var cards = document.getElementById('cards');
						var card = document.createElement('article');
						card.setAttribute('class', 'card');
						cards.appendChild(card);
						var a = document.createElement('a');
						//var lien = 'job_profile.php?job_id=" . $subject['job_id'] . "';
						//a.setAttribute('href', lien);
						var job_id = '". $subject['job_id'] . "';
						a.setAttribute('id',job_id);
						a.addEventListener('click',function() {
							var id = this.getAttribute('id');
							window.open('job_profile.php?job_id='+id ,'_self');
						});
						card.appendChild(a);
						var cardContent = document.createElement('div');
						cardContent.setAttribute('class', 'card-content');
						a.appendChild(cardContent);
						var ville = document.createElement('span');
						ville.textContent = '". $subject['location'] ."';
						ville.className = 'location-style';
						
						var cardHead = document.createElement('h2');
						cardHead.setAttribute('class', 'cardHeader');
						cardContent.appendChild(cardHead);
						cardContent.appendChild(ville);
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
						for (let i = 0; i < 15; i++) {
							if(words[i]!=null)
							cardText.innerHTML += words[i] + ' ';
						}
						cardText.innerHTML += '...';
					</script>";

					}

				$stmt->close();
		
				
	}
?>

