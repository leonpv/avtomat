<?php
include "inc/config.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $con -> query("UPDATE Job SET Name = '{$_POST['Name']}', Location = '{$_POST['Location']}', Type = '{$_POST['Type']}',
 Category = '{$_POST['Category']}', Description = '{$_POST['Description']}' WHERE id = '2'");
    header('Location: ../index.php');
}