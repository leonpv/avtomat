<?php
if ($_POST['Text']!=='' && $_POST['Location']==='' && $_POST['Category']===''){
    $jobs=mysqli_fetch_all($con->query("SELECT * FROM Job WHERE Name LIKE '%{$_POST['Text']}%' OR Type LIKE '%{$_POST['Text']}%' OR Description LIKE '%{$_POST['Text']}%' ORDER BY Time DESC LIMIT 5"), MYSQLI_ASSOC);
}
if ($_POST['Text']!=='' && $_POST['Location']!=='' && $_POST['Category']===''){
    $jobs=mysqli_fetch_all($con->query("SELECT * FROM Job WHERE Name LIKE '%{$_POST['Text']}%' OR Type LIKE '%{$_POST['Text']}%' OR Description LIKE '%{$_POST['Text']}%' AND Location='{$_POST['Location']}' ORDER BY Time DESC LIMIT 5"), MYSQLI_ASSOC);
}
if ($_POST['Text']!=='' && $_POST['Location']==='' && $_POST['Category']!==''){
    $jobs=mysqli_fetch_all($con->query("SELECT * FROM Job WHERE Name LIKE '%{$_POST['Text']}%' OR Type LIKE '%{$_POST['Text']}%' OR Description LIKE '%{$_POST['Text']}%' AND Category='{$_POST['Category']}' ORDER BY Time DESC LIMIT 5"), MYSQLI_ASSOC);
}
if ($_POST['Text']==='' && $_POST['Location']!=='' && $_POST['Category']===''){
    $jobs=mysqli_fetch_all($con->query("SELECT * FROM Job WHERE Location='{$_POST['Location']}' ORDER BY Time DESC LIMIT 5"), MYSQLI_ASSOC);
}
if ($_POST['Text']==='' && $_POST['Location']!=='' && $_POST['Category']!==''){
    $jobs=mysqli_fetch_all($con->query("SELECT * FROM Job WHERE Location='{$_POST['Location']}' AND Category='{$_POST['Category']}' ORDER BY Time DESC LIMIT 5"), MYSQLI_ASSOC);
}
if ($_POST['Text']==='' && $_POST['Location']==='' && $_POST['Category']!==''){
    $jobs=mysqli_fetch_all($con->query("SELECT * FROM Job WHERE Category='{$_POST['Category']}' ORDER BY Time DESC LIMIT 5"), MYSQLI_ASSOC);
}
if ($_POST['Text']!=='' && $_POST['Location']!=='' && $_POST['Category']!==''){
    $jobs=mysqli_fetch_all($con->query("SELECT * FROM Job WHERE Name LIKE '%{$_POST['Text']}%' OR Type LIKE '%{$_POST['Text']}%' OR Description LIKE '%{$_POST['Text']}%' AND Location='{$_POST['Location']}' AND Category='{$_POST['Category']}' ORDER BY Time DESC LIMIT 5"), MYSQLI_ASSOC);
}