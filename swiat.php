<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<head>
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/8bit-wonder" type="text/css"/>
    <meta charset="utf-8">
    <title></title>
</head>
<body style="background-image:url('graphics/create.jpg');">
	<div id="container" style="font-family:arial;">
		<?php
			session_start();
			$login=$login = $_SESSION['loginek'];
			$numer=$_SESSION['numerek'];
			require_once('connection.php');
			$polaczenie = mysqli_connect($serwer,$user,$pass,$db) or die ('Błąd połączenia 001');
			mysqli_set_charset($polaczenie,'utf8');


			$pytanie = "SELECT `nazwa_postaci$numer` FROM `konta` WHERE `login` LIKE '$login'";
			$wysylanie = mysqli_query($polaczenie,$pytanie) or die('Błą połączenia 002');
			foreach ($wysylanie as $value)
			{
				$nazwa = $value['nazwa_postaci'.$numer];
			}
			

			$pytanie1 = "SELECT * FROM `smak`.`postacie` WHERE `nazwa_postaci` LIKE '$nazwa'";
			$wysylanie1 = mysqli_query($polaczenie,$pytanie1) or die('Błą połączenia 003');
			foreach ($wysylanie1 as $value) 
			{
				$nazwa_postaci = $value['nazwa_postaci'];
				$klasa[0] = $value['klasa'];
				$level = $value['level']+10
				;

				$intelekt = $value['intelekt'];
				$sila = $value['sila'];
				$wytrzymalosc = $value['wytrzymalosc'];
				$zrecznosc = $value['zrecznosc'];
				$charyzma = $value['charyzma'];
				$wiara = $value['wiara'];
			}
				if ($klasa[0]=='Mage') $kolor = 'blue';
				if ($klasa[0]=='Warrior') $kolor = 'red';
				if ($klasa[0]=='Hunter') $kolor = 'orange';

				$hp = 100 + $wytrzymalosc * 20;
			echo "<p style='color:yellow;font-family:arial;font-size:150%;position:absolute;margin-left:20px;margin-top:20px'>$nazwa_postaci $level Level</p>";
			echo "<div ";
			echo "style='border:solid 2px $kolor;padding-top:10px;text-align:center;width:346px;height:50px;background-color:#00ff01;margin-left:20px;margin-top:50px;position:absolute;font-size:200%'";
			echo "><div style='position:absolute;margin-top:-12px;margin-left:-2px;'><img style='border:solid 2px $kolor;position:absolute;width:58px;height:60px;'src='graphics/icons/$klasa[0].jpg'></div> $hp HP</div>";

			echo "<div ";
			echo "style='line-height:50px;text-align:center;color:white;font-size:200%;border:solid 2px $kolor;width:346px;height:296px;position:absolute;margin-top:150px;margin-left:20px;'";
			echo ">
			<p>Intelekt: $intelekt</p>
			<p>Siła: $sila</p>
			<p>Wytrzymalosc: $wytrzymalosc</p>
			<p>Zręcznosc: $zrecznosc</p>
			<p>Charyzma: $charyzma</p>
			<p>Wiara: $wiara</p>
			</div>";
			echo "<form method='POST' action='' style='margin-left:840px;margin-top:807px;'>
			<input type='submit' value='' name='eksploruj' style='width:239px;height:34px;border:none;background-color:RGBA(0,0,0,0'><br><br>
			<input type='submit' value='' name='uciekaj' style='width:158px;height:34px;border:none;background-color:RGBA(0,0,0,0);margin-left:41px;margin-top:9px;'>
			</form>";
			if (isset($_POST['uciekaj'])) 
			{
				header('location:char.php');
			}
			if (isset($_POST['eksploruj'])) 
			{	
			$wroglevel=rand(1,$level);
			$wrogintelekt = rand(1,5+$wroglevel);
			$wrogsila = rand(1,5+$wroglevel);
			$wrogwytrzymalosc = rand(1,5+$wroglevel);
			$wrogzrecznosc = rand(1,5+$wroglevel);
			$wrogcharyzma = rand(1,9+$wroglevel);
			$wrogwiara = rand(1,9+$wroglevel);
			$wroghp = 100 + $wrogwytrzymalosc * 15;
			echo "<p style='color:yellow;font-family:arial;font-size:150%;position:absolute;margin-left:1550px;margin-top:-890px'>Szkielet $wroglevel Level</p>";
			echo "<div style='border:solid 2px yellow;padding-top:10px;text-align:center;width:346px;height:50px;background-color:#00ff01;margin-left:1550px;margin-top:-860px;position:absolute;font-size:200%'";
			echo "><div style='position:absolute;margin-top:-12px;margin-left:-2px;'><img style='border:solid 2px yellow;position:absolute;width:58px;height:60px;'src='graphics/icons/wrog.png'></div>$wroghp HP</div>";
			echo "<div ";
			echo "style='line-height:50px;text-align:center;color:white;font-size:200%;border:solid 2px yellow;width:346px;height:296px;position:absolute;margin-top:-760px;margin-left:1550px;'";
			echo ">

			<p>Intelekt: $wrogintelekt</p>
			<p>Siła: $wrogsila</p>
			<p>Wytrzymalosc: $wrogwytrzymalosc</p>
			<p>Zręcznosc: $wrogzrecznosc</p>
			<p>Charyzma: $wrogcharyzma</p>
			<p>Wiara: $wrogwiara</p>
			</div>";
			echo "<form method='POST' action=''><img src='graphics/swords.png' style='width:100px;height:100px;margin-top:-550px;margin-left:900px;position:absolute'><input name='walka' type='submit' value='' style='width:100px;height:100px;background-color:RGBA(0,0,0,0);border:none;position:absolute;margin-left:900px;margin-top:-550px;'></form>";
			}
		  ?>
</div>
</body>
</html>
