<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<head>

    <meta charset="utf-8">
    <title></title>
</head>
<body>
<div id="container">
<?php
session_start(); 
$login = 'Deervar';
$password = '12345';
$login_input = $_POST['login'];
$password_input = $_POST['password'];
$_SESSION['login'] = $login_input;
logowanie();

function logowanie()
{

if ($login_input==$login && $password_input==$password)
{
    header("Location:char.php");
    return 'Deervar';
} 

else
{
    header("Location:login.html");
}
}

?>
</div>
</body>
</html>
