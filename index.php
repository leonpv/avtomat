<?php
include 'inc/config.php';
var_dump($_SESSION['username']);
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
        <?if(!isset($_SESSION['username'])) {
            echo "
		    <li><a href='register.html'><i class='icon-user'></i> Register</a></li>
		    <li><a href='login.html'><i class='icon-key'></i> Login</a></li>
           ";
        }
        else{
            echo "
            <li><a href='Scripts/exit.php'>Выход</a></li>
            ";
        }
        ?>
		</ul>
	</div>
	
	<div id="search_area" class="col_12 column">
			<form class="horizontal" method="post" action="#">
				<input id="keywords" type="text" placeholder="Enter Keywords..." /> 
				<select id="state_select">
					<option>Select State</option>
					<option value="AL">Alabama</option>
					<option value="AK">Alaska</option>
					<option value="AZ">Arizona</option>
					<option value="AR">Arkansas</option>
					<option value="CA">California</option>
					<option value="CO">Colorado</option>
					<option value="CT">Connecticut</option>
					<option value="DE">Delaware</option>
					<option value="FL">Florida</option>
					<option value="GA">Georgia</option>
					<option value="HI">Hawaii</option>
					<option value="ID">Idaho</option>
					<option value="IL">Illinois</option>
					<option value="IN">Indiana</option>
					<option value="IA">Iowa</option>
					<option value="KS">Kansas</option>
					<option value="KY">Kentucky</option>
					<option value="LA">Louisiana</option>
					<option value="ME">Maine</option>
					<option value="MD">Maryland</option>
					<option value="MA">Massachusetts</option>
					<option value="MI">Michigan</option>
					<option value="MN">Minnesota</option>
					<option value="MS">Mississippi</option>
					<option value="MO">Missouri</option>
					<option value="MT">Montana</option>
					<option value="NE">Nebraska</option>
					<option value="NV">Nevada</option>
					<option value="NH">New Hampshire</option>
					<option value="NJ">New Jersey</option>
					<option value="NM">New Mexico</option>
					<option value="NY">New York</option>
					<option value="NC">North Carolina</option>
					<option value="ND">North Dakota</option>
					<option value="OH">Ohio</option>
					<option value="OK">Oklahoma</option>
					<option value="OR">Oregon</option>
					<option value="PA">Pennsylvania</option>
					<option value="RI">Rhode Island</option>
					<option value="SC">South Carolina</option>
					<option value="SD">South Dakota</option>
					<option value="TN">Tennessee</option>
					<option value="TX">Texas</option>
					<option value="UT">Utah</option>
					<option value="VT">Vermont</option>
					<option value="VA">Virginia</option>
					<option value="WA">Washington</option>
					<option value="WV">West Virginia</option>
					<option value="WI">Wisconsin</option>
					<option value="WY">Wyoming</option>
				</select>
				<select id="category_select">
					<option>Select Category</option>
					<option>Accounting & Banking</option>
					<option>Construction</option>
					<option>Fashion & Style</option>
					<option>Food & Restaurant</option>
					<option>Healthcare</option>
					<option>Retail & Sales</option>
					<option>Technology</option>
				</select>
				<button type="submit">Submit</button>
			</form>
		</div>
		
		<div class="col_12 column">
			<h3>Latest Job Listings</h3>
			<ul id="listings">
				<li>
					<div class="type">
						<span class="green">Full Time</span>
					</div>
					<div class="description">
						<h5>Senior Graphic Designer (Burlington, MA)</h5>
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt 
						ut laoreet dolore magna aliquam erat volutpat.<a href="details.html"> <i class="icon-plus"></i> Read More</a>
					</div>
				</li>
				<li>
					<div class="type">
						<span class="green">Full Time</span>
					</div>
					<div class="description">
						<h5> UX Designer (Newburyport, MA)</h5>
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt 
						ut laoreet dolore magna aliquam erat volutpat.<a href="details.html"> <i class="icon-plus"></i> Read More</a>
					</div>
				</li>
				<li>
					<div class="type">
						<span class="blue">Part Time</span>
					</div>
					<div class="description">
						<h5>Registered Nurse (Brooklyn, NY)</h5>
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt 
						ut laoreet dolore magna aliquam erat volutpat.<a href="details.html"> <i class="icon-plus"></i> Read More</a>
					</div>
				</li>
				<li>
					<div class="type">
						<span class="green">Full Time</span>
					</div>
					<div class="description">
						<h5>House Painter(Boston, MA)</h5>
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt 
						ut laoreet dolore magna aliquam erat volutpat.<a href="details.html"> <i class="icon-plus"></i> Read More</a>
					</div>
				</li>
			</ul>
		</div>
		
		<div class="clearfix"></div>
		<footer>
			<p>Copyright @copy; 2018, JobFinds, All Rights Reserved</p>
		</footer>
</div> <!-- End Grid -->
</body>
</html>