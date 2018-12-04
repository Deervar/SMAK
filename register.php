<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<head>
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/8bit-wonder" type="text/css"/>
    <meta charset="utf-8">
    <title></title>
</head>
<body style="background-image: url(graphics/register.jpg);width:1920px;height:969px;display: block; margin-left: auto;margin-right: auto;background-repeat:none;">
<div id="container">
<form action="" method="POST" style="margin-left:496px;margin-top:423px;">
	<input type="text" name="login" maxlength="10" class="teksty">
	<input type="password" name="password" maxlength="10" class="teksty" style="margin-left:98px;">
	<input type="text" name="email" maxlength="20" class="teksty" style="margin-left:98px;">
	<input type="submit" name="register" value="" class="teksty" style="margin-left:-583px ;margin-top:170px;position:absolute;">
</form>

<?php
if (isset($_POST['register'])) 
{
	$login=$_POST['login'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	require_once('connection.php');
	$polaczenie = mysqli_connect($serwer,$user,$pass,$db) or die ('Błąd połączenia 001');
	mysqli_set_charset($polaczenie,'utf8');
	$pytanie = "INSERT INTO `konta` (`login`, `password`, `email`, `liczba_postaci`) VALUES ('$login', '$password', '$email', '0')";
	$wysylanie = mysqli_query($polaczenie,$pytanie)or die('Błąd połączenia 002');
	header('Location:spoko.html');
}
?> 
</body>
</html>
