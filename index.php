<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<head>
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/8bit-wonder" type="text/css"/>
    <meta charset="utf-8">
    <title></title>
</head>
<body style="background-image: url(graphics/world-of-warcraft-9673x5000-escalation-artwork-51.jpg);width:1920px;height:969px;display: block; margin-left: auto;margin-right: auto;background-repeat:none;">
<div id="container">
<form action="" method="POST">
    <div id="inputy">
    	<div style="position: absolute; color:white;font-family:arial;font-size:150%;text-align: center;margin-top:-35px;margin-left:90px;">
    		Login
    	</div>
    	<div style="position: absolute; color:white;font-family:arial;font-size:150%;text-align: center;margin-top:40px;margin-left:70px;">
    		Password
    	</div>
        <input type="text" name="login" class="teksty" maxlength="10">
        <input type="password" name="password" class="teksty" maxlength="10">
        <input type="submit" name="send" 
    style="
	margin-top:40px;
	margin-left:13px;
	font-family:arial;
	font-size:25px;
	color:white;
	text-align:center;
	margin-bottom:40px;
	height:30px;
	width:215px;
	border:none;
	background-color:rgb(0,0,0, 0.1);" value="">
    </div>
    <div style=
	"
	position:absolute;
	margin-left:37%;
	font-family:arial;
	text-align:center;
	font-size:150%;
	color: white;
	margin-top:700px;
	"
	>Nie masz jeszcze konta? <a style="text-decoration:none" href="register.php">Zarejestruj się<a> za darmo!</div>
</form>
<?php


if (isset($_POST['send'])) 
{	
	require_once('connection.php');
	$polaczenie = mysqli_connect($serwer,$user,$pass,$db) or die ('Błąd połączenia 001');

	mysqli_set_charset($polaczenie,'utf8');
	$login=$_POST['login'];
	$password=$_POST['password'];
	$pytanie = "SELECT password,login FROM konta WHERE login='$login'";

	$rezultat = mysqli_query($polaczenie,$pytanie) or die ('Błąd połączenia 002');

		foreach ($rezultat as $value) 
		{
			$passwordsql = $value['password'];
			$loginsql = $value['login'];
		}

		if ($password==@$passwordsql&&$login==@$loginsql&&($_POST['login'])!=''&&($_POST['password'])!='') 
		{
			session_start();
			$_SESSION['loginek'] = $loginsql;
			header('location:char.php');
		}

		else
		{
		echo "<div style='color:red;font-family:arial;font-size:200%;float:left;margin-top:570px;margin-left:-260px;'>Złe dane logowania!</div>";
		}
	mysqli_close($polaczenie);
}

?>
</div>
</body>
</html>
