<?php
include 'inc/config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'&&$con -> query("SELECT Username FROM users WHERE Username='{$_POST['username']}'") -> fetch_assoc()==NULL) {
    $hach=password_hash($_POST['password'], PASSWORD_DEFAULT);
    $con -> query("INSERT INTO users (First_Name, Last_Name, Email, Gender, Phone_number, Username, Password) VALUES
('{$_POST['first_name']}','{$_POST['last_name']}','{$_POST['email']}','{$_POST['gender']}','{$_POST['phone_number']}','{$_POST['username']}','{$hach}')");
    header('Location: login.html');
}
else{
    header('Location: register.html');
}

