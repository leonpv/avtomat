<?php
require_once 'inc/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $con -> query("INSERT INTO users (First_Name, Last_Name, Email, Gender, Phone_number, Username, Password) VALUES
('{$_POST['first_name']}','{$_POST['last_name']}','{$_POST['email']}','{$_POST['gender']}','{$_POST['phone_number']}','{$_POST['username']}','{$_POST['password']}')");
    header(' location : index.html');
}
?>
