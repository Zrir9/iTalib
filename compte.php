<?php
error_reporting(0);
include 'config.php';
session_start();
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
	$user_type = $row['user_type'];
}	

?>
<!DOCTYPE html>
<header></header>
<html lang="en-US">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        
    <title>IStudent</title>
    <meta name="description" content="Flexible box card-based layout demo from Morten Rand-Hendriksen, staff author at lynda.com"/>
                
    <link rel="stylesheet" href="stylish.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/compte.css" type="text/css" media="all">
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
									<li><a href="chercher_travail.php?user=<?php echo $_SESSION['login_user']; ?>">Chercher Travail</a></li>
									<li><a href="#">Chercher Cv</a></li>
									<li><a href="#">Compte</a></li>
							   </ul>
						</nav>
					</div>
					<div class= "centered">
							<nav id = "nav" class= "nav menu" role = "navigation">
								<ul>
									<li><a href="#" class='active' >Acceuil</a></li>
									<li><a href="chercher_travail.php?user=<?php echo $_SESSION['login_user']; ?>">Chercher Travail</a></li>
									<li><a href="#">Chercher Cv</a></li>
									<li><a href="#">Se Connecter</a></li>
									<li><a href="#">Compte</a></li>
							   </ul>
							</nav>
					</div>
				
			</section>
			
		<main class="main-area" >
		<div class="content-wrapper">
		
	</header> <!-- .cd-main-header -->

	<main class="cd-main-content">
		<nav class="cd-side-nav">
			<ul>
				<li><a href="index.php">Acceuil</a></li>
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
	<div class="profile-container">
		<div class="info-box">
			<img id="pro-timeline" src="images/pro-timeline.jpg"></img>
			<div class="pro-title">
				<center><img class="profile-image" src="<?php echo $dp; ?>">
					<p id="pro-name"><?php echo $fullname; ?></p>
					<span class="pro-detail"><?php echo $email; ?></span> | <span class="pro-detail" id="number"><?php echo $contact; ?></span><br/><br/>
					<form action="add-contact.php">
						<input value="<?php echo $_GET['user'];?>" id="user" name="user" hidden>
						<button type="submit" style="padding: 10px;" id="add-contact" name="add-contact" value="0">Add to Contact List</button>
					</form>
				</center>
			</div>
		</div>
		<?php
if($user_type == 'institute' || $user_type == 'company') {
?>
    <div class="pro-job student">
        <h1 class="heading">My Jobs<button id="add-job" class="add-button remove">+ Add New</button></h1>
        <div class="pro-job-body pro-body">
            <center>
                <form id="form-job" hidden="" class="remove" action="update-compte.php">
                    <input type="text" id="job_title" name="job_title" placeholder="Job Title">
                    <input type="text" id="location" name="location" placeholder="Location">
                    <textarea id="description" name="description" placeholder="Description"></textarea>
                    <input type="number" id="salary" name="salary" placeholder="Salary">
                    <select id="job_type" name="job_type">
                        <option value="select-job-type">Select Job Type</option>
                        <option value="Temps Plein">Temps Plein</option>
                        <option value="Contrat">Contrat</option>
                        <!-- Add more job types as needed -->
                    </select>
                    <button type="submit" >Add Job</button>
                </form>
            </center>
			<table class="jobs-table">
    <thead>
        <tr>
            <th>Job Title</th>
            <th>Location</th>
            <th>Description</th>
            <th>Salary</th>
            <th>Job Type</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM `job` WHERE company_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$_GET['user']]);

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($rows)) {
            foreach ($rows as $row) {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['job_title']); ?></td>
                    <td><?php echo htmlspecialchars($row['location']); ?></td>
                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                    <td><?php echo htmlspecialchars($row['salary']); ?></td>
                    <td><?php echo htmlspecialchars($row['job_type']); ?></td>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>
        </div>
    </div>
<?php
}else{
?>
		<div class="pro-education student">

			<h1 class="heading">Education<button id="add-edu" class="add-button remove">+ Add New</button></h1>
			<div class="pro-education-body pro-body">
				<center>
					<form id="form-edu" hidden="" class="remove" action="update-compte.php">
						<select id="institute" name="institute" onchange="fill_degree()">
							<option value="select-inst">Select Institute</option>
							<?php
							$query = "SELECT * FROM user WHERE user_type = ?";
							$stmt = $db->prepare($query);
							$stmt->execute(['Institute']);

							$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

							if (!empty($rows)) {
								foreach ($rows as $row) {
									?>		
									<option value="<?php echo $row['id']; ?>"><?php echo $row['name'] ?></option>
									<?php
								}
							}
							?>
						</select>
						<br/>
						<select id="degree" name="degree" required="">
							<option value="select-deg">Select Degree</option>
							<script>
								function fill_degree(){
									var selected = $("select#institute").val();
									$("select#degree").load("degree.php?institute="+selected);
								}
							</script>
						</select>
						<br/>
						<select id="from_year" name="from_year">
							<option value="year">From Year</option>
							<script>
								var myDate = new Date();
								var year = myDate.getFullYear();
								for(var i = year; i > 1980; i--){
									document.write('<option value="'+i+'">'+i+'</option>');
								}
							</script>
						</select><br/>
						<select id="to_year" name="to_year">
							<option value="year">To Year (or Expected)</option>
							<script>
								var myDate = new Date();
								var year = myDate.getFullYear();
								for(var i = year+5; i > 1990 ; i--){
									document.write('<option value="'+i+'">'+i+'</option>');
								}
							</script>
						</select><br/><br/>
						&nbsp;<button id="item-submit-edu" class="edit-button">Save</button>
						<button type="reset" id="cancel-edu" class="edit-button cancel">Cancel</button><br/><br/>
					</form>
				</center>
				<ul class="education-list">
					<?php
					$query = "SELECT * FROM `has_degree` join `user` on (student_id = id) where student_id = ?";
					$stmt = $db->prepare($query);
					$stmt->execute([$_GET['user']]);

					$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

					if (!empty($rows)) {
						foreach ($rows as $row) {
							?>
							<li>
								<?php

								$inst_stmt = $db->prepare("SELECT name FROM user WHERE id = ?");
								$inst_stmt->execute([$row['institute_id']]);
								$inst_column = $inst_stmt->fetch(PDO::FETCH_ASSOC);

								if ($inst_column) {
									echo "<p style='padding-bottom: 10px; font-size:18px; font-weight:bold'>" . htmlspecialchars($inst_column['name']) . "</p>";
								}

								// Degree Query
								$deg_stmt = $db->prepare("SELECT degree_name FROM degree WHERE degree_id = ?");
								$deg_stmt->execute([$row['degree_id']]);
								$deg_column = $deg_stmt->fetch(PDO::FETCH_ASSOC);

								if ($deg_column) {
									echo "<p style='padding-bottom: 10px;'>" . htmlspecialchars($deg_column['degree_name']) . "</p>";
								}

								?>
								<p style="font-size: 13px;"><span><?php echo $row['from_year']; ?></span> - <span><?php echo $row['to_year']; ?></span></p>
							</li>

							<?php
						}
					}
					?>
				</ul>
			</div>
		</div>
		<div class="pro-skill student">
			<h1 class="heading">Skills<button id="add-ski" class="add-button remove">+ Add New</button></h1>
			<div class="pro-skill-body pro-body">
				<center><form id="form-ski" hidden="" class="remove" action="update-compte.php">
					<input type="text" id="skill" name="skill" required="" placeholder="Skill (ex: Data Analysis)" ><br><br/>
					&nbsp;<button id="item-submit-ski" class="edit-button">Add</button>
					<button type="reset" id="cancel-ski" class="edit-button cancel">Cancel</button><br/><br/>
				</form></center>
				<ul class="skill-list">
					<?php
					$query = "SELECT * FROM `has_skill` join `user` on student_id = id where student_id = ?";
					$stmt = $db->prepare($query);
					$stmt->execute([$_GET['user']]);

					$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

					if (!empty($rows)) {
						foreach ($rows as $row) {
							?>
							<li>
								<span class="ski-span"><?php echo $row['skill'];?></span>
							</li>

							<?php
						}
					}
					?>		                
				</ul>
			</div>
		</div>
		<div class="pro-interest student">
			<h1 class="heading">Interests<button id="add-int" class="add-button remove">+ Add New</button></h1>
			<div class="pro-interest-body pro-body">
				<center><form id="form-int" hidden="" class="remove" action="update-compte.php">
					<input type="text" id="interest" name="interest" required="" placeholder="Interest (ex: Reading)" ><br><br/>
					&nbsp;<button id="item-submit-int" class="edit-button">Add</button>
					<button type="reset" id="cancel-int" class="edit-button cancel">Cancel</button><br/><br/>
				</form></center>
				<ul class="interest-list">
					<?php
					$query = "SELECT * FROM `has_interest` join `user` on student_id = id where student_id = ?";
					$stmt = $db->prepare($query);
					$stmt->execute([$_GET['user']]);

					$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

					if (!empty($rows)) {
						foreach ($rows as $row) {
							?>
							<li>
								<span class="int-span"><?php echo $row['interest'];?></span>
							</li>
							<?php
						}
					}
					?>		                
				</ul>
			</div>
		</div>
	</div> <!-- profile-container -->
</div>
<?php
}
?>
</main>
				</main>
		<script src = "script.js"></script>
		<script src="js/jquery.js"></script>
<script src="js/jquery.menu-aim.js"></script>
<script src="js/profile.js"></script> <!-- Resource jQuery -->
<script>
$(document).ready(function(){
	$("button#add-contact").hide();
	<?php
	if ($_GET['user'] != $_SESSION['login_user']){
		$_SESSION['added'] = 0;
	?>
		$(".remove").hide();
		$("button#add-contact").show();
	<?php
		$query = "select * from contact where user_id =?";
		$table = $db->prepare($query);
		$table->execute([$_SESSION['login_user']]);
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if (!empty($rows)) { 
			foreach ($rows as $row) {
				if ($_GET['user'] == $row['contact_id']){
	?>
					$("button#add-contact").html("Added in Contact List");
					$("button#add-contact").val(1);
					$("button#add-contact").css({"background-color":"white","border":"1px solid #16b980", "color":"#16b980"});
	<?php
					$_SESSION['added'] = 1;
					break;
				}
			}
		}
	}
	?>

	$("form#form-edu").hide();
	$("form#form-int").hide();
	$("form#form-ski").hide();
	$("button#cancel-edu").click(function(){
		$("form#form-edu").hide();
	});
	$("button#cancel-ski").click(function(){
		$("form#form-ski").hide();
	});
	$("button#cancel-int").click(function(){
		$("form#form-int").hide();
	});
	$("button#add-edu").click(function(){
		$("form#form-edu").toggle();
	});
	$("button#add-ski").click(function(){
		$("form#form-ski").toggle();
	});
	$("button#add-int").click(function(){
		$("form#form-int").toggle();
	});
	
});
document.getElementById('add-job').addEventListener('click', function() {
    var form = document.getElementById('form-job');
    if (form.style.display === 'none' || form.style.display === '') {
        form.style.display = 'block';
    } else {
        form.style.display = 'none';
    }
});
</script>

</body>
</html>