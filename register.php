<?php
require_once 'inc/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $con -> query("INSERT INTO users First_Name, Last_Name, Email, Gender, Phone_number, Username, Password VALUES
('{$_POST['first_name']}','{$_POST['last_name']}','{$_POST['email']}','{$_POST['gender']}','{$_POST['phone_number']}','{$_POST['username']}','{$_POST['password']}')");
    header(' location : register.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<!-- META -->
	<title>JobFinds | Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content="" />
	
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/kickstart.css" media="all" />
	<link rel="stylesheet" type="text/css" href="style.css" media="all" /> 
	
	<!-- Javascript -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/jquery.maskedinput.min.js"></script>
	<script type="text/javascript" src="js/kickstart.js"></script>
</head>
<body>
<div id="container" class="grid">
	<header>
		<div class="col_6 column">
			<h1><a href="index.html"><strong>Job</strong>Finds</a></h1>
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
		<li class="current"><a href="index.html"><i class="icon-home"></i> Home</a></li>
		<li><a href="jobs.html"><i class="icon-desktop"></i> Browse Jobs</a></li>
		<li><a href="register.php"><i class="icon-user"></i> Register</a></li>
		<li><a href="login.html"><i class="icon-key"></i> Login</a></li>
		</ul>
	</div>

		
		<div class="col_12 column">
			<form id="reg_form" method="post">
			<fieldset>
			<legend>Create An Account</legend>
				<p>
					<label for="first_name">First Name</label>
					<input id="first_name" name="first_name" type="text" required/>
				</p>
				<p>
					<label for="last_name">Last Name</label>
					<input id="last_name" name="last_name" type="text" required/>
				</p>
				<p>
					<label for="email">Email</label>
					<input id="email" name="email" type="email" required/>
				</p>
                <p>
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" required>
                        <option value="Men">Men</option>
                        <option value="Women">Women</option>
                    </select>
                </p>
                <p>
                    <label for="phone">Phone number</label>
                    <input id="phone_number" name="phone" type="text" required />
                </p>
				<p>
					<label for="username">Username</label>
					<input id="username" name="username" type="text" required/>
				</p>
				<p>
					<label for="password">Password</label>
					<input id="password" name="password" type="password" required/>
				</p>
				<p>
					<label for="password2">Confirm Password</label>
					<input id="password2" name="password2" type="password" required/>
				</p>
				<p>
					<input name="reg_submit" type="submit" value="Submit" />
				</p>
				</fieldset>
			</form>
		</div>
		
		<div class="clearfix"></div>
		<footer>
			<p>Copyright @copy; 2018, JobFinds, All Rights Reserved</p>
		</footer>
</div> <!-- End Grid -->
</body>
</html>
<script type="text/javascript" src="js/register.js"></script>