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
	<?php
		session_start();
		require_once('connection.php');
		$polaczenie = mysqli_connect($serwer,$user,$pass,$db) or die ('Błąd połączenia 001');
		mysqli_set_charset($polaczenie,'utf8');
		$login = $_SESSION['loginek'];

		echo "<div id='postacie2'>";
		$pytanie = "SELECT nazwa_postaci1, nazwa_postaci2, nazwa_postaci3, nazwa_postaci4, nazwa_postaci5 FROM konta WHERE login='$login'";
		$wysylanie = mysqli_query($polaczenie,$pytanie) or die("Nie moge wysłać zapytania1");
		foreach ($wysylanie as $value) 
		{
			$champion[1] = $value['nazwa_postaci1'];
			$_SESSION['nazwa1'] =$champion[1];
			$champion[2] = $value['nazwa_postaci2'];
			$_SESSION['nazwa2'] =$champion[2];
			$champion[3] = $value['nazwa_postaci3'];
			$_SESSION['nazwa3'] =$champion[3];
			$champion[4] = $value['nazwa_postaci4'];
			$_SESSION['nazwa4'] =$champion[4];
			$champion[5] = $value['nazwa_postaci5'];
			$_SESSION['nazwa5'] =$champion[5];
		}
			for ($i=1; $i < 6 ; $i++) 
			{ 

				if ($champion[$i]!='') 
				{
				$pytanie2 = "SELECT klasa, level FROM postacie WHERE nazwa_postaci='$champion[$i]'";
				$wysylanie2 = mysqli_query($polaczenie,$pytanie2) or die("Nie moge wysłać zapytania2");	
					foreach ($wysylanie2 as $value) 
						{
							@$champion_klasa[$i] = $value['klasa'];
							@$champion_level[$i] = $value['level'];
						}
						if ($champion_klasa[$i]=='Hunter') 
						{
							$kolor[$i]='orange';				
						}
						if ($champion_klasa[$i]=='Warrior') 
						{
							$kolor[$i]='red';				
						}
						if ($champion_klasa[$i]=='Mage') 
						{
							$kolor[$i]='blue';				
						}
						
						$postac='postac';
						$ididvapostaci=$postac .$i;
				echo 
				"<div style='box-shadow:0px 0px 0px 2px $kolor[$i];  2px;background-color:black'class='postac' id='$ididvapostaci';>
						<img style='box-shadow:0px 0px 0px 2px $kolor[$i]; margin-left:-190px;position:absolute;width:105px;105px' src='graphics/icons/$champion_klasa[$i].jpg'></img>
						<p style='margin-top:20px;margin-left:90px;'>
							$champion[$i]<br>
							<i style='font-size:20px;'>$champion_klasa[$i] $champion_level[$i] LEVEL
							</i>	
						</p>
						<form method='POST' action=''>	
						<input name='czempion' type='submit' value='$i' style='font-size:0px;border:none;
	background-color:rgb(0,0,0,0);width:380px;height:109px;margin-left:-192px;margin-top:-96px;position:absolute'>
						</form>	
				</div>";
				}

			}

			
		echo "</div>";
		if (isset($_POST['czempion'])) 
			{
				$czempion = $_POST['czempion'];
				if ($czempion==1) 
				{
					$wysokosc[0] =120;
				}
				if ($czempion==2) 
				{
					$wysokosc[0] =260;
				}
				if ($czempion==3) 
				{
					$wysokosc[0] =400;
				}
				if ($czempion==4) 
				{
					$wysokosc[0] =530;
				}
				if ($czempion==5) 
				{
					$wysokosc[0] =670;
				}

				echo "<div style='margin-top:$wysokosc[0]px;border:solid red 4px;text-align:center;background-color:black;width:56px;height:56px;color:red;position:absolute;font-size:80px;font-family:arial;margin-left:1420px;'><form method='POST' action=''><input type='submit' name='usun' style='margin-left:-31px;margin-top:-3px;width:62px;height:62px;border:none;
	background-color:rgb(0,0,0,0);position:absolute;font-size:0px;' value='$czempion'></form><p style='color:red;font-size:70px;margin-top:-17px;'>x</p>";
				echo "</div>";

					echo "<div style='width:66px;height:98px;border:solid #0ace00 4px;margin-left:900px;margin-top:800px;position:absolute;background-color:black;'><img src='graphics/strzałka.png'>";





				echo "</div>";
			}

		if (isset($_POST['usun'])) 
		{
			$licznik=0;
			$login = $_SESSION['loginek'];
			$czemp[1]=$_SESSION['nazwa1'];
			if ($czemp[1]!='') $licznik++;  
			$czemp[2]=$_SESSION['nazwa2'];
			if ($czemp[2]!='') $licznik++;  
			$czemp[3]=$_SESSION['nazwa3'];
			if ($czemp[3]!='') $licznik++;  
			$czemp[4]=$_SESSION['nazwa4'];
			if ($czemp[4]!='') $licznik++;  
			$czemp[5]=$_SESSION['nazwa5'];
			if ($czemp[5]!='') $licznik++;  
			$licznik--;
			$czempion=$_POST['usun'];
			echo $czemp[$czempion];
			$pytanie3 = "DELETE FROM `postacie` WHERE `postacie`.`nazwa_postaci` = '$czemp[$czempion]'";
			$wysylanie3 = mysqli_query($polaczenie,$pytanie3) or die("Nie moge wysłać zapytania5");
			$pytanie4 = "UPDATE `konta` SET `liczba_postaci` = '$licznik', `nazwa_postaci$czempion` = '' WHERE `konta`.`login` = '$login'";
			$wysylanie4 = mysqli_query($polaczenie,$pytanie4) or die("Nie moge wysłać zapytania6");
			$licznik=0;
			$_SESSION['nazwa1']='';
			$_SESSION['nazwa2']='';
			$_SESSION['nazwa3']='';
			$_SESSION['nazwa4']='';
			$_SESSION['nazwa5']='';
			header('location:char.php');

		}	
		if ($login=='') 
		{
			header('location:sesja.html');
		}

		if (isset($_POST['wyloguj']))
		{
			header('location:index.php');
		}
		mysqli_close($polaczenie);
	?>





<form action="create.php" method="POST">
	<div>
	<input type="submit" name="create" value="STOWRZ POSTAC"  style="
	position:absolute;
	margin-left:1567px;
	margin-top:801px;
	position:absolute;
	font-family:arial;
	font-size:25px;
	color:transparent;
	text-align:center;
	height:32px;
	width:235px;
	border:none;
	background-color:rgb(0,0,0, 0.1);">
	</form>
	<form action="" method="POST">
	<input  type="submit" name="wyloguj" id="wroc" style="
	position:absolute;
	margin-left:1567px;
	margin-top:897px;
	position:absolute;
	font-family:arial;
	font-size:25px;
	color:transparent;
	text-align:center;
	height:32px;
	width:235px;
	border:none;
	background-color:rgb(0,0,0, 0.1);">
</form>
	</div>
</div>
</body>
</html>
