<?php
	include "config.php";
?>

<!-- home.php -->
<html lang = "en">
	<head>
  		<meta charset="UTF-8"> 
   		<title> CSCI 130 Battleship Project </title>
   		<!-- CSS elements header file --> 
    	<link rel="stylesheet" href="CSS/styles.css" media="all" />
 	</head>
 
 	<body>
		<!-- Main title -->
		<header> 
			<div class = "title"> BATTLESHIP <img src = "images/red.png" style = "width:50px; height 55px;"> 
			<a href="userAccount.php" style="text-align:right">
			<?php 
				if (!isset($_SESSION["userid"])) {
					echo "Guest";
				}
				else {
					echo "Welcome " . $_SESSION["userid"];
				}
			?> 
			</a>
			</div>
		</header>
		<!-- Main content -->
		<div class = "bgGradient">
			<img src = "images/battleship.png" style = "margin: 50px; position: absolute;right: 530px;top: 200px;">
			<!-- left indent in margins -->
			<div class="leftMargins"> <br><br>
				<a class = "myButton" href="game.php"> Enter Arena </a> <br><br>
				<a class = "myButton" href="login.php"> Login or Register </a> <br><br>
				<a class = "myButton" href="howtoplay.php" > How to Play </a> <br><br>
				<a class = "myButton" href="leaderboard.php"> Leaderboard </a> <br><br>
				<a class = "myButton" href="about.php"> About Us </a> <br><br>
			</div>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</div>
		<!-- Footer containing copyright and email adress -->
		<footer>
			<address style = "font-family:Arial; size: 1rem; color: #c6cbcf;"> © 2020 JOSHUA FRANCISCO & ROSELLYN VICENTE SOME RIGHTS RESERVED <br><br> 
				CONTACT INFORMATION: <a class="noLink" href="mailto:joshuafrancisco@mail.fresnostate.edu?subject=CSCI 130 Project Inquiries"> joshuafrancisco@mail.fresnostate.edu  </a> 
				<a>/</a>
				<a class="noLink" href="mailto:rose_vice@mail.fresnostate.edu?subject=CSCI 130 Project Inquiries"> rose_vice@mail.fresnostate.edu <br> </a> 
			</address>
			
			<!-- <address class="arialChange" > 
				CONTACT INFORMATION: <a class="noLink" href=""> 
			</address> -->
		</footer>
	</body>
</html>