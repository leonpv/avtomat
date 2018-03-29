<?php
include "inc/config.php";
if (isset($_POST['derelevant'])){
    $con->query("UPDATE Job SET No_relevant = 1 WHERE id='{$_GET['id']}'");
}
if (isset($_POST['comment'])){
    $con->query("INSERT INTO comments (Post, Message, Author) VALUES ('{$_GET['id']}', '{$_POST['message']}', '{$_SESSION['username']}')");
    header("Location: details.php?id={$_GET['id']}");
}
if (isset($_POST['rating'])&&$_POST['assessment']<=10){
    $con->query("INSERT INTO rating (Post, Author, Assessment) VALUES ('{$_GET['id']}', '{$_SESSION['username']}', '{$_POST['assessment']}')");
    header("Location: details.php?id={$_GET['id']}");
}
$assessment_user=mysqli_fetch_all($con->query("SELECT Assessment FROM rating WHERE Post='{$_GET['id']}' AND Author='{$_SESSION['username']}'"), MYSQLI_ASSOC);
$assessment=mysqli_fetch_all($con->query("SELECT Assessment FROM rating WHERE Post='{$_GET['id']}'"), MYSQLI_ASSOC);
$comments=mysqli_fetch_all($con->query("SELECT * FROM comments WHERE Post='{$_GET['id']}'"), MYSQLI_ASSOC);
$job=mysqli_fetch_all($con->query("SELECT * FROM Job WHERE id='{$_GET['id']}'"), MYSQLI_ASSOC)[0];
$email=mysqli_fetch_assoc($con->query("SELECT Email From users WHERE Username='{$job['Author']}'"))['Email'];
$i=0;
foreach ($assessment as $value){
    $i+=$value['Assessment'];
}
if(count($assessment)!=0) $assessment = round($i / count($assessment), 1);
else $assessment="No ratings";
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
		<li><a href="jobs.php"><i class="icon-desktop"></i> Browse Jobs</a></li>
		<li><a href="register.html"><i class="icon-user"></i> Register</a></li>
		<li><a href="login.html"><i class="icon-key"></i> Login</a></li>
		</ul>
	</div>
	
		<div class="col_12 column">
			<h3><?=$job['Name']?></h3>
			<ul>
                <li><strong>Status: </strong><?if (!$job['No_relevant']) echo "Relevant"; else echo "No relevant";
                if($_SESSION['username']==$job['Author']&&!$job['No_relevant']) echo "<form method='post'><button name='derelevant' style='margin-left:20px;' type='submit'>Нажмите если информации более не актуальна</button></form>"?></li>
				<li><strong>Location: </strong><?=$job['Location']?></li>
				<li><strong>Job Type: </strong><?=$job['Type']?></li>
				<li><strong>Description: </strong> <p><?=$job['Description']?></p></li>
				<li><strong>Contact Email:</strong> <a href="mailto:<?=$email?>?Subject=Job%20Applicant" target="_top"><?=$email?></a></li>
			</ul>
			<p><a href="jobs.php">Back To Jobs</a></p>
            <?if($_SESSION['username']==$job['Author']) echo"<p><a href='edit_post.php?id={$_GET['id']}'>Редактировать пост</a></p>";?>
            <a href="chat.php?user1=<?=$_SESSION['all']['id']?>&user2=<?=$_SESSION['i']?>">Написать сообщение</a>
		</div>
        <div class="col_12 column">
            <p><strong>Rating: </strong><?=$assessment?></p>
            <?php if ($assessment_user==NULL): ?>
                <form method="post">
                    <label for="assessment">Assessment</label>
                    <input type="text" id="assessment" name="assessment">
                    <input type="submit" name="rating" value="Estimate">
                </form>
            <?php endif; ?>
        </div>
        <div class="col_12 column">
            <strong><p>Comments</p></strong>
            <div>
                <?
                    foreach ($comments as $comment){
                        echo "<p>{$comment['Author']}</p>";
                        echo "<p>{$comment['Message']}</p>";
                        echo "<p>{$comment['Time']}</p><br>";
                    }
                ?>
            </div>
            <form method="post">
                <textarea style="height: 80px;" name="message"></textarea>
                <input type="submit"  name="comment" value="Отправить"/>
            </form>
        </div">
		<div class="clearfix"></div>
		<footer>
			<p>Copyright @copy; 2018, JobFinds, All Rights Reserved</p>
		</footer>
</div> <!-- End Grid -->
</body>
</html>
