<?php
include "inc/config.php";
if ($_SESSION['all']['id']==10){
    $_SESSION['i']=9;
}
else{
    $_SESSION['i']=10;
}
$job=mysqli_fetch_all($con->query("SELECT * FROM Job WHERE id='{$_GET['id']}'"), MYSQLI_ASSOC)[0];
$email=mysqli_fetch_assoc($con->query("SELECT Email From users WHERE Username='{$job['Author']}'"))['Email'];
?>
<!DOCTYPE html>
<html>
<head>
	<!-- META -->
	<title>JobFinds | Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content="" />
	
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/kickstart.css" media="all" />
	<link rel="stylesheet" type="text/css" href="style.css" media="all" /> 
	
	<!-- Javascript -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/kickstart.js"></script>
</head>
<body>
<div id="container" class="grid">
	<header>
		<div class="col_6 column">
			<h1><a href="index.php"><strong>Job</strong>Finds</a></h1>
		</div>
		<div class="col_6 column right">
			<form id="add_job_link">
				<button class="large green"><i class="icon-plus"></i>Add Job</button>
			</form>
		</div>
	</header>
	
	<div class="col_12 column">
		<!-- Menu Horizontal -->
		<ul class="menu">
		<li class="current"><a href="index.php"><i class="icon-home"></i> Home</a></li>
		<li><a href="jobs.html"><i class="icon-desktop"></i> Browse Jobs</a></li>
		<li><a href="register.html"><i class="icon-user"></i> Register</a></li>
		<li><a href="login.html"><i class="icon-key"></i> Login</a></li>
		</ul>
	</div>
	
		<div class="col_12 column">
			<h3><?$job['Name']?></h3>
			<ul>
				<li><strong>Location: </strong><?=$job['Location']?></li>
				<li><strong>Job Type: </strong><?=$job['Type']?></li>
				<li><strong>Description: </strong> <p><?=$job['Description']?></p></li>
				<li><strong>Contact Email:</strong> <a href="mailto:<?=$email?>?Subject=Job%20Applicant" target="_top"><?=$email?></a></li>
			</ul>
			<p><a href="jobs.html">Back To Jobs</a></p>
            <a href="chat.php?user1=<?=$_SESSION['all']['id']?>&user2=<?=$_SESSION['i']?>">Написать сообщение</a>
		</div>
		
		<div class="clearfix"></div>
		<footer>
			<p>Copyright @copy; 2018, JobFinds, All Rights Reserved</p>
		</footer>
</div> <!-- End Grid -->
</body>
</html>
