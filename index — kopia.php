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
        <input type="text" name="login" class="teksty">
        <input type="password" name="password" class="teksty">
        <input type="submit" name="send" id="submit" value="">
    </div>
</form>
<?php


if (isset($_POST['send'])) 
{
	$polaczenie = mysqli_connect('localhost:3307','root','','smak') or die ('Błąd połączenia 001');

	mysqli_set_charset($polaczenie,'utf8');
	$login=$_POST['login'];
	$password=$_POST['password'];
	$pytanie = "SELECT password,login FROM konta WHERE login='$login'";

	$rezultat = mysqli_query($polaczenie,$pytanie) or die ('Błąd połączenia 002');

		foreach ($rezultat as $value) 
		{
			$passwordsql= $value['password'];
			$loginsql= $value['login'];
		}

		if ($password==@$passwordsql&&$login==@$loginsql) 
		{
			
		}

		else
		{
		echo "<div style='color:red;font-family:arial;font-size:25px;float:left;margin-top:400px;margin-left:-230px;'>Złe dane logowania!</div>";
		}
	mysqli_close($polaczenie);
}

?>
</div>
</body>
</html>
