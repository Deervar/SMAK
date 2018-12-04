<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<title></title>
</head>
<body style="background-image:url('graphics/create1.jpg');">
<div id="container">
	<form method="POST" action="" style="width:400px; position:absolute; margin-top:298px;margin-left:52px;">
		<input type="submit" value=1 name="klasa" id="wybrana_klasa1">
		<input type="submit" value=2 name="klasa" id="wybrana_klasa2">
		<input type="submit" value=3 name="klasa" id="wybrana_klasa3">
	</form>	
		<div id="klasy">
		<div class="klasy"><img src="graphics/icons/mage.jpg"><p>Czarodziej</p></div>
		<div class="klasy"><img src="graphics/icons/warrior.jpg"><p>Wojownik</p></div>
		<div class="klasy"><img src="graphics/icons/hunter.jpg"><p>Łowca</p></div>
	</div>

	<div id="staty">
	<?php
	@$class=0+$_POST['klasa'];

			if ($class==1) 
				{
					echo $_POST['klasa'];
					echo "<div style='margin-left:-1010px;position:absolute;margin-top:-180px;' id='zdjecie'><img src='graphics/icons/mag1.jpg'></div>";
					
				}
			if ($class==2)
				{
					echo $_POST['klasa'];
					echo "<div style='margin-left:-1010px;position:absolute;margin-top:-180px;' id='zdjecie'><img src='graphics/icons/war1.jpg'></div>";

				} 
			if ($class==3)
				{
					echo $_POST['klasa'];
					echo "<div style='margin-left:-1010px;position:absolute;margin-top:-180px;' id='zdjecie'><img src='graphics/icons/hunter1.jpg'></div>";

				} 

			session_start();
			@$login = $_SESSION['loginek'];

			$int=5;
			$str=5;
			$end=5;
			$agi=5;
			$char=5;
			$faith=5;
			

			if ($class==1) 
			{
			$_SESSION['charclass']='Mage';
			echo "<style>#wybrana_klasa1{border:solid blue 2px;}#staty{border:solid blue 2px;}</style>";
			echo "<style>#zdjecie img{border: solid blue 2px;}</style>";
			$int=9;
			$str=1;
			$end=1;
			$agi=1;
			$char=5;
			$faith=5;
			$flaga=1;
			
			}

			if ($class==2) 
			{
			
			$_SESSION['charclass']='Warrior';
			echo "<style>#wybrana_klasa2{border:solid red 2px;}#staty{border:solid red 2px;}</style>";
			echo "<style>#zdjecie img{border: solid red 2px;}</style>";
			$int=1;
			$str=9;
			$end=6;
			$agi=4;
			$char=1;
			$faith=1;
			$flaga=1;
			}

			if ($class==3) 
			{
			
			$_SESSION['charclass']='Hunter';
			echo "<style>#wybrana_klasa3{border:solid orange 2px;}#staty{border:solid orange 2px;}</style>";
			echo "<style>#zdjecie img{border: solid orange 2px;}</style>";
			$int=3;
			$str=3;
			$end=3;
			$agi=8;
			$char=3;
			$faith=2;
			$flaga=1;
			}

			if ($int>5)echo "<style>#staty #int{color:#1be215;}</style>";
			if ($str>5)echo "<style>#staty #str{color:#1be215;}</style>";
			if ($end>5)echo "<style>#staty #end{color:#1be215;}</style>";
			if ($agi>5)echo "<style>#staty #agi{color:#1be215;}</style>";
			if ($char>5)echo "<style>#staty #char{color:#1be215;}</style>";
			if ($faith>5)echo "<style>#staty #faith{color:#1be215;}</style>";

			if ($int<5)echo "<style>#staty #int{color:red;}</style>";
			if ($str<5)echo "<style>#staty #str{color:red;}</style>";
			if ($end<5)echo "<style>#staty #end{color:red;}</style>";
			if ($agi<5)echo "<style>#staty #agi{color:red;}</style>";
			if ($char<5)echo "<style>#staty #char{color:red;}</style>";
			if ($faith<5)echo "<style>#staty #faith{color:red;}</style>";
				
			echo '<p class="statystyka">Intelekt:</p><p id="int">'.$int.' </p>';
			echo '<p class="statystyka">Siła:</p><p id="str">'.$str.' </p>';
			echo '<p class="statystyka">Wytrzymałość:</p><p id="end">'.$end.' </p>';
			echo '<p class="statystyka">Zręczność:</p><p id="agi">'.$agi.' </p>';
			echo '<p class="statystyka">Charyzma:</p><p id="char">'.$char.' </p>';
			echo '<p class="statystyka">Wiara:</p><p id="faith">'.$faith.' </p>';
			echo "</div>";


				if (isset($_POST['wroc'])) 
				{
					header('location:char.php');
				}
				if (isset($_POST['stworz'])&&$_POST['char_name']!=''&&$_SESSION['charclass']!=1)
					{

						require_once('connection.php');
						$polaczenie = mysqli_connect($serwer,$user,$pass,$db) or die ('Błąd połączenia 001');
						mysqli_set_charset($polaczenie,'utf8');
						$charname = $_POST['char_name'];
						$charlevel = '1';
						$login = $_SESSION['loginek'];
						$charclass = $_SESSION['charclass'];

						$pytanie5 = "SELECT nazwa_postaci1, nazwa_postaci2, nazwa_postaci3, nazwa_postaci4, nazwa_postaci5 FROM konta WHERE login='$login'";
						$wysylanie5 = mysqli_query($polaczenie,$pytanie5) or die("Nie moge wysłać zapytania1");
							foreach ($wysylanie5 as $value) 
							{
								$champion[1] = $value['nazwa_postaci1'];
								$champion[2] = $value['nazwa_postaci2'];
								$champion[3] = $value['nazwa_postaci3'];
								$champion[4] = $value['nazwa_postaci4'];
								$champion[5] = $value['nazwa_postaci5'];
							}
							$licznik=0;

						for ($i=1; $i <=5 ; $i++) 
						{ 
							if($champion[$i]=="")
							{
								$licznik=$i;
								$i=6;
							}
						}

						$pytanie = "INSERT INTO postacie(`nazwa_postaci`,`klasa`,`level`) VALUES ('$charname','$charclass','$charlevel')";
						$wysylanie = mysqli_query($polaczenie,$pytanie)or die('<p style="margin-left:650px;margin-top:720px;position:absolute;color:red;font-size:30px;font-family:verdana;"podana nazwa jest już zajęta!</p>');

					

						if($wysylanie)
							{

							$pytanie2 = "UPDATE `konta` SET `nazwa_postaci$licznik` = '$charname' WHERE `konta`.`login` = '$login';";
							$wysylanie2 = mysqli_query($polaczenie,$pytanie2) or die("<p style='margin-left:650px;margin-top:720px;position:absolute;color:red;font-size:30px;font-family:verdana;'>Nie masz już miejsca na kolejną postać!</p>");
							$_POST['char_name']='';
							header('location:char.php');
							$pytanie4 = "UPDATE `konta` SET `liczba_postaci` = '$licznik' WHERE `konta`.`login` = '$login'";
							$wysylanie4 = mysqli_query($polaczenie,$pytanie4) or die("Nie moge wysłać zapytania4");
							$_SESSION['charclass']=1;
							}						

						mysqli_close($polaczenie);

							
						
					
					}
					else if (isset($_POST['stworz'])&&$_SESSION['charclass']!=1) 
							{	
								echo '<div style="margin-left:800px;margin-top:720px;position:absolute;color:red;font-size:30px;font-family:verdana;">Podaj nazwę postaci!</div>';
								$_SESSION['charclass']=1;
								$_POST['char_name']='';
							}
							else if (isset($_POST['stworz'])&&$_POST['char_name']!=''&&$_SESSION['charclass']==1) 
							{	
								echo '<div style="margin-left:790px;margin-top:720px;position:absolute;color:red;font-size:30px;font-family:verdana;">Wybierz klasę postaci!</div>';
								$_SESSION['charclass']=1;
								$_POST['char_name']='';
							}
							else if(isset($_POST['stworz']))
							{
								echo '<div style="margin-left:690px;margin-top:720px;position:absolute;color:red;font-size:30px;font-family:verdana;">Wybierz klasę i podaj nazwę postaci!</div>';
							}	



					if ($login=='') 
					{	
						header('location:sesja.html');
					}


			  ?>


			<form  action=""  method="POST">
			<input value=""type="submit" name="stworz" style="
			position:absolute;
			margin-left:-975px;
			margin-top:856px;
			width:120px;
			height:33px;
			border:none;
			background-color:rgb(0,0,0,0.1);
	;
			">
			<input type="submit" name="wroc"
			style="
		
			margin-top:898px;
			margin-left:-307px;
			position:absolute;
			font-family:arial;
			font-size:25px;
			color:transparent;
			text-align:center;
			height:32px;
			width:235px;
			border:none;
			background-color:rgb(0,0,0,0.1);
			">
			<input maxlength="10" type="text" name="char_name"
			style="
			color:white;
			margin-top:782px;
			margin-left:-1031px;
			position:absolute;
			font-family:arial;
			font-size:25px;
			text-align:center;
			height:32px;
			width:235px;
			border:none;
			background-color:rgb(0,0,0,0.1);">
			
			</form>
				</div>
</body>
</html>