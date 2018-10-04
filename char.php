<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="style.php">
	<meta charset="utf-8">
	<title></title>
</head>
<body style="background-image:url('graphics/char.jpg');">
<div id="container">
<form action="create.php" method="POST">
	<div id="inputy_char">
	<input type="submit" name="create" value="STOWRZ POSTAC">
</form>
<form action="login.html">
	<input id="wroc" type="submit">
</form>
	</div>
<?php
$postac=$_POST['char_name'];
session_start();

$login = $_SESSION['login'];
echo '<div id="powitanie"><h1>Witaj '.$login.'!</h1></div>';

 ?>


</div>
</body>
</html>