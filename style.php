<?php header("Content-type: text/css"); ?>
*
{
	margin:0px;
	padding:0px;
}
@font-face
{
	font-family: pixelfont;
	src:url(fonts/PixelAzureBonds.otf);
}
html
{
	background-color:white;
}
body
{
	width:1920px;
	height:969px;
	display: block;
    margin-left: auto;
    margin-right: auto;
	background-image:url('graphics/tło.jpg');
	background-repeat:none;
}
#container
{
	width:1920px;
	height:969px;
	float:left;
}
#inputy
{
	margin-top:440px;
	margin-left:840px;
	float:left;
	width:242px;
}
.teksty
{
	margin-top:1px;
	margin-left:2px;
	font-family:arial;
	font-size:25px;
	color:white;
	text-align:center;
	margin-bottom:40px;
	height:32px;
	width:240px;
	border:none;
	background-color:rgb(0,0,0, 0.1);
}
#submit
{
	margin-top:40px;
	margin-left:13px;
	font-family:arial;
	font-size:25px;
	color:white;
	text-align:center;
	margin-bottom:40px;
	height:30px;
	width:215px;
	border:none;
	background-color:rgb(0,0,0, 0.1);
}
#powitanie
{
	-webkit-text-stroke-width:2px;
	-webkit-text-stroke-color: black;
	font-size:30px;
	text-align:center;
	width:100%;
	color:yellow;
	font-family: arial;
	position:absolute;
	margin-top:-875px;
}
#inputy_char
{
	width:100px;
	height: 100px;
	margin-top:801px;
	margin-left:1567px;
}
#inputy_char input
{
	float:left;
	font-family:arial;
	font-size:25px;
	color:transparent;
	text-align:center;
	height:32px;
	width:235px;
	border:none;
	background-color:rgb(0,0,0, 0.1);
}
#inputy_char #wroc
{
	margin-top:64px;
}
#klasy
{
	font-size:25px;
	color:white;
	margin-left:50px;
	margin-top:300px;
	float:left;
	height:308px;
	width:100px;
}
#klasy img
{
	float:left;
	width:100px;
	height:100px;
}
.klasy
{
	border:solid black 2px;
 	width:400px;
	height:100px;
}
#klasy p
{
	float:left;
	font-family: arial;
	margin-top:35px;
	margin-left:15px;
}
#staty
{
	padding-top:30px;
	margin-top:300px;
	margin-left:1330px;
	float:left;
	height:300px;
	width:400px;
	border:solid white 2px;
}
.statystyka
{
	width:300px;
	margin-left:20px;
	font-size:40px;
	font-family:arial;
	color:white;
}
#staty p
{
	float:left;
	font-size:40px;
	font-family:arial;
	color:white;
}
#wybrana_klasa1
{
	margin-top:4px;
	width:400px;
	height:100px;
	color:transparent;
	background-color: transparent;
	border:none;
}
#wybrana_klasa2
{
	margin-top:4px;
	width:400px;
	height:100px;
	color:transparent;
	background-color: transparent;
	border:none;
}
#wybrana_klasa3
{
	margin-top:4px;
	width:400px;
	height:100px;
	color:transparent;
	background-color: transparent;
	border:none;
}