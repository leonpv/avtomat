<?php
include "inc/config.php";
var_dump($_SESSION['all']);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (password_verify($_POST['password'], $_SESSION['all']["Password"]) && $_POST['password1'] == $_POST['password2']) {
        $hach = password_hash($_POST['password1'], PASSWORD_DEFAULT);
        $con->query("UPDATE users SET Password='{$hach}' WHERE Username='{$_SESSION['all']['Username']}'");
    }
    $con->query("UPDATE users SET First_Name = '{$_POST['first_name']}', Last_Name = '{$_POST['last_name']}',
 Email = '{$_POST['email']}', Gender = '{$_POST['gender']}', Phone_number = '{$_POST['phone_number']}' WHERE Username='{$_SESSION['username']}'");

    $_SESSION['all']=$con -> query("SELECT * FROM users WHERE Username='{$_SESSION['username']}'") -> fetch_assoc();
    //header('Location: ../index.php');
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
            <h1><a href="index.php"><strong>Job</strong>Finds</a></h1>
        </div>
    </header>

    <div class="col_12 column">
        <!-- Menu Horizontal -->
        <ul class="menu">
            <li class="current"><a href="index.php"><i class="icon-home"></i> Home</a></li>
            <li><a href="jobs.html"><i class="icon-desktop"></i> Browse Jobs</a></li>
        </ul>
    </div>


    <div class="col_12 column">
        <form id="edit_profile" method="post">
            <fieldset>
                <legend>Изменение данных</legend>
                <p>
                    <label for="first_name">First Name</label>
                    <input id="first_name" name="first_name" type="text" required value="<?=$_SESSION['all']['First_Name']?>"/>
                </p>
                <p>
                    <label for="last_name">Last Name</label>
                    <input id="last_name" name="last_name" type="text" required value="<?=$_SESSION['all']['Last_Name']?>"/>
                </p>
                <p>
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" required value="<?=$_SESSION['all']['Email']?>"/>
                </p>
                <p>
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" required >
                        <option value="Men">Men</option>
                        <option value="Women" <?if($_SESSION['all']['Gender']=='Women')echo 'selected';?>>Women</option>
                    </select>
                </p>
                <p>
                    <label for="phone_number">Phone number</label>
                    <input id="phone_number" name="phone_number" type="text" required value="<?=$_SESSION['all']['Phone_number']?>"/>
                </p>
                <p>
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password"/>
                </p>
                <p>
                    <label for="password1">New Password</label>
                    <input id="password1" name="password1" type="password"/>
                </p>
                <p>
                    <label for="password2">Confirm new Password</label>
                    <input id="password2" name="password2" type="password"/>
                </p>
                <p>
                    <input name="reg_submit" type="submit" value="Сохранить изменения" />
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