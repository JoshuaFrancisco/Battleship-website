<?php
   include "config.php";
?>

<!-- home.php -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
  		<meta charset="UTF-8"> 
   		<title> CSCI 130 Battleship Project </title>
   		<!-- CSS elements header file --> 
    	<link rel="stylesheet" href="CSS/styles.css" media="all" />
    	<link rel="stylesheet" href="CSS/game-style.css">
    	<!-- Google font API -->
    	<link rel="preconnect" href="https://fonts.gstatic.com">
    	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

    <!-- Select Single Player or Multi Player game modes -->
    <script>
      let gameMode = 'singlePlayer'
    </script>

    <script src="Javascript/app.js" charset="utf-8"></script>

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
  <label id="minutes">00</label>:<label id="seconds">00</label>
  <br> 
  <div class="container hidden-info">
  <h2 id="turn" class="info-text"> Player Starts First </h2>
  <h3 id="turn" class="info-text"> ←  Player | Computer → </h3>
  </div>

    <!-- Container will hold user and computer grid -->
    <div class="container">
      <div class="battleship-grid grid-player"></div>
      <div class="battleship-grid grid-computer"></div>
    </div>

    <!-- Buttons to start game, rotate, turns, and information for turns  -->
    <div class="container hidden-info">
      <div class="setup-buttons" id="setup-buttons"> <br> <br>
        <button id="start-game" class="btn">Start Game</button>
        <button id="rotate-ships" class="btn">Rotate Ships</button>
        <button id="restart" class="btn"> Reset Ships</button>
      </div> <br>
      <h2 id="info" class="info-text"></h2>
      <div id = "playerwin"></div>
    </div>


    <!-- User ships-->
    <div class="container">
      <div class="grid-display">
        <div class="ship destroyer-container" draggable="true"><div id="destroyer-0"></div><div id="destroyer-1"></div></div>
        <div class="ship submarine-container" draggable="true"><div id="submarine-0"></div><div id="submarine-1"></div><div id="submarine-2"></div></div>
        <div class="ship cruiser-container" draggable="true"><div id="cruiser-0"></div><div id="cruiser-1"></div><div id="cruiser-2"></div></div>
        <div class="ship battleship-container" draggable="true"><div id="battleship-0"></div><div id="battleship-1"></div><div id="battleship-2"></div><div id="battleship-3"></div></div>
        <div class="ship carrier-container" draggable="true"><div id="carrier-0"></div><div id="carrier-1"></div><div id="carrier-2"></div><div id="carrier-3"></div><div id="carrier-4"></div></div>
      </div>
    </div>


    <!-- Go back to homepage -->
    <br><br><br><br><br><br><br><br>
    <a class = "leftMargins myButton" href="index.php"> ← BACK </a>
        <br><br><br>
    </div>
		
	<!-- Footer containing copyright and email adress -->
	<footer>
		<address style = "font-family:Arial; size: 1rem; color: #c6cbcf;"> © 2020 JOSHUA FRANCISCO & ROSELLYN VICENTE SOME RIGHTS RESERVED <br><br> 
			CONTACT INFORMATION: <a class="noLink" href="mailto:joshuafrancisco@mail.fresnostate.edu?subject=CSCI 130 Project Inquiries"> joshuafrancisco@mail.fresnostate.edu  </a> 
			<a>/</a>
			<a class="noLink" href="mailto:rose_vice@mail.fresnostate.edu?subject=CSCI 130 Project Inquiries"> rose_vice@mail.fresnostate.edu <br> </a> 
		</address>
	</footer>
 </body>
</html>