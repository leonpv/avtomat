<?php
include "../inc/config.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $con -> query("INSERT INTO Job (Name, Location, Type, Category, Description, Author)
    VALUES ('{$_POST['Name']}','{$_POST['Location']}','{$_POST['Type']}','{$_POST['Category']}','{$_POST['Description']}','{$_SESSION['username']}')");
    header('Location: ../index.php');
}