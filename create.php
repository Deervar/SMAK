<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="style.php">
	<meta charset="utf-8">
	<title></title>
</head>
<body style="background-image:url('graphics/create1.jpg');">
<div id="container">
	<form method="POST" action="" style="width:400px; position:absolute; margin-top:298px;margin-left:52px;">
		<input type="submit" value="1" name="klasa" id="wybrana_klasa1">
		<input type="submit" value="2" name="klasa" id="wybrana_klasa2">
		<input type="submit" value="3" name="klasa" id="wybrana_klasa3">
	</form>	
	<div id="klasy">
		<div class="klasy"><img src="graphics/icons/mag.jpg"><p>Czarodziej</p></div>
		<div class="klasy"><img src="graphics/icons/war.jpg"><p>Wojownik</p></div>
		<div class="klasy"><img src="graphics/icons/hunter.jpg"><p>Łowca</p></div>
	</div>

	<div id="staty">

		<?php 


			$int=5;
			$str=5;
			$end=5;
			$agi=5;
			$char=5;
			$faith=5;
			@$class=$_POST['klasa'];

			if ($class==1) 
			{
			echo "<style>#wybrana_klasa1{border:solid blue 2px;}#staty{border:solid blue 2px;}</style>";
			$int=9;
			$str=1;
			$end=1;
			$agi=1;
			$char=5;
			$faith=5;
			}

			if ($class==2) 
			{
			echo "<style>#wybrana_klasa2{border:solid red 2px;}#staty{border:solid red 2px;}</style>";
			$int=1;
			$str=9;
			$end=6;
			$agi=4;
			$char=1;
			$faith=1;
			}

			if ($class==3) 
			{
			echo "<style>#wybrana_klasa3{border:solid orange 2px;}#staty{border:solid orange 2px;}</style>";
			$int=3;
			$str=3;
			$end=3;
			$agi=8;
			$char=3;
			$faith=2;
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

		 ?>
	</div>
	<div id="inputy_char">
	<form action="char.php">
	<input style="margin-top:97px;" id="wroc" type="submit">
	</form>
	</div>

</div>
</body>
</html>