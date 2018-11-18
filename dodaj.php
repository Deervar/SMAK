<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Dodaj kino</title>
</head>
<body>
	<h1>Niestety nie znam tego kina, ale chętnie nauczę się jego adresu. Wpisz w formularz dane kina.</h1>
	<form action="" method="POST">
		<p>Podaj nazwe kina<input type="text" name="nazwa">
		<p>Podaj adres kina<input type="text" name="adres">
		<p>Podaj miasto<input type="text" name="miasto">
			<input type="submit" name="wyslij">
	</form>
	<?php
		include("connect.php");
		$polacz = mysqli_connect($serwer,$user,$pass) or die("Błąd połączenia");
		mysqli_select_db($polacz,'siri');
		mysqli_set_charset($polacz,"utf8");
	if(isset($_POST['wyslij']))
	{
		$nazwa = $_POST['nazwa'];
		$adres = $_POST['adres'];
		$miasto = $_POST['miasto'];

		$pytanie = "INSERT INTO kina(nazwa_kina,miasto,adres) VALUES ('$nazwa','$miasto','$adres')";

		$wysylanie = mysqli_query($polacz,$pytanie) or die("Nie moge wysłać zapytania :(");

		if($wysylanie)
		{
			echo "Dodałam kino do bazy";
		}
		else
		{
			echo "Sory ale nie udało się dodać kina";
		}
		mysqli_close($polacz);
	}
?>
<a href="index.html"><button>Powrot do strony głównej</button></a>
</body>
</html>