<?php
include 'inc/config.php';
$jobs=mysqli_fetch_all($con->query("SELECT * FROM Job"), MYSQLI_ASSOC);
include_once 'Search.php';

?>
<!DOCTYPE html>
<html>
<head>
	<!-- META -->
	<title>JobFinds | Welcome</title>
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
            <form id="add_job_link" action="add_job.html">
                <button type="submit" class="large green"><i class="icon-plus"></i>Add Job</button>
            </form>
		</div>
	</header>
	
	<div class="col_12 column">
		<!-- Menu Horizontal -->
		<ul class="menu">
		<li class="current"><a href="index.php"><i class="icon-home"></i> Home</a></li>
		<li><a href="jobs.html"><i class="icon-desktop"></i> Browse Jobs</a></li>
        <?if(!isset($_SESSION['username'])) {
            echo "
		    <li><a href='register.html'><i class='icon-user'></i> Register</a></li>
		    <li><a href='login.html'><i class='icon-key'></i> Login</a></li>
           ";
        }
        else{
            echo "
            <li><a href='edit_profile.php'>Edit profile</a></li>
            <li><a href='Scripts/exit.php'>Exit</a></li>
            ";
        }
        ?>
		</ul>
	</div>
	
	<div id="search_area" class="col_12 column">
			<form class="horizontal" method="post">
				<input id="keywords" type="text" placeholder="Enter Keywords..." name="Text" />
				<select id="state_select" name="Location" >
					<option value="">Select State</option>
                    <option value="Alabama">Alabama</option>
                    <option value="Alaska">Alaska</option>
                    <option value="Arizona">Arizona</option>
                    <option value="Arkansas">Arkansas</option>
                    <option value="California">California</option>
                    <option value="Colorado">Colorado</option>
                    <option value="Connecticut">Connecticut</option>
                    <option value="Delaware">Delaware</option>
                    <option value="Florida">Florida</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Hawaii">Hawaii</option>
                    <option value="Idaho">Idaho</option>
                    <option value="Illinois">Illinois</option>
                    <option value="Indiana">Indiana</option>
                    <option value="Iowa">Iowa</option>
                    <option value="Kansas">Kansas</option>
                    <option value="Kentucky">Kentucky</option>
                    <option value="Louisiana">Louisiana</option>
                    <option value="Maine">Maine</option>
                    <option value="Maryland">Maryland</option>
                    <option value="Massachusetts">Massachusetts</option>
                    <option value="Michigan">Michigan</option>
                    <option value="Minnesota">Minnesota</option>
                    <option value="Mississippi">Mississippi</option>
                    <option value="Missouri">Missouri</option>
                    <option value="Montana">Montana</option>
                    <option value="Nebraska">Nebraska</option>
                    <option value="Nevada">Nevada</option>
                    <option value="New Hampshire">New Hampshire</option>
                    <option value="New Jersey">New Jersey</option>
                    <option value="New Mexico">New Mexico</option>
                    <option value="New York">New York</option>
                    <option value="North Carolina">North Carolina</option>
                    <option value="North Dakota">North Dakota</option>
                    <option value="Ohio">Ohio</option>
                    <option value="Oklahoma">Oklahoma</option>
                    <option value="Oregon">Oregon</option>
                    <option value="Pennsylvania">Pennsylvania</option>
                    <option value="Rhode Island">Rhode Island</option>
                    <option value="South Carolina">South Carolina</option>
                    <option value="South Dakota">South Dakota</option>
                    <option value="Tennessee">Tennessee</option>
                    <option value="Texas">Texas</option>
                    <option value="Utah">Utah</option>
                    <option value="Vermont">Vermont</option>
                    <option value="Virginia">Virginia</option>
                    <option value="Washington">Washington</option>
                    <option value="West Virginia">West Virginia</option>
                    <option value="Wisconsin">Wisconsin</option>
                    <option value="Wyoming">Wyoming</option>
				</select>
				<select id="category_select" name="Category" >
					<option value="">Select Category</option>
                    <option value="Accounting & Banking">Accounting & Banking</option>
                    <option value="Construction">Construction</option>
                    <option value="Fashion & Style">Fashion & Style</option>
                    <option value="Food & Restaurant">Food & Restaurant</option>
                    <option value="Healthcare">Healthcare</option>
                    <option value="Retail & Sales">Retail & Sales</option>
                    <option value="Technology">Technology</option>
				</select>
				<button type="submit">Submit</button>
			</form>
		</div>
		
		<div class="col_12 column">
			<h3>Latest Job Listings</h3>
			<ul id="listings">
                <? foreach ($jobs as $job) {
                    echo "
                        <li>
                            <div class='type'>
                    ";
                    if ($job['Type'] == "Full Time") {
                        echo "<span class='green'>Full Time</span>";
                    } else {
                        echo "<span class='blue'>Part Time</span>";
                    }
                    echo "
                            </div>
                            <div class='description'>
                                <h5>{$job['Name']} ({$job['Location']})</h5>{$job['Description']}
                                <a href='details.php?id={$job['id']}'> <i class='icon-plus'></i> Read More</a>
                            </div>
                        </li>
                    ";
                }
                ?>

			</ul>
		</div>
		
		<div class="clearfix"></div>
		<footer>
			<p>Copyright @copy; 2018, JobFinds, All Rights Reserved</p>
		</footer>
</div> <!-- End Grid -->
</body>
</html>
