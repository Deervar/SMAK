<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style.php">
<head>
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/8bit-wonder" type="text/css"/>
    <meta charset="utf-8">
    <title></title>
</head>
<body style="background-image: url(graphics/world-of-warcraft-9673x5000-escalation-artwork-51.jpg);width:1920px;height:969px;display: block; margin-left: auto;margin-right: auto;background-repeat:none;">
<div id="container">
<form action="gra.php" method="POST">
    <div id="inputy">
        <input type="text" name="login" class="teksty">
        <input type="password" name="password" class="teksty">
        <input type="submit" name="send" id="submit" value="">
    </div>
<?php
session_start(); 
@$_SESSION['login'] = $_POST['login'];
logowanie();


function logowanie()
{

	$login = 'Deervar';
	$password = '12345';
	@$login_input = ($_POST['login']);
	@$password_input = ($_POST['password']);
	if ($login_input==$login && $password_input==$password)
	{
	    header("Location:char.php");
	} 

	else
	{	

		echo "<div style='color:red;font-family:arial;font-size:25px;float:left;margin-top:400px;margin-left:-230px;'>Złe dane logowania!</div>";

	}
}

?>
</div>
</body>
</html>
