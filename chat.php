<?php
include "inc/config.php";
if ($_GET['user1']!=$_SESSION['all']['id']){
    header("Location: chat.php?user1={$_SESSION['all']['id']}&user2={$_SESSION['i']}");
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $con -> query("INSERT INTO messages (Sender, Recipient, Message) VALUES ('{$_GET['user1']}','{$_GET['user2']}','{$_POST['message']}')");
    header("Location: chat.php?user1={$_SESSION['all']['id']}&user2={$_SESSION['i']}");
}
$messages=mysqli_fetch_all($con -> query("SELECT * FROM messages WHERE Sender='{$_SESSION['all']['id']}' AND Recipient='{$_SESSION['i']}' 
OR Sender='{$_SESSION['i']}' AND Recipient='{$_SESSION['all']['id']}' ORDER BY Time"),MYSQLI_ASSOC);

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
	<script src='https://www.google.com/recaptcha/api.js'></script>
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
            <li><a href="jobs.php"><i class="icon-desktop"></i> Browse Jobs</a></li>
            <li><a href='edit_profile.php'>Edit profile</a></li>
            <li><a href='Scripts/exit.php'>Exit</a></li>
		</ul>
	</div>
    <div style="position: absolute;top:300px;left: 200px;">
        <?
            foreach ($messages as $message){
                if($message['Sender']==$_SESSION['all']['id']) {
                    echo '<p style="border: 1px solid red;">' . $message['Message'] . '</p>';
                }
                else{
                    echo '<p align="right" style="border: 1px solid blue;">' . $message['Message'] . '</p>';
                }
            }
        ?>
    </div>

    <form method="post" style="position: absolute;top:500px;left: 500px;">
        <textarea name="message"></textarea>
        <input type="submit" value="Отправить"/>
    </form>

    <div class="clearfix"></div>
	<footer>
	    <p>Copyright @copy; 2018, JobFinds, All Rights Reserved</p>
    </footer>
</div> <!-- End Grid -->
</body>
</html>

