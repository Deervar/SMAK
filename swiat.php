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
				$level = $value['level'];

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
			@session_start();
			$wroglevel=rand(1,$level);
			$wrogintelekt = rand(1,5+$wroglevel);
			$wrogsila = rand(1,5+$wroglevel);
			$wrogwytrzymalosc = rand(1,5+$wroglevel);
			$wrogzrecznosc = rand(1,5+$wroglevel);
			$wrogcharyzma = rand(1,9+$wroglevel);
			$wrogwiara = rand(1,9+$wroglevel);
			$wroghp = 100 + $wrogwytrzymalosc * 15;


			$_SESSION['wroglevel']=$wroglevel;
			$_SESSION['wrogintelekt']=$wrogintelekt;
			$_SESSION['wrogsila']=$wrogsila;
			$_SESSION['wrogwytrzymalosc']=$wrogwytrzymalosc;
			$_SESSION['wrogzrecznosc']=$wrogzrecznosc;
			$_SESSION['wrogcharyzma']=$wrogcharyzma;
			$_SESSION['wrogwiara']=$wrogwiara;
			$_SESSION['wroghp']=$wroghp;
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

			if (isset($_POST['walka'])) 
			{
				$wroglevel=$_SESSION['wroglevel'];
				$wrogintelekt=$_SESSION['wrogintelekt'];
				$wrogsila=$_SESSION['wrogsila'];
				$wrogwytrzymalosc=$_SESSION['wrogwytrzymalosc'];
				$wrogzrecznosc=$_SESSION['wrogzrecznosc'];
				$wrogcharyzma=$_SESSION['wrogcharyzma'];
				$wrogwiara=$_SESSION['wrogwiara'];
				$wroghp=$_SESSION['wroghp'];
				$statyof=$intelekt+$sila+$zrecznosc;
				$statyofwrog=$wrogintelekt+$wrogsila+$wrogzrecznosc;



			echo "<div style='background-color:white;width:500px;margin-left:700px;margin-top:-800px;position:absolute;font-size:150%;padding:10px;'>";

			for ($i=0;$i==0;) 
			{ 
				$silauderz=rand(50,50+$statyof);
				$silauderzwrog=rand(50,50+$statyofwrog);
				
				
				if ($wroghp>0) 
				{
					echo "Masz <b style='color:green;'>".$hp."HP</b>, zostałeś uderzony za <b style='color:red;'>".$silauderzwrog."HP</b><br>";
					$hp=$hp-$silauderzwrog;
				}
				if ($hp>0) 
				{
					echo "Twój wróg ma <b style='color:red;'>".$wroghp."HP</b>, uderzasz go za <b style='color:green;'>".$silauderz."HP</b><br>";
					$wroghp=$wroghp-$silauderz;
				}
				
				
				if ($wroghp<=0 or $hp<=0) 
				{
					$i=1;
					if ($wroghp<=0) 
					{
						echo "<br> Udało ci się pokonać wroga, zsykujesz 10 punktów doświadczenia!";
						if ($_SESSION['exp']>=10) 
						{
							$_SESSION['levelup']=1;
							echo $_SESSION['levelup'];
							$_SESSION['exp']=0;
						}
					}

					
					if ($hp<=0) 
					{
						echo "<br> Niemal zginąłeś! na szczęście w ostatniej chwili zdążyłeś uciec przed śmiertelnym uderzeniem wroga i opatrzyć swoje rany następnym razem bądz bardziej ostrożny!";				
					}
				}
			}
			
			
			echo "</div>";


			}
						
					echo $_SESSION['levelup'];
					if (@$_SESSION['levelup']==1) 
						{
							echo "<div id='statki'>
							<form method='POST' action=''>
							<div>+</div><input class='stateczki' type='submit' name='' value=''>
							<div>+</div><input class='stateczki' type='submit' name='' value=''>
							<div>+</div><input class='stateczki' type='submit' name='' value=''>
							<div>+</div><input class='stateczki' type='submit' name='' value=''>
							<div>+</div><input class='stateczki' type='submit' name='' value=''>
							<div>+</div><input class='stateczki' type='submit' name='' value=''>
							</form>
							</div>";
						}
						echo "</div>";
						echo "</div>";

		  ?>
		  <style type="text/css">
		  	#statki
		  	{
		  		margin-left:330px;
		  		margin-top: -780px;
		  		font-size:280%;
		  		position:absolute;
		  		color:white;
		  	}
		  	.stateczki
		  	{
		  		background-color:rgba(0,0,0,0);
		  		margin-top:-39px;
		  		width:25px;
		  		height:25px;
		  		position:absolute;
		  	}
		  </style>
</div>
</body>
</html>
