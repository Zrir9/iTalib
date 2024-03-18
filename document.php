<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IStudent</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="description" content="Flexible box card-based layout demo from Morten Rand-Hendriksen, staff author at lynda.com"/>
    <link rel="stylesheet" href="stylish.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/compte.css" type="text/css" media="all">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet" type='text/css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@200;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Secular+One&display=swap" rel="stylesheet">

    <meta charset = "utf-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1">
        <meta name = "description" content = "Flexible box card-based layout demo from Morten Rand-Hendriksen, staff author at lynda.com">

        <link href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel = "stylesheet"  type = "text/css">
        <link rel = "preconnect" href = "https://fonts.googleapis.com">
        <link href = "https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@200;300&display=swap" rel = "stylesheet">
        <link href = "https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel = "stylesheet">
        <link href = "https://fonts.googleapis.com/css2?family=Comfortaa&family=Secular+One&display=swap" rel = "stylesheet">
        <link href = "https://fonts.googleapis.com/css2?family=Space+Mono&display=swap" rel="stylesheet">
        <link rel = "preconnect" href = "https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href = "build_cv/stylish.css" type = "text/css" medi = "all">
        <link rel="stylesheet" href = "build_cv/profil_css/welcome-cv-style.css" type = "text/css" medi = "all">
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
					<a href="document.php">Documents</a>
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
        <form action="document.php" method="post" enctype="multipart/form-data">
            <input type="file" name="upload_folder"> <!-- Corrected form enctype and input name -->
            <button type="submit" style="padding:15px; margin-left: 15px;">Upload Document</button>
        </form>
        <br/><br/>
        <h2 style="font-size: 25px; margin-left: 15px; padding-bottom: 20px">Uploaded Files</h2>
        <ul>
            <style>
                
                /* Form container styles */
.form-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
}

/* Form styles */
form {
    width: 70%; /* Adjust width as needed */
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

input[type="file"] {
    display: block;
    margin: 20px auto;
}
/* File input styles */
input[type="file"] {
    display: block;
    margin: 20px auto;
    padding: 10px;
    border: 2px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
    color: #555;
    font-size: 16px;
    width: 80%; /* Adjust width as needed */
    transition: border-color 0.3s ease-in-out;
}

/* File input hover and focus styles */
input[type="file"]:hover,
input[type="file"]:focus {
    border-color: #007bff;
    outline: none;
}

button[type="submit"] {
    display: block;
    margin: 0 auto;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

            </style>
        <?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file upload is set
    if (isset($_FILES["upload_folder"])) {
        // Define the directory where you want to store uploaded folders
        $targetDir = "C:/xampp/htdocs/cv/"; // Change this to your desired directory within XAMPP htdocs

        // Check if the directory exists, if not, create it
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // Get the temporary folder path
        $tempFolder = $_FILES["upload_folder"]["tmp_name"];

        // Get the original folder name
        $folderName = $_FILES["upload_folder"]["name"];

        // Move the uploaded folder to the target directory
        if (move_uploaded_file($tempFolder, $targetDir . $folderName)) {
            echo "Folder uploaded successfully.";
        } else {
            echo "Error uploading folder.";
        }
    } else {
        echo "No folder uploaded.";
    }
}
?>

        </ul>
        </div>
        </div>
        </div>
	</main> <!-- .cd-main-content -->
<!-- <script src="js/jquery.menu-aim.js"></script>
<script src="js/profile.js"></script> Resource jQuery -->
<script src="script.js"></script>

</body>
</html>
