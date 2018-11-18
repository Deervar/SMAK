<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<title></title>
</head>
<body style="background-image:url('graphics/char.jpg');">
<div id="container">
<div id="postacie">
	<div class="postac" id="postac1"></div>
	<div class="postac" id="postac2"></div>
	<div class="postac" id="postac3"></div>
	<div class="postac" id="postac4"></div>
	<div class="postac" id="postac5"></div>
</div>




<form action="create.php" method="POST">
	<div id="inputy_char">
	<input type="submit" name="create" value="STOWRZ POSTAC">
</form>
<form action="" method="POST">
	<input  type="submit" name="wyloguj" id="wroc">
</form>
	</div>
<?php
session_start();
$login = $_SESSION['loginek'];
if ($login=='') 
{
	header('location:sesja.html');
}

if (isset($_POST['wyloguj']))
{
	header('location:index.php');
}

 ?>


</div>
</body>
</html>