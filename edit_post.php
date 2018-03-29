<?php
include "inc/config.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $con -> query("UPDATE Job SET Name = '{$_POST['Name']}', Location = '{$_POST['Location']}', Type = '{$_POST['Type']}',
 Category = '{$_POST['Category']}', Description = '{$_POST['Description']}' WHERE id = '{$_GET['id']}'");
    header("Location: edit_post.php?id={$_GET['id']}");
}
$jobc=mysqli_fetch_all($con->query("SELECT * FROM Job WHERE id='{$_GET['id']}'"), MYSQLI_ASSOC)[0];
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
        <form id="edd_job_form" method="post">
            <fieldset>
                <legend>Edit Job</legend>
                <p>
                    <label for="Name">Name</label>
                    <input id="Name" type="text" name="Name" value=<?=$jobc['Name']?> required>
                </p>
                <p>
                    <label for="Description<">Description</label>
                    <input id="Description<" type="text" name="Description" value=<?=$jobc['Description']?> required>
                </p>
                <p>
                    <label for="Type">Type</label>
                    <select id="Type" name="Type" required>
                        <option value="<?=$jobc['Type']?>"><?=$jobc['Type']?></option>
                        <option value="Full Time">Full Time</option>
                        <option value="Part Time">Part Time</option>
                    </select>
                </p>
                <p>
                    <label for="state_select">Location</label>
                    <select id="state_select" name="Location" required>
                        <option value="<?=$jobc['Location']?>"><?=$jobc['Location']?></option>
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
                </p>
                <p>
                    <label for="category_select">Category</label>
                    <select id="category_select" name="Category" required>
                        <option value="<?=$jobc['Category']?>"><?=$jobc['Category']?></option>
                        <option value="Accounting & Banking">Accounting & Banking</option>
                        <option value="Construction">Construction</option>
                        <option value="Fashion & Style">Fashion & Style</option>
                        <option value="Food & Restaurant">Food & Restaurant</option>
                        <option value="Healthcare">Healthcare</option>
                        <option value="Retail & Sales">Retail & Sales</option>
                        <option value="Technology">Technology</option>
                    </select>
                </p>
                <p>
                    <input type="submit" value="Submit" />
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