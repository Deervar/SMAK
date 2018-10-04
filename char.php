<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<head>

	<meta charset="utf-8">
	<title></title>
</head>
<body>

<form action="gra.php" method="POST">
</form>
<div id="container">
<?php
session_start();
$login = $_SESSION['login'];
echo '<div id="powitanie"><h1>Witaj '.$login.'</h1></div>';
 ?>


</div>
</body>
</html>