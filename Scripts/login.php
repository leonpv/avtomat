<?php
include '../inc/config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'&&$_POST["g-recaptcha-response"]!="") {
    $hach=$con -> query("SELECT Password FROM users WHERE Username='{$_POST['username']}'") -> fetch_assoc()['Password'];
    if(password_verify($_POST['password'],$hach)){
        $_SESSION['username']=$_POST['username'];
        $_SESSION['all']=$con -> query("SELECT * FROM users WHERE Username='{$_POST['username']}'") -> fetch_assoc();
        header('Location: ../index.php');
    }
    else{
        header('Location: ../login.html');
    }
}
else{
    header('Location: ../login.html');
}